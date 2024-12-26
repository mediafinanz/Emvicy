<?php
/**
 * Type_Application_tamp_status_response.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_tamp_status_response
{
    use TraitMediaType;

    /**
     * @reference [RFC5934]
     */
    const DESCRIPTION = 'application/tamp-status-response';
}