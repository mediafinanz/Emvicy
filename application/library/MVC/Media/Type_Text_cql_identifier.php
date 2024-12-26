<?php
/**
 * Type_Text_cql_identifier.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_cql_identifier
{
    use TraitMediaType;

    /**
     * @reference [HL7][Bryn_Rhodes]
     */
    const DESCRIPTION = 'text/cql-identifier';
}