<?php
/**
 * Status_See_Other_303.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_See_Other_303
{
    use TraitHttpStatus;

    const CODE = 303;
    const DESCRIPTION = 'See Other';
}