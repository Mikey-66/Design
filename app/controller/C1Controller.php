<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 15:46
 */

namespace app\controller;

use framework\core\App;
use framework\dbconnection\Pdo;

class C1Controller extends BaseController
{
    public function actionT1(){

        $db = App::instance()->db_master;
//        dd($db);

        $db_command = $db->createCommand('select * from nns_pay_order limit 0,3');

        $res = $db_command->queryOne();

//        dd($db_command);
        dd($res);
    }
}