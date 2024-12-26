<?php
/**
 * Type_Audio_mpeg4_generic.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_mpeg4_generic
{
    use TraitMediaType;

    /**
     * @reference [RFC3640][RFC5691][RFC6295]
     */
    const DESCRIPTION = 'audio/mpeg4-generic';
}