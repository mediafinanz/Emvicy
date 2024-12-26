<?php
/**
 * Type_Application_samlassertion_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_samlassertion_xml
{
    use TraitMediaType;

    /**
     * @reference [OASIS_Security_Services_Technical_Committee_SSTC]
     */
    const DESCRIPTION = 'application/samlassertion+xml';
}