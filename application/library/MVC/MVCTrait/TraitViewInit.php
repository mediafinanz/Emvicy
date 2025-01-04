<?php

namespace MVC\MVCTrait;

use MVC\Config;

trait TraitViewInit
{
    /**
     * @return self
     */
    public static function init() : self
    {
        if (null === self::$_oInstance)
        {
            self::$_oInstance = new self();
        }

        Config::set_MVC_MODULE_PRIMARY_VIEW(self::$_oInstance);

        return self::$_oInstance;
    }
}
