<?php
/**
 * Type_Application_gnap_binding_jwsd.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_gnap_binding_jwsd
{
    use TraitMediaType;

    /**
     * @reference [RFC9635]
     */
    const DESCRIPTION = 'application/gnap-binding-jwsd';
}