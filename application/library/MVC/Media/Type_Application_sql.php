<?php
/**
 * Type_Application_sql.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_sql
{
    use TraitMediaType;

    /**
     * @reference [RFC6922]
     */
    const DESCRIPTION = 'application/sql';
}