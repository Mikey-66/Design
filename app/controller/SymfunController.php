<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/13
 * Time: 19:45
 */

namespace app\controller;



use app\lib\symfunc\C;

class SymfunController extends BaseController
{
    // get_called_class()
    public function actionF1()
    {
        $class[] = \app\lib\symfunc\A::test();

        $class[] = \app\lib\symfunc\B::test();

        $class[] = C::test();

        $class[] = \app\lib\symfunc\A::callTest();
        $class[] = \app\lib\symfunc\B::callTest();
        $class[] = \app\lib\symfunc\C::callTest();

        $class[] = C::callShowClass();


        dd($class);
    }


}