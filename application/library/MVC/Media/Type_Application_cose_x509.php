<?php
/**
 * Type_Application_cose_x509.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_cose_x509
{
    use TraitMediaType;

    /**
     * @reference [RFC9360]
     */
    const DESCRIPTION = 'application/cose-x509';
}