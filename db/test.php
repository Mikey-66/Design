<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 14:31
 */

//$ini_path = dirname(dirname(__FILE__)) . '/php.ini';
//$settings = parse_ini_file($ini_path, true);
//echo "<pre>";
//var_dump($settings);
//echo "</pre>";
//exit;
$dsn = "mysql:host=localhost;dbname=nn_aaa";
$username = "root";
$password = "111111";
$pdo = new PDO($dsn, $username, $password);
$sql = "select nns_id, nns_name, nns_password from nns_user order by nns_last_login_time limit 0,5";
$res = $pdo->query($sql);

$data = array();
//$data = $res->fetchAll();
while ($row = $res->fetch()){
    $data[] = $row;
}

echo "<pre>";
var_dump($data);
echo "</pre>";
