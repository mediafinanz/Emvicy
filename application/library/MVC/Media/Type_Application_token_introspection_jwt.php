<?php
/**
 * Type_Application_token_introspection_jwt.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_token_introspection_jwt
{
    use TraitMediaType;

    /**
     * @reference [RFC-oauth-jwt-introspection-response-12]
     */
    const DESCRIPTION = 'application/token-introspection+jwt';
}