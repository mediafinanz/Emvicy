<?php
/**
 * Type_Application_vnd_google_earth_kml_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_google_earth_kml_xml
{
    use TraitMediaType;

    /**
     * @reference [Michael_Ashbridge]
     */
    const DESCRIPTION = 'application/vnd.google-earth.kml+xml';
}