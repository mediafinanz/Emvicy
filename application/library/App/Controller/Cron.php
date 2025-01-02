<?php

namespace App\Controller;

use App\Controller;
use MVC\Config;
use MVC\DataType\DTRequestIn;
use MVC\DataType\DTRoute;
use MVC\Event;
use MVC\Lock;
use MVC\Log;
use MVC\Process;

class Cron extends Controller
{
    /**
     * @param \MVC\DataType\DTRequestIn $oDTRequestIn
     * @param \MVC\DataType\DTRoute     $oDTRoute
     * @throws \ReflectionException
     */
    public function __construct(DTRequestIn $oDTRequestIn, DTRoute $oDTRoute)
    {
        parent::__construct($oDTRequestIn, $oDTRoute);

        if (false === Config::get_MVC_CLI())
        {
            exit();
        }
    }

    /**
     * @param \MVC\DataType\DTRequestIn $oDTRequestCurrent
     * @param \MVC\DataType\DTRoute     $oDTRoute
     * @return void
     * @throws \ReflectionException
     */
    public function run(DTRequestIn $oDTRequestCurrent, DTRoute $oDTRoute)
    {
        // maintenance modus
        if (true === file_exists(Config::get_MVC_BASE_PATH() . '/.maintenance'))
        {
            Event::run(
                'app.controller.cron.run.maintenance',
                'maintenance: ' . date('Y-m-d H:i:s', filemtime(Config::get_MVC_BASE_PATH() . '/.maintenance'))
            );

            return false;
        }

        Lock::create();
        Event::run('mvc.view.render.off');
        Event::run('mvc.view.echoOut.off');

        $aCron = get(Config::MODULE()['cron'], array());

        if (Config::get_MVC_PROCESS_MAX_PROCESSES_OVERALL() < count($aCron))
        {
            Event::run(
                'app.controller.cron.run.warning',
                'WARNING' . "\t" . '(MVC_PROCESS_MAX_PROCESSES_OVERALL) ' . Config::get_MVC_PROCESS_MAX_PROCESSES_OVERALL() . ' < ' . count($aCron) . ' (number of CronJobs required)'
            );
        }

        foreach ($aCron as $sRoute)
        {
            $iPid = Process::callRouteAsync($sRoute);

            // did not work, there is no PID
            if (0 === $iPid)
            {
                continue;
            }

            // save pidfile
            Process::savePid($iPid, $sRoute);

            Event::run('app.controller.cron.run.after', 'pid: ' . $iPid . "\t" . $sRoute);
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function __destruct()
    {
        parent::__destruct();
        Event::run('app.controller.cron.__destruct');
    }
}