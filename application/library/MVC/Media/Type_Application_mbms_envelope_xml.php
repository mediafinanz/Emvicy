<?php
/**
 * Type_Application_mbms_envelope_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_mbms_envelope_xml
{
    use TraitMediaType;

    /**
     * @reference [_3GPP]
     */
    const DESCRIPTION = 'application/mbms-envelope+xml';
}