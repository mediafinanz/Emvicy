<?php
/**
 * Type_Application_news_groupinfo.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Application_news_groupinfo
{
    use TraitMediaType;

    /**
     * @reference [RFC5537]
     */
    const DESCRIPTION = 'application/news-groupinfo';
}