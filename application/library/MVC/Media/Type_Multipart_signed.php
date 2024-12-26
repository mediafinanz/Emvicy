<?php
/**
 * Type_Multipart_signed.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Multipart_signed
{
    use TraitMediaType;

    /**
     * @reference [RFC1847]
     */
    const DESCRIPTION = 'multipart/signed';
}