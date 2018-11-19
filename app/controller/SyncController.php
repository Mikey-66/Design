<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/5/17
 * Time: 10:20
 */

namespace app\controller;


class SyncController extends BaseController
{

    public function actionOrder()
    {
        echo json_encode(array(
            "rspInfo" => array(
                "retCode" => "0000",
                'retMsg'  => "成功",
            )
        ), JSON_UNESCAPED_UNICODE);
    }

    /*
    public function actionMd5()
    {
        set_time_limit(0);
        $file = ROOT_DIR . '/app/data/3333.txt';

        if (!file_exists($file))
        {
            die('file not find');
        }

        $fp = fopen($file, 'r');
        while(!feof($fp))
        {
            $line_str = trim(fgets($fp));

            if (!strlen($line_str))
            {
                echo 'exception data:' . var_export($line_str, true) . '<br/>';
                continue;
            }

            $arr = explode('@', $line_str);

            if (!is_array($arr) || count($arr) !=2)
            {
                echo 'exception data:' . var_export($arr, true) . '<br/>';
                continue;
            }

            $boss_user_id = md5($arr[0] . $arr[1]);

            $write_file = ROOT_DIR . '/app/data/ids.txt';

            $res = file_put_contents($write_file, $boss_user_id . PHP_EOL, FILE_APPEND);

            if ($res === false)
            {
                fclose($fp);
                die('file write error');
            }
        }

        fclose($fp);

        echo 'success';
    }


    public function actionSql()
    {
        $file = ROOT_DIR . '/app/data/ids.txt';

        $arr = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $_arr = array_chunk($arr, 2000);
        unset($arr);

        foreach ($_arr as $key => $ids_arr)
        {
            $ids_str = implode("','", $ids_arr);

            $sql = "update nns_boss_user set nns_oper_type = 3 where nns_id in ('{$ids_str}');";

            file_put_contents(ROOT_DIR . '/app/data/sql.txt', $sql . PHP_EOL, FILE_APPEND);
        }

        echo 'ok';
    }


    public function actionTest()
    {
        echo md5("1349869101603057");
    }

    */
}