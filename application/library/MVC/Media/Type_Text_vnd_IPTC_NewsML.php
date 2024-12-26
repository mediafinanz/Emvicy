<?php
/**
 * Type_Text_vnd_IPTC_NewsML.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_vnd_IPTC_NewsML
{
    use TraitMediaType;

    /**
     * @reference [IPTC]
     */
    const DESCRIPTION = 'text/vnd.IPTC.NewsML';
}