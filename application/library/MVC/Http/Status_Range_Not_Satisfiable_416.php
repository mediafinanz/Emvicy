<?php
/**
 * Status_Range_Not_Satisfiable_416.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Http;

use MVC\MVCTrait\TraitHttpStatus;

class Status_Range_Not_Satisfiable_416
{
    use TraitHttpStatus;

    const CODE = 416;
    const DESCRIPTION = 'Range Not Satisfiable';
}