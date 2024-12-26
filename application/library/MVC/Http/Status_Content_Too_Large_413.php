<?php
/**
 * Status_Content_Too_Large_413.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Content_Too_Large_413
{
    use TraitHttpStatus;

    const CODE = 413;
    const DESCRIPTION = 'Content Too Large';
}