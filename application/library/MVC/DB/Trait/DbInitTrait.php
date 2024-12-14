<?php

namespace MVC\DB\Trait;

trait DbInitTrait
{
    protected static $_oInstance = null;

    /**
     * @param array $aConfig
     * @return self
     */
    public static function init(array $aConfig = array()) : self
    {
        if (null === self::$_oInstance)
        {
            self::$_oInstance = new self($aConfig);
        }

        return self::$_oInstance;
    }

    /**
     * @param array $aConfig
     * @return self
     */
    public static function use(array $aConfig = array()) : self
    {
        return self::init($aConfig);
    }
}
