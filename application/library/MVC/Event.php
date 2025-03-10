<?php
/**
 * Event.php
 * @package   Emvicy
 * @copyright ueffing.net
 * @author    Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license   GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

use MVC\DataType\DTArrayObject;
use MVC\DataType\DTEventContext;

/**
 * @example
 * \MVC\Event::bind('test', function() {\MVC\Debug::display('Hello from anonymous function');});
 * \MVC\Event::run('test');
 * \MVC\Event::run('test', array('some' => 'value'));
 * \MVC\Event::run('test', $oObject);
 * \MVC\Event::run('test', function(){...});
 * \MVC\Event::delete('test');
 */
class Event
{
    /**
     * @var array
     */
    public static $aEvent = array();

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function init(): bool
    {
        $sEventDir = Config::get_MVC_MODULE_PRIMARY_ETC_DIR() . '/event';

        if (false === file_exists($sEventDir))
        {
            return false;
        }

        //  require recursively all php files in module's event dir
        /** @var \SplFileInfo $oSplFileInfo */
        foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($sEventDir)) as $oSplFileInfo)
        {
            if ('php' === strtolower($oSplFileInfo->getExtension()))
            {
                require_once $oSplFileInfo->getPathname();
            }
        }

        Event::RUN('mvc.event.init.after');

        return true;
    }

    /**
     * bind multiple closures to multiple event at once via config array
     * @see      /modules/{module}/etc/event/
     * @param array $aEvent
     * @return void
     * @throws \ReflectionException
     * @example  $aEvent = ['mvc.reflex.reflect.targetObject.before' => array(
     *                  function(\MVC\DataType\DTArrayObject $oDTArrayObject) { // minify css/js files
     *                  \MVC\Minify::init();
     *                  })];
     */
    public static function processBindConfigStack(array $aEvent = array()): void
    {
        foreach ($aEvent as $sEventName => $mData)
        {
            if (true === is_array($mData))
            {
                foreach ($mData as $oClosure)
                {
                    Event::bind($sEventName, $oClosure, debug_backtrace(limit: 2));
                }

                continue;
            }

            Event::bind($sEventName, $mData, debug_backtrace(limit: 2));
        }
    }

    /**
     * binds a callback closure to an event
     * @param string   $sEvent
     * @param \Closure $oClosure
     * @param array    $aDebug
     * @return void
     * @throws \ReflectionException
     */
    public static function bind(string $sEvent, \Closure $oClosure, array $aDebug = array()): void
    {
        $sEvent = trim($sEvent);

        $sDebug = Log::prepareDebug(((true === empty($aDebug))
            ? debug_backtrace(limit: 2)
            : $aDebug));

        if (!isset (self::$aEvent[$sEvent]))
        {
            self::$aEvent[$sEvent] = array();
        }

        Log::write('BIND (' . $sEvent . ', ' . Closure::dump($oClosure) . ')' . ' --> called in: ' . $sDebug, Config::get_MVC_LOG_FILE_EVENT(), false);
        Event::addToRegistry('BIND', $sEvent, 'BIND (' . $sEvent . ', ' . Closure::dump($oClosure) . ')' . ' --> called in: ' . $sDebug);

        // add listener to event
        self::addListenerToEvent($sEvent, $oClosure, $sDebug);
    }

    /**
     * binds a callback closure to an event
     * @notice alternative writing to Event::bind()
     * @param string   $sEvent
     * @param \Closure $oClosure
     * @param array    $aDebug
     * @return void
     * @throws \ReflectionException
     */
    public static function listen(string $sEvent, \Closure $oClosure, array $aDebug = array()): void
    {
        self::bind($sEvent, $oClosure, $aDebug);
    }

    /**
     * @param string   $sEvent
     * @param \Closure $oClosure
     * @param string   $sDebug
     * @return void
     */
    protected static function addListenerToEvent(string $sEvent, \Closure $oClosure, string $sDebug = ''): void
    {
        // make $sSource a unique one
        $sDebug .= ' (' . uniqid() . ')';
        $sSource = serialize($sDebug);
        self::$aEvent[$sEvent][$sSource] = $oClosure;
    }

    /**
     * @param string $sEvent
     * @param mixed  $mPackage
     * @return bool
     * @throws \ReflectionException
     */
    public static function run(string $sEvent = '', mixed $mPackage = null): bool
    {
        if (null === $mPackage)
        {
            $mPackage = DTArrayObject::create();
        }

        $bReturn = false;
        $sEvent = trim($sEvent);
        $sDebug = Log::prepareDebug(debug_backtrace(limit: 1));
        $sPreLog = ' (' . $sEvent . ') --> called in: ' . $sDebug;

        if (true === Config::get_MVC_EVENT_ENABLE_WILDCARD())
        {
            #------------
            # run any possible wildcard listeners; "RUN+"

            $aPlaceholderListener = self::getPlaceholderListenerOnEvent($sEvent);

            foreach ($aPlaceholderListener as $sPlaceholderListener)
            {
                $sPreLogWildCard = ' (' . $sPlaceholderListener . ' [' . $sEvent . ']) --> called in: ' . $sDebug;
                Event::addToRegistry('RUN', $sEvent, $sPreLogWildCard);
                self::execute(self::$aEvent[$sPlaceholderListener], $mPackage, 'RUN+', $sPreLogWildCard, $sPlaceholderListener, $sEvent, $sDebug);
                $bReturn = true;
            }
        }

        #------------
        # nothing special bonded; simple "RUN" and leave
        if (!isset (self::$aEvent[$sEvent]))
        {
            if (true === Config::get_MVC_LOG_EVENT_RUN())
            {
                Log::write('RUN' . $sPreLog, Config::get_MVC_LOG_FILE_EVENT());
            }

            return $bReturn;
        }

        #------------
        # run regular listeners; "RUN+"

        Event::addToRegistry('RUN', $sEvent, $sPreLog);
        self::execute(self::$aEvent[$sEvent], $mPackage, 'RUN+', $sPreLog, $sEvent, $sEvent, $sDebug);

        #------------

        return true;
    }

    /**
     * @param string $sEvent
     * @return array
     */
    protected static function getPlaceholderListenerOnEvent(string $sEvent = ''): array
    {
        $aListenerWithPlaceholder = array_map(
            'trim',
            preg_grep('/\*/', array_keys(self::$aEvent))
        );

        $aEventMatching = array_filter(
            $aListenerWithPlaceholder,
            function($sListenerWithPlaceholder) use ($sEvent) {
                $sPattern = str_replace('*', '([a-zA-Z0-9_\.]*)', $sListenerWithPlaceholder);
                preg_match('/^' . $sPattern . '/i', $sEvent, $aMatch);
                $sMatch = current($aMatch);

                return (false === empty($sMatch) && $sMatch === $sEvent);
            }
        );

        return $aEventMatching;
    }

    /**
     * @param array  $aBonded
     * @param        $mRunPackage
     * @param string $sRunType
     * @param string $sPreLog
     * @param string $sEvent
     * @param string $sEventOrigin
     * @param string $sCalledIn
     * @return void
     * @throws \ReflectionException
     */
    protected static function execute(array $aBonded = array(), $mRunPackage = null, string $sRunType = '', string $sPreLog = '', string $sEvent = '', string $sEventOrigin = '', string $sCalledIn = ''): void
    {
        foreach ($aBonded as $sKey => $sCallback)
        {
            // run bonded closure
            if (true === filter_var(Closure::is($sCallback), FILTER_VALIDATE_BOOLEAN))
            {
                $sMessage = $sRunType . $sPreLog . ' --> bonded by `' . unserialize($sKey) . ', try to run its Closure: ' . Closure::toString($sCallback);
                Log::write($sMessage, Config::get_MVC_LOG_FILE_EVENT(), false);

                $oDTEventContext = DTEventContext::create()
                    ->set_sEvent($sEvent)
                    ->set_sEventOrigin($sEventOrigin)
                    ->set_mRunPackage($mRunPackage)
                    ->set_aBonded($aBonded)
                    ->set_sBondedBy($sKey)
                    ->set_sCalledIn($sCalledIn)
                    ->set_oCallback($sCallback)/** @info get closure alternative way: Event::$aEvent[$oDTEventContext->get_sEvent()][$oDTEventContext->get_sBondedBy()] */
                    ->set_sCallbackDumped(Closure::dump($sCallback))
                    ->set_sMessage($sMessage);

                call_user_func($sCallback, $mRunPackage, $oDTEventContext);

                // error occurred
                if (false === $mRunPackage)
                {
                    Log::write("ERROR\t" . $sRunType . $sPreLog . ' *** Closure could not be run: ' . serialize($sCallback), Config::get_MVC_LOG_FILE_ERROR(), false);
                }
            }
        }
    }

    /**
     * deletes (unbinds) one or all events
     * if none parameter is given, *all* events are going to be deleted
     * @param string $sEvent
     * @return bool
     * @throws \ReflectionException
     */
    public static function delete(string $sEvent = ''): bool
    {
        $sDebug = Log::prepareDebug(debug_backtrace(limit: 1));

        // delete all
        if (true === empty($sEvent))
        {
            Event::addToRegistry('UNBIND', $sEvent, 'UNBIND: All Events deleted --> called in: ' . $sDebug);

            self::$aEvent = array();
            Log::write('UNBIND: All Events deleted --> called in: ' . $sDebug, Config::get_MVC_LOG_FILE_EVENT(), false);

            return true;
        }

        // key unknown
        if (false === isset(self::$aEvent[$sEvent]))
        {
            Error::error('UNBIND: Failed due to unknown event `' . $sEvent . '` --> called in: ' . $sDebug);

            return false;
        }

        Event::addToRegistry('UNBIND', $sEvent, 'UNBIND: Event `' . $sEvent . '` deleted --> called in: ' . $sDebug);
        self::$aEvent[$sEvent] = null;
        unset(self::$aEvent[$sEvent]);

        Log::write('UNBIND: Event `' . $sEvent . '` deleted --> called in: ' . $sDebug, Config::get_MVC_LOG_FILE_EVENT(), false);

        return true;
    }

    /**
     * adds a key/value pair to registry
     * @param string $sType  BIND | RUN
     * @param string $sEvent event
     * @param string $sValue closure (if type BIND) | listener (if type RUN)
     * @return void
     * @throws \ReflectionException
     */
    public static function addToRegistry(string $sType = '', string $sEvent = '', string $sValue = ''): void
    {
        $aMvcEvent = Config::get_MVC_EVENT();
        $aMvcEvent[$sType][$sEvent][] = $sValue;
        Config::set_MVC_EVENT($aMvcEvent);
    }

    /**
     * returns array with Listeners of all Events (default), or of the certain event $sEvent
     * @param string $sEvent
     * @return array
     */
    public static function getBonded(string $sEvent = ''): array
    {
        if (true === empty($sEvent))
        {
            return self::$aEvent;
        }

        return (array) (self::$aEvent[$sEvent] ?? array());
    }

    /**
     * @notice alternative writing to Event::getBonded()
     * @param string $sEvent
     * @return array
     */
    public static function getListeners(string $sEvent = ''): array
    {
        return self::getBonded($sEvent);
    }
}