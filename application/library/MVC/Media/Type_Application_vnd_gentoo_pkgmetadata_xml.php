<?php
/**
 * Type_Application_vnd_gentoo_pkgmetadata_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_gentoo_pkgmetadata_xml
{
    use TraitMediaType;

    /**
     * @reference [Michał_Górny]
     */
    const DESCRIPTION = 'application/vnd.gentoo.pkgmetadata+xml';
}