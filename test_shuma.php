<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/3/30
 * Time: 16:13
 */

//$url = "http://10.254.245.100:8085/AAA/aaa4mg";
//
//$params = array(
//    'u' => "ab9d4a6e9ff5913b0270fd67b720ff5",
//    'p' => "8",
//    'l' => "156100002",
//    'd' => "15510217460274938",
//    "pid" => "E00000005201705311712560005285299",
//    "n" => "E00000005201705311712560005285299_8000",
//    't' => "510b61bdd62ef0a8b9b1d55959360dcb"
//);
//
//$url .= "?" . http_build_query($params);
//

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//
$response = curl_exec($ch);

$response = '{"errorMessage":"","status":"0","data":{"authResult":"http://10.254.245.100:8050/AAA/aaa4mg?u=1sdsd111&p=sdsd8&l=2323sdsds2323&d=155102174sdsd602749381111&pid=20170531171sdsds256000528529911&n=E00000285299_800sdsdsd0&t=510b61bdd62ef0asdsdbsdsdsd&errorcode=0&sid=VhyRRI4DRqT46HfGfHguMw%3D%3D&reqtime=20180330165201&expiredtime=20180330175201&nonce=fQCEe4fz4cxZ&acl=0&errorReason=0&previewduration=60&n=E00000285299_800sdsdsd0"}}';

if ($response === false){
    var_dump(curl_errno($ch), curl_error($ch));
}else{

    $x = json_decode($response, true);

    if (is_array($x) && $x['status'] =="0"){
        $url_arr = parse_url($x['data']['authResult']);
        $params = explode('&', $url_arr['query']);

        foreach ($params as $str){
            $arr = explode('=', $str);
            if ($arr[0] =='sid'){
                $sid = $arr[1];
            }
            if ($arr[0] == 'acl'){
                $acl = $arr[1];
            }
        }

        $sid = isset($sid) ? urldecode($sid) : '';
        $acl = isset($acl) ? urldecode($acl) : '';

        var_dump($sid, $acl);
    }else{
        echo 'parse response fail';
    }
}

//curl_close($ch);