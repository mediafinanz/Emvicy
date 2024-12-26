<?php
/**
 * Type_Application_vnd_syncml_dmtnds_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_syncml_dmtnds_xml
{
    use TraitMediaType;

    /**
     * @reference [OMA-DM_Work_Group]
     */
    const DESCRIPTION = 'application/vnd.syncml.dmtnds+xml';
}