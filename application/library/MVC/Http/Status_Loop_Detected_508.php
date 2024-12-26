<?php
/**
 * Status_Loop_Detected_508.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Loop_Detected_508
{
    use TraitHttpStatus;

    const CODE = 508;
    const DESCRIPTION = 'Loop Detected';
}