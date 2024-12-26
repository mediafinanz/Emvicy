<?php
/**
 * Type_Application_senml_exi.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_senml_exi
{
    use TraitMediaType;

    /**
     * @reference [RFC8428]
     */
    const DESCRIPTION = 'application/senml-exi';
}