<?php
/**
 * Type_Application_rpki_roa.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_rpki_roa
{
    use TraitMediaType;

    /**
     * @reference [RFC9582]
     */
    const DESCRIPTION = 'application/rpki-roa';
}