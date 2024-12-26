<?php
/**
 * Type_Video_vnd_sealed_mpeg4.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_vnd_sealed_mpeg4
{
    use TraitMediaType;

    /**
     * @reference [David_Petersen]
     */
    const DESCRIPTION = 'video/vnd.sealed.mpeg4';
}