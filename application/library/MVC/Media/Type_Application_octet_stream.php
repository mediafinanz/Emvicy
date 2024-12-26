<?php
/**
 * Type_Application_octet_stream.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_octet_stream
{
    use TraitMediaType;

    /**
     * @reference [RFC2045][RFC2046]
     */
    const DESCRIPTION = 'application/octet-stream';
}