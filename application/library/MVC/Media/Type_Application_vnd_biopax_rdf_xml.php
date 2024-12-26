<?php
/**
 * Type_Application_vnd_biopax_rdf_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_biopax_rdf_xml
{
    use TraitMediaType;

    /**
     * @reference [Pathway_Commons]
     */
    const DESCRIPTION = 'application/vnd.biopax.rdf+xml';
}