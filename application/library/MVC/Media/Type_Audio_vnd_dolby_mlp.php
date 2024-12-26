<?php
/**
 * Type_Audio_vnd_dolby_mlp.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_vnd_dolby_mlp
{
    use TraitMediaType;

    /**
     * @reference [Mike_Ward]
     */
    const DESCRIPTION = 'audio/vnd.dolby.mlp';
}