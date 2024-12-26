<?php
/**
 * Type_Audio_vnd_CELP.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_vnd_CELP
{
    use TraitMediaType;

    /**
     * @reference [Serge_De_Jaham]
     */
    const DESCRIPTION = 'audio/vnd.CELP';
}