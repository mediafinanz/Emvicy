<?php
/**
 * Status_Misdirected_Request_421.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Misdirected_Request_421
{
    use TraitHttpStatus;

    const CODE = 421;
    const DESCRIPTION = 'Misdirected Request';
}