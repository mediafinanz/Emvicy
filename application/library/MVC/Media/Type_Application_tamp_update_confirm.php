<?php
/**
 * Type_Application_tamp_update_confirm.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_tamp_update_confirm
{
    use TraitMediaType;

    /**
     * @reference [RFC5934]
     */
    const DESCRIPTION = 'application/tamp-update-confirm';
}