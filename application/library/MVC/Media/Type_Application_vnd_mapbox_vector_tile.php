<?php
/**
 * Type_Application_vnd_mapbox_vector_tile.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_vnd_mapbox_vector_tile
{
    use TraitMediaType;

    /**
     * @reference [Blake_Thompson]
     */
    const DESCRIPTION = 'application/vnd.mapbox-vector-tile';
}