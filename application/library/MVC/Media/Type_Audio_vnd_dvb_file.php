<?php
/**
 * Type_Audio_vnd_dvb_file.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Audio_vnd_dvb_file
{
    use TraitMediaType;

    /**
     * @reference [Peter_Siebert]
     */
    const DESCRIPTION = 'audio/vnd.dvb.file';
}