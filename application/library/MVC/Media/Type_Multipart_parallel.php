<?php
/**
 * Type_Multipart_parallel.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Multipart_parallel
{
    use TraitMediaType;

    /**
     * @reference [RFC2046][RFC2045]
     */
    const DESCRIPTION = 'multipart/parallel';
}