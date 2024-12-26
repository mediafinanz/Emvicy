<?php
/**
 * Type_Application_EDI_X12.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_EDI_X12
{
    use TraitMediaType;

    /**
     * @reference [RFC1767]
     */
    const DESCRIPTION = 'application/EDI-X12';
}