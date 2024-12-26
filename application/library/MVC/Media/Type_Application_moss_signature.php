<?php
/**
 * Type_Application_moss_signature.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_moss_signature
{
    use TraitMediaType;

    /**
     * @reference [RFC1848]
     */
    const DESCRIPTION = 'application/moss-signature';
}