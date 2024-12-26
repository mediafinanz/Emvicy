<?php
/**
 * Type_Application_EmergencyCallData_ProviderInfo_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_EmergencyCallData_ProviderInfo_xml
{
    use TraitMediaType;

    /**
     * @reference [RFC7852]
     */
    const DESCRIPTION = 'application/EmergencyCallData.ProviderInfo+xml';
}