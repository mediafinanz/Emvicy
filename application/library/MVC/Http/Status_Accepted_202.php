<?php
/**
 * Status_Accepted_202.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Accepted_202
{
    use TraitHttpStatus;

    const CODE = 202;
    const DESCRIPTION = 'Accepted';
}