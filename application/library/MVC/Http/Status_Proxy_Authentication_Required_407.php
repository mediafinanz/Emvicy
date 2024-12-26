<?php
/**
 * Status_Proxy_Authentication_Required_407.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Proxy_Authentication_Required_407
{
    use TraitHttpStatus;

    const CODE = 407;
    const DESCRIPTION = 'Proxy Authentication Required';
}