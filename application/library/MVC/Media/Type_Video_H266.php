<?php
/**
 * Type_Video_H266.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_H266
{
    use TraitMediaType;

    /**
     * @reference [RFC9328]
     */
    const DESCRIPTION = 'video/H266';
}