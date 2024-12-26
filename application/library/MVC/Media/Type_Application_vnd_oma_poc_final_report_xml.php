<?php
/**
 * Type_Application_vnd_oma_poc_final_report_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_oma_poc_final_report_xml
{
    use TraitMediaType;

    /**
     * @reference [OMA_Push_to_Talk_over_Cellular_POC_WG]
     */
    const DESCRIPTION = 'application/vnd.oma.poc.final-report+xml';
}