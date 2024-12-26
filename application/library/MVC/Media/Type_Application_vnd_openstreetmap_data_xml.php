<?php
/**
 * Type_Application_vnd_openstreetmap_data_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_openstreetmap_data_xml
{
    use TraitMediaType;

    /**
     * @reference [Paul_Norman]
     */
    const DESCRIPTION = 'application/vnd.openstreetmap.data+xml';
}