<?php
/**
 * Status_HTTP_Version_Not_Supported_505.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_HTTP_Version_Not_Supported_505
{
    use TraitHttpStatus;

    const CODE = 505;
    const DESCRIPTION = 'HTTP Version Not Supported';
}