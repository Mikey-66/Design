<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/6/20
 * Time: 15:06
 */
namespace app\controller;

class C4Controller extends BaseController
{
    public function actionT1(){
//        $baidu = file_get_contents("http://www.baidu.com");
//        $fp = fopen("http://www.baidu.com", 'r');
//        var_dump(stream_get_meta_data($fp));
//        var_dump($http_response_header);
//        fclose($fp);

        echo 1111;
    }

    public function actionT2()
    {
        $base16_arr = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];

        $x = md5("sdasdasd2323");

        $arr = str_split($x, 1);
        $str = "";
        foreach ($arr as $item)
        {
            $assic_value = ord($item);
            $bin_value = decbin($assic_value);
            $tmp_str = str_pad($bin_value, 8, '0', STR_PAD_LEFT);
            $str .= $tmp_str;

        }

        $arr_2 = str_split($str, 4);
        $res_str = "";

        foreach ($arr_2 as $item)
        {
            $dec_value = bindec($item);
            $tmp_str2 = $base16_arr[$dec_value];
            $res_str .= $tmp_str2;
        }

        var_dump($res_str);
    }

    public function actionT3()
    {
        $number = 3;
        $unit = "day";
        $time = strtotime("+{$number} {$unit}");

        var_dump($time);

        var_dump(date('Y-m-d H:i:s', $time));


    }

    public function actionT4()
    {
        $str = "18262300380|21|20170321154444|20170321154451|1|940429|咱家||64:d9:54:5e:33:d8|36.149.166.103|||||2";

        $str = "12|00|20180814111530|20180814151530|1|123|魔界|1|12344|192.168.52.12|2|20|||";
        $arr = explode("|", $str);

        var_dump($arr);

    }

    public function actionT5()
    {
        $dir = dirname(dirname(__FILE__)) . '/data';
        $res = scandir($dir);
        $arr = array();

        foreach ($res as $filename)
        {
            if ($filename == '.' || $filename == '..')
            {
                continue;
            }

            $arr[] = $filename;
        }

        $tg_obj = "";

        foreach ($arr as $key => $item)
        {
            $tmp = explode(".", $item);
            $_tmp = explode("_", $tmp[0]);
            if ($tg_obj === "")
            {
                $tg_obj = $_tmp;
            }
            else
            {
                $tg_obj = intval($tg_obj[3]) > intval($_tmp[3]) ? $tg_obj : $_tmp;
            }
        }

        var_dump($tg_obj);
    }

    public function actionT6()
    {
        $request_json_data = file_get_contents("php://input");

        var_dump($request_json_data);
    }

    public function actionT7()
    {
        $m = new \Memcached();
        var_dump($m);exit;
        echo date('Y-m-d H:i:s', strtotime('+1 month'));
        echo '<br/>';
        echo date('Y-m-d H:i:s', strtotime('+30 day'));
    }
}