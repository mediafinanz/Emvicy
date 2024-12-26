<?php
/**
 * Type_Text_directory_DEPRECATED_by_RFC6350.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_directory_DEPRECATED_by_RFC6350
{
    use TraitMediaType;

    /**
     * @reference [RFC2425][RFC6350]
     */
    const DESCRIPTION = 'text/directory';
}