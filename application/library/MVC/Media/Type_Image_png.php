<?php
/**
 * Type_Image_png.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Image_png
{
    use TraitMediaType;

    /**
     * @reference [W3C][PNG_WG]
     */
    const DESCRIPTION = 'image/png';
}