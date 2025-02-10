<?php


use MVC\Config;

$sColCmd = "\033[0;36m";
$sColOff = "\033[0m";
#-----------------------------

$oSymfonyComponentConsoleApplication = new \Symfony\Component\Console\Application('Emvicy', '2.x');

#---

$oSymfonyComponentConsoleApplication
    ->register('version')
    ->setAliases(['v'])
    ->setDescription($sColCmd . "php emvicy version" . $sColOff . ' => displays Emvicy version')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::version();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

$oSymfonyComponentConsoleApplication
    ->register('serve')
    ->setAliases(['s'])
    ->setDescription($sColCmd . "php emvicy serve" . $sColOff . ' => provides a local php-builtIn server')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::serve();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# cron

$oSymfonyComponentConsoleApplication
    ->register('cron:run')
    ->setAliases(['crr'])
    ->setDescription($sColCmd . "php emvicy cron:run" . $sColOff . ' => runs emvicy cron configuration')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::cronrun();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('cron:list')
    ->setAliases(['crl'])
    ->setDescription($sColCmd . "php emvicy cron:list" . $sColOff . ' => list cron configuration')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::cronlist();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# queue

$oSymfonyComponentConsoleApplication
    ->register('queue:list')
    ->setAliases(['ql'])
    ->setDescription($sColCmd . "php emvicy queue:list" . $sColOff . ' => list "Queue Key <=> Worker" configuration')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::queueList();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('queue:worker')
    ->setAliases(['qw'])
    ->setDescription($sColCmd . "php emvicy queue:worker Bar Foo" . $sColOff . ' => creates a Worker class `Bar` in the given module `Foo`.')
    ->addArgument('sClass', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('sModuleName', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::queueCreateWorker(
            sClass: $oInputInterface->getArgument('sClass'),
            sModuleName: $oInputInterface->getArgument('sModuleName'));
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# clear

$oSymfonyComponentConsoleApplication
    ->register('clear:cache')
    ->setAliases(['cc'])
    ->setDescription($sColCmd . "php emvicy clear:cache" . $sColOff . ' => clears all contents of cache directory: - /application/cache/')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::clearcache();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('clear:log')
    ->setAliases(['cl'])
    ->setDescription($sColCmd . "php emvicy clear:log" . $sColOff  . ' => clears all contents of log directory: - /application/log/')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::clearlog();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('clear:session')
    ->setAliases(['cs'])
    ->setDescription($sColCmd . "php emvicy clear:session" . $sColOff . ' => clears all contents of session directory: - /application/session/')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::clearsession();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('clear:temp')
    ->setAliases(['ct'])
    ->setDescription($sColCmd . "php emvicy clear:temp" . $sColOff . ' => clears all contents of templates_c directory: - /application/templates_c/')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::cleartemp();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('clear:all')
    ->setAliases(['ca'])
    ->setDescription($sColCmd . "php emvicy clear:all" . $sColOff . ' => clears all contents of temp directories: - `/application/cache/`, - /application/log/, - /application/session/, - /application/templates_c/')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::clearall();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# datatype

$oSymfonyComponentConsoleApplication
    ->register('datatype:all')
    ->setAliases(['dt'])
    ->setDescription($sColCmd . "php emvicy datatype:all" . $sColOff . ' => creates datatype classes for all modules')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::datatype();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('datatype:module')
    ->setAliases(['dtm'])
    ->setDescription($sColCmd . "php emvicy datatype:module Foo" . $sColOff . ' => creates datatype classes for module `Foo`')
    ->addArgument('module', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::datatype($oInputInterface->getArgument('module'));
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# routes

$oSymfonyComponentConsoleApplication
    ->register('routes:array')
    ->setAliases(['rt'])
    ->setDescription($sColCmd . "php emvicy routes:array" . $sColOff  . ' => lists available routes as array/var_export')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::routes();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('routes:json')
    ->setAliases(['rtj'])
    ->setDescription($sColCmd . "php emvicy routes:json" . $sColOff . ' => lists available routes in JSON format')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::routes('json');
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('routes:list')
    ->setAliases(['rtl'])
    ->setDescription($sColCmd . "php emvicy routes:list" . $sColOff . ' => lists available routes in a markdown table')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::routes('list');
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------

$oSymfonyComponentConsoleApplication
    ->register('update')
    ->setAliases(['up'])
    ->setDescription($sColCmd . "php emvicy update" . $sColOff . ' => updates: - Emvicy Framework and its vendor installed libraries, - vendor installed libraries of existing modules. requires: - Emvicy installed via `git clone` command, - bash, git')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::update();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

$oSymfonyComponentConsoleApplication
    ->register('log')
    ->setDescription($sColCmd . "php emvicy log 2023070711413964a7ddd36254a" . $sColOff . " => aggregates a unique log extract on STDOUT from all existing logfiles (*.log) matching to given logId `2023070711413964a7ddd36254a`")
    ->addArgument('id', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('nl', \Symfony\Component\Console\Input\InputArgument::OPTIONAL)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::log(
            $oInputInterface->getArgument('id'),
            ((true === is_bool($oInputInterface->getArgument('nl')) ? $oInputInterface->getArgument('nl') : false))
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# lint

$oSymfonyComponentConsoleApplication
    ->register('lint:all')
    ->setAliases(['la'])
    ->setDescription($sColCmd . "php emvicy lint:all" . $sColOff . ' => checks the whole application on errors and returns a parsable JSON containing bool `bSuccess` and array `aMessage`.')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::lint();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('lint:module')
    ->setAliases(['lm'])
    ->setDescription($sColCmd . "php emvicy lint:module Foo" . $sColOff . " => checks module `Foo` on errors and returns a parsable JSON containing bool `bSuccess` and array `aMessage`.")
    ->addArgument('module', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::lint(
            $oInputInterface->getArgument('module')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# test

$oSymfonyComponentConsoleApplication
    ->register('test:module')
    ->setAliases(['t'])
    ->setDescription($sColCmd . "php emvicy test:module modules/Foo/Test/" . $sColOff . ' => runs modules phpunit test in module `Foo`')
    ->addArgument('module', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::test(
            '-c ' . $oInputInterface->getArgument('module')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# module

$oSymfonyComponentConsoleApplication
    ->register('module:add')
    ->setAliases(['mda'])
    ->setDescription(
        $sColCmd . "\tphp emvicy module:add Foo primary" . $sColOff . " => creates primary module `Foo`\n" .
        "\t\t\t\t" . $sColCmd . "php emvicy module:add Bar secondary" . $sColOff . " => creates secondary module `Bar`\n"
    )
    ->addArgument('sModule', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('sModuleType', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {

        $sModuleType = $oInputInterface->getArgument('sModuleType');
        $bPrimary = (str_starts_with(strtolower(get($sModuleType, '')), 'p')) ? true : false;

        \Emvicy\Emvicy::moduleCreate(
            bForce: true,
            bPrimary: $bPrimary,
            sModule: $oInputInterface->getArgument('sModule')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('module:list')
    ->setAliases(['mdl'])
    ->setDescription($sColCmd . "php emvicy module:list" . $sColOff . ' => lists available modules in JSON format. Example: {"SECONDARY":{"0":"Captcha","1":"DB","2":"Email","4":"Idolon","5":"InfoService","6":"OpenApi"},"PRIMARY":["Emvicy"]}')
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::modules();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('module:controller')
    ->setAliases(['mdc'])
    ->setDescription($sColCmd . "php emvicy module:controller Bar Foo" . $sColOff . " => creates controller `Bar` in the given module `Foo`. ")
    ->addArgument('sController', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('sModuleName', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::moduleCreateController(
            sController: $oInputInterface->getArgument('sController'),
            sModuleName: $oInputInterface->getArgument('sModuleName')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('module:model')
    ->setAliases(['mdm'])
    ->setDescription($sColCmd . "php emvicy module:model Bar Foo" . $sColOff . " => creates Model `Bar` in the given module `Foo`. ")
    ->addArgument('sModel', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('sModuleName', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::moduleCreateModel(
            sModel: $oInputInterface->getArgument('sModel'),
            sModuleName: $oInputInterface->getArgument('sModuleName')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('module:view')
    ->setAliases(['mdv'])
    ->setDescription($sColCmd . "php emvicy module:view Bar Foo" . $sColOff . " => creates View `Bar` in the given module `Foo`. ")
    ->addArgument('sView', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('sModuleName', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::moduleCreateView(
            sView: $oInputInterface->getArgument('sView'),
            sModuleName: $oInputInterface->getArgument('sModuleName')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# database

$oSymfonyComponentConsoleApplication
    ->register('db:table')
    ->setAliases(['dbt'])
    ->setDescription($sColCmd . "php emvicy db:table Bar Foo" . $sColOff . " => creates DB Table `Bar` in the given module `Foo`. ")
    ->addArgument('sTable', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('sModuleName', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::dbCreateTableClass(
            sTable: $oInputInterface->getArgument('sTable'),
            sModuleName: $oInputInterface->getArgument('sModuleName')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
$oSymfonyComponentConsoleApplication
    ->register('db:tableCollection')
    ->setAliases(['dbtc'])
    ->setDescription($sColCmd . "php emvicy db:tableCollection Bar Foo" . $sColOff . " => creates DB table collection class `Bar` in the given module `Foo`. ")
    ->addArgument('sClass', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->addArgument('sModuleName', \Symfony\Component\Console\Input\InputArgument::REQUIRED)
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::dbCreateTableClassCollection(
            sClass: $oInputInterface->getArgument('sClass'),
            sModuleName: $oInputInterface->getArgument('sModuleName')
        );
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });

#-----------------------------------------------------------------------------------------------------------------------
# event

$oSymfonyComponentConsoleApplication
    ->register('event:list')
    ->setAliases(['el'])
    ->setDescription($sColCmd . " php emvicy event:list" . $sColOff . " => lists all known event listeners in a markdown table")
    ->setCode(function (\Symfony\Component\Console\Input\InputInterface $oInputInterface, \Symfony\Component\Console\Output\OutputInterface $oOutputInterface): int {
        \Emvicy\Emvicy::eventListener();
        return \Symfony\Component\Console\Command\Command::SUCCESS;
    });
#-----------------------------------------------------------------------------------------------------------------------

$oSymfonyComponentConsoleApplication->run();