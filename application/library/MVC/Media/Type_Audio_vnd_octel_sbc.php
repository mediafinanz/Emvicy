<?php
/**
 * Type_Audio_vnd_octel_sbc.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_vnd_octel_sbc
{
    use TraitMediaType;

    /**
     * @reference [Greg_Vaudreuil]
     */
    const DESCRIPTION = 'audio/vnd.octel.sbc';
}