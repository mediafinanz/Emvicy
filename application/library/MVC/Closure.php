<?php

/**
 * Closure.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

class Closure
{
    /**
     * checks whether the unknown parameter is a closure object
     * @param mixed $mUnknown
     * @return bool
     */
    public static function is(mixed $mUnknown) : bool
    {
        return is_object($mUnknown) && ($mUnknown instanceof \Closure);
    }

    /**
     * Dumps a Closure
     * @access public
     * @static
     * @param mixed $mClosure name of function or Closure
     * @return string
     * @throws \ReflectionException
     */
    public static function dump(mixed $mClosure) : string
    {
        $oReflectionFunction = new \ReflectionFunction($mClosure);
        $aParam = array();

        foreach ($oReflectionFunction->getParameters() as $oReflectionParameter)
        {
            $sTemp = '';
            $oReflectionType = $oReflectionParameter->getType();
            $aType = $oReflectionType instanceof \ReflectionUnionType
                ? $oReflectionType->getTypes()
                : [$oReflectionType];

            $aType = array_filter(
                $aType,
                function($value)
                {
                    return !is_null($value) && $value !== '' && 'NULL' != gettype($value);
                }
            );

            if (empty($aType))
            {
                continue;
            }

            /**
             * @see https://www.php.net/manual/de/reflectionparameter.isarray.php
             *      https://www.php.net/manual/de/functions.arrow.php
             */
            $bIsArray = in_array(
                'array',
                array_map(
                    fn(\ReflectionNamedType $oReflectionNamedType) => $oReflectionNamedType->getName(),
                    $aType
                )
            );

            if (true === $bIsArray)
            {
                $sTemp .= 'array ';
            }
            else
            {
                if ($oReflectionParameter->getName())
                {
                    $sTemp .= $oReflectionParameter->getName() . ' ';
                }
            }

            if ($oReflectionParameter->isPassedByReference())
            {
                $sTemp .= '&';
            }

            $sTemp .= '$' . $oReflectionParameter->name;

            if ($oReflectionParameter->isOptional())
            {
                $sTemp .= ' = ' . var_export($oReflectionParameter->getDefaultValue(), true);
            }

            $aParam [] = $sTemp;
        }

        $sString = 'function (' . preg_replace('!\s+!', ' ', implode(', ', $aParam)) . '){' . PHP_EOL;
        $aLine = file($oReflectionFunction->getFileName());

        for ($iCount = $oReflectionFunction->getStartLine(); $iCount < $oReflectionFunction->getEndLine(); $iCount++)
        {
            $sString .= $aLine[$iCount];
        }

        return $sString;
    }

    /**
     * converts a closure into a string
     * @see https://stackoverflow.com/a/69934185
     * @param \Closure $oClosure
     * @param bool $bShrink remove comments, empty lines, multiple whitespace
     * @return string
     * @throws \ReflectionException
     */
    public static function toString(\Closure $oClosure, bool $bShrink = true) : string
    {
        $oReflectionFunction = new \ReflectionFunction($oClosure);
        $sFileName = $oReflectionFunction->getFileName();
        $iStartLine = $oReflectionFunction->getStartLine();
        $iEndLine = $oReflectionFunction->getEndLine();
        $aExplode = explode(PHP_EOL, file_get_contents($sFileName));
        $aExplode = array_slice($aExplode, ($iStartLine - 1), ($iEndLine - ($iStartLine - 1)));
        $iLastLineNumber = (count($aExplode) - 1);
        reset($aExplode);

        if (
            (substr_count(current($aExplode), 'function') > 1) ||
            (substr_count(current($aExplode), '{') > 1) ||
            (substr_count($aExplode[$iLastLineNumber], '}') > 1)
        )
        {
            Error::error(
                "Too complex context definition in: `$sFileName`. Check lines: $iStartLine & $iEndLine.",
                1,
                0,
                $sFileName,
                $iStartLine
            );
        }

        $aExplode[0] = ('function' . explode('function', current($aExplode))[1]);
        $aExplode[$iLastLineNumber] = (explode('}', $aExplode[$iLastLineNumber])[0] . '}');
        $sClosure = implode(PHP_EOL, $aExplode);

        // remove comments, empty lines, multiple whitespace
        if (true === $bShrink)
        {
            $sClosure = preg_replace('!/\*.*?\*/!s', '', $sClosure);
            $sClosure = preg_replace('/\n\s*\n/', "\n", $sClosure);
            $sClosure = preg_replace('/(?:(?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/)|(?:(?<!\:|\\\|\'|\")\/\/.*))/', '', $sClosure);
            $sClosure = str_replace("\n", ' ', $sClosure);
            $sClosure = preg_replace('!\s+!', ' ', $sClosure);
        }

        return (string) $sClosure;
    }
}