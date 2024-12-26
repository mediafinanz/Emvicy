<?php
/**
 * Type_Text_richtext.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_richtext
{
    use TraitMediaType;

    /**
     * @reference [RFC2045][RFC2046]
     */
    const DESCRIPTION = 'text/richtext';
}