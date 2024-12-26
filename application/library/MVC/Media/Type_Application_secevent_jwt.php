<?php
/**
 * Type_Application_secevent_jwt.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_secevent_jwt
{
    use TraitMediaType;

    /**
     * @reference [RFC8417]
     */
    const DESCRIPTION = 'application/secevent+jwt';
}