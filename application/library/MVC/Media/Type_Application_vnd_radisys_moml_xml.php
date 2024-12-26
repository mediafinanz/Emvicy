<?php
/**
 * Type_Application_vnd_radisys_moml_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_radisys_moml_xml
{
    use TraitMediaType;

    /**
     * @reference [RFC5707]
     */
    const DESCRIPTION = 'application/vnd.radisys.moml+xml';
}