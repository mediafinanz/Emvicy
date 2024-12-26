<?php
/**
 * Type_Text_markdown.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Text_markdown
{
    use TraitMediaType;

    /**
     * @reference [RFC7763]
     */
    const DESCRIPTION = 'text/markdown';
}