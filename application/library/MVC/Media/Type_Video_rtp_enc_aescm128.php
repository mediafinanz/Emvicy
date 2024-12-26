<?php
/**
 * Type_Video_rtp_enc_aescm128.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Video_rtp_enc_aescm128
{
    use TraitMediaType;

    /**
     * @reference [_3GPP]
     */
    const DESCRIPTION = 'video/rtp-enc-aescm128';
}