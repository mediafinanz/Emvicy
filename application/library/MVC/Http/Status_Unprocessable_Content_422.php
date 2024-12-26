<?php
/**
 * Status_Unprocessable_Content_422.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Unprocessable_Content_422
{
    use TraitHttpStatus;

    const CODE = 422;
    const DESCRIPTION = 'Unprocessable Content';
}