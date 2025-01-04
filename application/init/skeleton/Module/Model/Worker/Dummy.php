<?php

namespace {module}\Model\Worker;

use App\DataType\DTAppTableQueue;
use MVC\Log;
use MVC\WorkerTrait;

class Dummy implements \MVC\MVCInterface\InterfaceWorker
{
    use WorkerTrait;

    /**
     * @param \App\DataType\DTAppTableQueue|null $oDTAppTableQueue
     * @return void
     * @throws \ReflectionException
     */
    public static function work(?DTAppTableQueue $oDTAppTableQueue = null) : void
    {
        Log::write($oDTAppTableQueue, 'queue.log');
    }
}
