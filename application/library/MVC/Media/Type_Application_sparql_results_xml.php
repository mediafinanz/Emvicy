<?php
/**
 * Type_Application_sparql_results_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_sparql_results_xml
{
    use TraitMediaType;

    /**
     * @reference [W3C][http://www.w3.org/TR/2007/CR-rdf-sparql-XMLres-20070925/#mime]
     */
    const DESCRIPTION = 'application/sparql-results+xml';
}