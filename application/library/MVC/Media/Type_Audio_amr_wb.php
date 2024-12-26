<?php
/**
 * Type_Audio_amr_wb.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_amr_wb
{
    use TraitMediaType;

    /**
     * @reference [RFC4352]
     */
    const DESCRIPTION = 'audio/amr-wb+';
}