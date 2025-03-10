<?php
/**
 * Minify.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

use JSMin\JSMin;

class Minify
{
    /**
     * @var bool
     */
    public static $bMinifySuccess = true;

    /**
     * minifies all *css and *.js files found in the given folder and beneath (recursively!)
     * @param array $aContentFilterMinify [optional] default=MVC_PUBLIC_PATH
     * example: array(
            $aConfig['MVC_PUBLIC_PATH'] . '/Emvicy/styles/',
            $aConfig['MVC_PUBLIC_PATH'] . '/Emvicy/scripts/',
        )
     * @return bool
     * @throws \ReflectionException
     */
    public static function init(array $aContentFilterMinify = array()) : bool
    {
        (true === empty($aContentFilterMinify)) ? $aContentFilterMinify = array(Config::get_MVC_PUBLIC_PATH()) : false;
        $bSuccess = true;
        $aFile = [];

        foreach ($aContentFilterMinify as $sScriptDirAbs)
        {
            /** @var \SplFileInfo $oSplFileInfo */
            foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($sScriptDirAbs, \FilesystemIterator::FOLLOW_SYMLINKS)) as $oSplFileInfo)
            {
                // handle css + js files only
                if (in_array(pathinfo($oSplFileInfo->getPathname(), PATHINFO_EXTENSION), array('css', 'js')))
                {
                    $aFile[md5($oSplFileInfo->getPathname()) . '.' . md5_file($oSplFileInfo->getPathname())] = $oSplFileInfo;
                }
            }
        }

        $sCacheKey = str_replace('\\', '', __CLASS__) . '.' . md5(json_encode($aContentFilterMinify));
        $sCacheContent = md5(json_encode($aFile));

        // nothing to do because of no changes
        if ($sCacheContent === Cache::getCache($sCacheKey))
        {
            return self::$bMinifySuccess;
        }

        /** @var \SplFileInfo $oSplFileInfo */
        foreach ($aFile as $oSplFileInfo)
        {
            $sSuffix = pathinfo($oSplFileInfo->getPathname(), PATHINFO_EXTENSION);
            $sMinSuffix = '.min.' . $sSuffix;
            $iMinSuffixLength = strlen($sMinSuffix);
            $sLastChars = mb_substr($oSplFileInfo->getPathname(), -$iMinSuffixLength);

            // skip .min.* files
            if ($sLastChars === $sMinSuffix) {continue;}

            ('js' == $sSuffix) && $bSuccess = self::minifyJs($oSplFileInfo);
            ('css' == $sSuffix) && $bSuccess = self::minifyCss($oSplFileInfo);

            // if it only fails once set success to false
            (false === $bSuccess) && self::$bMinifySuccess = false;
        }

        // update cache
        Cache::saveCache($sCacheKey, $sCacheContent);

        return self::$bMinifySuccess;
    }

    /**
     * creates a minified JS file
     * @param \SplFileInfo $oSplFileInfo
     * @return bool
     */
    public static function minifyJs(\SplFileInfo $oSplFileInfo) : bool
    {
        if (false === file_exists($oSplFileInfo->getPathname()))
        {
            return false;
        }

        $sContent = JSMin::minify(file_get_contents($oSplFileInfo->getPathname()));
        $aPathInfo = pathinfo($oSplFileInfo->getPathname());
        $bSuccess = (boolean) file_put_contents(
            $aPathInfo['dirname'] . '/' . $aPathInfo['filename'] . '.min.js',
            $sContent
        );

        return $bSuccess;
    }

    /**
     * creates a minified CSS file
     * @param \SplFileInfo $oSplFileInfo
     * @return bool
     */
    public static function minifyCss(\SplFileInfo $oSplFileInfo) : bool
    {
        if (false === file_exists($oSplFileInfo->getPathname()))
        {
            return false;
        }

        $sContent = file_get_contents($oSplFileInfo->getPathname());

        // Remove comments
        $sContent  = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $sContent);

        // Remove space after colons
        $sContent = str_replace(': ', ':', $sContent);

        // Remove whitespace
        $sContent = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $sContent);

        $aPathInfo = pathinfo($oSplFileInfo->getPathname());
        $bSuccess = (boolean) file_put_contents(
            $aPathInfo['dirname'] . '/' . $aPathInfo['filename'] . '.min.css',
            $sContent
        );

        return $bSuccess;
    }
}
