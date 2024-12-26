<?php
/**
 * Type_Message_bhttp.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Message_bhttp
{
    use TraitMediaType;

    /**
     * @reference [RFC9292]
     */
    const DESCRIPTION = 'message/bhttp';
}