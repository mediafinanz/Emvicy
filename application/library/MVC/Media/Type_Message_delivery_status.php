<?php
/**
 * Type_Message_delivery_status.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Message_delivery_status
{
    use TraitMediaType;

    /**
     * @reference [RFC1894]
     */
    const DESCRIPTION = 'message/delivery-status';
}