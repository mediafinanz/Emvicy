<?php
/**
 * Type_Application_vnd_ga4gh_passport_jwt.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_ga4gh_passport_jwt
{
    use TraitMediaType;

    /**
     * @reference [GA4GH_Secretariat]
     */
    const DESCRIPTION = 'application/vnd.ga4gh.passport+jwt';
}