<?php
/**
 * Status_Gone_410.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Gone_410
{
    use TraitHttpStatus;

    const CODE = 410;
    const DESCRIPTION = 'Gone';
}