<?php

namespace MVC;


use MVC\DataType\DTArrayObject;
use MVC\DataType\DTKeyValue;

class RequestHelper
{
    /**
     * @param string $sUrl
     * @param bool   $bReverse
     * @return array
     * @example '/foo/bar/baz/'
     *          array(3) {[0]=> string(3) "foo" [1]=> string(3) "bar" [2]=> string(3) "baz"}
     */
    public static function getPathArrayOnUrl(string $sUrl = '', bool $bReverse = false) : array
    {
        if (true === empty($sUrl))
        {
            return array();
        }

        $aUrl = parse_url($sUrl);
        $mPath = preg_split('~/~', $aUrl['path'], 0, PREG_SPLIT_NO_EMPTY);
        $aPath = (false === is_array($mPath)) ? array() : $mPath;

        if (true === $bReverse)
        {
            $aPath = array_reverse($aPath);
        }

        /** @var array */
        return $aPath;
    }

    /**
     * redirects to given Location URI
     * @param string $sLocation
     * @param bool   $bReplace
     * @param int    $iResponseCode
     * @return void
     * @throws \ReflectionException
     */
    #[NoReturn]
    public static function redirect(string $sLocation = '', bool $bReplace = true, int $iResponseCode = 0) : void
    {
        // source
        $aBacktrace = debug_backtrace(limit: 1);

        (array_key_exists('file', $aBacktrace[0]))
            ? $sFile = $aBacktrace[0]['file']
            : $sFile = '';
        (array_key_exists('line', $aBacktrace[0]))
            ? $sLine = $aBacktrace[0]['line']
            : $sLine = '';
        (array_key_exists('line', $aBacktrace))
            ? $sLine = $aBacktrace['line']
            : false;

        // standard
        Log::write(
            'Redirect to: ' . $sLocation . ' --> called in: ' . $sFile . ', ' . $sLine,
            Config::get_MVC_LOG_FILE_DEFAULT(),
            false
        );

        // CLI
        if (true === Request2::incoming()->get_isCli())
        {
            echo trim((string) shell_exec(Config::get_MVC_BIN_PHP_BINARY() . ' index.php "' . $sLocation . '"'));

            // Event
            \MVC\Event::run('mvc.request.redirect', DTArrayObject::create()
                ->add_aKeyValue(DTKeyValue::create()
                    ->set_sKey('sLocation')
                    ->set_sValue('[CLI] php index.php "' . $sLocation . '"'))
                ->add_aKeyValue(DTKeyValue::create()
                    ->set_sKey('aDebug')
                    ->set_sValue(Debug::prepareBacktraceArray((debug_backtrace(limit: 1)[0] ?? array())))));

            exit ();
        }

        // Event
        \MVC\Event::run('mvc.request.redirect', DTArrayObject::create()
            ->add_aKeyValue(DTKeyValue::create()
                ->set_sKey('sLocation')
                ->set_sValue($sLocation))
            ->add_aKeyValue(DTKeyValue::create()
                ->set_sKey('aDebug')
                ->set_sValue(Debug::prepareBacktraceArray((debug_backtrace(limit: 1)[0] ?? array())))));

        // redirect
        header('Location: ' . $sLocation, $bReplace, $iResponseCode);
        exit();
    }

//    /**
//     * gets the http uri protocol
//     * @param mixed $mSsl
//     * @return string
//     * @throws \ReflectionException
//     */
//    public static function getUriProtocol(mixed $mSsl = null) : string
//    {
//        // detect on ssl or not
//        if (isset($mSsl))
//        {
//            // http
//            if ((int) $mSsl === 0 || $mSsl == false)
//            {
//                return 'http://';
//            }
//            // https
//            elseif ((int) $mSsl === 1 || $mSsl == true)
//            {
//                return 'https://';
//            }
//        }
//        // autodetect
//        else
//        {
//            // http
//            if (self::detectSsl() === false)
//            {
//                return 'http://';
//            }
//            // http
//            elseif (self::detectSsl() === true)
//            {
//                return 'https://';
//            }
//        }
//
//        \MVC\Event::run('mvc.error', DTArrayObject::create()
//            ->add_aKeyValue(DTKeyValue::create()
//                ->set_sKey('sMessage')
//                ->set_sValue('could not detect protocol of requested page.')));
//
//        return '';
//    }
//
//    /**
//     * check request is secure
//     * @return bool
//     * @throws \ReflectionException
//     */
//    public static function detectSsl() : bool
//    {
//        if (!empty(Config::get_MVC_SECURE_REQUEST()))
//        {
//            return Config::get_MVC_SECURE_REQUEST();
//        }
//
//        return (
//            (array_key_exists('HTTPS', $_SERVER) && strtolower($_SERVER['HTTPS']) !== 'off')
//            || $_SERVER['SERVER_PORT'] == Config::get_MVC_SSL_PORT()
//        );
//    }
//
//    /**
//     * @info detection of cli takes place in /config/_mvc.php
//     * @return bool
//     * @throws \ReflectionException
//     */
//    public static function isCli() : bool
//    {
//        if (true === Config::get_MVC_CLI())
//        {
//            return true;
//        }
//
//        return false;
//    }
//
//    /**
//     * @info detection of cli takes place in /config/_mvc.php
//     * @return bool
//     * @throws \ReflectionException
//     */
//    public static function isHttp() : bool
//    {
//        if (false === self::isCli())
//        {
//            return true;
//        }
//
//        return false;
//    }
//
//    /**
//     * @return string
//     */
//    public static function getServerRequestUri() : string
//    {
//        return (array_key_exists('REQUEST_URI', $_SERVER) ? (string) $_SERVER['REQUEST_URI'] : '');
//    }
//
//    /**
//     * @return string
//     */
//    public static function getServerRequestMethod() : string
//    {
//        return (array_key_exists('REQUEST_METHOD', $_SERVER) ? (string) $_SERVER['REQUEST_METHOD'] : '');
//    }
//
//    /**
//     * @param string $sKey
//     * @return array|string
//     * @throws \ReflectionException
//     */
//    public static function getPathParam(string $sKey = '') : array|string
//    {
//        if (Registry::isRegistered('aPathParam'))
//        {
//            $aParam = (array) Registry::get('aPathParam');
//
//            if ('' === $sKey)
//            {
//                return $aParam;
//            }
//
//            return (string) get($aParam[$sKey], '');
//        }
//
//        $mReturn = (empty($sKey)) ? array() : '';
//
//        return $mReturn;
//    }
//
////    /**
////     * @param array $aPathParam
////     * @return void
////     * @throws \ReflectionException
////     */
////    public static function setPathParam(array $aPathParam = array()) : void
////    {
////        Registry::set('aPathParam', $aPathParam);
////
////        (true === Registry::isRegistered('oDTRequestIncoming'))
////            ? $oDTRequestIncoming = Registry::get('oDTRequestIncoming')
////            : $oDTRequestIncoming = self::getCurrentRequest()
////        ;
////
////        $oDTRequestIncoming->set_pathParamArray($aPathParam);
////        Registry::set('oDTRequestIncoming', $oDTRequestIncoming);
////    }
//
//    /**
//     * @return array
//     */
//    public static function getHeaderArray() : array
//    {
//        $aHeader = getallheaders();
//
//        if (false === $aHeader)
//        {
//            return array();
//        }
//
//        return $aHeader;
//    }
//
//    /**
//     * @return string
//     */
//    public static function getIpAddress() : string
//    {
//        return (string) (true === isset($_SERVER['HTTP_CLIENT_IP']))
//            ? $_SERVER['HTTP_CLIENT_IP']
//            : get($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR'])
//            ;
//    }
}
