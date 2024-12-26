<?php
/**
 * Type_Audio_telephone_event.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_telephone_event
{
    use TraitMediaType;

    /**
     * @reference [RFC4733]
     */
    const DESCRIPTION = 'audio/telephone-event';
}