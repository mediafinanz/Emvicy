<?php
/**
 * Type_Application_rpki_updown.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_rpki_updown
{
    use TraitMediaType;

    /**
     * @reference [RFC6492]
     */
    const DESCRIPTION = 'application/rpki-updown';
}