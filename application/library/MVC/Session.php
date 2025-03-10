<?php
/**
 * Session.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

/**
 * Session
 */
class Session
{
    /**
     * Session object provides storage for shared objects.
     * @var \MVC\Session
     */
    protected static $_oInstance = null;

    /**
     * Options
     * @var array
     */
    protected $_aOption = array();

    /**
     * namespace
     * @var string
     */
    protected $_sNamespace;

    /**
     * @var bool
     */
    protected $_bSessionEnable = false;

    /**
     * @param string $sNamespace
     * @throws \ReflectionException
     */
    protected function __construct(string $sNamespace = '')
    {
        $this->setNamespace($sNamespace);
        $this->_aOption = Config::get_MVC_SESSION_OPTIONS();
        $this->enable(Config::get_MVC_SESSION_ENABLE());

        foreach ($this->_aOption as $sKey => $mValue)
        {
            ini_set ('session.' . $sKey, $mValue);
        }

        // Start a default Session, if no session was started before
        // AND
        // if MVC_SESSION_ENABLE is explicitely set to true
        if  (
            !session_id ()
            &&  (true === Config::get_MVC_SESSION_ENABLE())
        )
        {
            session_cache_limiter ('nocache');
            session_cache_expire (0);
            session_start ();
        }
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public function enabled() : bool
    {
        return Config::get_MVC_SESSION_ENABLE();
    }

    /**
     * @param bool $bEnable
     * @return \MVC\Session|null
     * @throws \ReflectionException
     */
    public function enable(bool $bEnable = true) : Session|null
    {
        $this->_bSessionEnable = $bEnable;
        Config::set_MVC_SESSION_ENABLE($bEnable);

        return self::$_oInstance;
    }

    /**
     * @param string $sNamespace
     * @return Session
     * @throws \ReflectionException
     */
    public static function is(string $sNamespace = '') : Session
    {
        if (null === self::$_oInstance)
        {
            self::$_oInstance = new self($sNamespace);
        }
        else
        {
            self::$_oInstance->setNamespace($sNamespace);
        }

        // copy Session Object to registry
        Config::set_MVC_SESSION(self::$_oInstance);

        return self::$_oInstance;
    }

    /**
     * prevent any cloning
     * @return void
     */
    protected function __clone() : void
    {
        ;
    }

    /**
     * sets namespace
     * @param string $sNamespace
     * @return \MVC\Session|null
     * @throws \ReflectionException
     */
    public function setNamespace(string $sNamespace = '') : Session|null
    {
        ('' === $sNamespace)
            // fallback
            ? $sNamespace = Config::get_MVC_SESSION_NAMESPACE()
            : false;

        $this->_sNamespace = $sNamespace;

        Config::set_MVC_SESSION_NAMESPACE($sNamespace);

        return self::$_oInstance;
    }

    /**
     * gets the namespace
     * @return string namespace
     */
    public function getNamespace() : string
    {
        return $this->_sNamespace;
    }

    /**
     * sets a value by its key
     * @param string     $sKey
     * @param mixed|null $mValue
     * @return \MVC\Session
     */
    public function set(string $sKey = '', mixed $mValue = null) : Session
    {
        $_SESSION[$this->_sNamespace][$sKey] = $mValue;

        return self::$_oInstance;
    }

    /**
     * @param string $sKey
     * @return bool
     */
    public function has(string $sKey = '') : bool
    {
        if (isset($_SESSION[$this->_sNamespace][$sKey]))
        {
            return true;
        }

        return false;
    }

    /**
     * gets a value by its key
     * @param string $sKey
     * @return mixed
     */
    public function get(string $sKey = '') : mixed
    {
        if (!isset($_SESSION[$this->_sNamespace][$sKey]))
        {
            return '';
        }

        return $_SESSION[$this->_sNamespace][$sKey];
    }

    /**
     * @return string
     */
    public function getSessionId() : string
    {
        $sSessionId = session_id();

        if (false === is_string($sSessionId) || true === empty($sSessionId))
        {
            return '';
        }

        return session_id();
    }

    /**
     * gets session key/values on the current namespace
     * @return array|mixed
     */
    public function getAll()
    {
        return ($_SESSION[$this->_sNamespace] ?? array());
    }

    /**
     * empty a session namespace; removes all data in the current namespace
     * @return bool
     */
    public function empty()
    {
        if (true === isset($_SESSION[$this->_sNamespace]))
        {
            $_SESSION[$this->_sNamespace] = null;
            unset($_SESSION[$this->_sNamespace]);

            return true;
        }

        return false;
    }

    /**
     * kills current session
     * @param bool $bRegenerateId
     * @return \MVC\Session|null
     * @throws \ReflectionException
     */
    public function kill(bool $bRegenerateId = true)
    {
        if (false === empty(session_id()))
        {
            session_regenerate_id($bRegenerateId);
            session_destroy();
        }

        return self::$_oInstance;
    }

    /**
     * activates Session for controllers based on module's config file (`_session.php`); gets active by triggered event "mvc.application.setSession.before"
     * @see /modules/{module}/etc/event/
     * @return void
     * @throws \ReflectionException
     */
    public static function applySessionRules()
    {
        $aEnableSessionForController = (Config::MODULE()['SESSION']['aEnableSessionForController'] ?? array());
        $aDisableSessionForController = (Config::MODULE()['SESSION']['aDisableSessionForController'] ?? array());

        $bEnable = (
            // current controller
            in_array(Route::getCurrent()->get_class(), $aEnableSessionForController)
            ||
            // any
            in_array('*', $aEnableSessionForController)
        );

        $bDisable = (
            // current controller
            in_array(Route::getCurrent()->get_class(), $aDisableSessionForController)
            ||
            // any
            in_array('*', $aDisableSessionForController)
        );

        if (true == $bEnable
            && false == $bDisable
            && isset($_COOKIE['Emvicy_cookieConsent'])
            && "true" == $_COOKIE['Emvicy_cookieConsent']
        )
        {
            Config::set_MVC_SESSION_ENABLE($bEnable);
        }
    }

    /**
     * @param string $sSessionId
     * @return bool success
     * @throws \ReflectionException
     */
    public static function deleteSessionFile(string $sSessionId = '') : bool
    {
        (true === empty($sSessionId)) ? $sSessionId = session_id() : false;
        $sFilename = Config::get_MVC_SESSION_PATH() . '/sess_' . $sSessionId;

        if (file_exists($sFilename))
        {
            Log::write(__FUNCTION__ . ': ' . $sFilename, Config::get_MVC_LOG_FILE_DEFAULT());
            return unlink($sFilename);
        }

        return false;
    }
}
