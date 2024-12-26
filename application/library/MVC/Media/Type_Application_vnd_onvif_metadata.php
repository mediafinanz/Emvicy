<?php
/**
 * Type_Application_vnd_onvif_metadata.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_onvif_metadata
{
    use TraitMediaType;

    /**
     * @reference [Hans_Busch]
     */
    const DESCRIPTION = 'application/vnd.onvif.metadata';
}