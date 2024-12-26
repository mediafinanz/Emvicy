<?php
/**
 * Type_Application_vnd_oasis_opendocument_graphics.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_oasis_opendocument_graphics
{
    use TraitMediaType;

    /**
     * @reference [OASIS_TC_Admin][OASIS]
     */
    const DESCRIPTION = 'application/vnd.oasis.opendocument.graphics';
}