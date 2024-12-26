<?php
/**
 * Type_Application_vnd_omads_email_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_omads_email_xml
{
    use TraitMediaType;

    /**
     * @reference [OMA_Data_Synchronization_WG]
     */
    const DESCRIPTION = 'application/vnd.omads-email+xml';
}