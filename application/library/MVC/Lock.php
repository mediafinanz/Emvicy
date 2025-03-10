<?php
/**
 * Lock.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace MVC;

use MVC\DataType\DTArrayObject;
use MVC\DataType\DTKeyValue;

/**
 * Class Lock
 * @package MVC
 */
class Lock
{
    /**
     * @param string $sKey
     * @param bool $bReturn
     * @return string|void
     * @throws \ReflectionException
     */
    public static function create(string $sKey = '', bool $bReturn = false)
    {
        $aBacktrace = Debug::prepareBacktraceArray(debug_backtrace(limit: 2));
        $sCacheDir = Config::get_MVC_CACHE_DIR();

        if (false === file_exists($sCacheDir))
        {
            $sCacheDir = sys_get_temp_dir();
            Config::set_MVC_CACHE_DIR($sCacheDir);
        }

        $sPrefix = preg_replace('/[^\\pL\d_]+/u', '-', $sKey);
        $sPrefix = trim($sPrefix, "-");
        $sPrefix = iconv('utf-8', "us-ascii//TRANSLIT", $sPrefix);
        $sPrefix = strtolower($sPrefix);
        $sPrefix = preg_replace('/[^-a-z0-9_]+/', '', $sPrefix);
        $sPrefix = substr($sPrefix, 0, 10);
        $sPrefix = str_pad($sPrefix, 10, '_');
        $sKey = $sPrefix . '.' . str_pad(strlen($sKey), 2, '_', STR_PAD_LEFT) . '.' . md5($sKey) . '.' . md5(serialize($aBacktrace)) . '.lock';
        $sFile = $sCacheDir . '/' . $sKey;
        $oDTArrayObject = DTArrayObject::create()
            ->add_aKeyValue(DTKeyValue::create()
                ->set_sKey('aBacktrace')
                ->set_sValue($aBacktrace))
            ->add_aKeyValue(DTKeyValue::create()
                ->set_sKey('sFile')
                ->set_sValue($sFile));

        if (true === file_exists($sFile) || false === mkdir($sFile, 0700, true))
        {
            $oDTArrayObject->add_aKeyValue(DTKeyValue::create()
                ->set_sKey('bLocked')
                ->set_sValue(true));
            Event::run('mvc.lock.create', $oDTArrayObject);

            if (true === $bReturn)
            {
                return $sFile;
            }

            exit();
        }

        \register_shutdown_function('\MVC\Dir::remove', $sFile);

        $oDTArrayObject->add_aKeyValue(DTKeyValue::create()
            ->set_sKey('bLocked')
            ->set_sValue(false));
        Event::run('mvc.lock.create', $oDTArrayObject);

        if (true === $bReturn)
        {
            return $sFile;
        }
    }
}