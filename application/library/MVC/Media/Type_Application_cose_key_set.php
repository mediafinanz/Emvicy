<?php
/**
 * Type_Application_cose_key_set.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_cose_key_set
{
    use TraitMediaType;

    /**
     * @reference [RFC9052]
     */
    const DESCRIPTION = 'application/cose-key-set';
}