<?php
/**
 * Status_Unsupported_Media_Type_415.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Unsupported_Media_Type_415
{
    use TraitHttpStatus;

    const CODE = 415;
    const DESCRIPTION = 'Unsupported Media Type';
}