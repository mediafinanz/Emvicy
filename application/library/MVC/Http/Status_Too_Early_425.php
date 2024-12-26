<?php
/**
 * Status_Too_Early_425.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Too_Early_425
{
    use TraitHttpStatus;

    const CODE = 425;
    const DESCRIPTION = 'Too Early';
}