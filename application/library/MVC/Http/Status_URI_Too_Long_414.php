<?php
/**
 * Status_URI_Too_Long_414.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_URI_Too_Long_414
{
    use TraitHttpStatus;

    const CODE = 414;
    const DESCRIPTION = 'URI Too Long';
}