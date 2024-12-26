<?php
/**
 * Type_Audio_EVRC_QCP.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_EVRC_QCP
{
    use TraitMediaType;

    /**
     * @reference [RFC3625]
     */
    const DESCRIPTION = 'audio/EVRC-QCP';
}