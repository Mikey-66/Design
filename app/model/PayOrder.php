<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/27
 * Time: 12:51
 */
namespace app\model;

use app\lib\register\Register;

class PayOrder extends BaseModel
{
    public $nns_id;

    public $nns_name;

    public $nns_money;

    public function __construct($id)
    {
        $dsn = "mysql:hostname=localhost;dbname=nn_pay";
        $username = "root";
        $passwd = "111111";
        $pdo = new \PDO($dsn, $username, $passwd);
        $pdo->exec("SET NAMES 'utf8'");

        $pst = $pdo->prepare('select nns_id, nns_name, nns_money from nns_pay_order where nns_id=?');
        $pst->bindValue(1, $id);
        $pst->execute();

        $data = $pst->fetch(\PDO::FETCH_ASSOC);
        $this->nns_id       = $data['nns_id'];
        $this->nns_name     = $data['nns_name'];
        $this->nns_money    = $data['nns_money'];

        Register::set('pdo',$pdo);

    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}