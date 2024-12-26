<?php
/**
 * Type_Application_vnd_recordare_musicxml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_recordare_musicxml
{
    use TraitMediaType;

    /**
     * @reference [W3C_Music_Notation_Community_Group]
     */
    const DESCRIPTION = 'application/vnd.recordare.musicxml';
}