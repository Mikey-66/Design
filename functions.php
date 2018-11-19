<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/24
 * Time: 10:49
 */
if (!function_exists('dd')){
    function dd($var, $header = true, $echo = true, $label = null, $strict = true) {
        static $has_dump;

        if(!$has_dump && $header){
            header('Content-Type:text/html; charset=utf-8');
        }

        $has_dump = true;

        $label = ($label === null) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = '<pre>' . $label . htmlspecialchars(print_r($var, true), ENT_QUOTES) . '</pre>';
            } else {
                $output = '<pre>' . $label . print_r($var, true) . '</pre>';
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo($output);
            return null;
        } else
            return $output;
    }
}

/**
 * 简单对称加密算法之加密
 */
function email_encode($string = '', $skey = 'starcor') {
    $strArr 	= str_split(base64_encode($string));
    $strCount 	= count($strArr);
    foreach (str_split($skey) as $key => $value)
    {
        $key < $strCount && $strArr[$key].=$value;
    }
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}

/**
 * 简单对称加密算法之解密
 */
function email_decode($string = '', $skey = 'starcor') {
    $strArr 	= str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
    $strCount 	= count($strArr);
    foreach (str_split($skey) as $key => $value)
    {
        $key <= $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
    }
    return base64_decode(join('', $strArr));
}

if (!function_exists('my_scandir')){
    function my_scandir($dir){
        $files = array();
        if(is_dir($dir)){
            if ($handle = opendir($dir)) {
                while (( $file = readdir($handle)) !== false ) {
                    if ($file != "." && $file != "..") {
                        if (is_dir($dir."/".$file)) {
                            $files[$file] = my_scandir($dir."/".$file);
                        } else {
                            $files[] = $dir."/".$file;
                        }
                    }
                }
                closedir($handle);
                return $files;
            }
        }
    }
}


/**
 *  检查IP是否在某个IP段内 (仅适用于IPV4)
 *
 * @param string $ip
 * @param string $ip_range x.x.x.x~x.x.x.x,x.x.x.x~x.x.x.x,xxx.xxx.xxx.xxx
 * @return bool
 *
 */
function check_range_of_ip($ip, $ip_range)
{
    //检查参数
    if(!filter_var($ip,FILTER_VALIDATE_IP) || strlen($ip_range)<1)
    {
        return false;
    }

    $ip_range = trim($ip_range,',');

    $ip_range_arr = explode(',',$ip_range);

    if(is_array($ip_range_arr))
    {
        //将IP转换为十进制
        $iplong = bindec(decbin(ip2long($ip)));
        foreach($ip_range_arr as $ip_v)
        {
            if(strpos($ip_v,'~')!==false)
            {

                $ip_seg = explode('~',$ip_v);

                //将IP转换为十进制
                $ipseg0long =bindec(decbin(ip2long($ip_seg[0])));
                $ipseg1long =bindec(decbin(ip2long($ip_seg[1])));

                if($iplong >= $ipseg0long && $iplong <= $ipseg1long)
                {
                    return true;
                }
            }
            else
            {
                if($ip_v == $ip)
                {
                    return true;
                }
            }
        }
    }

    return false;
}

function check_ip_type($ipAddress){

    if(filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) {
        $isIpV6 = true;
    }
    else if(filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false) {
        $isIpV4 = true;
    }

    // todo
}