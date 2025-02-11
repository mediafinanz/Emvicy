<?php

namespace Emvicy;

use App\Controller\Queue;
use MVC\Config;
use MVC\Convert;
use MVC\DataType\DTRoute;
use MVC\Debug;
use MVC\Dir;
use MVC\Event;
use MVC\Lock;
use MVC\Process;
use MVC\Request;
use MVC\Route;
use MVC\Strings;
use MVC\Worker;

#------------------------------------

class Emvicy
{
    /**
     * @return void
     */
    public static function init()
    {
        self::argToGet();
        $sCmd1 = current(array_keys($_GET));

        if (method_exists('\Emvicy\Emvicy', $sCmd1))
        {
            self::$sCmd1();
            exit();
        }

        self::help();
    }

    /**
     * @param string $sCmd
     * @param bool   $bEcho
     * @return string
     */
    public static function shellExecute(string $sCmd = '', bool $bEcho = false)
    {
        if (true === $bEcho)
        {
            echo $sCmd;
            nl();
        }

        $sResult = trim((string) shell_exec($sCmd));

        if (true === $bEcho)
        {
            echo $sResult;
            nl();
        }

        return $sResult;
    }

    /**
     * @return void
     */
    protected static function argToGet()
    {
        array_shift($GLOBALS['argv']);
        parse_str(
            implode(
                '&',
                str_replace(':', '=', $GLOBALS['argv'])
            ),
            $_GET
        );
    }

    /**
     * @return bool
     */
    public static function get_force()
    {
        $sForce = substr(strtolower(get($_GET['force'], '')), 0, 1);

        if (true === in_array($sForce, array('1','y','j')))
        {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function get_primary()
    {
        $sPrimary = substr(strtolower(get($_GET['primary'], 'yes')), 0, 1);

        if (true === in_array($sPrimary, array('0','n')))
        {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public static function get_module()
    {
        $sModule = get($_GET['module'], '');
        $sModule = ucfirst(strtolower(preg_replace("/[^[:alpha:]]/ui", '', $sModule)));

        return $sModule;
    }

    /**
     * @param int $iLength
     * @return string
     */
    public static function get_stdin(int $iLength = 10)
    {
        return trim(fread(STDIN, $iLength));
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function clearcache()
    {
        $sDir = Config::get_MVC_CACHE_DIR() . '/*';
        $aPath = array_filter((array) glob($sDir));

        foreach ($aPath as $sPath)
        {
            if (true === is_file($sPath))
            {
                unlink($sPath);
            }
            elseif (true === is_dir($sPath))
            {
                $aSubFile = glob($sPath . '/{,.}[!.,!..]*', GLOB_MARK|GLOB_BRACE);
                array_map('unlink', $aSubFile);
                \MVC\Dir::remove($sPath);
            }
        }
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function cc()
    {
        self::clearcache();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function cronrun()
    {
        Process::callRoute(
            Config::get_MVC_CRON_ROUTE()
        );
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function cronlist()
    {
        $aCron = Config::MODULE()['cron'];
        ksort($aCron);

        echo "\n# Cron List\n";
        echo '# config: ' . Config::get_MVC_MODULE_PRIMARY_STAGING_CONFIG_DIR() . "/\n";

        echo "\n\n";
        echo str_pad('| No', 6, ' ')
             . str_pad('| Route', 120, ' ')
             . '|'
             . "\n"
        ;
        echo str_pad('|', 6, '-')
             . str_pad('|', 120, '-')
             . '|'
             . "\n"
        ;
        $iCnt = 1;

        foreach ($aCron as $sRoute)
        {
            echo str_pad('| ' . $iCnt, 6, ' ')
                 . str_pad('| ' . Strings::cutOff($sRoute, 114), 120, ' ')
                 . '|'
                 . "\n"
            ;

            $iCnt++;
        }

        echo "\n";
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function queueList()
    {
        $aQueue = Config::MODULE()['queue'];
        ksort($aQueue);

        echo "\n# Queue List\n";
        echo '# config: ' . Config::get_MVC_MODULE_PRIMARY_STAGING_CONFIG_DIR() . "\n";
        echo "\n\n";
        echo str_pad('| No', 6, ' ')
             . str_pad('| Job / Queue key ', 50, ' ')
             . str_pad('| Worker', 80, ' ')
             . '|'
             . "\n"
        ;
        echo str_pad('|', 6, '-')
             . str_pad('|', 50, '-')
             . str_pad('|', 80, '-')
             . '|'
             . "\n"
        ;
        $iCnt = 1;

        foreach ($aQueue as $sTopic => $aValue)
        {
            foreach ($aValue as $sKey => $sValue)
            {
                echo str_pad('| ' . $iCnt, 6, ' ')
                     . str_pad('| ' . $sKey, 50, ' ')
                     . str_pad('| ' . Strings::cutOff($sValue, 74), 80, ' ')
                     . '|'
                     . "\n"
                ;
                $iCnt++;
            }
        }

        echo "\n";
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function workerRun()
    {
        Process::callRoute(
            Config::get_MVC_QUEUE_RUN()
        );
    }

    /**
     * @param string $sClass
     * @param string $sModuleName
     * @return false|void
     * @throws \ReflectionException
     */
    public static function createWorker(string $sClass = '', string $sModuleName = '')
    {
        $sClass = ucfirst(trim($sClass));
        $sModuleName = self::createModuleName($sModuleName);

        if (true === empty($sModuleName) || true === empty($sClass))
        {
            return false;
        }

        if (false === file_exists(Config::get_MVC_MODULES_DIR() . '/' . $sModuleName))
        {
            $bPrimary = ((true === empty(get(self::modules(true)['PRIMARY']))) ? true : false);
            self::moduleCreate(
                bForce: true,
                bPrimary: $bPrimary,
                sModule: $sModuleName
            );
        }

        $sTargetWorkerFile = Config::get_MVC_MODULES_DIR() . '/' . $sModuleName . '/Model/Worker/' . $sClass . '.php';

        if (true === file_exists($sTargetWorkerFile))
        {
            echo str_pad('❌ Worker class already exists: ', 30, ' ') . $sTargetWorkerFile . "\n";
            echo 'Abort.';
            nl(2);

            return false;
        }

        echo str_pad('Worker class to be created:', 30, ' ') . $sTargetWorkerFile;
        nl();
        echo 'creating ...';
        nl();

        copy(
            Config::get_MVC_APPLICATION_INIT_DIR() . '/skeleton/Worker.phtml',
            $sTargetWorkerFile
        );

        // replace placeholder
        Emvicy::shellExecute(whereis('grep') . ' -rl "{module}" ' . $sTargetWorkerFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{module}/' . $sModuleName . '/g"'
        );
        Emvicy::shellExecute(whereis('grep') . ' -rl "{class}" ' . $sTargetWorkerFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{class}/' . $sClass . '/g"'
        );

        echo '✔ Worker class created: ' . $sTargetWorkerFile;nl(2);

        echo '🛈 path to this Worker class:';nl(1);
        echo "\033[0;37m" . str_repeat('~', 3) . 'php' . "\033[0m";nl();
        echo "\033[0;36m" . '\\' . $sModuleName . '\Model\Worker\\' . $sClass . "\033[0m";nl();
        echo "\033[0;37m" . str_repeat('~', 3) . "\033[0m";nl(3);
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function clearlog()
    {
        $sDir = Config::get_MVC_LOG_FILE_DIR() . '*';
        array_map('unlink', array_filter((array) glob($sDir)));
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function cl()
    {
        self::clearlog();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function clearsession()
    {
        $sDir = Config::get_MVC_SESSION_PATH() . '/*';
        array_map('unlink', array_filter((array) glob($sDir)));
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function cs()
    {
        self::clearsession();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function cleartemp()
    {
        $sDir = Config::get_MVC_SMARTY_TEMPLATE_CACHE_DIR(). '/*';
        array_map('unlink', array_filter((array) glob($sDir)));
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function ct()
    {
        self::cleartemp();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function clearall()
    {
        self::clearcache();
        self::clearlog();
        self::clearsession();
        self::cleartemp();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function ca()
    {
        self::clearall();
    }

    /**
     * @param bool|null $bForce
     * @param bool|null $bPrimary
     * @param string    $sModule
     * @return false|void
     * @throws \ReflectionException
     */
    public static function moduleCreate(?bool $bForce = null, ?bool $bPrimary = null, string $sModule = '')
    {
        $bForce = (false === isset($bForce)) ? self::get_force() : $bForce;
        $sModule = self::createModuleName($sModule);
        $bPrimary = (false === isset($bPrimary)) ? self::get_primary() : $bPrimary;

        if (true === empty($sModule))
        {
            return false;
        }

        echo str_pad('Module to be created:', 30, ' ') . $sModule;
        nl();
        echo str_pad('Should be a primary module:', 30, ' ') . Convert::boolToString($bPrimary);
        nl();

        if (false === $bForce)
        {
            echo "Accept: (y)/n";
            nl();
            $sStdin = strtolower(self::get_stdin(1));

            echo str_pad('Input:', 30, ' ') . $sStdin;
            nl();

            if ($sStdin !== '' && $sStdin !== 'y')
            {
                echo 'Abort.';
                nl();
                return false;
            }
        }

        echo 'creating...';
        nl();

        $oInstall = \Emvicy\Install::run(
            $sModule,
            $GLOBALS['aConfig'],
            $bPrimary
        );
    }

    /**
     * @param string $sController
     * @param string $sModuleName
     * @return false|void
     * @throws \ReflectionException
     */
    public static function moduleCreateController(string $sController = '', string $sModuleName = '')
    {
        $sController = ucfirst(trim($sController));
        $sModuleName = self::createModuleName($sModuleName);

        if (true === empty($sModuleName) || true === empty($sController))
        {
            return false;
        }

        if (false === file_exists(Config::get_MVC_MODULES_DIR() . '/' . $sModuleName))
        {
            $bPrimary = ((true === empty(get(self::modules(true)['PRIMARY']))) ? true : false);
            self::moduleCreate(
                bForce: true,
                bPrimary: $bPrimary,
                sModule: $sModuleName
            );
        }

        $sTargetControllerFile = Config::get_MVC_MODULES_DIR() . '/' . $sModuleName . '/Controller/' . $sController . '.php';

        if (true === file_exists($sTargetControllerFile))
        {
            echo str_pad('❌ Controller already exists: ', 30, ' ') . $sTargetControllerFile . "\n";
            echo 'Abort.';
            nl();

            return false;
        }

        echo str_pad('Controller to be created:', 30, ' ') . $sTargetControllerFile;
        nl();
        echo 'creating...';
        nl();

        copy(
            Config::get_MVC_APPLICATION_INIT_DIR() . '/skeleton/Controller.phtml',
            $sTargetControllerFile
        );

        // replace placeholder
        Emvicy::shellExecute(whereis('grep') . ' -rl "{controller}" ' . $sTargetControllerFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{controller}/' . $sController . '/g"'
        );

        echo '✔ Controller created: ' . $sTargetControllerFile;
        nl();
    }

    /**
     * @param string $sModel
     * @param string $sModuleName
     * @return false|void
     * @throws \ReflectionException
     */
    public static function moduleCreateModel(string $sModel = '', string $sModuleName = '')
    {
        $sModel = ucfirst(trim($sModel));
        $sModuleName = self::createModuleName($sModuleName);

        if (true === empty($sModuleName) || true === empty($sModel))
        {
            return false;
        }

        if (false === file_exists(Config::get_MVC_MODULES_DIR() . '/' . $sModuleName))
        {
            $bPrimary = ((true === empty(get(self::modules(true)['PRIMARY']))) ? true : false);
            self::moduleCreate(
                bForce: true,
                bPrimary: $bPrimary,
                sModule: $sModuleName
            );
        }

        $sTargetModelFile = Config::get_MVC_MODULES_DIR() . '/' . $sModuleName . '/Model/' . $sModel . '.php';

        if (true === file_exists($sTargetModelFile))
        {
            echo str_pad('❌ Model already exists: ', 30, ' ') . $sTargetModelFile . "\n";
            echo 'Abort.';
            nl();

            return false;
        }

        echo str_pad('Model to be created:', 30, ' ') . $sTargetModelFile;
        nl();
        echo 'creating...';
        nl();

        copy(
            Config::get_MVC_APPLICATION_INIT_DIR() . '/skeleton/Model.phtml',
            $sTargetModelFile
        );

        // replace placeholder
        Emvicy::shellExecute(whereis('grep') . ' -rl "{module}" ' . $sTargetModelFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{module}/' . $sModuleName . '/g"'
        );
        Emvicy::shellExecute(whereis('grep') . ' -rl "{model}" ' . $sTargetModelFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{model}/' . $sModel . '/g"'
        );

        echo '✔ Model created: ' . $sTargetModelFile;
        nl();
    }

    /**
     * @param string $sView
     * @param string $sModuleName
     * @return false|void
     * @throws \ReflectionException
     */
    public static function moduleCreateView(string $sView = '', string $sModuleName = '')
    {
        $sView = ucfirst(trim($sView));
        $sModuleName = self::createModuleName($sModuleName);

        if (true === empty($sModuleName) || true === empty($sView))
        {
            return false;
        }

        if (false === file_exists(Config::get_MVC_MODULES_DIR() . '/' . $sModuleName))
        {
            $bPrimary = ((true === empty(get(self::modules(true)['PRIMARY']))) ? true : false);
            self::moduleCreate(
                bForce: true,
                bPrimary: $bPrimary,
                sModule: $sModuleName
            );
        }

        $sTargetViewFile = Config::get_MVC_MODULES_DIR() . '/' . $sModuleName . '/View/' . $sView . '.php';

        if (true === file_exists($sTargetViewFile))
        {
            echo str_pad('❌ View already exists: ', 30, ' ') . $sTargetViewFile . "\n";
            echo 'Abort.';
            nl();

            return false;
        }

        echo str_pad('View to be created:', 30, ' ') . $sTargetViewFile;
        nl();
        echo 'creating...';
        nl();

        copy(
            Config::get_MVC_APPLICATION_INIT_DIR() . '/skeleton/View.phtml',
            $sTargetViewFile
        );

        // replace placeholder
        Emvicy::shellExecute(whereis('grep') . ' -rl "{module}" ' . $sTargetViewFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{module}/' . $sModuleName . '/g"'
        );
        Emvicy::shellExecute(whereis('grep') . ' -rl "{view}" ' . $sTargetViewFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{view}/' . $sView . '/g"'
        );

        echo '✔ View created: ' . $sTargetViewFile;
        nl();
    }

    //------------------------------------------------------------------------------------------------------------------

    /**
     * @param string $sTable
     * @param string $sModuleName
     * @return false|void
     * @throws \ReflectionException
     */
    public static function dbCreateTableClass(string $sTable = '', string $sModuleName = '')
    {
        $sTable = ucfirst(trim($sTable));
        $sTraitTable = 'Trait' . $sTable;
        $sModuleName = self::createModuleName($sModuleName);

        if (true === empty($sModuleName) || true === empty($sTable))
        {
            return false;
        }

        if (false === file_exists(Config::get_MVC_MODULES_DIR() . '/' . $sModuleName))
        {
            $bPrimary = ((true === empty(get(self::modules(true)['PRIMARY']))) ? true : false);
            self::moduleCreate(
                bForce: true,
                bPrimary: $bPrimary,
                sModule: $sModuleName
            );
        }

        $sTargetTableFile = Config::get_MVC_MODULES_DIR() . '/' . $sModuleName . '/Model/DB/Table/' . $sTable . '.php';
        $sTargetTraitTableFile = Config::get_MVC_MODULES_DIR() . '/' . $sModuleName . '/Model/DB/Collection/' . $sTraitTable . '.php';

        if (true === file_exists($sTargetTableFile))
        {
            echo str_pad('❌ Table class already exists: ', 30, ' ') . $sTargetTableFile . "\n";
            echo 'Abort.';
            nl(2);

            return false;
        }

        echo str_pad('Table class to be created:', 30, ' ') . $sTargetTableFile;
        nl();
        echo 'creating ...';
        nl();

        copy(
            Config::get_MVC_APPLICATION_INIT_DIR() . '/skeleton/DBTable.phtml',
            $sTargetTableFile
        );

        // replace placeholder
        Emvicy::shellExecute(whereis('grep') . ' -rl "{module}" ' . $sTargetTableFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{module}/' . $sModuleName . '/g"'
        );
        Emvicy::shellExecute(whereis('grep') . ' -rl "{table}" ' . $sTargetTableFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{table}/' . $sTable . '/g"'
        );

        echo '✔ Table class created: ' . $sTargetTableFile;nl();

        copy(
            Config::get_MVC_APPLICATION_INIT_DIR() . '/skeleton/TraitTable.phtml',
            $sTargetTraitTableFile
        );

        // replace placeholder
        Emvicy::shellExecute(whereis('grep') . ' -rl "{module}" ' . $sTargetTraitTableFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{module}/' . $sModuleName . '/g"'
        );
        Emvicy::shellExecute(whereis('grep') . ' -rl "{table}" ' . $sTargetTraitTableFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{table}/' . $sTable . '/g"'
        );

        echo '✔ TraitTable class created: ' . $sTargetTraitTableFile;nl(2);

        echo '🛈 use this command to access the table directly:';nl(1);
        echo "\033[0;37m" . str_repeat('~', 3) . 'php' . "\033[0m";nl();
        echo "\033[0;36m" . '\\' . $sModuleName . '\Model\DB\Table\\' . $sTable . '::init()' . "\033[0m";nl();
        echo "\033[0;37m" . str_repeat('~', 3) . "\033[0m";nl(3);

        return true;
    }

    /**
     * @param string $sClass
     * @param string $sModuleName
     * @return false|void
     * @throws \ReflectionException
     */
    public static function dbCreateTableClassCollection(string $sClass = '', string $sModuleName = '')
    {
        $sClass = ucfirst(trim($sClass));
        $sModuleName = self::createModuleName($sModuleName);

        if (true === empty($sModuleName) || true === empty($sClass))
        {
            return false;
        }

        // make sure it has Prefix uppercase 'DB'
        if (false === ('dbc' === substr(strtolower($sClass), 0, 2)))
        {
            $sClass = 'DB' . ucfirst($sClass);
        }

        if (false === file_exists(Config::get_MVC_MODULES_DIR() . '/' . $sModuleName))
        {
            $bPrimary = ((true === empty(get(self::modules(true)['PRIMARY']))) ? true : false);
            self::moduleCreate(
                bForce: true,
                bPrimary: $bPrimary,
                sModule: $sModuleName
            );
        }

        $sTargetTableFile = Config::get_MVC_MODULES_DIR() . '/' . $sModuleName . '/Model/DB/Collection/' . $sClass . '.php';

        if (true === file_exists($sTargetTableFile))
        {
            echo str_pad('❌ DB table collection class already exists: ', 30, ' ') . $sTargetTableFile . "\n";
            echo 'Abort.';
            nl(2);

            return false;
        }

        echo str_pad('DB table collection class to be created:', 30, ' ') . $sTargetTableFile;
        nl();
        echo 'creating ...';
        nl();

        copy(
            Config::get_MVC_APPLICATION_INIT_DIR() . '/skeleton/DBCollection.phtml',
            $sTargetTableFile
        );

        // replace placeholder
        Emvicy::shellExecute(whereis('grep') . ' -rl "{module}" ' . $sTargetTableFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{module}/' . $sModuleName . '/g"'
        );
        Emvicy::shellExecute(whereis('grep') . ' -rl "{class}" ' . $sTargetTableFile . ' | '
                             . whereis('xargs') . ' '
                             . whereis('sed') . ' -i "s/{class}/' . $sClass . '/g"'
        );

        echo '✔ DB table collection class created: ' . $sTargetTableFile;nl(2);

        echo '🛈 use this command to access DB table collection class and its tables:';nl(1);
        echo "\033[0;37m" . str_repeat('~', 3) . 'php' . "\033[0m";nl();
        echo "\033[0;36m" . '\\' . $sModuleName . '\Model\DB\Collection\\' . $sClass . '::use()' . "\033[0m";nl();
        echo "\033[0;37m" . str_repeat('~', 3) . "\033[0m";nl(3);
    }

    /**
     * php emvicy serve
     * @return void
     * @throws \ReflectionException
     */
    public static function serve()
    {
        $sCmd = PHP_BINARY . " -S " . Config::get_MVC_PHP_SERVER() . " -t " . \MVC\Config::get_MVC_WEB_ROOT() . '/public/';
        echo $sCmd;
        hr();
        self::shellExecute($sCmd);
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function s()
    {
        self::serve();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function lint(string $sModule = '')
    {
        $sPath = \MVC\Config::get_MVC_BASE_PATH();

        if (false === empty($sModule))
        {
            $sPath = \MVC\Config::get_MVC_MODULES_DIR() . '/' . $sModule;
        }
        if (false === empty(self::get_module()))
        {
            $sPath = \MVC\Config::get_MVC_MODULES_DIR() . '/' . self::get_module();
        }

        if (false === file_exists($sPath))
        {
            echo 'file does not exist: `' . $sPath . '`' . "\n";
            exit();
        }

        $sCmd = whereis('find') . ' ' . $sPath . ' -type f -name "*.php" '
                . ' -exec ' . PHP_BINARY . ' -l {} \; 2>&1 '
                . '| (! ' . whereis('grep') . ' -v "errors detected")';
        $sResult = self::shellExecute($sCmd, false);
        $aMessage = preg_split("@\n@", $sResult, -1, PREG_SPLIT_NO_EMPTY);

        if (true === empty(get($sResult, '')))
        {
            self::response(true);
        }
        else
        {
            self::response(false, $aMessage);
        }
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function l()
    {
        self::lint();
    }

    /**
     * @param bool   $bSuccess
     * @param array  $aMessage
     * @return void
     */
    public static function response(bool $bSuccess = false, array $aMessage = array())
    {
        $aResponse = array(
            'bSuccess' => $bSuccess,
            'aMessage' => $aMessage,
        );

        echo json_encode($aResponse);
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function update()
    {
        $xGit = whereis('git');

        UPDATE_FRAMEWORK: {

            if (false === empty($xGit))
            {
                $sCmd = $xGit . ' pull';
                self::shellExecute($sCmd, true);
            }

            $sCmd = 'cd ' . Config::get_MVC_APPLICATION_PATH() . '; ' . PHP_BINARY . ' composer.phar update;';
            self::shellExecute($sCmd, true);
        }

        UPDATE_MODULES_VENDOR_LIBS: {

            $aModule = preg_grep('/^([^.])/', scandir($GLOBALS['aConfig']['MVC_MODULES_DIR']));

            foreach ($aModule as $sModule)
            {
                $sModuleConfigPathAbs = $GLOBALS['aConfig']['MVC_MODULES_DIR'] . '/' . $sModule . '/etc/config/' . $sModule;
                $sComposerJson = $sModuleConfigPathAbs . '/composer.json';

                if (false === empty($xGit))
                {
                    $sCmd = 'cd ' . $GLOBALS['aConfig']['MVC_MODULES_DIR'] . '/' . $sModule . '; ' . $xGit . ' pull';
                    self::shellExecute($sCmd, true);
                }

                if (true === file_exists($sComposerJson))
                {
                    $sCmd = 'cd ' . $sModuleConfigPathAbs . '; ' . PHP_BINARY . ' ' . Config::get_MVC_APPLICATION_PATH() . '/composer.phar update;';
                    self::shellExecute($sCmd, true);
                }
            }
        }
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function up()
    {
        self::update();
    }

    /**
     * @example php emvicy log id=2023070711413964a7ddd36254a nl=true
     * @required grep, awk, sed
     * @param string $sLogId
     * @param bool   $bNewline
     * @return void
     * @throws \ReflectionException
     */
    public static function log(string $sLogId = '', bool $bNewline = true)
    {
        if (true === empty($sLogId))
        {
            $sLogId = (false === empty(get($_GET['id'])))? get($_GET['id']) : Config::get_MVC_UNIQUE_ID();
        }

        if (true === empty($bNewline))
        {
            $bNewline = (false === empty(get($_GET['nl'])))
                ? (boolean) get($_GET['nl'])
                : false
            ;
        }

        // sort with awk on 8. field (Emvicy Log increment number)
        $sCmd = "cd " . Config::get_MVC_LOG_FILE_DIR() . "; "
                . whereis('grep') .  " " . $sLogId . " *.log "
                . "| " . whereis('awk') . " '{ print $0 | \"" . whereis('sort') . " -nk8\"}'";

        // replace string \n in output by a real linebreak
        (true === $bNewline) ? $sCmd.= " | " . whereis('sed') . " -E 's/" . '\\\n' . "/" . '\n' . "/g'" : false;

        hr();
        echo $sCmd;
        hr();
        $sLog = trim((string) (shell_exec($sCmd)));

        nl();
        echo $sLog;
        nl(2);
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function version()
    {
        echo Config::get_MVC_VERSION();
        nl();
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function v()
    {
        self::version();
    }

    /**
     * @return void
     */
    public static function md(bool $bReturn = false)
    {
        self::modules($bReturn);
    }

    /**
     * @return void
     */
    public static function modules(bool $bReturn = false)
    {
        $aModuleSet = get($GLOBALS['aConfig']['MVC_MODULE_SET'], array());

        if (true === $bReturn)
        {
            return $aModuleSet;
        }

        echo json_encode($aModuleSet) . "\n\n";
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function dt()
    {
        self::datatype();
    }

    /**
     * @param string $sParamModule
     * @return void
     * @throws \ReflectionException
     */
    public static function datatype(string $sParamModule = '')
    {
        $sModuleRequested = (false === empty($sParamModule)) ? $sParamModule : get($_GET['module']);

        \MVC\Cache::init(\MVC\Config::get_MVC_CACHE_CONFIG());
        \MVC\Cache::autoDeleteCache('DataType', 0);

        echo "\n";

        foreach ($GLOBALS['aConfig']['MVC_MODULE_SET'] as $sType => $aModule)
        {
            foreach ($aModule as $sModule)
            {
                // skip if a certain module was requested
                if (false === is_null($sModuleRequested) && $sModule !== $sModuleRequested)
                {
                    continue;
                }

                echo 'Module: `' . $sModule . '`' . "\n";

                $sDataTypeConfigFile = Config::get_MVC_MODULES_DIR() . '/' . $sModule . '/etc/config/' . $sModule . '/config/_datatype.php';

                if (true === file_exists($sDataTypeConfigFile))
                {
                    (false === isset($aConfig)) ? $aConfig = $GLOBALS['aConfig'] : false;
                    require $sDataTypeConfigFile;
                    (true === isset($aDataType)) ? $GLOBALS['aConfig']['MODULE'][$sModule]['DATATYPE'] = $aDataType : false;

                    if (true === is_array($aDataType))
                    {
                        echo '- generating Datatype Classes for module: `' . $sModule . '`, ';
                        echo 'directory: `' . get($aDataType['dir']) . '` ... ';
                        \MVC\Generator\DataType::create()->initConfigArray($aDataType);
                        echo "done ✔\n";
                    }
                }
                else
                {
                    echo '- skip (nothing to do)' . "\n";
                }

                echo str_repeat('-', 120) . "\n";
            }
        }

        echo "\n";
    }

    /**
     * @example php emvicy test -c modules/Foo/Test/
     * @param string $sModule
     * @return void
     * @throws \ReflectionException
     */
    public static function test(string $sModule = '')
    {
        array_shift($GLOBALS['argv']);
        $sArg = (true === empty($sModule)) ? implode(' ', $GLOBALS['argv']) : $sModule;
        $sCmd = Config::get_MVC_BIN_PHP_BINARY() . ' ' . Config::get_MVC_APPLICATION_PATH() . "/vendor/bin/phpunit" . ' ' . $sArg;
        self::shellExecute($sCmd, true);
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function rt()
    {
        self::routes();
    }

    /**
     * @param string $sOption
     * @param bool   $bReturn
     * @return false|string|void
     * @throws \ReflectionException
     */
    public static function routes(string $sOption = '', bool $bReturn = false)
    {
        if (false === empty($sOption))
        {
            $sArg = $sOption;
        }
        elseif(true === isset($GLOBALS['argv']))
        {
            array_shift($GLOBALS['argv']);
            $sArg = implode(' ', $GLOBALS['argv']);
        }

        echo "\n# Route List";

        Route::init();
        $aIndex = Route::$aMethodRoute;

        if (true === empty($aIndex))
        {
            echo 'no routes found' . "\n";
            return false;
        }

        if (true === $bReturn)
        {
            ob_start();
        }

        if ('list' === $sArg)
        {
            $iMaxLengthRoute = max(array_map('strlen', Route::getIndices())) + 6;
            $iCnt = 1;
            $aRouteList = array();

            foreach ($aIndex as $sMethod => $aRoute)
            {
                /** @var DTRoute $oDTRoute */
                foreach ($aRoute as $sRoute => $oDTRoute)
                {
                    // skip faulty ones
                    if (null === $oDTRoute || false === in_array($sRoute, array_keys(Route::$aRoute)))
                    {
                        continue;
                    }

                    $aRouteList[] = [
                        'sMethod' => $sMethod,
                        'aMethodsAssigned' => Route::$aRoute[$sRoute]->get_methodsAssigned(),
                        'sRoute' => $sRoute,
                        'sTarget' => $oDTRoute->get_class() . '::' .$oDTRoute->get_method(),
                        'sTag' => $oDTRoute->get_tag(),
                    ];
                }
            }
            array_multisort(
                array_column($aRouteList, 'sRoute'),
                SORT_ASC,
                $aRouteList
            );

            echo "\n\n";
            echo str_pad('| No', 6, ' ')
                 . str_pad('| Method', 10, ' ')
                 . str_pad('| Methods assigned', 30, ' ')
                 . str_pad('| Route', $iMaxLengthRoute, ' ')
                 . str_pad('| Target', 60, ' ')
                 . str_pad('| Tag', $iMaxLengthRoute, ' ')
                 . '|'
                . "\n"
            ;
            echo str_pad('|', 6, '-')
                 . str_pad('|', 10, '-')
                 . str_pad('|', 30, '-')
                 . str_pad('|', $iMaxLengthRoute, '-')
                 . str_pad('|', 60, '-')
                 . str_pad('|', $iMaxLengthRoute, '-')
                 . '|'
                . "\n"
            ;

            foreach ($aRouteList as $aSet)
            {
                echo str_pad('| ' . $iCnt, 6, ' ')
                     . str_pad('| ' . $aSet['sMethod'], 10, ' ')
                     . str_pad('| ' . implode(',' , $aSet['aMethodsAssigned']), 30, ' ')
                     . str_pad('| ' . Strings::cutOff($aSet['sRoute'], ($iMaxLengthRoute - 6)), $iMaxLengthRoute, ' ')
                     . str_pad('| ' . $aSet['sTarget'], 60, ' ')
                     . str_pad('| ' . $aSet['sTag'], $iMaxLengthRoute, ' ')
                     . '|'
                    . "\n"
                ;
                $iCnt++;
            }
        }
        elseif ('json' === $sArg)
        {
            echo json_encode($aIndex);
        }
        else
        {
            Debug::varExport($aIndex);
        }
        nl();

        if (true === $bReturn)
        {
            $sList = ob_get_contents();
            ob_end_clean();

            return $sList;
        }
    }

    /**
     * @param string $sOption
     * @param bool $bReturn
     * @return false|string|void
     * @throws \ReflectionException
     */
    public static function eventListener(string $sOption = '', bool $bReturn = false)
    {
        if (false === empty($sOption))
        {
            $sArg = $sOption;
        }
        elseif(true === isset($GLOBALS['argv']))
        {
            array_shift($GLOBALS['argv']);
            $sArg = implode(' ', $GLOBALS['argv']);
        }

        (false === isset(Config::get_MVC_EVENT()['BIND'])) ? Event::init() : false;
        $aBonded = Config::get_MVC_EVENT()['BIND'];
        ksort($aBonded);

        if (true === $bReturn)
        {
            ob_start();
        }

        echo "\n# Event List";
        echo "\n\n";
        echo str_pad('| No', 6, ' ')
            . str_pad('| Event', 60, ' ')
            . str_pad('| Listener Place (Event bonded at)', 60, ' ')
            . str_pad('| Listener Closure', 180, ' ')
            . '|'
            . "\n"
        ;
        echo str_pad('|', 6, '-')
            . str_pad('|', 60, '-')
            . str_pad('|', 60, '-')
            . str_pad('|', 180, '-')
            . '|'
            . "\n"
        ;
        $iCnt = 1;

        foreach ($aBonded as $sEvent => $aBind)
        {
            foreach ($aBind as $sBind)
            {
                $sBind = Strings::tidy($sBind);
                list($sText, $sSource) = array_map('trim', explode('--> called in:', $sBind));

                list($sGarbage, $sClosure) = array_map('trim', explode('function', $sText));
                $sClosure = 'function' . Strings::tidy($sClosure);

                echo str_pad('| ' . $iCnt, 6, ' ')
                    . str_pad('| ' . Strings::cutOff($sEvent, 54), 60, ' ')
                    . str_pad('| ' . Strings::cutOff($sSource, 54), 60, ' ')
                    . str_pad('| ' . Strings::cutOff($sClosure, 174), 180, ' ')
                    . '|'
                    . "\n"
                ;
            }

            $iCnt++;
        }

        echo "\n";

        if (true === $bReturn)
        {
            $sList = ob_get_contents();
            ob_end_clean();

            return $sList;
        }
    }

    /**
     * @param string $sModule
     * @return string
     */
    public static function createModuleName(string $sModule)
    {
        return ucfirst(trim((true === empty($sModule)) ? self::get_module() : $sModule));
    }
}