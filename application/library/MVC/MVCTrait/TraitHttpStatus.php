<?php
/**
 * TraitHttpStatus.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\MVCTrait;

trait TraitHttpStatus
{
    /**
     * @return void
     */
    public static function header() : void
    {
        header(
            header: $_SERVER["SERVER_PROTOCOL"] . ' ' . self::CODE . ' ' . self::DESCRIPTION,
            replace: true,
            response_code: self::CODE
        );
    }
}
