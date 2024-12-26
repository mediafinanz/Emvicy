<?php
/**
 * Type_Application_vnd_apache_arrow_stream.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_apache_arrow_stream
{
    use TraitMediaType;

    /**
     * @reference [Apache_Arrow_Project]
     */
    const DESCRIPTION = 'application/vnd.apache.arrow.stream';
}