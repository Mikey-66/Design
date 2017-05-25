<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 10:31
 */
namespace framework;

class Database
{
    public function link(){
        echo 'link';
    }

    protected static $instance;

    // 设置成private保证了在本类之外 没法通过new实例化一个对象
    private function __construct()
    {
    }

    // 在类外只能通过此静态方法获取 本类的一个实例
    public static function getInstance(){
        if (self::$instance){
            return self::$instance;
        }else{
            self::$instance = new self();
            return self::$instance;
        }
    }




}