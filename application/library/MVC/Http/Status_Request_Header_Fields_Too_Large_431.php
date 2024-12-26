<?php
/**
 * Status_Request_Header_Fields_Too_Large_431.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Request_Header_Fields_Too_Large_431
{
    use TraitHttpStatus;

    const CODE = 431;
    const DESCRIPTION = 'Request Header Fields Too Large';
}