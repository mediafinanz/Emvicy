<?php
/**
 * Type_Video_vnd_mpegurl.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_vnd_mpegurl
{
    use TraitMediaType;

    /**
     * @reference [Heiko_Recktenwald]
     */
    const DESCRIPTION = 'video/vnd.mpegurl';
}