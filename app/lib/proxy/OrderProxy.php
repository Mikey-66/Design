<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 10:31
 */
namespace app\lib\proxy;

use app\lib\register\Register;
use framework\database\Mysqli;

class OrderProxy implements QueryProxy
{
    public function getOrder($id)
    {
        // TODO: Implement getOrder() method.
        $db = new Mysqli();
        $db->connect('localhost', 'root', 111111, 'nn_pay');
        $data = $db->query("select * from nns_pay_order where nns_id = '{$id}' limit 1");
        Register::set('nn_pay_db', $db);

        return $data[0];
    }

    public function getOrders($ids = array())
    {
        // TODO: Implement getOrders() method.
        if ($num = count($ids)){

            foreach ($ids as $key => $id) {
                $ids[$key] = "'{$id}'";
            }

//            dd($ids);exit;
            $sql = "select * from nns_pay_order where nns_id in (". implode(',', $ids) .") limit {$num}";

            $db = Register::get('nn_pay_db');

            if (empty($db)){
                $db = new Mysqli();
                $db->connect('localhost', 'root', 111111, 'nn_pay');
            }

            $data = $db->query($sql);

            return $data;

        }else{
            return array();
        }

    }
}