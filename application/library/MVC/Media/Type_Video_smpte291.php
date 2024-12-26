<?php
/**
 * Type_Video_smpte291.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_smpte291
{
    use TraitMediaType;

    /**
     * @reference [RFC8331]
     */
    const DESCRIPTION = 'video/smpte291';
}