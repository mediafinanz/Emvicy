<?php
/**
 * Type_Audio_GSM_EFR.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_GSM_EFR
{
    use TraitMediaType;

    /**
     * @reference [RFC4856]
     */
    const DESCRIPTION = 'audio/GSM-EFR';
}