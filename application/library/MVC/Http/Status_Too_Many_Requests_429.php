<?php
/**
 * Status_Too_Many_Requests_429.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Too_Many_Requests_429
{
    use TraitHttpStatus;

    const CODE = 429;
    const DESCRIPTION = 'Too Many Requests';
}