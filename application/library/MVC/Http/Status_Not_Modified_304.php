<?php
/**
 * Status_Not_Modified_304.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Not_Modified_304
{
    use TraitHttpStatus;

    const CODE = 304;
    const DESCRIPTION = 'Not Modified';
}