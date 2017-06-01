<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 9:30
 */
namespace app\lib\iterator;

use app\model\BaseModel;
use framework\Database;
use framework\database\Mysqli;

class Order extends BaseModel
{

    public function __construct()
    {
        $db = new Mysqli();
        $db->connect('localhost', 'root', 111111, 'nn_pay');
        $res = $db->query("select * from nns_pay_order limit 0,3");
        $db->close();

        $this->arr = $res;

    }
}