<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/18
 * Time: 18:40
 */

phpinfo();exit;
$content = "";
for($i=1; $i<1010;$i++){
    $content .= $i . PHP_EOL;
}

$filename = "t.txt";

file_put_contents($filename, $content);
exit('ok');