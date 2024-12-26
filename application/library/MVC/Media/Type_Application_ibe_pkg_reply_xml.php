<?php
/**
 * Type_Application_ibe_pkg_reply_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_ibe_pkg_reply_xml
{
    use TraitMediaType;

    /**
     * @reference [RFC5408]
     */
    const DESCRIPTION = 'application/ibe-pkg-reply+xml';
}