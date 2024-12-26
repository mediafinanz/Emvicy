<?php
/**
 * Type_Application_sslkeylogfile.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_sslkeylogfile
{
    use TraitMediaType;

    /**
     * @reference [RFC-ietf-tls-keylogfile-02]
     */
    const DESCRIPTION = 'application/sslkeylogfile';
}