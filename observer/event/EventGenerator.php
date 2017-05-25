<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 9:37
 */
namespace observer\event;

use observer\handler\Observer;

abstract class EventGenerator{

    private $eventObserver = array();

    protected $context = array();

    public function setContext($params){
        $this->context = $params;
    }

    public function addObserver(Observer $observer){
        $this->eventObserver[] = $observer;
    }

    public function notify(){
        foreach ($this->eventObserver as $observer){
            $observer->handle( $this->context );
        }
    }

}