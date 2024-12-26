<?php
/**
 * Status_Network_Authentication_Required_511.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Network_Authentication_Required_511
{
    use TraitHttpStatus;

    const CODE = 511;
    const DESCRIPTION = 'Network Authentication Required';
}