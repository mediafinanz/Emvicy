<?php
/**
 * TraitDataType.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC\MVCTrait;

use MVC\DataType\DTValue;
use MVC\Error;

trait TraitDataType
{
    /**
     * returns the value from a DocCommentKey
     * @param string $sProperty
     * @param string $sDocCommentKey default=@var
     * @return string
     * @throws \ReflectionException
     */
    function getDocCommentValueOfProperty(string $sProperty = '', string $sDocCommentKey = '@var')
    {
        try {
            $oReflectionProperty = new \ReflectionProperty($this, $sProperty);
        } catch (\ReflectionException $oReflectionException) {
            Error::notice($oReflectionException->getMessage());
            return '';
        }

        $sDocComment = $oReflectionProperty->getDocComment();
        $sResult = trim(str_replace(['*', '/', $sDocCommentKey], '', current(array_filter(array_map(
            function($sLine) use ($sDocCommentKey) {
                if (stristr($sLine, $sDocCommentKey)) {
                    return $sLine;
                }
            },
            array_map('trim', explode("\n", $sDocComment))
        )))));

        return $sResult;
    }

    /**
     * @param \MVC\DataType\DTValue $oDTValue
     * @return \MVC\DataType\DTValue
     * @throws \ReflectionException
     */
    protected function setProperties(DTValue $oDTValue)
    {
        $aData = $oDTValue->get_mValue();

        if (false === is_array($aData))
        {
            return $oDTValue;
        }

        foreach ($aData as $sKey => $mValue)
        {
            // value should be type of
            $mType = $this->getDocCommentValueOfProperty($sKey);
            $sType = trim(strtok($mType, '|'));

            $sVar = $aData[$sKey];
            ((false === empty($sType) && true === in_array($sType, ["bool", "boolean", "int", "integer", "float", "double", "string", "array", "object", "null"]))
                ? settype($sVar, $sType)
                : false);
            $aData[$sKey] = $sVar;

            // if it can be null, set it to null
            if ('null' === $sType && true === empty($mValue))
            {
                $aSetTmp['value'] = 'null';
            }
            // value types
            elseif ('string' === $sType)
            {
                $aData[$sKey] = (string) $aData[$sKey];
            }
            elseif ('int' === $sType || 'integer' === $sType)
            {
                $aData[$sKey] = (int) $aData[$sKey];
            }
            elseif ('bool' === $sType || 'boolean' === $sType)
            {
                $aData[$sKey] = (boolean) $aData[$sKey];
            }
            elseif ('float' === $sType)
            {
                $aData[$sKey] = (float) $aData[$sKey];
            }
            elseif ('double' === $sType)
            {
                $aData[$sKey] = (float) $aData[$sKey];
            }
            elseif ('array' === $sType)
            {
                $aData[$sKey] = (array) $aData[$sKey];
            }
            // assume DataType Class
            else
            {
                if (true === method_exists($sType, 'create'))
                {
                    $aData[$sKey] = $sType::create((array) $aData[$sKey]);
                }
            }

            $sMethod = 'set_' . $sKey;

            if (true === method_exists($this, $sMethod))
            {
                $this->$sMethod($aData[$sKey]);
            }
        }

        $oDTValue->set_mValue($aData);

        return $oDTValue;
    }
}
