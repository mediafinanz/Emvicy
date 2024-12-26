<?php
/**
 * Type_Application_vnd_ves_encrypted.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_ves_encrypted
{
    use TraitMediaType;

    /**
     * @reference [Jim_Zubov]
     */
    const DESCRIPTION = 'application/vnd.ves.encrypted';
}