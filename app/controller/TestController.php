<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/24
 * Time: 14:31
 */
namespace app\controller;

use app\lib\sign\BaseSign;
use app\lib\sign\XjSign;
use autoloader\Dog;
use autoloader\animal\Cat;
use framework\core\App;
use framework\SqlBuilder;

class TestController extends BaseController
{
    public function actionIndex()
    {
        $params = $_GET;
        $dog = new Dog();
        $cat = new Cat();

        var_dump($cat);
        var_dump('sdsdsd');
        var_dump(['name' => 'liujie', 'age' => 20]);
        var_dump(20, true);
    }


    /**
     * PHP 中 null 值 可以这样和别的变量值进行比较 ， mysql中不行
     */
    public function actionT1(){
        $x = 0;
        if ($x === null){
            echo 'null';
        }else{
            echo 'not null';
        }
    }

    /**
     * PHP 5.5 以下， empty() 不能使用函数的返回值为传入值
     */
    public function actionT2(){
        $dog = new Dog();
        if (empty($dog->name)){
            echo 'empty';
        }else{
            echo 'not empty';
        }
    }

    /**
     * PHP 获取配置文件参数 内置函数
     */
    public function actionT3()
    {
        $ini = parse_ini_file(CONFIG_DIR . '/' . 'global_manager_log.ini', true);
        dd($ini);
    }


    public function actionT4()
    {
//        $app = App::instance();
//        dd($app);
//        $db_master = App::get('db_master');
//        dd($db_master);
        $sqlBuilder = SqlBuilder::Query();
//        dd($sqlBuilder);exit;
        $sqlBuilder ->from('nns_user u')
                    ->leftJoin('nns_device d', 'u.nns_id = d.nns_user_id')
                    ->leftJoin('nns_user_extends ue', 'u.nns_id = ue.nns_user_id')
//                    ->select('u.nns_name, u.nns_password, d.nns_id')
//                    ->where("u.nns_name = '13002555713'")
//                    ->where("u.nns_login_time is not null", 'or')
//                    ->orWhere("u.nns_age > 18")
//                      ->andWhere("u.nns_sex = 'male' AND ( u.nns_age > 18 AND u.nns_state = 1 )");
//                    ->where("u.nns_name = '13001808043'")
//                    ->offset(12)
                    ->limit(1)
                    ->orderBy('u.nns_id DESC');


        dd($sqlBuilder);
        dd($sqlBuilder->getSql());
        exit;
    }


    // 加密、解密
    public function actionT5()
    {
        $str = '880229sd';
        $str_encode = email_encode($str);

        dd($str_encode);

        $str_decode = email_decode($str_encode, 'starcor');

        dd($str_decode);

        var_dump($str_decode);

        // 单向哈希函数   将任意长度输入转化为固定长度的输出，常见的函数有md5，sha1

        echo '<hr/>';
        echo 'md5 hash:';
        dd(md5('sdasdjasjdaskdjjasd'));

        echo '<hr/>';
        echo 'sha1 hash:';
        dd(sha1('sdasdjasjdaskdjjasd'));

    }

    public function actionT6()
    {
        $range = range(1,20);
        dd($range);

        shuffle($range);

        dd($range);

    }


    public function actionT7()
    {
//        $str = "瀵规柟鏄惁";
//
//        $str = iconv('UTF-8', 'GBK//IGNORE', $str);
//        echo $str;
//        exit;
        dd(PHP_OS);
        exit;
        $filename = "对方是否.text";
        file_put_contents(iconv('UTF-8', 'GBK//IGNORE', $filename), '山东师范');
        exit('ok');
    }

    public function actionT8()
    {
        $baseSign = new BaseSign();
        $baseSign->setSignObject(new XjSign());

        if (!$baseSign->verifySign()){
            echo '签名验证失败';
            exit;
        }else{
            // 验证成功
            // 继续后续逻辑
        }
    }

    public function actionT9(){
        echo 'sleeping...';
        sleep(20);
        echo '<br/>';
        die('end');
    }

    public function actionT10()
    {
        $res = setcookie('myname', 'liujie', 0);
        var_dump($res);
    }

    public function actionT11()
    {
        var_dump($_COOKIE);
    }

    public function actionT12()
    {
        $res = setcookie('myname', false, time() - 3600, '/');
        var_dump($res);
        // 这里打印cookie还是会有 myname这个cookie的信息，因为php设置cookie不是即时生效的，因为php无法直接操作cookie，
        // 只能通过下达知道给浏览器，通过浏览器来操作cookie
    }


    public function actionT13()
    {
        header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
        $res = setcookie('P3P2', 'cross site2', time() + 3600, '/', '.phpgo.com');
        var_dump($res);
    }

    public function actionT14()
    {
        var_dump($_COOKIE);
    }

    public function actionT15()
    {
        $a = session_name();
        $b = session_id();
        var_dump($a, $b);
    }

    public function actionT16()
    {
        // bmh3hjldjbgaqmvjur3d5atpv0
        //$path = session_save_path();
        //$conf = ini_get("session.save_path");
//        session_start();
        //$conf = get_cfg_var("session.save_path");
        //var_dump($path);
        session_start();
        var_dump(session_id());
        setcookie(session_name(), session_id(), time()+60, '/');
        session_cache_expire();
        $_SESSION['myname'] = 'liujie';
        $_SESSION['age'] = '27';
        var_dump($_SESSION);
        var_dump($_COOKIE);
    }

    public function actionT17()
    {
        session_start();
        var_dump($_SESSION);
        var_dump($_COOKIE);
    }


    public function actionT18()
    {
        $arr=[
            array(
                'name'=>'小坏龙',
                'age'=>28
            ),
            array(
                'name'=>'小坏龙2',
                'age'=>14
            ),
            array(
                'name'=>'小坏龙3',
                'age'=>59
            ),
            array(
                'name'=>'小坏龙4',
                'age'=>23
            ),
            array(
                'name'=>'小坏龙5',
                'age'=>23
            ),
            array(
                'name'=>'小坏龙6',
                'age'=>21
            ),
        ];

//        $arr = array_column($arr,'age');
        var_dump($arr);
        array_multisort(array_column($arr,'age'),SORT_DESC,$arr);
        var_dump($arr);
    }

    public function actionT19()
    {

    }

    public function actionT20()
    {


    }


    public function actionT21()
    {
        $x = null;
        $y = array('name' => 'liujie', 'age' => 30);

        $x += $y;

        var_dump($x);exit;
    }

    public function actionT22()
    {
        // pcntl test
        echo 'pcntl test' . PHP_EOL;

          $i = 0;
        while ($i != 5){
            $pid = pcntl_fork();
        if ($pid == -1){
         die('cant fork');
        }elseif ($pid == 0){
         echo 'child process,pid:' . getmypid() . PHP_EOL;
        return;
        }else{
            $i++;
         echo 'parent process loop time:' . $i . PHP_EOL;
        }
        }
    }

    public function actionT23()
    {
        $x = 9;
        var_dump(sqrt($x));
        var_dump('dfdf221');
    }


}
