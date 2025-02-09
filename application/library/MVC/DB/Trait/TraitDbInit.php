<?php

namespace MVC\DB\Trait;

use MVC\DB\Model\DbCollection;

trait TraitDbInit
{
    protected static $_oInstance = null;

    /**
     * @param array $aConfig
     * @return self
     * @throws \ReflectionException
     */
    public static function init(array $aConfig = array()) : self
    {
        if (null === self::$_oInstance)
        {
            (true === empty($aConfig)) ? $aConfig = DbCollection::getConfig() : false;
            self::$_oInstance = new self($aConfig);
        }

        return self::$_oInstance;
    }

    /**
     * @param array $aConfig
     * @return self
     * @throws \ReflectionException
     */
    public static function use(array $aConfig = array()) : self
    {
        return self::init($aConfig);
    }
}
