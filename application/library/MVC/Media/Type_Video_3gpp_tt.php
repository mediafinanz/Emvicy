<?php
/**
 * Type_Video_3gpp_tt.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_3gpp_tt
{
    use TraitMediaType;

    /**
     * @reference [RFC4396]
     */
    const DESCRIPTION = 'video/3gpp-tt';
}