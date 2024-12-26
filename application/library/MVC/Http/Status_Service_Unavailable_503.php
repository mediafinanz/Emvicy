<?php
/**
 * Status_Service_Unavailable_503.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Service_Unavailable_503
{
    use TraitHttpStatus;

    const CODE = 503;
    const DESCRIPTION = 'Service Unavailable';
}