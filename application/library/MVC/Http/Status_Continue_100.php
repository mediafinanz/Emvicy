<?php
/**
 * Status_Continue_100.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Continue_100
{
    use TraitHttpStatus;

    const CODE = 100;
    const DESCRIPTION = 'Continue';
}