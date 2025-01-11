<?php
/**
 * Type_Application_ce_cbor.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_ce_cbor
{
    use TraitMediaType;

    /**
     * @reference [TCG_DICE][Ned_M._Smith]
     */
    const DESCRIPTION = 'application/ce+cbor';
}