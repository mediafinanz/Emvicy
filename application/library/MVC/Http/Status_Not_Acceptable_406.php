<?php
/**
 * Status_Not_Acceptable_406.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Not_Acceptable_406
{
    use TraitHttpStatus;

    const CODE = 406;
    const DESCRIPTION = 'Not Acceptable';
}