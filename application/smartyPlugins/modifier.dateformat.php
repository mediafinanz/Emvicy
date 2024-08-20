<?php

/**
 * @param int         $iTimestamp
 * @param string|null $sFormat
 * @return string
 */
function smarty_modifier_dateformat(int $iTimestamp, string $sFormat = null)
{
    return date($sFormat, $iTimestamp);
}