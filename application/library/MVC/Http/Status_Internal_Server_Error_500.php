<?php
/**
 * Status_Internal_Server_Error_500.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Internal_Server_Error_500
{
    use TraitHttpStatus;

    const CODE = 500;
    const DESCRIPTION = 'Internal Server Error';
}