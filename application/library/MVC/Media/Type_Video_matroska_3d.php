<?php
/**
 * Type_Video_matroska_3d.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_matroska_3d
{
    use TraitMediaType;

    /**
     * @reference [RFC9559]
     */
    const DESCRIPTION = 'video/matroska-3d';
}