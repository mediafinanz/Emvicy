<?php
/**
 * Type_Application_EmergencyCallData_eCall_MSD.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_EmergencyCallData_eCall_MSD
{
    use TraitMediaType;

    /**
     * @reference [RFC8147]
     */
    const DESCRIPTION = 'application/EmergencyCallData.eCall.MSD';
}