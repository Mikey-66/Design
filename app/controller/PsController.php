<?php
/**
 * Created by PhpStorm.
 * User: fudi
 * Date: 2018/11/19
 * Time: 14:24
 */
namespace app\controller;

class A {
    private function foo() {
        echo 'a';
    }
    public function test() {
        var_dump(get_called_class());
        var_dump($this);
        $this->foo();
    }
}
class B extends A {
    public function foo() {
        echo "b";
    }
}

class C {
    protected function foo() {
        echo 'a';
    }
    public function test() {
        var_dump(get_called_class());
        var_dump($this);
        $this->foo();
    }
}
class D extends C {
    public function foo() {
        echo "b233";
    }
}


class PsController extends BaseController
{
    public function actionT1()
    {
        $b = new B();
        $b->test();

        echo '<br/>';

        $d = new D();
        $d->test();
    }
}

