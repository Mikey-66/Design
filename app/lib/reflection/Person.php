<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/21
 * Time: 22:31
 */

namespace app\lib\reflection;

class Person
{
    /** type=varchar length=255 null */
    public $name;
    public $age;
    public $gender;


    private $bankCardPasswd;

    protected $money;

    public static $address;

    const MALE = 1;
    const FEMALE = 2;
    const SECRET = 0;


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * say hello
     */
    public function sayHello($c, $a= 1, $b=2)
    {
        echo 'hello reflection';
    }


}