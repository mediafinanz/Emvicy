<?php
/**
 * Type_Multipart_encrypted.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Multipart_encrypted
{
    use TraitMediaType;

    /**
     * @reference [RFC1847]
     */
    const DESCRIPTION = 'multipart/encrypted';
}