<?php
/**
 * Type_Font_otf.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Font_otf
{
    use TraitMediaType;

    /**
     * @reference [RFC8081]
     */
    const DESCRIPTION = 'font/otf';
}