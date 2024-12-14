<?php

namespace MVC;


/*
 * For use in specific worker classes
 */
trait WorkerTrait
{
    /**
     * @param int|null $iIdQueue
     * @return false|void
     * @throws \ReflectionException
     */
    public static function concreteJob(?int $iIdQueue = null)
    {
        if (true === empty($iIdQueue))
        {
            return false;
        }

        // get a job on id
        $oDTAppTableQueue = Queue::popOnId($iIdQueue);
        self::work($oDTAppTableQueue);
    }

    /**
     * @param string $sQueueKey
     * @return false|void
     * @throws \ReflectionException
     */
    public static function nextJob(string $sQueueKey = '')
    {
        if (true === empty($sQueueKey))
        {
            return false;
        }

        // get next job on key
        $oDTAppTableQueue = Queue::pop($sQueueKey);
        self::work($oDTAppTableQueue);
    }
}