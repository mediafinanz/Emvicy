<?php
/**
 * Type_Multipart_report.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Multipart_report
{
    use TraitMediaType;

    /**
     * @reference [RFC6522]
     */
    const DESCRIPTION = 'multipart/report';
}