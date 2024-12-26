<?php
/**
 * Type_Application_atsc_held_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_atsc_held_xml
{
    use TraitMediaType;

    /**
     * @reference [ATSC]
     */
    const DESCRIPTION = 'application/atsc-held+xml';
}