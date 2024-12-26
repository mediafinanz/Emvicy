<?php
/**
 * Status_Switching_Protocols_101.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Switching_Protocols_101
{
    use TraitHttpStatus;

    const CODE = 101;
    const DESCRIPTION = 'Switching Protocols';
}