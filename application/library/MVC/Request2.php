<?php

namespace MVC;

use MVC\DataType\DTArrayObject;
use MVC\DataType\DTKeyValue;
use MVC\DataType\DTRequestIncoming;
use WpOrg\Requests\Requests;


class Request2
{
    /**
     * @return \MVC\DataType\DTRequestIncoming
     * @throws \ReflectionException
     */
    public static function incoming() : DTRequestIncoming
    {
        // run only once at runtime
        if (true === Registry::isRegistered('oDTRequestIncoming'))
        {
            return Registry::get('oDTRequestIncoming');
        }

        $aUriInfo = parse_url(self::getUriProtocol() . $_SERVER['HTTP_HOST'] . self::getServerRequestUri());
        (false === is_array($aUriInfo)) ? $aUriInfo = array() : false;

        $oDTRequestIncoming = DTRequestIncoming::create($aUriInfo);
        $oDTRequestIncoming->set_requesturi(self::getServerRequestUri());
        $oDTRequestIncoming->set_protocol(self::getUriProtocol());
        $oDTRequestIncoming->set_full(self::getUriProtocol() . $_SERVER['HTTP_HOST'] . self::getServerRequestUri());
        $oDTRequestIncoming->set_requestmethod(Request2::getServerRequestMethod());
        $oDTRequestIncoming->set_input(file_get_contents("php://input"));
        $oDTRequestIncoming->set_isSecure(Config::get_MVC_SECURE_REQUEST());
        parse_str($oDTRequestIncoming->get_query(), $aQueryArray);
        $oDTRequestIncoming->set_queryArray($aQueryArray);
        $oDTRequestIncoming->set_headerArray(self::getHeaderArray());
        $oDTRequestIncoming->set_pathParamArray(self::getPathParam());
        $oDTRequestIncoming->set_ip(self::getIpAddress());
        $oDTRequestIncoming->set_cookieArray($_COOKIE);
        $oDTRequestIncoming->set_isCli(self::isCli());
        $oDTRequestIncoming->set_isHttp(self::isHttp());

        // if event ...
        Event::bind('mvc.controller.init.before', function(){
            // ... run this event
            Event::run(
                'mvc.request.in.after',
                DTArrayObject::create()->add_aKeyValue(
                    DTKeyValue::create()
                        ->set_sKey('oDTRequestIncoming')
                        ->set_sValue(Registry::get('oDTRequestIncoming'))
                )
            );
        });

        // save to registry
        Registry::set('oDTRequestIncoming', $oDTRequestIncoming);

        return $oDTRequestIncoming;
    }

    /**
     * @param string $sUrl
     * @param array  $aHeader
     * @param array  $aData
     * @param array  $aOption
     * @return \WpOrg\Requests\Response
     */
    public static function outgoing(string $sUrl = '', array $aHeader = array(), array $aData = array(), array $aOption = array())
    {
        // headers, options
//        $oResponse = Requests::get($sUrl, $aHeader, $aOption);
//        Requests::delete($sUrl, $aHeader, $aOption);
//        Requests::trace($sUrl, $aHeader, $aOption);
//
//        // headers, data, options
//        Requests::put($sUrl, $aHeader, $aData, $aOption);
//        Requests::post($sUrl, $aHeader, $aData, $aOption);
//        Requests::patch($sUrl, $aHeader, $aData, $aOption);
//        Requests::options($sUrl, $aHeader, $aData, $aOption);

        return $oResponse;
    }

    #-------------------------------------------------------------------------------------------------------------------
    # private

    /**
     * gets the http uri protocol
     * @param mixed $mSsl
     * @return string
     * @throws \ReflectionException
     */
    private static function getUriProtocol(mixed $mSsl = null) : string
    {
        // detect on ssl or not
        if (isset($mSsl))
        {
            // http
            if ((int) $mSsl === 0 || $mSsl == false)
            {
                return 'http://';
            }
            // https
            elseif ((int) $mSsl === 1 || $mSsl == true)
            {
                return 'https://';
            }
        }
        // autodetect
        else
        {
            // http
            if (self::detectSsl() === false)
            {
                return 'http://';
            }
            // http
            elseif (self::detectSsl() === true)
            {
                return 'https://';
            }
        }

        \MVC\Event::run('mvc.error', DTArrayObject::create()
            ->add_aKeyValue(DTKeyValue::create()
                ->set_sKey('sMessage')
                ->set_sValue('could not detect protocol of requested page.')));

        return '';
    }

    /**
     * check request is secure
     * @return bool
     * @throws \ReflectionException
     */
    private static function detectSsl() : bool
    {
        if (!empty(Config::get_MVC_SECURE_REQUEST()))
        {
            return Config::get_MVC_SECURE_REQUEST();
        }

        return (
            (array_key_exists('HTTPS', $_SERVER) && strtolower($_SERVER['HTTPS']) !== 'off')
            || $_SERVER['SERVER_PORT'] == Config::get_MVC_SSL_PORT()
        );
    }

    /**
     * @info detection of cli takes place in /config/_mvc.php
     * @return bool
     * @throws \ReflectionException
     */
    private static function isCli() : bool
    {
        if (true === Config::get_MVC_CLI())
        {
            return true;
        }

        return false;
    }

    /**
     * @info detection of cli takes place in /config/_mvc.php
     * @return bool
     * @throws \ReflectionException
     */
    private static function isHttp() : bool
    {
        if (false === self::isCli())
        {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    private static function getServerRequestUri() : string
    {
        return (array_key_exists('REQUEST_URI', $_SERVER) ? (string) $_SERVER['REQUEST_URI'] : '');
    }

    /**
     * @return string
     */
    private static function getServerRequestMethod() : string
    {
        return (array_key_exists('REQUEST_METHOD', $_SERVER) ? (string) $_SERVER['REQUEST_METHOD'] : '');
    }

    /**
     * @param string $sKey
     * @return array|string
     * @throws \ReflectionException
     */
    private static function getPathParam(string $sKey = '') : array|string
    {
        if (Registry::isRegistered('aPathParam'))
        {
            $aParam = (array) Registry::get('aPathParam');

            if ('' === $sKey)
            {
                return $aParam;
            }

            return (string) get($aParam[$sKey], '');
        }

        $mReturn = (empty($sKey)) ? array() : '';

        return $mReturn;
    }

    /**
     * @return array
     */
    private static function getHeaderArray() : array
    {
        $aHeader = getallheaders();

        if (false === $aHeader)
        {
            return array();
        }

        return $aHeader;
    }

    /**
     * @return string
     */
    private static function getIpAddress() : string
    {
        return (string) (true === isset($_SERVER['HTTP_CLIENT_IP']))
            ? $_SERVER['HTTP_CLIENT_IP']
            : get($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR'])
        ;
    }
}