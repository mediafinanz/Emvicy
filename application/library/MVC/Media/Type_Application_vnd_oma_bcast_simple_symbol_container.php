<?php
/**
 * Type_Application_vnd_oma_bcast_simple_symbol_container.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_oma_bcast_simple_symbol_container
{
    use TraitMediaType;

    /**
     * @reference [Uwe_Rauschenbach][Open_Mobile_Naming_Authority]
     */
    const DESCRIPTION = 'application/vnd.oma.bcast.simple-symbol-container';
}