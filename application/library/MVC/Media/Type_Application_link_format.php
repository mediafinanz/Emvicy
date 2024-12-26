<?php
/**
 * Type_Application_link_format.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_link_format
{
    use TraitMediaType;

    /**
     * @reference [RFC6690]
     */
    const DESCRIPTION = 'application/link-format';
}