<?php
/**
 * Request.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

use JetBrains\PhpStorm\NoReturn;
use MVC\DataType\DTRequestIn;

/**
 * @deprecated
 * Request
 */
class Request
{
    /**
     * @deprecated
     * @return \MVC\DataType\DTRequestIn
     * @throws \ReflectionException
     */
    public static function getCurrentRequest()
    {
        return Request2::in();
    }

    /**
     * @param \MVC\DataType\DTRequestIn $oDTRequestIn
     * @return void
     *@deprecated
     */
    public static function setCurrentRequest(DTRequestIn $oDTRequestIn)
    {
        // save to registry
        Registry::set('oDTRequestIn', $oDTRequestIn);
    }

    /**
     * @deprecated
     * gets the http uri protocol
     * @param mixed $mSsl
     * @return string
     * @throws \ReflectionException
     */
    public static function getUriProtocol(mixed $mSsl = null) : string
    {
        return Request2::in()->get_protocol();
    }

    /**
     * @deprecated
     * check request is secure
     * @return bool
     * @throws \ReflectionException
     */
    public static function detectSsl() : bool
    {
        return Request2::in()->get_isSecure();
    }

    /**
     * @deprecated
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
        RequestHelper::redirect($sLocation, $bReplace, $iResponseCode);
    }

    /**
     * @deprecated
     * @info detection of cli takes place in /config/_mvc.php
     * @return bool
     * @throws \ReflectionException
     */
    public static function isCli() : bool
    {
        return Request2::in()->get_isCli();
    }

    /**
     * @deprecated
     * @info detection of cli takes place in /config/_mvc.php
     * @return bool
     * @throws \ReflectionException
     */
    public static function isHttp() : bool
    {
        return Request2::in()->get_isHttp();
    }

    /**
     * @deprecated
     * @return string
     * @throws \ReflectionException
     */
    public static function getServerRequestUri() : string
    {
        return Request2::in()->get_requestUri();
    }

    /**
     * @deprecated
     * @return string
     * @throws \ReflectionException
     */
    public static function getServerRequestMethod() : string
    {
        return Request2::in()->get_requestMethod();
    }

    /**
     * @deprecated
     * @example '/foo/bar/baz/'
     *          array(3) {[0]=> string(3) "foo" [1]=> string(3) "bar" [2]=> string(3) "baz"}
     * @param string $sUrl
     * @param bool   $bReverse
     * @return array
     * @throws \ReflectionException
     */
    public static function getPathArray(string $sUrl = '', bool $bReverse = false) : array
    {
        return Request2::in()->get_pathArray();
    }

    /**
     * @deprecated
     * @param string $sKey
     * @return array|string
     * @throws \ReflectionException
     */
    public static function getPathParam(string $sKey = '') : array|string
    {
        if (false === empty($sKey))
        {
            return Request2::in()->get_pathParamArray()[$sKey];
        }

        return Request2::in()->get_pathParamArray();
    }

    /**
     * @deprecated
     * @param array $aPathParam
     * @return void
     * @throws \ReflectionException
     */
    public static function setPathParam(array $aPathParam = array()) : void
    {
        Request2::in()->set_pathParamArray($aPathParam);
    }

    /**
     * @deprecated
     * @return array
     * @throws \ReflectionException
     */
    public static function getHeaderArray() : array
    {
        return Request2::in()->get_headerArray();
    }

    /**
     * @deprecated
     * @param string $sKey
     * @param bool   $bCaseInsensitive
     * @return string
     * @throws \ReflectionException
     */
    public static function getHeaderValueOnKey(string $sKey = '', bool $bCaseInsensitive = true) : string
    {
        return RequestHelper::getHeaderValueOnKey($sKey, $bCaseInsensitive);
    }

    /**
     * @deprecated
     * @return string
     * @throws \ReflectionException
     */
    public static function getIpAddress() : string
    {
        return Request2::in()->get_ip();
    }
}