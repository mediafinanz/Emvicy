<?php
/**
 * Status_Precondition_Required_428.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Precondition_Required_428
{
    use TraitHttpStatus;

    const CODE = 428;
    const DESCRIPTION = 'Precondition Required';
}