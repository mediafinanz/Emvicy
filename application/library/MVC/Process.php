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

        /** @todo event logging */
        Event::run('mvc.process.callRouteAsync.after', array('sRoute' => $sRoute, 'iPid' => $iPid));

        return $iPid;
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
     * @example return
     * Zombie: 4667
     * Running: 5037    2024-11-23 12:48:32
     * Zombie: 6026
     * Zombie: 6028
     * Zombie: 6030
     * Zombie: 6032
     * @return string
     * @throws \ReflectionException
     */
    public static function reportOnPid() : string
    {
        $sCmd = 'cd ' . self::getPidFileFolder() . '; ' .
                'aPid=`ls`; for iPid in ${aPid}; ' .
                'do ' . whereis('ps') . ' --pid $iPid  > /dev/null; ' .
                'if [ "$?" -eq 0 ]; then ' .
                'sDate=`' . whereis('date') . ' -r $iPid "+%Y-%m-%d %H:%M:%S";`; ' .
                'echo "<i class=\"fa fa-gear text-success\"></i> Running: $iPid since <code>$sDate</code>"; ' .
                'else echo "<i class=\"fa fa-skull-crossbones text-danger\"></i> Zombie: <span class=\"text-black-50\">$iPid</span>"; ' .
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
        $sCmd = 'cd ' . self::getPidFileFolder() . '; aPid=`ls`; for iPid in ${aPid}; do ' . whereis('ps') . ' --pid $iPid > /dev/null; if [ "$?" -eq 1 ]; then echo "$iPid"; fi; done;';
        $aPid = array_filter(explode("\n", shell_exec($sCmd)));

        $aPid = array_map(
            function($sPid){
                return self::getPidFileFolder() . $sPid;
            },
            $aPid
        );

        return $aPid;
    }

    /**
     * returns array with absolute path to running pidfiles
     * @return string[]
     * @throws \ReflectionException
     */
    public static function getRunningPidFileArray()
    {
        $sCmd = 'cd ' . self::getPidFileFolder() . '; aPid=`ls`; for iPid in ${aPid}; do ' . whereis('ps') . ' --pid $iPid > /dev/null; if [ "$?" -eq 0 ]; then echo "$iPid"; fi; done;';
        $aPid = array_filter(explode("\n", shell_exec($sCmd)));

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
        $sCacheKey = Strings::seofy(__METHOD__);
        $iCacheTime = (int) Cache::getCache($sCacheKey);
        $iTimePassed = (time() - $iCacheTime);

        // Allow action if never run before or after expiry of the waiting time
        if (true === empty($iCacheTime) || $iTimePassed >= Config::get_MVC_PROCESS_KILL_ZOMBIES_AFTER_SECONDS())
        {
            $aZombie = self::getZombiePidFileArray();

            Log::write($aZombie, Config::get_MVC_LOG_FILE_PROCESS());


            foreach ($aZombie as $sPidFile)
            {
                $bUnlink = unlink($sPidFile);

                if (true === $bUnlink)
                {
                    Event::run('mvc.process.deleteZombieFiles.after', $sPidFile);
                }
            }

            Cache::saveCache($sCacheKey, time());
        }
    }

    /**
     * delete pidfile on shutdown
     * @return void
     * @throws \ReflectionException
     */
    public static function destruct()
    {
        $iPid = getmypid();

        if (true === is_int($iPid))
        {
            $sPidFile = self::getPidFileFolder() . $iPid;

            $bUnlink = (true === file_exists($sPidFile))
                ? unlink($sPidFile)
                : false
            ;

            if (true === $bUnlink)
            {
                Event::run('mvc.process.destruct.after', $iPid);
            }

            self::deleteZombieFiles();
        }
    }
}
