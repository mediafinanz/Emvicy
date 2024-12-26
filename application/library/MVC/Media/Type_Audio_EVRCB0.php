<?php
/**
 * Type_Audio_EVRCB0.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_EVRCB0
{
    use TraitMediaType;

    /**
     * @reference [RFC5188]
     */
    const DESCRIPTION = 'audio/EVRCB0';
}