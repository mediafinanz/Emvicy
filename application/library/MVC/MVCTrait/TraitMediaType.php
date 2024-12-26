<?php
/**
 * TraitMediaType.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\MVCTrait;

trait TraitMediaType
{
    /**
     * @return void
     */
    public static function header() : void
    {
        header('Content-Type: ' . self::DESCRIPTION);
    }
}
