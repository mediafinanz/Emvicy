<?php
/**
 * Type_Application_vnd_familysearch_gedcom_zip.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_familysearch_gedcom_zip
{
    use TraitMediaType;

    /**
     * @reference [Gordon_Clarke]
     */
    const DESCRIPTION = 'application/vnd.familysearch.gedcom+zip';
}