<?php
/**
 * Type_Application_ace_trl_cbor.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_ace_trl_cbor
{
    use TraitMediaType;

    /**
     * @reference [RFC-ietf-ace-revoked-token-notification-09]
     */
    const DESCRIPTION = 'application/ace-trl+cbor';
}