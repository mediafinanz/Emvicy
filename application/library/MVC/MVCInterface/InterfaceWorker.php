<?php
/**
 * Worker.php
 *
 * @package Emvicy
 * @copyright ueffing.net
 * @author Guido K.B.W. Üffing <emvicy@ueffing.net>
 * @license GNU GENERAL PUBLIC LICENSE Version 3. See application/doc/COPYING
 */

namespace  MVC\MVCInterface;

use App\DataType\DTAppTableQueue;

/**
 * Interface to be implemented in a Model/Worker Class
 */
interface InterfaceWorker
{
    public static function work(?DTAppTableQueue $oDTAppTableQueue = null) : void;

    /**
     * @param int|null $iIdQueue
     * @return false|void
     * @throws \ReflectionException
     */
    public static function concreteJob(?int $iIdQueue = null);

    /**
     * @param string $sQueueKey
     * @return false|void
     * @throws \ReflectionException
     */
    public static function nextJob(string $sQueueKey = '');
}