<?php
/**
 * Status_Permanent_Redirect_308.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Permanent_Redirect_308
{
    use TraitHttpStatus;

    const CODE = 308;
    const DESCRIPTION = 'Permanent Redirect';
}