<?php
/**
 * Type_Audio_midi_clip.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_midi_clip
{
    use TraitMediaType;

    /**
     * @reference [MIDI_Association][Benjamin_Israel]
     */
    const DESCRIPTION = 'audio/midi-clip';
}