<?php
/**
 * Type_Application_vnd_ntt_local_file_transfer.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_ntt_local_file_transfer
{
    use TraitMediaType;

    /**
     * @reference [NTT-local]
     */
    const DESCRIPTION = 'application/vnd.ntt-local.file-transfer';
}