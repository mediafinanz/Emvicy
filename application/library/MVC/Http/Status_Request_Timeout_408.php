<?php
/**
 * Status_Request_Timeout_408.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Request_Timeout_408
{
    use TraitHttpStatus;

    const CODE = 408;
    const DESCRIPTION = 'Request Timeout';
}