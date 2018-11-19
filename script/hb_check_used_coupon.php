<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/3/19
 * Time: 15:19
 */

ini_set('memory_limit', '512M'); //内存限制
set_time_limit(0);

include_once dirname(dirname(__FILE__)) . '/functions.php';

$check_file = dirname(__FILE__) . '/data/hb.txt';
$used_file = dirname(__FILE__) . '/data/aaa.txt';

$check_arr = file($check_file, FILE_IGNORE_NEW_LINES);
$used_arr = file($used_file, FILE_IGNORE_NEW_LINES);


foreach ($check_arr as $sn){
    if (!in_array($sn, $used_arr, true)){
        file_put_contents('no_used.txt', $sn. "\r\n", FILE_APPEND);
    }
    else{
        file_put_contents('used.txt', $sn. "\r\n", FILE_APPEND);
    }

}

// 1406 需要检查的

//$arr = array_intersect($used_arr, $check_arr);

//var_dump($arr);   // 519 确定 已经使用
//
//var_dump(array_diff($check_arr, $used_arr));    // 889 没有使用
//
//foreach ($arr as $sn){
//    file_put_contents('res.txt', $sn . "\r\n", FILE_APPEND);
//}

//foreach ($check_arr as $sn){
//    if (!in_array($sn, $arr)){
//        file_put_contents('res2.txt', $sn . "\r\n", FILE_APPEND);
//    }
//}

