<?php
/**
 * Type_Image_heic_sequence.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Image_heic_sequence
{
    use TraitMediaType;

    /**
     * @reference [ISO-IEC_JTC_1][David_Singer]
     */
    const DESCRIPTION = 'image/heic-sequence';
}