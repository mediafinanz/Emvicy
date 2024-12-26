<?php
/**
 * Type_Multipart_voice_message.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Multipart_voice_message
{
    use TraitMediaType;

    /**
     * @reference [RFC3801]
     */
    const DESCRIPTION = 'multipart/voice-message';
}