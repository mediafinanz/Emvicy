<?php

/**
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 * @param $Byte
 * @param $iDecimals
 * @return string
 */
function smarty_modifier_filesize($Byte, $iDecimals = 2)
{
    $sKey = 'BKMGTP';
    $dFactor = floor((strlen($Byte) - 1) / 3);
    return sprintf("%.{$iDecimals}f", $Byte / pow(1024, $dFactor)) . @$sKey[$dFactor];
}