<?php
/**
 * Type_Application_vnd_debian_binary_package.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_debian_binary_package
{
    use TraitMediaType;

    /**
     * @reference [Debian_Policy_mailing_list]
     */
    const DESCRIPTION = 'application/vnd.debian.binary-package';
}