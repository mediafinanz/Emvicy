<?php

namespace MVC;

use MVC\DataType\DTArrayObject;
use MVC\DataType\DTKeyValue;
use MVC\DataType\DTRequestOut;
use MVC\DataType\DTRequestIn;
use MVC\DataType\DTResponse;
use MVC\Enum\EnumRequestMethod;
use MVC\Http\Status_Not_Found_404;
use WpOrg\Requests\Requests;


class Request2
{
    /**
     * @return \MVC\DataType\DTRequestIn
     * @throws \ReflectionException
     */
    public static function in() : DTRequestIn
    {
        // run only once at runtime
        if (true === Registry::isRegistered('oDTRequestIn'))
        {
            return Registry::get('oDTRequestIn');
        }

        $aUriInfo = parse_url(self::getTheUriProtocol() . $_SERVER['HTTP_HOST'] . self::getTheServerRequestUri());
        (false === is_array($aUriInfo)) ? $aUriInfo = array() : false;

        $oDTRequestIn = DTRequestIn::create($aUriInfo);
        $oDTRequestIn->set_requestUri(self::getTheServerRequestUri());
        $oDTRequestIn->set_protocol(self::getTheUriProtocol());

        $oDTRequestIn->set_full(self::getTheUriProtocol() . $_SERVER['HTTP_HOST'] . self::getTheServerRequestUri());
        $oDTRequestIn->set_pathArray(RequestHelper::getPathArrayOnUrl($oDTRequestIn->get_full()));

        $oDTRequestIn->set_requestMethod(Request2::getTheServerRequestMethod());
        $oDTRequestIn->set_input(file_get_contents("php://input"));
        $oDTRequestIn->set_isSecure(Config::get_MVC_SECURE_REQUEST());
        parse_str($oDTRequestIn->get_query(), $aQueryArray);
        $oDTRequestIn->set_queryArray($aQueryArray);
        $oDTRequestIn->set_headerArray(self::getTheHeaderArray());
        $oDTRequestIn->set_pathParamArray(self::getThePathParam());
        $oDTRequestIn->set_ip(self::getTheIpAddress());
        $oDTRequestIn->set_cookieArray($_COOKIE);
        $oDTRequestIn->set_isCli(self::itIsCli());
        $oDTRequestIn->set_isHttp(false === (false === stristr($oDTRequestIn->get_scheme(), 'http')));

        // if event ...
        Event::bind('mvc.controller.init.before', function(){
            // ... run this event
            Event::run('mvc.request.in.after', Registry::get('oDTRequestIn'));
        });

        // save to registry
        Registry::set('oDTRequestIn', $oDTRequestIn);

        return $oDTRequestIn;
    }

    /**
     * @param \MVC\DataType\DTRequestOut $oDTRequestOut
     * @return \MVC\DataType\DTResponse
     * @throws \ReflectionException
     */
    public static function out(DTRequestOut $oDTRequestOut) : DTResponse
    {
        if (true === empty($oDTRequestOut->get_sUrl()))
        {
            return DTResponse::create()
                ->set_status_code(Status_Not_Found_404::CODE)
                ->set_success(false);
        }

        // add missing if it is only local path
        $aParseUrl = parse_url($oDTRequestOut->get_sUrl());

        if (false === isset($aParseUrl['scheme']) || false === isset($aParseUrl['host']) || false === isset($aParseUrl['path']))
        {
            $sUrl = '';
            $sUrl.= (false === isset($aParseUrl['scheme'])) ? self::getTheUriProtocol() : $aParseUrl['scheme'];
            $sUrl.= (false === isset($aParseUrl['host'])) ? $_SERVER['HTTP_HOST'] : $aParseUrl['host'];
            $sUrl.= (false === isset($aParseUrl['path'])) ? '/' : $aParseUrl['path'];
            $oDTRequestOut->set_sUrl($sUrl);
        }

        Event::run('mvc.request.do.before', $oDTRequestOut);

        switch ($oDTRequestOut->get_eRequestMethod()->value())
        {
            // headers, options
            case EnumRequestMethod::GET->value():
                $oResponse = Requests::get($oDTRequestOut->get_sUrl(), $oDTRequestOut->get_aHeader(), $oDTRequestOut->get_aOption());
                break;
            case EnumRequestMethod::DELETE->value():
                $oResponse = Requests::delete($oDTRequestOut->get_sUrl(), $oDTRequestOut->get_aHeader(), $oDTRequestOut->get_aOption());
                break;
            case EnumRequestMethod::TRACE->value():
                $oResponse = Requests::trace($oDTRequestOut->get_sUrl(), $oDTRequestOut->get_aHeader(), $oDTRequestOut->get_aOption());
                break;

            // headers, data, options
            case EnumRequestMethod::PUT->value():
                $oResponse = Requests::put($oDTRequestOut->get_sUrl(), $oDTRequestOut->get_aHeader(), $oDTRequestOut->get_aData(), $oDTRequestOut->get_aOption());
                break;
            case EnumRequestMethod::POST->value():
                display();
                $oResponse = Requests::post($oDTRequestOut->get_sUrl(), $oDTRequestOut->get_aHeader(), $oDTRequestOut->get_aData(), $oDTRequestOut->get_aOption());
                break;
            case EnumRequestMethod::PATCH->value():
                $oResponse = Requests::patch($oDTRequestOut->get_sUrl(), $oDTRequestOut->get_aHeader(), $oDTRequestOut->get_aData(), $oDTRequestOut->get_aOption());
                break;
            case EnumRequestMethod::OPTIONS->value():
                $oResponse = Requests::options($oDTRequestOut->get_sUrl(), $oDTRequestOut->get_aHeader(), $oDTRequestOut->get_aData(), $oDTRequestOut->get_aOption());
                break;
        }

        // build DTResponse object and overwrite header array with parsed from raw response
        $oDTResponse = DTResponse::create(Convert::objectToArray($oResponse))
            ->set_headers(RequestHelper::parseRawHeader($oResponse->raw));

        Event::run('mvc.request.do.after', $oDTResponse);

        return $oDTResponse;
    }

    #-------------------------------------------------------------------------------------------------------------------
    # private

    /**
     * gets the http uri protocol
     * @param mixed $mSsl
     * @return string
     * @throws \ReflectionException
     */
    private static function getTheUriProtocol(mixed $mSsl = null) : string
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
            if (self::itIsSsl() === false)
            {
                return 'http://';
            }
            // http
            elseif (self::itIsSsl() === true)
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
    private static function itIsSsl() : bool
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
    private static function itIsCli() : bool
    {
        if (true === Config::get_MVC_CLI())
        {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    private static function getTheServerRequestUri() : string
    {
        return (array_key_exists('REQUEST_URI', $_SERVER) ? (string) $_SERVER['REQUEST_URI'] : '');
    }

    /**
     * @return string
     */
    private static function getTheServerRequestMethod() : string
    {
        return (array_key_exists('REQUEST_METHOD', $_SERVER) ? (string) $_SERVER['REQUEST_METHOD'] : '');
    }

    /**
     * @param string $sKey
     * @return array|string
     * @throws \ReflectionException
     */
    private static function getThePathParam(string $sKey = '') : array|string
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
    private static function getTheHeaderArray() : array
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
    private static function getTheIpAddress() : string
    {
        return (string) (true === isset($_SERVER['HTTP_CLIENT_IP']))
            ? $_SERVER['HTTP_CLIENT_IP']
            : get($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR'])
        ;
    }
}