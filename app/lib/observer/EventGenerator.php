<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 11:25
 */

namespace app\lib\observer;

/**
 *      定义成抽象类
 * 1】本类不能被实例化
 * 2】类中只要有一个抽象方法，该类就必须定义成抽象类
 * 3】抽象方法在子类中必须被实现
 */

 abstract class EventGenerator
{
    private $observer = array();

    protected $context = array();

    public function addObserver(Observer $observer){
        $this->observer[] = $observer;
    }

    public function notify(){
        foreach ($this->observer as $observer){
            $observer->handle( $this->context );
        }
    }

    public function setContext($params){
        $this->context = $params;
    }

}






