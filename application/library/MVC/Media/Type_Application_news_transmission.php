<?php
/**
 * Type_Application_news_transmission.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_news_transmission
{
    use TraitMediaType;

    /**
     * @reference [RFC5537]
     */
    const DESCRIPTION = 'application/news-transmission';
}