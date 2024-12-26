<?php
/**
 * Type_Application_scvp_cv_request.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_scvp_cv_request
{
    use TraitMediaType;

    /**
     * @reference [RFC5055]
     */
    const DESCRIPTION = 'application/scvp-cv-request';
}