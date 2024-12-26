<?php
/**
 * Status_Length_Required_411.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Length_Required_411
{
    use TraitHttpStatus;

    const CODE = 411;
    const DESCRIPTION = 'Length Required';
}