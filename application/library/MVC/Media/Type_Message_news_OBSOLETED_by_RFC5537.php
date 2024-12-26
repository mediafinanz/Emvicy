<?php
/**
 * Type_Message_news_OBSOLETED_by_RFC5537.php
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\Media;

use MVC\MVCTrait\TraitMediaType;

class Type_Message_news_OBSOLETED_by_RFC5537
{
    use TraitMediaType;

    /**
     * @reference [RFC5537][Henry_Spencer]
	 * @deprecated OBSOLETED by RFC5537
     */
    const DESCRIPTION = 'message/news';
}