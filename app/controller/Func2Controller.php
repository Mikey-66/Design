<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/2
 * Time: 14:48
 */
//declare(strict_types=1);
namespace app\controller;


use app\lib\magic\StringTool;
use app\model\Model;
use app\model\User;
use framework\core\Lua;
use function my\name\myfunction;


class Man{

    static $name = "man";

    public static function say()
    {
        echo static::$name;
    }
}

class Chinese extends Man{

    static $name= "xiao ming";

}

function getArray($node) {
    $array = false;

    if ($node->hasAttributes()) {
        foreach ($node->attributes as $attr) {
            $array[$attr->nodeName] = $attr->nodeValue;
        }
    }

    if ($node->hasChildNodes()) {
        if ($node->childNodes->length == 1) {
            $array[$node->firstChild->nodeName] = getArray($node->firstChild);
        } else {
            foreach ($node->childNodes as $childNode) {
                if ($childNode->nodeType != XML_TEXT_NODE) {
                    $array[$childNode->nodeName][] = getArray($childNode);
                }
            }
        }
    } else {
        return $node->nodeValue;
    }
    return $array;
}

function my_ftok($pathname, $identifier = 'i'){
    if (empty($pathname) || !file_exists($pathname)){
        return -1;
    }

    $str = $pathname . $identifier;
    $arr= array_map(function($char){
        return ord($char);
    }, str_split($str));

    return dechex(array_sum($arr));

}

function custom_ftok($filename = "", $proj = "")
{
    if( empty($filename) || !file_exists($filename) )
    {
        return -1;
    }
    else
    {
        $filename = $filename . (string) $proj;
        for($key = array(); sizeof($key) < strlen($filename); $key[] = ord(substr($filename, sizeof($key), 1)));
        return dechex(array_sum($key));
    }
}

function plus($a, $b){
    return $a+$b;
}

function test(int $a, array $b = array()): int{
    return 1;
}

function static_func_test(){
    static $x = 1;
    $x++;
    var_dump($x);
}

/**
 * php 计算多个集合的笛卡尔积
 * Date: 2017-01-10
 * Author: fdipzone
 * Ver: 1.0
 *
 * Func
 * CartesianProduct 计算多个集合的笛卡尔积
 */

/**
 * 计算多个集合的笛卡尔积
 * @param Array $sets 集合数组
 * @return Array
 */
function CartesianProduct($sets){

    // 保存结果
    $result = array();

    // 循环遍历集合数据
    for($i=0,$count=count($sets); $i<$count-1; $i++){

        // 初始化
        if($i==0){
            $result = $sets[$i];
        }

        // 保存临时数据
        $tmp = array();

        // 结果与下一个集合计算笛卡尔积
        foreach($result as $res){
            foreach($sets[$i+1] as $set){
                $tmp[] = $res. '@'. $set;
            }
        }

        // 将笛卡尔积写入结果
        $result = $tmp;

    }

    return $result;

}

class Tools{
    public function plus($a, $b){
        return $a+$b;
    }

    public static function double($i){
        return $i * 2;
    }
}

class Func2Controller extends BaseController {

    // array_map
    public function actionT1(){
        $arr1 = [1,2,3,4];
        $arr2 = range(2, 8, 2);

        $arr3 = array_map('app\controller\plus', $arr1, $arr2);

        var_dump($arr3);
    }


    public function actionT2(){

        $func = function ($a){
            return $a * $a;
        };

        // 调用方式
        $x = $func(2);
        var_dump($x);

        $y = call_user_func($func, 3);
        var_dump($y);

        $z = call_user_func_array($func, array(4));
        var_dump($z);

        $n = call_user_func('trim', 'sdsddd   ');
        var_dump($n);

        $obj = new Tools();
        $m = call_user_func(array($obj, 'plus'), 1, 2);
        var_dump($m);

        $l = call_user_func(array('app\controller\Tools', 'double'), 5);
        var_dump($l);

        $p = call_user_func('app\controller\Tools::double', 5);
        var_dump($p);

        $o = call_user_func_array(array($obj, 'plus'), array(2, 9));
        var_dump($o);
    }

    public function actionT3(){

        $a = [1,2,3];
        $b = [2,3,4,5];
        $c = array_intersect($a, $b);
        var_dump($c);
    }

    public function actionT4(){
        var_dump($this);

        $app = Lua::app();
        var_dump($app->request);
    }


    public function actionT5(){

        $a = ['name' => 'liujie', 'age' => 18, 'gender' => 'male'];

        var_dump($a);

        $x = array_pop($a);
        var_dump($a, $x);

        $a = ['name' => 'liujie', 'age' => 18, 'gender' => 'male'];
        $x = array_shift($a);
        var_dump($a, $x);
    }


    /**
     * file() 函数使用
     */
    public function actionT6(){
        $file_name = ROOT_DIR . "/test.txt";
        if (!file_exists($file_name)){
            die('file not found');
        }

        /**
         * flags
         * FILE_USE_INCLUDE_PATH
         * FILE_IGNORE_NEW_LINES
         * FILE_SKIP_EMPTY_LINES
         */

        $file_arr = file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($file_arr === false){
            die('file 读取文件内容失败');
        }

        var_dump($file_arr);
        exit;
    }

    public function actionT7(){
        $file_name = ROOT_DIR . "/test.txt";
        if (!file_exists($file_name)){
            die('file not found');
        }

        $file_content = file_get_contents($file_name);
        $arr = explode(PHP_EOL, $file_content);
        var_dump($arr);
    }

    public function actionT8(){
        $file_name = ROOT_DIR . "/test.txt";
        if (!file_exists($file_name)){
            die('file not found');
        }

        $fhandle = fopen($file_name, 'r');
        $content = [];
        while (!feof($fhandle)){
            $content[] = trim(fgets($fhandle));
        }

        fclose($fhandle);

        var_dump($content);
    }

    public function actionT9(){
        $file_name = ROOT_DIR . "/test.txt";
        if (!file_exists($file_name)){
            die('file not found');
        }

        $fhandle = fopen($file_name, 'r');
        $content = [];
        while (!feof($fhandle)){
            $content[] = fgets($fhandle);
        }

        fclose($fhandle);

        var_dump($content);
    }

    public function actionT10(){
        $dir = ROOT_DIR . '/framework';
        $res = my_scandir($dir);
        var_dump($res);
    }

    public function actionT11(){

        $x = 'a' == 'A';
        var_dump($x);
    }

    public function actionT12()
    {
        error_reporting(E_ALL);
        ini_set("display_errors", '1');

//
//        $x = "";
//        $x['sd'] = "sdsd";
//
//        var_dump($x);
//        phpinfo();

        $x = test("1", array());
        var_dump($x);
    }

    public function actionT13(){
        $y = '1' == '1111';
        var_dump($y);

        exit;
        $x = in_array('00000001', array('1001'));
        var_dump($x);
    }

    /**
     * 进制转化测试
     */
    public function actionT15(){
        var_dump(decbin(3));
        var_dump(bindec(11));
    }

    public function actionT14(){
        $ipv4 = gethostbyname("www.baidu.com");
        var_dump($ipv4);


        var_dump(ip2long("255.255.255.255"));
        var_dump(ip2long("sd"));
        //exit;

        $ip = "192.168.95.53";

        $x = filter_var($ip, FILTER_VALIDATE_IP);

        var_dump($x);

        $r1 = ip2long($ip);

        $r2 = decbin($r1);
        $r3 = bindec($r2);
        var_dump($r1);
        var_dump($r2);
        var_dump($r3);

        var_dump($r1 + 4294967296);

        //之所以要decbin和bindec一下是为了防止IP数值过大int型存储不了出现负数

        // 下面的代码可以达到达到同样的目的

//        echo $ip   . "\n";           // 192.0.34.166
//        echo $long . "\n";           // -1073732954

        // u - the argument is treated as an integer and presented as an unsigned decimal number
        $r4 = sprintf("%u", $r1); // 3221234342
        var_dump($r4);

        var_dump(sprintf("%u", -1));
        var_dump(sprintf("%u", 0));
        var_dump(sprintf("%u", 20));
    }


    // 求笛卡尔积
    public function actionT16(){
        $sets = array(
            array('白色', '红色', '黑色'),
            array('37', '38', '39', '42'),
            array('男款', '女款'),
        );

        $res = CartesianProduct($sets);

        var_dump($res);
    }

    public function actionT17(){
        $file = ROOT_DIR . "/functions.php";
        $x = highlight_file($file);
    }

    public function actionT18(){

        $GLOBALS['x']++;
        var_dump($GLOBALS['x']);

//        $x = $GLOBALS['x'];
//        $x++;
//        var_dump($x);

//        global $x;
//        $x++;
//        var_dump($x);
        return;
//        global $config;
//        global $x;
//        var_dump($x);
//        var_dump($config);
        var_dump($GLOBALS);exit;
        $v = phpversion('redis');
        $z = "z";
        var_dump($v);
        var_dump(PHP_VERSION);
        var_dump(PHP_OS);
        var_dump(php_sapi_name());
        var_dump(get_defined_vars());

        for ($i=1;$i<=3;$i++){
            static_func_test();
        }
    }

    public function actionT19()
    {
        $a= 1;
        $b = 2;
        $c = 4;

        $all_var_arr = get_defined_vars();
        var_dump($all_var_arr);

        $all_var_names_arr = array_keys($all_var_arr);
        var_dump($all_var_names_arr);

        $res = compact($all_var_names_arr);
        var_dump($res);

        $regionid1 = "156";
        $regionid2 = "156001";

        $var_name = "regionid1";
        $x = compact($var_name);
        var_dump($x);

    }


    public function actionT20(){
//        $obj = new \stdClass();
//
//        $obj->name = "liuie";
//        $obj->age = 20;
//        var_dump(get_object_vars($obj));

        $s = new StringTool('hah  ');

        $x = $s->trim()
            ->rtrim('h')
//            ->strlen()
            ->getRes();
        var_dump($x);
    }

    public function actionT21(){
        $x = pack('a*','sdsdd');
        var_dump($x);exit;
        var_dump(getmypid());
    }


    public function actionT22(){

        $c = new Chinese();

        $c->say();

        echo "<br/>";
        Chinese::say();

        echo "<br/>";
        echo Chinese::$name;

        // 下面这种用法不对， 不能通过对象访问静态成员（静态方法除外）
        echo "<br/>";
        echo $c->name;


    }

    public function actionT23(){

        $timezoneIdentifiers = \DateTimeZone::listIdentifiers(\DateTimeZone::AFRICA);

//        var_dump($timezoneIdentifiers);

        $timezone = new \DateTimeZone("Africa/Accra");
        $datetime = new \DateTime();

        var_dump($datetime);
        $datetime->add(new \DateInterval("P4D"));
        $datetime->sub(new \DateInterval("P1D"));

        var_dump($datetime);
        var_dump($datetime->format("Y-m-d H:i:s"));
        exit;

        $int = $datetime->getOffset();

//        $ti = new \DateInterval("PT{$int}S");
//        var_dump($ti->format('d'));

        var_dump($int);


        var_dump($datetime->getTimestamp());
        var_dump($datetime->getTimezone());

        //var_dump($timezone->getLocation(), $timezone->getName(), $timezone->getTransitions());
        var_dump($timezone->getOffset($datetime));

        exit;


        var_dump($datetime->format('Y-m-d H:i:s'));
        var_dump($datetime->format(\DateTime::ISO8601));


        try{
            $ti = new \DateInterval("P1Y3M2D");
            $str = $ti->format("Y-m-d");
        }catch (\Exception $e){
            var_dump($e->getMessage());
            die();
        }

        var_dump($ti, $str);
    }

    public function actionT24(){

        $bool1 = '0000001' == '1';  // 这种判断不严谨

        $bool2 = strcmp('0000001', '0');
        var_dump($bool2);exit;

        $type = is_string('0000001');
        $type3 = is_int('0000001');
        $type2 = is_string('1');

        var_dump($type, $type2, $type3);
        exit;


        $bool3 = in_array('0000001', array('1'), true);
        var_dump($bool1, $bool2, $bool3);
        exit;
        /*
            整数是没有小数的数字。

            整数规则：

            整数必须有至少一个数字（0-9）
            整数不能包含逗号或空格
            整数不能有小数点
            整数正负均可
            可以用三种格式规定整数：十进制、十六进制（前缀是 0x）或八进制（前缀是 0）
        */

        $int= 4083;
        $hex = dechex($int);
        var_dump($hex);

        var_dump(hexdec("0xff3"));
        exit;

        $hex_string = "0xff3";
        $int_decimal = hexdec($hex_string);
        $int_hex = dechex($int_decimal);
        var_dump($int_decimal, $int_hex);


        $x = 5985;
        var_dump($x);
        echo "<br>";
        $x = -345; // 负数
        var_dump($x);
        echo "<br>";
        $x = 0x8C; // 十六进制数
        var_dump($x);
        echo "<br>";
        $x = 047; // 八进制数
        var_dump($x);
    }

    public function actionT25(){

//        $reflect = new \ReflectionFunction('ftok');
//        if (is_object($reflect)){
//            var_dump($reflect->getExtensionName());
//            die('ok');
//        }

//        var_dump(function_exists("msg_get_queue"));exit;

        if (function_exists("ftok")){

            $shmop_key = ftok(__FILE__, 'i');
        }else{
            $shmop_key = my_ftok(__FILE__);
        }

        $shmop_key = my_ftok(__FILE__);

        $ext= get_loaded_extensions();
        var_dump($ext);
        $funcs = get_extension_funcs('shmop');
        var_dump($funcs);
        $arr = get_defined_functions();
        var_dump($arr);
        exit;


        if (!function_exists('shmop_open')){
            die('func not exists');
        }

        $shmop_id = @shmop_open($shmop_key, 'c', '0644', 1024);

        var_dump($shmop_id);
    }


    public function actionT26(){

        error_reporting(E_ALL);

        $shmop_key = ftok(__FILE__, 'i');
        $shmop_id = @shmop_open($shmop_key, 'c', '0644', 6);

        if ($shmop_id === false){
            die('create shared memory block fail');
        }

        $data = "liujij";

        $res = shmop_write($shmop_id, pack("a*", $data), 0);

        if ($res === false)
        {
            die('write data to shared memroy fail');
        }
        else if($res != strlen($data))
        {
            die('write not complete data');
        }

        $size = shmop_size($shmop_id);

        var_dump($size);
        $read_data = unpack("a*", shmop_read($shmop_id, 0, $size));

        var_dump($read_data);

//        shmop_delete($shmop_id);
        shmop_close($shmop_id);

    }

    public function actionT27(){

        $shmop_key = ftok(__FILE__, 'i');
        $shmop_id = shmop_open($shmop_key, 'a', '0644', 1024);
        if ($shmop_id ===false){
            die('open shared memory block fail');
        }

        $size = shmop_size($shmop_id);

        var_dump($size);
        $read_data = unpack("a*", shmop_read($shmop_id, 0, $size));
        var_dump($read_data);

        shmop_close($shmop_id);
    }

    public function actionT28(){
        var_dump("号");
//        $a = "001";
//        $b = "1";
//        var_dump(strcmp($a, $b));
//        var_dump($a == $b, gettype($a), gettype($b));

        $large_number = 2147483647;
        var_dump($large_number);

        $large_number = 2147483648;
        var_dump($large_number);

        $sql = User::findByPk(1);
        var_dump($sql);

        $sql_2 = Model::findByPk(2);
        var_dump($sql_2);
    }


    public function actionT29(){

        if (count($_POST) > 0){
            var_dump($_POST);
            die('post');
        }

        return $this->render2('func2.t29', array(
            'name' => 'liujie',
            'age' => 20,
            'x' => "what should i do?"
        ));
    }

    public  function actionT30(){

        $simple = "<para><note>simple note</note></para>";
        $p = xml_parser_create();
        xml_parse_into_struct($p, $simple, $vals, $index);
        xml_parser_free($p);

        var_dump($index);
        var_dump($vals);
    }

    public  function actionT32(){

        $xmlData = <<<EOT
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <getEnCnTwoWayTranslator xmlns="http://WebXml.com.cn/">
      <Word>time</Word>
    </getEnCnTwoWayTranslator>
  </soap:Body>
</soap:Envelope>
EOT;

        $headers = array(
            "Content-type: text/xml;charset='utf-8'",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: http://connecting.website.com/WSDL_Service/GetPrice",
            "Content-length: ".strlen($xmlData),
        );

        $wsdl = "http://www.webxml.com.cn/WebServices/TranslatorWebService.asmx?WSDL";

        $client = new \SoapClient($wsdl);

        try{
            $res = $client->__doRequest($xmlData, $wsdl, 'getEnCnTwoWayTranslator', 1, 0);

            var_dump($res);exit;
        }catch(\SoapFault $e){
            print "Sorry an error was caught executing your request: {$e->getMessage()}";
        }

    }


    public  function actionT33(){
        $request_data = file_get_contents('php://input');

        echo $request_data;

        var_dump(getallheaders());
        var_dump($_SERVER);
    }





    public function actionT34(){
        $xml = <<<EOT
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:m="http://www.si-tech.com.cn/crm_ipd/nmbss" xmlns:fn="http://www.w3.org/2005/xpath-functions" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xalan="http://xml.apache.org/xalan" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/">
  <SOAP-ENV:Body>
    <m:nmbss>
      <m:BIPCode>NMCS030</m:BIPCode>
      <m:ActionCode>1</m:ActionCode>
      <m:ActivityCode>T030</m:ActivityCode>
      <m:ProcessTime>20180316105229</m:ProcessTime>
      <m:Response>
        <m:RspType>0</m:RspType>
        <m:RspCode>000000</m:RspCode>
        <m:RspDesc>操作成功</m:RspDesc>
      </m:Response>
      <m:SvcCont><![CDATA[<?xml version="1.0" encoding="UTF-8"?>
<AAAUserInfoRsp>
   <batech_no>5546376581</batech_no>
   <datacollection>
      <data>
         <phone>16883194245</phone>
         <SC_ID>8150010682676663</SC_ID>
         <STB_ID>11510217450023577</STB_ID>
         <STB_MAC_ID>f44c70f07e79</STB_MAC_ID>
         <MAC_ID>00246898debb</MAC_ID>
         <OBLIGATE_1/>
         <OBLIGATE_2/>
         <OBLIGATE_3/>
      </data>
      <data>
         <phone>16883201539</phone>
         <SC_ID>8150010663316198</SC_ID>
         <STB_ID>20510217320089994</STB_ID>
         <STB_MAC_ID>00e400239a12</STB_MAC_ID>
         <MAC_ID>5cc6d0b58b50</MAC_ID>
         <OBLIGATE_1/>
         <OBLIGATE_2/>
         <OBLIGATE_3/>
      </data>
   </datacollection>
</AAAUserInfoRsp>]]></m:SvcCont>
    </m:nmbss>
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
EOT;

//        $int = preg_match("/<m:Response>(.|\n)*<\/m:Response>/i", $xml, $matches);
//
//        var_dump($int, $matches);
//
//        $str = $matches[0];

        $dom = new \DOMDocument();
        $dom->loadXML($xml);
        $domElement = $dom->documentElement;

        $x = $domElement->getElementsByTagName('RspType')->item(0);

        $data = $domElement->getElementsByTagName('SvcCont')->item(0);


        $xmlObj = simplexml_load_string($data->nodeValue);

        var_dump($data->nodeValue);
        $arr = json_decode(json_encode($xmlObj), true);

        var_dump($arr);

    }


    public function actionT35(){

        $arr = [
            'name' => 'liujie',
            'id' => '',
        ];
        fputcsv();
    }



    public function actionT36(){
        $priKey="";
        $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($priKey, 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";
    }

    public function actionT37()
    {
        $str = "/vod/0010305654_E20160607094246330_2823.m3u8";

        $m = preg_match("/(?<=_).*(?=\.)/", $str, $matches);

        var_dump($m, $matches);
    }


    public function actionT38(){
        $xml = <<<EOT
<datacollection>
      <data>
         <phone>16801065391</phone>
         <cust_name>管强</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>呼伦贝尔海拉尔区海拉尔胜利四路林航站3号楼东单元2-2</addr_detall>
         <open_time>20070910</open_time>
         <birth_date/>
         <sex/>
         <region_name>01-呼伦贝尔分公司</region_name>
         <town_name>159-呼伦贝尔中心营业厅</town_name>
         <SC_ID>8150010688009331</SC_ID>
         <STB_ID>20510217430164780</STB_ID>
         <STB_MAC_ID>00e4006b5357</STB_MAC_ID>
         <MAC_ID>001d2b95aed1</MAC_ID>
      </data>
      <data>
         <phone>17101027205</phone>
         <cust_name>谷春生</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>呼伦贝尔海拉尔区海拉尔区巴尔虎西路龙运华府小区9号楼2单元401</addr_detall>
         <open_time>20180412</open_time>
         <birth_date/>
         <sex/>
         <region_name>01-呼伦贝尔分公司</region_name>
         <town_name>159-呼伦贝尔中心营业厅</town_name>
         <SC_ID>8150010681229241</SC_ID>
         <STB_ID>20510217430171377</STB_ID>
         <STB_MAC_ID>00e4006b6d1c</STB_MAC_ID>
         <MAC_ID>001d2b94ad82</MAC_ID>
      </data>
      <data>
         <phone>17502980690</phone>
         <cust_name>赵林忠</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>呼和浩特市区金桥开发区前进巷营业厅（赛罕14区金桥）呼凉路A段锦绣嘉苑A区A1-5-1102</addr_detall>
         <open_time>20180412</open_time>
         <birth_date>19541027</birth_date>
         <sex>1</sex>
         <region_name>02-呼和浩特分公司</region_name>
         <town_name>287-呼和浩特前进巷营业厅(新)</town_name>
         <SC_ID>8150010681169322</SC_ID>
         <STB_ID>20510217430178094</STB_ID>
         <STB_MAC_ID>00e4006b8759</STB_MAC_ID>
         <MAC_ID>c8afe30922b5</MAC_ID>
      </data>
      <data>
         <phone>16803174581</phone>
         <cust_name>格日勒</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>包头市区昆区学府营业厅学府四区明日星城文景苑10栋5单元309号</addr_detall>
         <open_time>20070910</open_time>
         <birth_date>19800822</birth_date>
         <sex>1</sex>
         <region_name>03-包头分公司</region_name>
         <town_name>178-包头友谊营业厅</town_name>
         <SC_ID>8150010656181237</SC_ID>
         <STB_ID>15510217310174999</STB_ID>
         <STB_MAC_ID>a8f4708cd390</STB_MAC_ID>
         <MAC_ID>847973b2d2d2</MAC_ID>
      </data>
      <data>
         <phone>17003353997</phone>
         <cust_name>王娟娟</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>包头市区东河区东兴营业厅东兴一区沙尔沁镇小巴拉盖村八区25号</addr_detall>
         <open_time>20180412</open_time>
         <birth_date>19860113</birth_date>
         <sex>0</sex>
         <region_name>03-包头分公司</region_name>
         <town_name>722-包头小巴拉盖营业厅(合作农网)</town_name>
         <SC_ID>8150010679681684</SC_ID>
         <STB_ID>15510217460239729</STB_ID>
         <STB_MAC_ID>a8f4708fd106</STB_MAC_ID>
         <MAC_ID>74b9ebd19bcb</MAC_ID>
      </data>
      <data>
         <phone>16805024900</phone>
         <cust_name>李志义</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>乌兰察布集宁区怀远南路农林局小二楼东3户</addr_detall>
         <open_time>20080626</open_time>
         <birth_date>19360329</birth_date>
         <sex>1</sex>
         <region_name>05-乌兰察布分公司</region_name>
         <town_name>180-乌兰察布解放路营业厅</town_name>
         <SC_ID>8150010666390521</SC_ID>
         <STB_ID>24510217390047032</STB_ID>
         <STB_MAC_ID>ccf8f03fad5d</STB_MAC_ID>
         <MAC_ID>c8afe331c9ad</MAC_ID>
      </data>
      <data>
         <phone>16806041186</phone>
         <cust_name>秦景明</cust_name>
         <run_code>G</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>通辽市区科尔沁区东南片区DN11中远小区2号楼4单元442区域04951922</addr_detall>
         <open_time>20070923</open_time>
         <birth_date>19560713</birth_date>
         <sex>1</sex>
         <region_name>06-通辽分公司</region_name>
         <town_name>184-通辽中心营业厅</town_name>
         <SC_ID>8150010655983336</SC_ID>
         <STB_ID>15510217310150363</STB_ID>
         <STB_MAC_ID>a8f4708c7354</STB_MAC_ID>
         <MAC_ID>001d2b8c9542</MAC_ID>
      </data>
      <data>
         <phone>16807226799</phone>
         <cust_name>李玉珍</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>赤峰市区新城区临潢大街皇家帝苑二区6号楼2单元252</addr_detall>
         <open_time>20110901</open_time>
         <birth_date>19521027</birth_date>
         <sex>0</sex>
         <region_name>07-赤峰分公司</region_name>
         <town_name>190-赤峰市新城区营业厅</town_name>
         <SC_ID>8150010658414776</SC_ID>
         <STB_ID>20510217320108604</STB_ID>
         <STB_MAC_ID>00e40023e2c4</STB_MAC_ID>
         <MAC_ID>74b9ebd184ad</MAC_ID>
      </data>
      <data>
         <phone>17409015626</phone>
         <cust_name>高建强</cust_name>
         <run_code>G</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>巴彦淖尔临河区利民东街北区峻峰华庭片华海尚都机井队平房</addr_detall>
         <open_time>20180112</open_time>
         <birth_date/>
         <sex/>
         <region_name>09-巴彦淖尔分公司</region_name>
         <town_name>195-巴彦淖尔临河营业厅</town_name>
         <SC_ID/>
         <STB_ID/>
         <STB_MAC_ID/>
         <MAC_ID/>
      </data>
      <data>
         <phone>16866042588</phone>
         <cust_name>贾日勋</cust_name>
         <run_code>A</run_code>
         <sm_code>e0</sm_code>
         <addr_detall>呼伦贝尔满洲里扎赉诺尔南区花园小区1#3-401</addr_detall>
         <open_time>20170626</open_time>
         <birth_date/>
         <sex/>
         <region_name>66-扎赉诺尔分公司</region_name>
         <town_name>297-扎赉诺尔营业厅</town_name>
         <SC_ID>8150010657277513</SC_ID>
         <STB_ID>20510217320044334</STB_ID>
         <STB_MAC_ID>00e40022e7b6</STB_MAC_ID>
         <MAC_ID>001d2b8ca0b8</MAC_ID>
      </data>
   </datacollection>
EOT;

        $xmlObj = simplexml_load_string($xml);

        $data = json_decode(json_encode($xmlObj), true);

        $data = $data['data'];

        foreach ($data as $key => $user_info)
        {
            foreach ($user_info as $k => $item)
            {
                if (is_array($item))
                {
                    $data[$key][$k] = '';
                }
            }
        }

    }


}

