<?php
/**
 * Type_Application_cbor_seq.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_cbor_seq
{
    use TraitMediaType;

    /**
     * @reference [RFC8742]
     */
    const DESCRIPTION = 'application/cbor-seq';
}