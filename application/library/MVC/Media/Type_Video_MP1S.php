<?php
/**
 * Type_Video_MP1S.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_MP1S
{
    use TraitMediaType;

    /**
     * @reference [RFC3555]
     */
    const DESCRIPTION = 'video/MP1S';
}