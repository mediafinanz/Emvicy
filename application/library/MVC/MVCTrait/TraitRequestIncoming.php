<?php

namespace MVC\MVCTrait;


use MVC\RequestHelper;

trait TraitRequestIncoming
{
    /**
     * @param string $sKey
     * @param bool   $bCaseInsensitive
     * @return string
     * @throws \ReflectionException
     */
    public function getHeaderValueOnKey(string $sKey = '', bool $bCaseInsensitive = true) : string
    {
        $aHeader = $this->get_headerArray();

        // for comparison convert searched key and all header array keys to lowercase
        if (true === $bCaseInsensitive)
        {
            $sKey = strtolower($sKey);
            $aHeader = array_change_key_case($aHeader, CASE_LOWER);
        }

        return (string) get($aHeader[$sKey], '');
    }

    /**
     * @param bool $bReverse
     * @return array
     * @throws \ReflectionException
     * @example '/foo/bar/baz/'
     *           array(3) {[0]=> string(3) "foo" [1]=> string(3) "bar" [2]=> string(3) "baz"}
     */
    public function getPathArray(bool $bReverse = false) : array
    {
        return RequestHelper::getPathArrayOnUrl($this->get_full(), $bReverse);
    }
}
