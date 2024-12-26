<?php
/**
 * Type_Application_vnd_nato_bindingdataobject_cbor.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_nato_bindingdataobject_cbor
{
    use TraitMediaType;

    /**
     * @reference [Aidan_Murdock]
     */
    const DESCRIPTION = 'application/vnd.nato.bindingdataobject+cbor';
}