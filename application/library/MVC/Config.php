<?php
/**
 * Config.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

/**
 * @name $MVC
 */
namespace MVC;


/**
 * Application
 */
class Config
{
    /**
     * save config array to registry in key value manner
     * @param array $aConfig
     * @return void
     */
    public static function init (array $aConfig = array ()) : void
    {
        // save config array to registry in key value manner
        foreach ($aConfig as $sKey => $sValue)
        {
            Registry::set($sKey, $sValue);
        }
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_AUTOLOADER() : bool
    {
        if (Registry::isRegistered('MVC_LOG_AUTOLOADER'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_AUTOLOADER'), FILTER_VALIDATE_BOOLEAN);
        }

        return true;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_AUTOLOADER(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_AUTOLOADER', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_AUTOLOADER'] = $bVar;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_CONTROLLER_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_CONTROLLER_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_CONTROLLER_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_DATATYPE_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_DATATYPE_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_DATATYPE_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_ETC_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_ETC_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_ETC_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_ROUTING_FALLBACK() : string
    {
        if (Registry::isRegistered('MVC_ROUTING_FALLBACK'))
        {
            return (string) Registry::get('MVC_ROUTING_FALLBACK');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_METHODNAME_PRECONSTRUCT() : string
    {
        if (Registry::isRegistered('MVC_METHODNAME_PRECONSTRUCT'))
        {
            return (string) Registry::get('MVC_METHODNAME_PRECONSTRUCT');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_WEB_ROOT() : string
    {
        if (Registry::isRegistered('MVC_WEB_ROOT'))
        {
            return (string) Registry::get('MVC_WEB_ROOT');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BASE_PATH() : string
    {
        if (Registry::isRegistered('MVC_BASE_PATH'))
        {
            return (string) Registry::get('MVC_BASE_PATH');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_APPLICATION_PATH() : string
    {
        if (Registry::isRegistered('MVC_APPLICATION_PATH'))
        {
            return (string) Registry::get('MVC_APPLICATION_PATH');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_PUBLIC_PATH() : string
    {
        if (Registry::isRegistered('MVC_PUBLIC_PATH'))
        {
            return (string) Registry::get('MVC_PUBLIC_PATH');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_DIR() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_DIR'))
        {
            return (string) Registry::get('MVC_LOG_FILE_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_DEFAULT() : string
    {
        if (isset($GLOBALS['aConfig']['MVC_LOG_FILE_DEFAULT']))
        {
            return $GLOBALS['aConfig']['MVC_LOG_FILE_DEFAULT'];
        }

        if (Registry::isRegistered('MVC_LOG_FILE_DEFAULT'))
        {
            return (string) Registry::get('MVC_LOG_FILE_DEFAULT');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_ERROR() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_ERROR'))
        {
            return (string) Registry::get('MVC_LOG_FILE_ERROR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_WARNING() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_WARNING'))
        {
            return (string) Registry::get('MVC_LOG_FILE_WARNING');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_NOTICE() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_NOTICE'))
        {
            return (string) Registry::get('MVC_LOG_FILE_NOTICE');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_POLICY() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_POLICY'))
        {
            return (string) Registry::get('MVC_LOG_FILE_POLICY');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_EVENT() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_EVENT'))
        {
            return (string) Registry::get('MVC_LOG_FILE_EVENT');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_EVENT_RUN() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_EVENT_RUN'))
        {
            return (string) Registry::get('MVC_LOG_FILE_EVENT_RUN');
        }

        return '';
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_DETAIL() : array
    {
        if (Registry::isRegistered('MVC_LOG_DETAIL'))
        {
            return (array) Registry::get('MVC_LOG_DETAIL');
        }

        return array();
    }

    /**
     * @param array $aLogDetail
     * @return void
     */
    public static function set_MVC_LOG_DETAIL(array $aLogDetail = array()) : void
    {
        Registry::set('MVC_LOG_DETAIL', $aLogDetail);
        $GLOBALS['aConfig']['MVC_LOG_DETAIL'] = $aLogDetail;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FORCE_LINEBREAK() : bool
    {
        if (true === Registry::isRegistered('MVC_LOG_FORCE_LINEBREAK'))
        {
            return (bool) filter_var(Registry::get('MVC_LOG_FORCE_LINEBREAK'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bForce
     * @return void
     */
    public static function set_MVC_LOG_FORCE_LINEBREAK(bool $bForce = false) : void
    {
        Registry::set('MVC_LOG_FORCE_LINEBREAK', $bForce);
        $GLOBALS['aConfig']['MVC_LOG_FORCE_LINEBREAK'] = $bForce;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_PROCESS() : bool
    {
        if (Registry::isRegistered('MVC_LOG_PROCESS'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_PROCESS'), FILTER_VALIDATE_BOOLEAN);
        }

        return true;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_PROCESS(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_PROCESS', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_PROCESS'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_QUEUE() : bool
    {
        if (Registry::isRegistered('MVC_LOG_QUEUE'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_QUEUE'), FILTER_VALIDATE_BOOLEAN);
        }

        return true;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_QUEUE(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_QUEUE', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_QUEUE'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_CRON() : bool
    {
        if (Registry::isRegistered('MVC_LOG_CRON'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_CRON'), FILTER_VALIDATE_BOOLEAN);
        }

        return true;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_CRON(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_CRON', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_CRON'] = $bVar;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_APPLICATION_INIT_DIR() : string
    {
        if (Registry::isRegistered('MVC_APPLICATION_INIT_DIR'))
        {
            return (string) Registry::get('MVC_APPLICATION_INIT_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_VIEW_TEMPLATE_DIR() : string
    {
        if (Registry::isRegistered('MVC_VIEW_TEMPLATE_DIR'))
        {
            return (string) Registry::get('MVC_VIEW_TEMPLATE_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LIBRARY() : string
    {
        if (Registry::isRegistered('MVC_LIBRARY'))
        {
            return (string) Registry::get('MVC_LIBRARY');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULES_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULES_DIR'))
        {
            return (string) Registry::get('MVC_MODULES_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_CONFIG_DIR() : string
    {
        if (Registry::isRegistered('MVC_CONFIG_DIR'))
        {
            return (string) Registry::get('MVC_CONFIG_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_CACHE_DIR() : string
    {
        if (Registry::isRegistered('MVC_CACHE_DIR'))
        {
            return (string) Registry::get('MVC_CACHE_DIR');
        }

        return '';
    }

    /**
     * @param string $sCacheDir
     * @return void
     */
    public static function set_MVC_CACHE_DIR(string $sCacheDir = '') : void
    {
        Registry::set('MVC_CACHE_DIR', $sCacheDir);
        $GLOBALS['aConfig']['MVC_CACHE_DIR'] = $sCacheDir;
    }

    /**
     * @return int
     * @throws \ReflectionException
     */
    public static function get_MVC_SSL_PORT() : int
    {
        if (true === Registry::isRegistered('MVC_SSL_PORT'))
        {
            return Registry::get('MVC_SSL_PORT');
        }

        return 0;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_SECURE_REQUEST() : bool
    {
        if (Registry::isRegistered('MVC_SECURE_REQUEST'))
        {
            return (boolean) filter_var(Registry::get('MVC_SECURE_REQUEST'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_SESSION_NAMESPACE() : string
    {
        if (Registry::isRegistered('MVC_SESSION_NAMESPACE'))
        {
            return (string) Registry::get('MVC_SESSION_NAMESPACE');
        }

        return ($GLOBALS['aConfig']['MVC_SESSION_NAMESPACE'] ?? 'Emvicy');
    }

    /**
     * @param string $sNamespace
     * @return bool success
     * @throws \ReflectionException
     */
    public static function set_MVC_SESSION_NAMESPACE(string $sNamespace = '') : bool
    {
        $aDebugBacktrace = debug_backtrace(limit: 2);
        $sClass = ($aDebugBacktrace[1]['class'] ?? '');
        $sFunction = ($aDebugBacktrace[1]['function'] ?? '');

        if (true === empty($sClass) || true === empty($sFunction))
        {
            return false;
        }

        $sCaller = $sClass . '::' . $sFunction;

        if (false === ('MVC\\Session::setNamespace' === $sCaller))
        {
            Session::is()->setNamespace($sNamespace);
        }

        Registry::set('MVC_SESSION_NAMESPACE', $sNamespace);
        $GLOBALS['aConfig']['MVC_SESSION_NAMESPACE'] = $sNamespace;

        return true;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_SESSION_PATH() : string
    {
        if (Registry::isRegistered('MVC_SESSION_PATH'))
        {
            return (string) Registry::get('MVC_SESSION_PATH');
        }

        return '';
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_SESSION_OPTIONS() : array
    {
        if (Registry::isRegistered('MVC_SESSION_OPTIONS'))
        {
            return (array) Registry::get('MVC_SESSION_OPTIONS');
        }

        return array();
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_SESSION_ENABLE() : bool
    {
        if (Registry::isRegistered('MVC_SESSION_ENABLE'))
        {
            return (boolean) filter_var(Registry::get('MVC_SESSION_ENABLE'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bEnable
     * @return void
     */
    public static function set_MVC_SESSION_ENABLE(bool $bEnable = true) : void
    {
        Registry::set('MVC_SESSION_ENABLE', $bEnable);
        $GLOBALS['aConfig']['MVC_SESSION_ENABLE'] = $bEnable;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_CLI() : bool
    {
        if (Registry::isRegistered('MVC_CLI'))
        {
            return (boolean) filter_var(Registry::get('MVC_CLI'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_SMARTY_CACHE_STATUS() : bool
    {
        if (Registry::isRegistered('MVC_SMARTY_CACHE_STATUS'))
        {
            return (boolean) filter_var(Registry::get('MVC_SMARTY_CACHE_STATUS'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_SMARTY_CACHE_DIR() : string
    {
        if (Registry::isRegistered('MVC_SMARTY_CACHE_DIR'))
        {
            return (string) Registry::get('MVC_SMARTY_CACHE_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_SMARTY_TEMPLATE_DIR() : string
    {
        if (Registry::isRegistered('MVC_SMARTY_TEMPLATE_DIR'))
        {
            return (string) Registry::get('MVC_SMARTY_TEMPLATE_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_SMARTY_TEMPLATE_DEFAULT() : string
    {
        if (Registry::isRegistered('MVC_SMARTY_TEMPLATE_DEFAULT'))
        {
            return (string) Registry::get('MVC_SMARTY_TEMPLATE_DEFAULT');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_SMARTY_TEMPLATE_CACHE_DIR() : string
    {
        if (Registry::isRegistered('MVC_SMARTY_TEMPLATE_CACHE_DIR'))
        {
            return (string) Registry::get('MVC_SMARTY_TEMPLATE_CACHE_DIR');
        }

        return '';
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_SMARTY_PLUGINS_DIR() : array
    {
        if (Registry::isRegistered('MVC_SMARTY_PLUGINS_DIR'))
        {
            return (array) Registry::get('MVC_SMARTY_PLUGINS_DIR');
        }

        return array();
    }

    /**
     * gets the policy rules from registry
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_POLICY() : array
    {
        if (Registry::isRegistered('MVC_POLICY'))
        {
            return (array) Registry::get('MVC_POLICY');
        }

        return array();
    }

    /**
     * sets policy rules to registry
     * @param array $aPolicy
     * @return void
     */
    public static function set_MVC_POLICY(array $aPolicy = array()) : void
    {
        Registry::set('MVC_POLICY', $aPolicy);
        $GLOBALS['aConfig']['MVC_POLICY'] = $aPolicy;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_EVENT() : array
    {
        if (false === Registry::isRegistered('MVC_EVENT'))
        {
            Registry::set('MVC_EVENT', array());
        }

        if (Registry::isRegistered('MVC_EVENT'))
        {
            return Registry::get('MVC_EVENT');
        }

        return array();
    }

    /**
     * @param array $aMvcEvent
     * @return void
     */
    public static function set_MVC_EVENT(array $aMvcEvent = array()) : void
    {
        Registry::set('MVC_EVENT', $aMvcEvent);
        $GLOBALS['aConfig']['MVC_EVENT'] = $aMvcEvent;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_UNIQUE_ID() : string
    {
        if (Registry::isRegistered('MVC_UNIQUE_ID'))
        {
            return (string) Registry::get('MVC_UNIQUE_ID');
        }

        return '---';
    }

    /**
     * @param string $sMvcUniqueId
     * @return void
     */
    public static function set_MVC_UNIQUE_ID(string $sMvcUniqueId = '') : void
    {
        Registry::set('MVC_UNIQUE_ID', $sMvcUniqueId);
        $GLOBALS['aConfig']['MVC_UNIQUE_ID'] = $sMvcUniqueId;
    }

    /**
     * @return \MVC\Session|null
     * @throws \ReflectionException
     */
    public static function get_MVC_SESSION() : Session|null
    {
        if (Registry::isRegistered('MVC_SESSION'))
        {
            /** @var \MVC\Session $oSession */
            $oSession = Registry::get('MVC_SESSION');

            return $oSession;
        }

        return null;
    }

    /**
     * @param \MVC\Session $oSession
     * @return void
     */
    public static function set_MVC_SESSION(Session $oSession) : void
    {
        Registry::set ('MVC_SESSION', $oSession);
        $GLOBALS['aConfig']['MVC_SESSION'] = $oSession;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_INFOTOOL_ENABLE() : bool
    {
        if (Registry::isRegistered('MVC_INFOTOOL_ENABLE'))
        {
            return (boolean) filter_var(Registry::get('MVC_INFOTOOL_ENABLE'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_INFOTOOL_ENABLE(bool $bVar = false) : void
    {
        Registry::set('MVC_INFOTOOL_ENABLE', $bVar);
        $GLOBALS['aConfig']['MVC_INFOTOOL_ENABLE'] = $bVar;
    }

    /**
     * @param string $sModule
     * @return array
     * @throws \ReflectionException
     */
    public static function MODULE(string $sModule = '') : array
    {
        if ('' === $sModule)
        {
            $sModule = self::get_MVC_MODULE_PRIMARY_NAME();
        }

        if (Registry::isRegistered('MODULE'))
        {
            return (array) (Registry::get('MODULE')[$sModule] ?? array());
        }

        return array();
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_CORE() : array
    {
        if (Registry::isRegistered('MVC_CORE'))
        {
            return (array) Registry::get('MVC_CORE');
        }

        return array();
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_ENV() : string
    {
        if (Registry::isRegistered('MVC_ENV'))
        {
            return (string) Registry::get('MVC_ENV');
        }

        return '?';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_VERSION() : string
    {
        return (Registry::isRegistered('MVC_CORE') && isset(Registry::get('MVC_CORE')['version']))
            ? Registry::get('MVC_CORE')['version']
            : '?';
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_CACHE_CONFIG() : array
    {
        if (Registry::isRegistered('MVC_CACHE_CONFIG'))
        {
            return (array) Registry::get('MVC_CACHE_CONFIG');
        }

        return array();
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_COMPOSER_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_COMPOSER_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_COMPOSER_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_CONFIG_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_CONFIG_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_CONFIG_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_MODEL_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_MODEL_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_MODEL_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_POLICY_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_POLICY_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_POLICY_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_VIEW_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_VIEW_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_VIEW_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_STAGING_CONFIG_DIR() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_STAGING_CONFIG_DIR'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_STAGING_CONFIG_DIR');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_NAME() : string
    {
        if (Registry::isRegistered('MVC_MODULE_PRIMARY_NAME'))
        {
            return (string) Registry::get('MVC_MODULE_PRIMARY_NAME');
        }

        return '';
    }

    /**
     * @param \MVC\View $oView
     * @return void
     */
    public static function set_MVC_MODULE_PRIMARY_VIEW(View $oView) : void
    {
        Registry::set('MVC_MODULE_PRIMARY_VIEW', $oView);
        $GLOBALS['aConfig']['MVC_MODULE_PRIMARY_VIEW'] = $oView;
    }

    /**
     * @return \MVC\View|null
     * @throws \ReflectionException
     */
    public static function get_MVC_MODULE_PRIMARY_VIEW() : View|null
    {
        $oView = null;

        if (Registry::isRegistered('MVC_MODULE_PRIMARY_VIEW'))
        {
            /** @var \MVC\View $oView */
            $oView = Registry::get('MVC_MODULE_PRIMARY_VIEW');
        }

        return $oView;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_REMOVE() : string
    {
        if (Registry::isRegistered('MVC_BIN_REMOVE'))
        {
            return (string) Registry::get('MVC_BIN_REMOVE');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_FIND() : string
    {
        if (Registry::isRegistered('MVC_BIN_FIND'))
        {
            return (string) Registry::get('MVC_BIN_FIND');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_GREP() : string
    {
        if (Registry::isRegistered('MVC_BIN_GREP'))
        {
            return (string) Registry::get('MVC_BIN_GREP');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_MOVE() : string
    {
        if (Registry::isRegistered('MVC_BIN_MOVE'))
        {
            return (string) Registry::get('MVC_BIN_MOVE');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_XARGS() : string
    {
        if (Registry::isRegistered('MVC_BIN_XARGS'))
        {
            return (string) Registry::get('MVC_BIN_XARGS');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_SED() : string
    {
        if (Registry::isRegistered('MVC_BIN_SED'))
        {
            return (string) Registry::get('MVC_BIN_SED');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_PHP_BINARY() : string
    {
        if (Registry::isRegistered('MVC_BIN_PHP_BINARY'))
        {
            return (string) Registry::get('MVC_BIN_PHP_BINARY');
        }

        return '';
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_BIN_PS() : string
    {
        if (Registry::isRegistered('MVC_BIN_PS'))
        {
            return (string) Registry::get('MVC_BIN_PS');
        }

        return '';
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_EVENT_RUN() : bool
    {
        if (Registry::isRegistered('MVC_LOG_EVENT_RUN'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_EVENT_RUN'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_EVENT_RUN(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_EVENT_RUN', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_EVENT_RUN'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_EVENT_ENABLE_WILDCARD() : bool
    {
        if (Registry::isRegistered('MVC_EVENT_ENABLE_WILDCARD'))
        {
            return (boolean) filter_var(Registry::get('MVC_EVENT_ENABLE_WILDCARD'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_EVENT_ENABLE_WILDCARD(bool $bVar = false) : void
    {
        Registry::set('MVC_EVENT_ENABLE_WILDCARD', $bVar);
        $GLOBALS['aConfig']['MVC_EVENT_ENABLE_WILDCARD'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_REQUEST() : bool
    {
        if (Registry::isRegistered('MVC_LOG_REQUEST'))
        {
            return (boolean) Registry::get('MVC_LOG_REQUEST');
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_REQUEST(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_REQUEST', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_REQUEST'] = $bVar;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_REQUEST() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_REQUEST'))
        {
            return (string) Registry::get('MVC_LOG_FILE_REQUEST');
        }

        return '';
    }

    /**
     * @param string $sLogFileName
     * @return void
     */
    public static function set_MVC_LOG_FILE_REQUEST(string $sLogFileName = '') : void
    {
        Registry::set('MVC_LOG_FILE_REQUEST', $sLogFileName);
        $GLOBALS['aConfig']['MVC_LOG_FILE_REQUEST'] = $sLogFileName;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_PROCESS() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_PROCESS'))
        {
            return (string) Registry::get('MVC_LOG_FILE_PROCESS');
        }

        return '';
    }

    /**
     * @param string $sLogFileName
     * @return void
     */
    public static function set_MVC_LOG_FILE_PROCESS(string $sLogFileName = '') : void
    {
        Registry::set('MVC_LOG_FILE_PROCESS', $sLogFileName);
        $GLOBALS['aConfig']['MVC_LOG_FILE_PROCESS'] = $sLogFileName;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_QUEUE() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_QUEUE'))
        {
            return (string) Registry::get('MVC_LOG_FILE_QUEUE');
        }

        return '';
    }

    /**
     * @param string $sLogFileName
     * @return void
     */
    public static function set_MVC_LOG_FILE_QUEUE(string $sLogFileName = '') : void
    {
        Registry::set('MVC_LOG_FILE_QUEUE', $sLogFileName);
        $GLOBALS['aConfig']['MVC_LOG_FILE_QUEUE'] = $sLogFileName;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_CRON() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_CRON'))
        {
            return (string) Registry::get('MVC_LOG_FILE_CRON');
        }

        return '';
    }

    /**
     * @param string $sLogFileName
     * @return void
     */
    public static function set_MVC_LOG_FILE_CRON(string $sLogFileName = '') : void
    {
        Registry::set('MVC_LOG_FILE_CRON', $sLogFileName);
        $GLOBALS['aConfig']['MVC_LOG_FILE_CRON'] = $sLogFileName;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_SQL() : bool
    {
        if (Registry::isRegistered('MVC_LOG_SQL'))
        {
            return (boolean) Registry::get('MVC_LOG_SQL');
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_SQL(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_SQL', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_SQL'] = $bVar;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_SQL() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_SQL'))
        {
            return (string) Registry::get('MVC_LOG_FILE_SQL');
        }

        return '';
    }

    /**
     * @param string $sLogFileName
     * @return void
     */
    public static function set_MVC_LOG_FILE_SQL(string $sLogFileName = '') : void
    {
        Registry::set('MVC_LOG_FILE_SQL', $sLogFileName);
        $GLOBALS['aConfig']['MVC_LOG_FILE_SQL'] = $sLogFileName;
    }

    public static function get_MVC_PHP_SERVER() : string
    {
        if (Registry::isRegistered('MVC_PHP_SERVER'))
        {
            return (string) Registry::get('MVC_PHP_SERVER');
        }

        return '';
    }

    /**
     * @param string $sLogFileName
     * @return void
     */
    public static function set_MVC_PHP_SERVER(string $sLogFileName = '') : void
    {
        Registry::set('MVC_PHP_SERVER', $sLogFileName);
        $GLOBALS['aConfig']['MVC_PHP_SERVER'] = $sLogFileName;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_FILE_ROUTEINTERVALL() : string
    {
        if (Registry::isRegistered('MVC_LOG_FILE_ROUTEINTERVALL'))
        {
            return (string) Registry::get('MVC_LOG_FILE_ROUTEINTERVALL');
        }

        return '';
    }

    /**
     * @param string $sLogFileName
     * @return void
     */
    public static function set_MVC_LOG_FILE_ROUTEINTERVALL(string $sLogFileName = '') : void
    {
        Registry::set('MVC_LOG_FILE_ROUTEINTERVALL', $sLogFileName);
        $GLOBALS['aConfig']['MVC_LOG_FILE_ROUTEINTERVALL'] = $sLogFileName;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_EVENT() : bool
    {
        if (Registry::isRegistered('MVC_LOG_EVENT'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_EVENT'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_EVENT(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_EVENT', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_EVENT'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_DEFAULT() : bool
    {
        if (isset($GLOBALS['aConfig']['MVC_LOG_DEFAULT']))
        {
            return $GLOBALS['aConfig']['MVC_LOG_DEFAULT'];
        }

        if (Registry::isRegistered('MVC_LOG_DEFAULT'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_DEFAULT'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_DEFAULT(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_DEFAULT', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_DEFAULT'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_ERROR() : bool
    {
        if (Registry::isRegistered('MVC_LOG_ERROR'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_ERROR'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_ERROR(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_ERROR', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_ERROR'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_WARNING() : bool
    {
        if (Registry::isRegistered('MVC_LOG_WARNING'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_WARNING'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_WARNING(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_WARNING', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_WARNING'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_NOTICE() : bool
    {
        if (Registry::isRegistered('MVC_LOG_NOTICE'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_NOTICE'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_NOTICE(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_NOTICE', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_NOTICE'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_POLICY() : bool
    {
        if (Registry::isRegistered('MVC_LOG_POLICY'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_POLICY'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_POLICY(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_POLICY', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_POLICY'] = $bVar;
    }

    /**
     * @return bool
     * @throws \ReflectionException
     */
    public static function get_MVC_LOG_ROUTEINTERVALL() : bool
    {
        if (Registry::isRegistered('MVC_LOG_ROUTEINTERVALL'))
        {
            return (boolean) filter_var(Registry::get('MVC_LOG_ROUTEINTERVALL'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }

    /**
     * @param bool $bVar
     * @return void
     */
    public static function set_MVC_LOG_ROUTEINTERVALL(bool $bVar = false) : void
    {
        Registry::set('MVC_LOG_ROUTEINTERVALL', $bVar);
        $GLOBALS['aConfig']['MVC_LOG_ROUTEINTERVALL'] = $bVar;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function get_MVC_ROUTING_DIR() : array
    {
        if (Registry::isRegistered('MVC_ROUTING_DIR'))
        {
            return (array) Registry::get('MVC_ROUTING_DIR');
        }

        return array();
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_ROUTE_PREFIX() : string
    {
        if (Registry::isRegistered('MVC_ROUTE_PREFIX'))
        {
            return (string) Registry::get('MVC_ROUTE_PREFIX');
        }

        return $GLOBALS['aConfig']['MVC_ROUTE_PREFIX'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_ROUTE_PREFIX(string $sPrefix = '') : void
    {
        Registry::set('MVC_ROUTE_PREFIX', $sPrefix);
        $GLOBALS['aConfig']['MVC_ROUTE_PREFIX'] = $sPrefix;
    }

    #-------------------------------------------------------------------------------------------------------------------
    # Queue

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_QUEUE_ROUTE_PREFIX() : string
    {
        if (Registry::isRegistered('MVC_QUEUE_ROUTE_PREFIX'))
        {
            return (string) Registry::get('MVC_QUEUE_ROUTE_PREFIX');
        }

        return $GLOBALS['aConfig']['MVC_QUEUE_ROUTE_PREFIX'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_QUEUE_ROUTE_PREFIX(string $sPrefix = '') : void
    {
        Registry::set('MVC_QUEUE_ROUTE_PREFIX', $sPrefix);
        $GLOBALS['aConfig']['MVC_QUEUE_ROUTE_PREFIX'] = $sPrefix;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_QUEUE_WORKER_AUTO_ROUTE_PREFIX() : string
    {
        if (Registry::isRegistered('MVC_QUEUE_WORKER_AUTO_ROUTE_PREFIX'))
        {
            return (string) Registry::get('MVC_QUEUE_WORKER_AUTO_ROUTE_PREFIX');
        }

        return $GLOBALS['aConfig']['MVC_QUEUE_WORKER_AUTO_ROUTE_PREFIX'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_QUEUE_WORKER_AUTO_ROUTE_PREFIX(string $sPrefix = '') : void
    {
        Registry::set('MVC_QUEUE_WORKER_AUTO_ROUTE_PREFIX', $sPrefix);
        $GLOBALS['aConfig']['MVC_QUEUE_WORKER_AUTO_ROUTE_PREFIX'] = $sPrefix;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_QUEUE_RUN() : string
    {
        if (Registry::isRegistered('MVC_QUEUE_RUN'))
        {
            return (string) Registry::get('MVC_QUEUE_RUN');
        }

        return $GLOBALS['aConfig']['MVC_QUEUE_RUN'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_QUEUE_RUN(string $sPrefix = '') : void
    {
        Registry::set('MVC_QUEUE_RUN', $sPrefix);
        $GLOBALS['aConfig']['MVC_QUEUE_RUN'] = $sPrefix;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_QUEUE_RUN_CLASSMETHOD() : string
    {
        if (Registry::isRegistered('MVC_QUEUE_RUN_CLASSMETHOD'))
        {
            return (string) Registry::get('MVC_QUEUE_RUN_CLASSMETHOD');
        }

        return $GLOBALS['aConfig']['MVC_QUEUE_RUN_CLASSMETHOD'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_QUEUE_RUN_CLASSMETHOD(string $sPrefix = '') : void
    {
        Registry::set('MVC_QUEUE_RUN_CLASSMETHOD', $sPrefix);
        $GLOBALS['aConfig']['MVC_QUEUE_RUN_CLASSMETHOD'] = $sPrefix;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_QUEUE_WORKER_AUTO_ROUTE_RESOLVE_CLASSMETHOD() : string
    {
        if (Registry::isRegistered('MVC_QUEUE_WORKER_AUTO_ROUTE_RESOLVE_CLASSMETHOD'))
        {
            return (string) Registry::get('MVC_QUEUE_WORKER_AUTO_ROUTE_RESOLVE_CLASSMETHOD');
        }

        return $GLOBALS['aConfig']['MVC_QUEUE_WORKER_AUTO_ROUTE_RESOLVE_CLASSMETHOD'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_QUEUE_WORKER_AUTO_ROUTE_RESOLVE_CLASSMETHOD(string $sPrefix = '') : void
    {
        Registry::set('MVC_QUEUE_WORKER_AUTO_ROUTE_RESOLVE_CLASSMETHOD', $sPrefix);
        $GLOBALS['aConfig']['MVC_QUEUE_WORKER_AUTO_ROUTE_RESOLVE_CLASSMETHOD'] = $sPrefix;
    }

    /**
     * @return int
     * @throws \ReflectionException
     */
    public static function get_MVC_QUEUE_RUNTIME_SECONDS() : int
    {
        if (Registry::isRegistered('MVC_QUEUE_RUNTIME_SECONDS'))
        {
            return (int) Registry::get('MVC_QUEUE_RUNTIME_SECONDS');
        }

        return $GLOBALS['aConfig']['MVC_QUEUE_RUNTIME_SECONDS'];
    }

    /**
     * @param int $iValue
     * @return void
     */
    public static function set_MVC_QUEUE_RUNTIME_SECONDS(int $iValue = 300) : void
    {
        Registry::set('MVC_QUEUE_RUNTIME_SECONDS', $iValue);
        $GLOBALS['aConfig']['MVC_QUEUE_RUNTIME_SECONDS'] = $iValue;
    }

    #-------------------------------------------------------------------------------------------------------------------
    # Process

    /**
     * @return int
     * @throws \ReflectionException
     */
    public static function get_MVC_PROCESS_MAX_PROCESSES_OVERALL() : int
    {
        if (Registry::isRegistered('MVC_PROCESS_MAX_PROCESSES_OVERALL'))
        {
            return (int) Registry::get('MVC_PROCESS_MAX_PROCESSES_OVERALL');
        }

        return $GLOBALS['aConfig']['MVC_PROCESS_MAX_PROCESSES_OVERALL'];
    }

    /**
     * @param int $iValue
     * @return void
     */
    public static function set_MVC_PROCESS_MAX_PROCESSES_OVERALL(int $iValue = 30) : void
    {
        Registry::set('MVC_PROCESS_MAX_PROCESSES_OVERALL', $iValue);
        $GLOBALS['aConfig']['MVC_PROCESS_MAX_PROCESSES_OVERALL'] = $iValue;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_PROCESS_PID_FILE_DIR() : string
    {
        if (Registry::isRegistered('MVC_PROCESS_PID_FILE_DIR'))
        {
            return (string) Registry::get('MVC_PROCESS_PID_FILE_DIR');
        }

        return $GLOBALS['aConfig']['MVC_PROCESS_PID_FILE_DIR'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_PROCESS_PID_FILE_DIR(string $sPrefix = '') : void
    {
        Registry::set('MVC_PROCESS_PID_FILE_DIR', $sPrefix);
        $GLOBALS['aConfig']['MVC_PROCESS_PID_FILE_DIR'] = $sPrefix;
    }

    #-------------------------------------------------------------------------------------------------------------------
    # cron

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_CRON_ROUTE() : string
    {
        if (Registry::isRegistered('MVC_CRON_ROUTE'))
        {
            return (string) Registry::get('MVC_CRON_ROUTE');
        }

        return $GLOBALS['aConfig']['MVC_CRON_ROUTE'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_CRON_ROUTE(string $sPrefix = '') : void
    {
        Registry::set('MVC_CRON_ROUTE', $sPrefix);
        $GLOBALS['aConfig']['MVC_CRON_ROUTE'] = $sPrefix;
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function get_MVC_CRON_RUN_CLASSMETHOD() : string
    {
        if (Registry::isRegistered('MVC_CRON_RUN_CLASSMETHOD'))
        {
            return (string) Registry::get('MVC_CRON_RUN_CLASSMETHOD');
        }

        return $GLOBALS['aConfig']['MVC_CRON_RUN_CLASSMETHOD'];
    }

    /**
     * @param string $sPrefix
     * @return void
     */
    public static function set_MVC_CRON_RUN_CLASSMETHOD(string $sPrefix = '') : void
    {
        Registry::set('MVC_CRON_RUN_CLASSMETHOD', $sPrefix);
        $GLOBALS['aConfig']['MVC_CRON_RUN_CLASSMETHOD'] = $sPrefix;
    }
}