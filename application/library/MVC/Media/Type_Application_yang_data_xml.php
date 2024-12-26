<?php
/**
 * Type_Application_yang_data_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_yang_data_xml
{
    use TraitMediaType;

    /**
     * @reference [RFC8040]
     */
    const DESCRIPTION = 'application/yang-data+xml';
}