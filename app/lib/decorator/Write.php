<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/31
 * Time: 13:02
 */
namespace app\lib\decorator;


use app\lib\decorator\Decorator;

class Write
{

    protected $decorators = array();

    public function addDecorator(Decorator $decorator)
    {
        $this->decorators[] = $decorator;
    }

    public function w()
    {
        $this->beforeWrite();
        echo 'write a str';
        $this->afterWrite();
    }

    private function beforeWrite()
    {
        foreach ($this->decorators as $decorator) {
            $decorator->before();
        }
    }

    private function afterWrite()
    {
        foreach (array_reverse($this->decorators) as $decorator) {
            $decorator->after();
        }
    }


}