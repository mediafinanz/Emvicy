<?php

namespace MVC;

class Process
{
    /**
     * @param int    $iSeconds
     * @param string $sPreText
     * @param bool   $bEchoOut
     * @return void
     */
    public static function pause(int $iSeconds = 1, string $sPreText = '', bool $bEchoOut = false)
    {
        if (false === empty($sPreText) && true === $bEchoOut)
        {
            echo $sPreText . "\n\t" . ' …pause… ';
        }

        ($iSeconds < 0) ? $iSeconds = 0: false;

        for ($i = 0; $i < $iSeconds; $i++)
        {
            if (true === $bEchoOut)
            {
                echo ($i + 1);
            }

            sleep(1);
        }

        if (true === $bEchoOut)
        {
            echo "\n";
        }
    }

    /**
     * @param string $sRoute Route (path)
     * @return int PID
     * @throws \ReflectionException
     */
    public static function callRouteAsync(string $sRoute = '')
    {
        Event::run('mvc.process.callRouteAsync.before', $sRoute);

        if (true === empty($sRoute))
        {
            return 0;
        }

        // Number of processes still available. Exit if max number of started processes reached
        if (self::getAmountProcessesAvailable() <= 0)
        {
            return 0;
        }

        $sCommand = 'cd ' . Config::get_MVC_PUBLIC_PATH() . '; ' . Config::get_MVC_BIN_PHP_BINARY() . ' index.php "' . $sRoute . '"' . ' > /dev/null 2>/dev/null & echo $!';
        $iPid = (int) trim(shell_exec($sCommand));
        self::savePid($iPid);

        /** @todo event logging */
        Event::run('mvc.process.callRouteAsync.after', array('sRoute' => $sRoute, 'iPid' => $iPid));

        return $iPid;
    }

    /**
     * @param object $oObject
     * @param string $sMethod
     * @param array  $aArgument
     * @return void
     * @throws \ReflectionException
     */
    public static function callClassMethodAsync(object $oObject, string $sMethod, array $aArgument = array())
    {
        // The PCNTL extension is meant to be restricted to operating in CLI only;
        // You cannot use it in other server environments (fpm, mod_php, etc).
        // It is not possible to use the function 'pcntl_fork' when PHP is used as Apache module (such as XAMPP).
        // You can only use pcntl_fork in CGI mode or from command-line.
        // Using this function will result in: 'Fatal error: Call to undefined function: pcntl_fork()'
        if (false === ('cli' === php_sapi_name()))
        {
            return;
        }

        /*
         * On success,
         * the PID of the child process is returned in the parent's thread of execution,
         * and a 0 is returned in the child's thread of execution.
         *
         * On failure,
         * a -1 will be returned in the parent's context,
         * no child process will be created, and a PHP error is raised.
         */
        $bFork = (0 === pcntl_fork());

        // from here it is forked, non-blocking and has its own pid
        if (true === $bFork)
        {
            \register_shutdown_function('\MVC\Process::deletePidFile', getmypid());
            self::savePid(getmypid());

            $sControllerClassName = get_class($oObject);
            $oReflectionMethod = new \ReflectionMethod($sControllerClassName, $sMethod);
            $oReflectionMethod->invoke($oObject, $aArgument);

            exit();
        }
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public static function getPidFileFolder()
    {
        // pidfile folder; make sure there is a trailing slash
        $sPidFileFolder = Strings::replaceMultipleForwardSlashesByOneFromString(Config::get_MVC_PROCESS_PID_FILE_DIR() . '/');

        if (false === Dir::exists($sPidFileFolder))
        {
            Dir::make($sPidFileFolder);
        }

        return $sPidFileFolder;
    }

    /**
     * @return int
     * @throws \ReflectionException
     */
    public static function getAmountProcessesMax()
    {
        // Maximum number of all job processes allowed
        return (int) Config::get_MVC_PROCESS_MAX_PROCESSES_OVERALL();
    }

    /**
     * @return int
     * @throws \ReflectionException
     */
    public static function getAmountProcessesRecorded()
    {
        // detect running processes (=== amount of pidfiles in directory)
        return iterator_count(
            new \FilesystemIterator(
                self::getPidFileFolder(),
                \FilesystemIterator::SKIP_DOTS
            )
        );
    }

    /**
     * @param int|null   $iPid
     * @param mixed|null $mContent
     * @return bool
     * @throws \ReflectionException
     */
    public static function savePid(?int $iPid = null, mixed $mContent = null)
    {
        if (true === empty($iPid))
        {
            $iPid = getmypid();
        }

        // save pidfile containing JSON queue object
        return (boolean) file_put_contents(self::getPidFileFolder() . $iPid, json_encode(Convert::objectToArray($mContent)));
    }

    /**
     * @param int $iPid
     * @return bool
     * @throws \ReflectionException
     */
    public static function hasPidFile(int $iPid)
    {
        return file_exists(self::getPidFileFolder() . $iPid);
    }

    /**
     * @param int $iPid
     * @return bool
     * @throws \ReflectionException
     */
    public static function deletePidFile(int $iPid)
    {
        if (true === self::hasPidFile($iPid))
        {
            return unlink(
                self::getPidFileFolder() . $iPid
            );
        }

        return false;
    }

    /**
     * @return int
     * @throws \ReflectionException
     */
    public static function getAmountProcessesAvailable()
    {
        return (
            self::getAmountProcessesMax() - self::getAmountProcessesRecorded()
        );
    }

    /**
     * @param int $iPid
     * @return bool
     * @throws \ReflectionException
     */
    public static function isRunning(int $iPid = 0)
    {
        $iPid = abs($iPid);

        if (true === empty($iPid))
        {
            return false;
        }

        $sCmd = whereis('ps') . ' --pid ' . $iPid . '  > /dev/null; echo "$?";';
        exec($sCmd, $aOutput);

        return (current($aOutput) == 1) ? false : true;
    }

    /**
     * @param string $sRunningSymbol
     * @param        $sZombieSymbol
     * @return string
     * @throws \ReflectionException
     */
    public static function reportOnPid(string $sRunningSymbol = '⚙', $sZombieSymbol = '☠️') : string
    {
        $sCmd = 'cd ' . self::getPidFileFolder() . '; ' .
                'aPid=`ls`; for iPid in ${aPid}; ' .
                'do ' . whereis('ps') . ' --pid $iPid  > /dev/null; ' .
                'if [ "$?" -eq 0 ]; then ' .
                'sDate=`' . whereis('date') . ' -r $iPid "+%Y-%m-%d %H:%M:%S";`; ' .
                'echo "' . addslashes($sRunningSymbol) . ' Running: $iPid since <code>$sDate</code>"; ' .
                'else echo "' . addslashes($sZombieSymbol) . ' Zombie: <span class=\"text-black-50\">$iPid</span>"; ' .
                'fi; ' .
                'done;';

        return (string) shell_exec($sCmd);
    }

    /**
     * returns detected real zombies as array containing absolute path to zombie pidfiles
     * @return string[]
     * @throws \ReflectionException
     */
    public static function getZombiePidFileArray()
    {
        return self::getPidFileArray(1);
    }

    /**
     * returns array with absolute path to running pidfiles
     * @return string[]
     * @throws \ReflectionException
     */
    public static function getRunningPidFileArray()
    {
        return self::getPidFileArray(0);
    }

    /**
     * @param int $iFlag 1=zombie;0=running
     * @return string[]
     * @throws \ReflectionException
     */
    protected static function getPidFileArray(int $iFlag = 1)
    {
        $sCmd = 'cd ' . self::getPidFileFolder() . '; aPid=`ls`; for iPid in ${aPid}; do ' . whereis('ps') . ' --pid $iPid > /dev/null; if [ "$?" -eq ' . $iFlag . ' ]; then echo "$iPid"; fi; done;';
        $aPid = array_filter(explode("\n", (string) shell_exec($sCmd)));
        $aPid = array_map(
            function($sPid){
                return self::getPidFileFolder() . $sPid;
            },
            $aPid
        );

        return $aPid;
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function deleteZombieFiles()
    {
        $aZombie = self::getZombiePidFileArray();

        foreach ($aZombie as $sPidFile)
        {
            if (true === file_exists($sPidFile))
            {
                @unlink($sPidFile);
                Event::run('mvc.process.deleteZombieFiles.after', $sPidFile);
            }
        }
    }

    /**
     * delete pid-files on shutdown
     * @return void
     * @throws \ReflectionException
     */
    public static function destruct()
    {
        $iPid = getmypid();

        if (true === is_int($iPid))
        {
            if (true === self::deletePidFile($iPid))
            {
                Event::run('mvc.process.destruct.after', $iPid);
            }
        }

        self::deleteZombieFiles();
    }
}
