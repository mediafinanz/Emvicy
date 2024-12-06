<?php
/**
 * DbInit.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\DB\Model;

use MVC\Cache;
use MVC\Config;
use MVC\Debug;
use MVC\Error;
use MVC\Event;
use MVC\Registry;

class DbInit
{
    /**
     * @var null
     */
    protected static $_oInstance = null;

    /**
     * Constructor
     * @param array $aConfig
     * @throws \ReflectionException
     */
    protected function __construct(array $aConfig = array())
    {
        // try default fallback config; assuming it is called 'DB'
        (true === empty($aConfig)) ? $aConfig = self::getConfig() : false;

        Cache::init(Config::get_MVC_CACHE_CONFIG());

        try {
            $oDbPDO = new DbPDO($aConfig);
        } catch (\PDOException $oPDOException) {
            Error::exception($oPDOException);
            return false;
        }

        /** @todo getter/setter für Registry based on aConfig */
        Registry::set('oDbPDO', $oDbPDO);

        Event::run('mvc.db.model.dbinit.construct.after', $oDbPDO);
    }

    /**
     * @param string $sModuleConfigKey
     * @return array
     * @throws \ReflectionException
     */
    protected static function getConfig(string $sModuleConfigKey = 'DB')
    {
        // try default fallback config; assuming it is called 'DB'
        // DB config key
        $aConfig = Config::MODULE()[$sModuleConfigKey];

        // no DB module config found
        if (true === empty($aConfig))
        {
            $sMessage = 'Module Config `' . $sModuleConfigKey . '` not found. Abort. - ' . error_reporting();
            Error::error($sMessage);
            Debug::stop(
                $sMessage,
                (0 === error_reporting() ? false : true), # suppress info on 0
                (0 === error_reporting() ? false : true)  # suppress info on 0
            );
        }

        return $aConfig;
    }

    /**
     * @param $sProperty
     * @return mixed
     * @throws \ReflectionException
     */
    protected function activate($sProperty)
    {
        $oReflectionProperty = new \ReflectionProperty($this, $sProperty);
        $sDocComment = $oReflectionProperty->getDocComment();
        $sClass = trim(str_replace(['*','/','@var'], '', current(array_filter(array_map(
            function($sLine){
                if (stristr($sLine, 'var')) {
                    return $sLine;
                }
            },
            array_map('trim', explode("\n", $sDocComment))
        )))));

        return $sClass::init(self::getConfig());
    }
}