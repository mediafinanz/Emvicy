<?php
/**
 * Status_Precondition_Failed_412.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Precondition_Failed_412
{
    use TraitHttpStatus;

    const CODE = 412;
    const DESCRIPTION = 'Precondition Failed';
}