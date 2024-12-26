<?php
/**
 * Status_Upgrade_Required_426.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Upgrade_Required_426
{
    use TraitHttpStatus;

    const CODE = 426;
    const DESCRIPTION = 'Upgrade Required';
}