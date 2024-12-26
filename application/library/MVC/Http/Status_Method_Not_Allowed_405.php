<?php
/**
 * Status_Method_Not_Allowed_405.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Method_Not_Allowed_405
{
    use TraitHttpStatus;

    const CODE = 405;
    const DESCRIPTION = 'Method Not Allowed';
}