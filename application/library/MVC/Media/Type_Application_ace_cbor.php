<?php
/**
 * Type_Application_ace_cbor.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_ace_cbor
{
    use TraitMediaType;

    /**
     * @reference [RFC9200]
     */
    const DESCRIPTION = 'application/ace+cbor';
}