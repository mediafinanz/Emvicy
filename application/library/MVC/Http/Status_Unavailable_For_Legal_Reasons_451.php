<?php
/**
 * Status_Unavailable_For_Legal_Reasons_451.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Unavailable_For_Legal_Reasons_451
{
    use TraitHttpStatus;

    const CODE = 451;
    const DESCRIPTION = 'Unavailable For Legal Reasons';
}