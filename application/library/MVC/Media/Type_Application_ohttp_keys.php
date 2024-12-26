<?php
/**
 * Type_Application_ohttp_keys.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_ohttp_keys
{
    use TraitMediaType;

    /**
     * @reference [RFC9458]
     */
    const DESCRIPTION = 'application/ohttp-keys';
}