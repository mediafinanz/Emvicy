<?php


namespace App\Table;

trait TraitAppTableQueue
{
    /**
     * @var \App\Table\Queue
     */
    public $oAppTableQueue {get => $this->activate(__PROPERTY__);}
}
