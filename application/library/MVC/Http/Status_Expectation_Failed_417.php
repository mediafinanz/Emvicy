<?php
/**
 * Status_Expectation_Failed_417.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Expectation_Failed_417
{
    use TraitHttpStatus;

    const CODE = 417;
    const DESCRIPTION = 'Expectation Failed';
}