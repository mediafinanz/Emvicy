<?php
/**
 * Status_Bad_Gateway_502.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Bad_Gateway_502
{
    use TraitHttpStatus;

    const CODE = 502;
    const DESCRIPTION = 'Bad Gateway';
}