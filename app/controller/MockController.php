<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/6/22
 * Time: 14:35
 */
namespace app\controller;

class MockController extends BaseController
{
    public function actionGetUserInfo()
    {
        $xml = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:m="http://www.si-tech.com.cn/crm_ipd/nmbss" xmlns:fn="http://www.w3.org/2005/xpath-functions" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xalan="http://xml.apache.org/xalan" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/">
  <SOAP-ENV:Body>
    <m:nmbss>
      <m:BIPCode>NMCS030</m:BIPCode>
      <m:ActionCode>1</m:ActionCode>
      <m:ActivityCode>T030</m:ActivityCode>
      <m:ProcessTime>20180622022955</m:ProcessTime>
      <m:Response>
        <m:RspType>0</m:RspType>
        <m:RspCode>000000</m:RspCode>
        <m:RspDesc>操作成功</m:RspDesc>
      </m:Response>
      <m:SvcCont><![CDATA[<?xml version="1.0" encoding="UTF-8"?>
<AAAUserInfoRsp>
   <batech_no>5555872539</batech_no>
   <datacollection>
      <data>
         <phone>16890027666</phone>
         <cust_name>同步测试3</cust_name>
         <run_code>A</run_code>
         <sm_code>d1</sm_code>
         <addr_detall>乌兰察布卓资县十八台</addr_detall>
         <open_time>20180619</open_time>
         <birth_date>19680925</birth_date>
         <sex>0</sex>
         <region_name>91-卓资山分公司2</region_name>
         <town_name>366-卓资山营业厅2</town_name>
         <SC_ID>8150010687743252</SC_ID>
         <STB_ID>15510217460283577</STB_ID>
         <STB_MAC_ID>a8f470907c77</STB_MAC_ID>
         <MAC_ID/>
         <ADDRESS_ID>3000646</ADDRESS_ID>
      </data>
   </datacollection>
</AAAUserInfoRsp>]]></m:SvcCont>
    </m:nmbss>
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope>

EOT;

        echo $xml;
    }

    public function actionConfirmSync()
    {
        $xml = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:m="http://www.si-tech.com.cn/crm_ipd/nmbss" xmlns:fn="http://www.w3.org/2005/xpath-functions" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xalan="http://xml.apache.org/xalan" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/">
  <SOAP-ENV:Body>
    <m:nmbss>
      <m:BIPCode>NMCS009</m:BIPCode>
      <m:ActionCode>1</m:ActionCode>
      <m:ActivityCode>T0011</m:ActivityCode>
      <m:ProcessTime>20180622023017</m:ProcessTime>
      <m:Response>
        <m:RspType>0</m:RspType>
        <m:RspCode>000000</m:RspCode>
        <m:RspDesc>操作成功</m:RspDesc>
      </m:Response>
      <m:SvcCont/>
    </m:nmbss>
  </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
EOT;

        echo $xml;
    }

    public function actionTest()
    {
//        $begin_date = "2018-06-28 15:00:00";
//        $end_date = "2018-07-28 15:00:00";
//
//        $x = strtotime($end_date) - strtotime($begin_date);
//
//        var_dump($x);

        $res = array(
            "transaction_id" => "test_001",
            "type"=> "1",
            "user_id"=>"16847014911",
            "product_code"=>"test_sync_cycle_auth1",
            "begin_date"=>"2018-06-28 15:00:00",
            "end_date"=>"2018-07-28 15:00:00",
            "sign"=>"6E229E35AD4D020570767670FEA7ECD2"
        );


        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }


    public function actionH5()
    {
        header("Location:https://www.baidu.com");
    }

    public function actionT1()
    {
        $str = '<!DOCTYPE html><html><head><title>Apache Tomcat\/8.0.33 - Error report<\/title><style type=\"text\/css\">H1 {font-family:Tahoma,Arial,sans-serif;color:white;background-color:#525D76;font-size:22px;} H2 {font-family:Tahoma,Arial,sans-serif;color:white;background-color:#525D76;font-size:16px;} H3 {font-family:Tahoma,Arial,sans-serif;color:white;background-color:#525D76;font-size:14px;} BODY {font-family:Tahoma,Arial,sans-serif;color:black;background-color:white;} B {font-family:Tahoma,Arial,sans-serif;color:white;background-color:#525D76;} P {font-family:Tahoma,Arial,sans-serif;background:white;color:black;font-size:12px;}A {color : black;}A.name {color : black;}.line {height: 1px; background-color: #525D76; border: none;}<\/style> <\/head><body><h1>HTTP Status 500 - Request processing failed; nested exception is java.lang.NullPointerException<\/h1><div class=\"line\"><\/div><p><b>type<\/b> Exception report<\/p><p><b>message<\/b> <u>Request processing failed; nested exception is java.lang.NullPointerException<\/u><\/p><p><b>description<\/b> <u>The server encountered an internal error that prevented it from fulfilling this request.<\/u><\/p><p><b>exception<\/b><\/p><pre>org.springframework.web.util.NestedServletException: Request processing failed; nested exception is java.lang.NullPointerException\n\torg.springframework.web.servlet.FrameworkServlet.processRequest(FrameworkServlet.java:978)\n\torg.springframework.web.servlet.FrameworkServlet.doPost(FrameworkServlet.java:868)\n\tjavax.servlet.http.HttpServlet.service(HttpServlet.java:648)\n\torg.springframework.web.servlet.FrameworkServlet.service(FrameworkServlet.java:842)\n\tjavax.servlet.http.HttpServlet.service(HttpServlet.java:729)\n\torg.apache.tomcat.websocket.server.WsFilter.doFilter(WsFilter.java:52)\n\torg.springframework.web.filter.CharacterEncodingFilter.doFilterInternal(CharacterEncodingFilter.java:88)\n\torg.springframework.web.filter.OncePerRequestFilter.doFilter(OncePerRequestFilter.java:107)\n<\/pre><p><b>root cause<\/b><\/p><pre>java.lang.NullPointerException\n<\/pre><p><b>note<\/b> <u>The full stack trace of the root cause is available in the Apache Tomcat\/8.0.33 logs.<\/u><\/p><hr class=\"line\"><h3>Apache Tomcat\/8.0.33<\/h3><\/body><\/html>';
        $str = str_replace('\\', '', $str);

        echo $str;exit;
    }


    public function actionT2()
    {
        $str = 'HDCAUTH appid="liulei_month",token="7a851b4606c2ed04ff4e38911cde40be77941bc3f73f7549d81eb06d27d30260"';

        $res = preg_match("/token=.*/", $str, $matches);

        if ($res)
        {
            $arr = explode('=', $matches[0]);
            $token = trim($arr[1], '\"');
        }

        var_dump($res, $matches, $token);
    }


    public function actionT3()
    {
        header("statuscode: 1");


    }

}