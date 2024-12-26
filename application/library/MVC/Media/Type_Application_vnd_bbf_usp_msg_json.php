<?php
/**
 * Type_Application_vnd_bbf_usp_msg_json.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_bbf_usp_msg_json
{
    use TraitMediaType;

    /**
     * @reference [Broadband_Forum]
     */
    const DESCRIPTION = 'application/vnd.bbf.usp.msg+json';
}