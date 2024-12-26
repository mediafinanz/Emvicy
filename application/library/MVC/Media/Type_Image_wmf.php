<?php
/**
 * Type_Image_wmf.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Image_wmf
{
    use TraitMediaType;

    /**
     * @reference [RFC7903]
     */
    const DESCRIPTION = 'image/wmf';
}