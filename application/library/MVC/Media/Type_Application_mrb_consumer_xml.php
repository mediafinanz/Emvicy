<?php
/**
 * Type_Application_mrb_consumer_xml.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_mrb_consumer_xml
{
    use TraitMediaType;

    /**
     * @reference [RFC6917]
     */
    const DESCRIPTION = 'application/mrb-consumer+xml';
}