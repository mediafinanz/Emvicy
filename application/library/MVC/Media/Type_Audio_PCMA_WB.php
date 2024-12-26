<?php
/**
 * Type_Audio_PCMA_WB.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_PCMA_WB
{
    use TraitMediaType;

    /**
     * @reference [RFC5391]
     */
    const DESCRIPTION = 'audio/PCMA-WB';
}