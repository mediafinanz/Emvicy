<?php
/**
 * Type_Text_troff.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_troff
{
    use TraitMediaType;

    /**
     * @reference [RFC4263]
     */
    const DESCRIPTION = 'text/troff';
}