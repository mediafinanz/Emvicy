<?php
/**
 * Type_Text_encaprtp.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_encaprtp
{
    use TraitMediaType;

    /**
     * @reference [RFC6849]
     */
    const DESCRIPTION = 'text/encaprtp';
}