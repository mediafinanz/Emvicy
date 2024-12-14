<?php

/**
 * @name $CdmController
 */
namespace MVC;

use App\Controller;
use MVC\DataType\DTRequestCurrent;
use MVC\DataType\DTRoute;

class Cron extends Controller
{
    /**
     * @param \MVC\DataType\DTRequestCurrent $oDTRequestCurrent
     * @param \MVC\DataType\DTRoute          $oDTRoute
     * @throws \ReflectionException
     */
    public function __construct(DTRequestCurrent $oDTRequestCurrent, DTRoute $oDTRoute)
    {
        parent::__construct($oDTRequestCurrent, $oDTRoute);

        if (false === Request::isCli())
        {
            exit();
        }
    }

    /**
     * @param \MVC\DataType\DTRequestCurrent $oDTRequestCurrent
     * @param \MVC\DataType\DTRoute          $oDTRoute
     * @return void
     * @throws \ReflectionException
     */
    public function run(DTRequestCurrent $oDTRequestCurrent, DTRoute $oDTRoute)
    {
        // maintenance modus
        if (true === file_exists(Config::get_MVC_BASE_PATH() . '/.maintenance'))
        {
            Log::write('maintenance: ' . date('Y-m-d H:i:s', filemtime(Config::get_MVC_BASE_PATH() . '/.maintenance')), 'cron.log');

            return false;
        }

        Lock::create();

        Event::run('mvc.view.render.off');
        Event::run('mvc.view.echoOut.off');

        $aCron = get(Config::MODULE()['cron'], array());

        if (Config::MODULE()['queue']['config']['iMaxProcessesOverall'] < count($aCron))
        {
            Log::write('WARNING' . "\t" . '(iMaxProcessesOverall) ' . Config::MODULE()['queue']['config']['iMaxProcessesOverall'] . ' < ' . count($aCron) . ' (number of CronJobs required)', 'cron.log');
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

            Log::write('pid: ' . $iPid . "\t" . $sRoute, 'cron.log');
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function __destruct()
    {
        Event::run('mvc.cron.__destruct');
    }
}