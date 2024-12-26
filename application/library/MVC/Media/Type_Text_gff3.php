<?php
/**
 * Type_Text_gff3.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_gff3
{
    use TraitMediaType;

    /**
     * @reference [Sequence_Ontology]
     */
    const DESCRIPTION = 'text/gff3';
}