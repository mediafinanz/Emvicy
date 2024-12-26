<?php
/**
 * Status_No_Content_204.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_No_Content_204
{
    use TraitHttpStatus;

    const CODE = 204;
    const DESCRIPTION = 'No Content';
}