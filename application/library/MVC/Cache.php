<?php
/**
 * Cache.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

class Cache
{
    /**
     * caching true/false; default=true
     * @access public
     * @static
     * @var boolean
     */
    public static $bCaching;

    /**
     * delete cache files when this value is reached
     * @access public
     * @static
     * @var integer
     */
    public static $iDeleteAfterMinutes;

    /**
     * absolute path to cache dir
     * @access public
     * @static
     * @var string
     */
    public static $sCacheDir;

    /**
     * linux binary `rm'
     * @access public
     * @static
     * @var string
     */
    public static $sBinRemove;

    /**
     * linux binary `find'
     * @access public
     * @static
     * @var string
     */
    public static $sBinFind;

    /**
     * linux binary `grep'
     * @access public
     * @static
     * @var string
     */
    public static $sBinGrep;

    /**
     * sets configuration; if none is given by param, defaults are set
     * @access public
     * @static
     * @param array $aConfig array(
     *		'bCaching' => true,
     *		'sCacheDir' => '/tmp/',
     *		'iDeleteAfterMinutes' => 1440,
     *		'sBinRemove' => '/bin/rm',
     * 		'sBinFind' => '/usr/bin/find',
     * 		'sBinGrep' => '/bin/grep',
     * )
     * @throws \ReflectionException
     */
    public static function init(array $aConfig = array())
    {
        if (true === empty($aConfig))
        {
            $aConfig = Config::get_MVC_CACHE_CONFIG();
        }

        (is_null(self::$bCaching)) ? (self::$bCaching						= (isset($aConfig['bCaching']))				? $aConfig['bCaching']				: true)					: false;
        (is_null(self::$sCacheDir)) ? (self::$sCacheDir						= (isset($aConfig['sCacheDir']))			? $aConfig['sCacheDir']				: sys_get_temp_dir())	: false;
        (is_null(self::$iDeleteAfterMinutes)) ? (self::$iDeleteAfterMinutes	= (isset($aConfig['iDeleteAfterMinutes']))	? $aConfig['iDeleteAfterMinutes']	: 1440)					: false;	// 1440min === 1 day
        (is_null(self::$sBinRemove)) ? (self::$sBinRemove					= (isset($aConfig['sBinRemove']))			? $aConfig['sBinRemove']			: '/bin/rm')			: false;
        (is_null(self::$sBinFind)) ? (self::$sBinFind						= (isset($aConfig['sBinFind']))				? $aConfig['sBinFind']				: '/usr/bin/find')		: false;
        (is_null(self::$sBinGrep)) ? (self::$sBinGrep						= (isset($aConfig['sBinGrep']))				? $aConfig['sBinGrep']				: '/bin/grep')			: false;
    }

    /**
     * gets data from cache by key
     * @param string $sKey
     * @return mixed|string
     * @throws \ReflectionException
     */
    public static function getCache(string $sKey = '')
    {
        self::init();

        if (false === self::$bCaching || '' === $sKey)
        {
            return '';
        }

        $sFilename = self::$sCacheDir . '/' . $sKey;
        $sContent = '';

        if (file_exists($sFilename))
        {
            $sContent = unserialize(
                base64_decode(
                    file_get_contents($sFilename)
                )
            );
        }

        return $sContent;
    }

    /**
     * checks whether a cache related to a given token/key exists
     * @param string $sKey
     * @return bool
     * @throws \ReflectionException
     */
    public static function exists(string $sKey = '')
    {
        self::init();

        if (false === self::$bCaching || '' === $sKey)
        {
            return false;
        }

        $sFilename = self::$sCacheDir . '/' . $sKey;

        return file_exists($sFilename);
    }

    /**
     * saves data into cache on key
     * @param string $sKey
     * @param        $mData
     * @return bool
     * @throws \ReflectionException
     */
    public static function saveCache(string $sKey, $mData) : bool
    {
        self::init();

        if (false === self::$bCaching)
        {
            return false;
        }

        $sFilename = self::$sCacheDir . '/' . $sKey;
        $mData = base64_encode(
            serialize($mData)
        );

        if (!is_dir ($sFilename))
        {
            (is_file($sFilename) && file_exists($sFilename)) ? unlink($sFilename) : false;

            if (false === file_put_contents($sFilename, $mData, LOCK_EX))
            {
                return false;
            }
        }

        return true;
    }

    /**
     * deletes cachefiles after certain time
     * @require Linux commands `rm`, `find` and `grep` executable via shell_exec
     * @param string      $sToken optional; default='' (all cachefiles)
     * @param string|null $sMinutes optional; default=self::$iDeleteAfterMinutes
     * @return bool
     * @throws \ReflectionException
     */
    public static function autoDeleteCache(string $sToken = '', ?string $sMinutes = null) : bool
    {
        self::init();

        if (false === self::$bCaching)
        {
            return false;
        }

        if (null === $sMinutes)
        {
            $sMinutes = self::$iDeleteAfterMinutes;
        }

        $sCmd = self::$sBinFind . ' ' . self::$sCacheDir . ' -type f -mmin +' . $sMinutes;
        ('' !== $sToken) ? $sCmd.= ' | ' . self::$sBinGrep . ' ' . escapeshellarg(addslashes($sToken)) : false;
        $mFind = trim((string) shell_exec($sCmd));

        if (!is_null($mFind) && !empty($mFind))
        {
            $aLine = explode("\n", $mFind);

            foreach ($aLine as $sLine)
            {
                $sCmd = self::$sBinRemove . ' "' . $sLine . '"';
                $mRemove = shell_exec((string) $sCmd);
            }

            return (boolean) $mRemove;
        }

        return (boolean) $mFind;
    }

    /**
     * flushes cache (deletes all cachefiles immediatly)
     * @require Linux command `rm` executable via shell_exec
     * @return bool
     * @throws \ReflectionException
     */
    public static function flushCache() : bool
    {
        self::init();

        if (false === self::$bCaching)
        {
            return false;
        }

        $sCmd = self::$sBinRemove . ' -rf ' . self::$sCacheDir . '/*';
        $mResult = shell_exec($sCmd);

        return (boolean) $mResult;
    }
}
