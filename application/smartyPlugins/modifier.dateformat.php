<?php

/**
 * @param int    $iTimestamp
 * @param string $sFormat
 * @return string
 */
function smarty_modifier_dateformat(int $iTimestamp, string $sFormat = 'Y-m-d H:i:s')
{
    return date($sFormat, $iTimestamp);
}