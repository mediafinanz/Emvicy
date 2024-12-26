<?php
/**
 * Type_Application_vnd_mason_json.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_mason_json
{
    use TraitMediaType;

    /**
     * @reference [Jorn_Wildt]
     */
    const DESCRIPTION = 'application/vnd.mason+json';
}