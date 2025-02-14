<?php
/**
 * Type_Application_voucher_jws_json.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_voucher_jws_json
{
    use TraitMediaType;

    /**
     * @reference [RFC-ietf-anima-jws-voucher-16]
     */
    const DESCRIPTION = 'application/voucher-jws+json';
}