<?php
/**
 * Application.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

use MVC\DataType\DTArrayObject;
use MVC\DataType\DTKeyValue;

/**
 * Application
 */
class Application
{
	/**
     * Application constructor
     * @throws \ReflectionException
     */
	public function __construct()
	{
        // get config via global
		// write configs into registry
        Config::init($GLOBALS['aConfig']);

        // Event Procedures of current module
        Event::init();

        // handle Errors
        Error::init();

        // Caching
        Cache::init();

		// add a CLI wrapper to enable requests from command line
		if (true === Config::get_MVC_CLI())
        {
            self::cliWrapper();
        }

        // handle Routing
        Route::init();

        // Policy Rules
        Policy::init();

		// Run target Controller's __preconstruct()
		Controller::runTargetClassPreconstruct();

		// Session
		self::initSession();

        // Run the requested target Controller
        Controller::init();

		Event::run ('mvc.application.construct.after');
	}

	/**
	 * inits a session and copies it to the registry
     * @return bool init
     * @throws \ReflectionException
     */
	public static function initSession() : bool
	{
        // don't run again if this already has been run
        if (null !== Config::get_MVC_SESSION())
        {
            return false;
        }

		Event::run ('mvc.application.setSession.before');

        if (false === file_exists(Config::get_MVC_SESSION_PATH()))
        {
            mkdir(Config::get_MVC_SESSION_PATH());
        }

        $oSession = Session::is();
        $fMicrotime = microtime (true);
        $sMicrotime = sprintf ("%06d", ($fMicrotime - floor ($fMicrotime)) * 1000000);
        $oSession->set ('startDateTime', new \DateTime (date ('Y-m-d H:i:s.' . $sMicrotime)));
        $oSession->set ('uniqueid', Config::get_MVC_UNIQUE_ID());
        
        // copy Session Object to registry
        Config::set_MVC_SESSION($oSession);

		Event::run ('mvc.application.setSession.after',
            DTArrayObject::create()
                ->add_aKeyValue(
                    DTKeyValue::create()->set_sKey('oSession')->set_sValue($oSession)
                )
        );

        return true;
	}

    /**
     * enables using Emvicy via commandline
     * @example php index.php '/'
     * @return void
     * @throws \ReflectionException
     */
    public static function cliWrapper() : void
    {
        // check user/file permission
        $sIndex = Config::get_MVC_PUBLIC_PATH() . '/index.php';

        if (posix_getuid() != File::info($sIndex)->get_uid())
        {
            $aUser = posix_getpwuid(posix_getuid ());

            die (
                "\n\tERROR\tCLI - access granted for User `" . File::info($sIndex)->get_name() . "` only "
                . "(User `" . $aUser['name'] . "`, uid:" . $aUser['uid'] . ", not granted).\t"
                . __FILE__ . ', ' . __LINE__ . "\n\n"
            );
        }

        self::setServerVarsForCli();
    }

    /**
     * @return void
     */
    public static function setServerVarsForCli() : void
    {
        (!array_key_exists (1, $GLOBALS['argv'])) ? $GLOBALS['argv'][1] = '' : false;
        $aParseUrl = parse_url(get($GLOBALS['argv'][1], ''));

        (false === is_array($_SERVER)) ? $_SERVER = array () : false;
        $_SERVER['REQUEST_METHOD'] = get($_SERVER['REQUEST_METHOD'], 'GET');
        $_SERVER['REQUEST_URI'] = get($_SERVER['REQUEST_URI'], $GLOBALS['argv'][1]);
        $_SERVER['REMOTE_ADDR'] = get($_SERVER['REMOTE_ADDR'], '0.0.0.0');
        $_SERVER['HTTP_HOST'] = get($_SERVER['HTTP_HOST'], 'localhost');
        $_SERVER['SERVER_PORT'] = get($_SERVER['SERVER_PORT'], 80);

        if (array_key_exists ('query', $aParseUrl))
        {
            $_SERVER['QUERY_STRING'] = $aParseUrl['query'];
            parse_str ($aParseUrl['query'], $_GET);
        }
    }

    /**
     * Destructor;
     * runs Event mvc.application.destruct
     * @throws \ReflectionException
     */
    public function __destruct ()
    {
        Event::run ('mvc.application.destruct.before',
            DTArrayObject::create()
                ->add_aKeyValue(
                    DTKeyValue::create()->set_sKey('oController')->set_sValue($this)
                )
        );
    }
}
