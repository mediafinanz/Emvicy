<?php

namespace MVC;

use MVC\DataType\DTAppTableQueue;
use MVC\DB\Model\DbInit;

class Queue
{
    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function getConfig(): array
    {
        return get(Config::MODULE()['queue']['config'], array());
    }

    /**
     * pushes a job to the queue
     * @param \MVC\DataType\DTAppTableQueue $oDTAppTableQueue
     * @param bool                          $bPreventMultipleCreation
     * @return \MVC\DataType\DTAppTableQueue|null
     * @throws \ReflectionException
     */
    public static function push(DTAppTableQueue $oDTAppTableQueue, bool $bPreventMultipleCreation = false)
    {
        return \App\Table\Queue::init(DbInit::getConfig())
            ->push($oDTAppTableQueue, $bPreventMultipleCreation);
    }

    /**
     * get job object due to a key and delete it
     * @param string $sKey
     * @param string $sKey2
     * @return \MVC\DataType\DTAppTableQueue|false|null
     * @throws \ReflectionException
     */
    public static function pop(string $sKey = '', string $sKey2 = '')
    {
        return \App\Table\Queue::init(DbInit::getConfig())
            ->pop($sKey, $sKey2);
    }

    /**
     * pops a concrete job by its id
     * @param int|null $iIdQueue
     * @return \MVC\DataType\DTAppTableQueue
     * @throws \ReflectionException
     */
    public static function popOnId(?int $iIdQueue = null)
    {
        /** @var DTAppTableQueue $oDTAppTableQueue */
        $oDTAppTableQueue = \App\Table\Queue::init(DbInit::getConfig())
            ->getOnId($iIdQueue);

        if (false === empty($oDTAppTableQueue->get_id()))
        {
            \App\Table\Queue::init(DbInit::getConfig())
                ->deleteTupel($oDTAppTableQueue);
        }

        return $oDTAppTableQueue;
    }

    /**
     * get time based next job array object without deleting it (just inform)
     * @param int                            $iLimit
     * @param \MVC\DataType\DTDBWhere[]|null $aDTDBWhere
     * @return \MVC\DataType\DTAppTableQueue[]
     * @throws \ReflectionException
     */
    public static function next(int $iLimit = 1, ?array $aDTDBWhere = null)
    {
        return \App\Table\Queue::init(DbInit::getConfig())
            ->next($iLimit, $aDTDBWhere);
    }

    /**
     * @param string $sKey
     * @param string $sKey2
     * @return \MVC\DataType\DTAppTableQueue[]|null
     * @throws \ReflectionException
     */
    public static function popAll(string $sKey, string $sKey2 = '')
    {
        return \App\Table\Queue::init(DbInit::getConfig())
            ->popAll($sKey, $sKey2);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function getAllKeys()
    {
        return \App\Table\Queue::init(DbInit::getConfig())
            ->getAllKeys();
    }

    /**
     * @param string $sKey
     * @param string $sKey2
     * @return bool
     * @throws \ReflectionException
     */
    public static function keyExists(string $sKey, string $sKey2 = '')
    {
        return \App\Table\Queue::init(DbInit::getConfig())
            ->keyExists($sKey, $sKey2);
    }

    /**
     * @param string $sKey
     * @return int
     * @throws \ReflectionException
     */
    public static function getAmount(string $sKey)
    {
        return \App\Table\Queue::init(DbInit::getConfig())
            ->getAmount($sKey);
    }

    /**
     * @return void
     * @throws \ReflectionException
     */
    public static function expire()
    {
        \App\Table\Queue::init(DbInit::getConfig())
            ->expire();
    }
}
