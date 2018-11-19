<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/22
 * Time: 18:17
 * PHP 在 Cmd模式下与用户交互
 */
if (trim(php_sapi_name()) !='cli'){
    echo "please run in command line mode";
    die();
}

echo "hi, can i help u ?" . PHP_EOL;
$handle = fopen("php://stdin", "r");
$line = fgets($handle);
if (trim($line) !='yes'){
    echo "ABORTING!\n";
    die();
}

echo "\n";
echo "Thank U";

echo PHP_EOL;
echo "now, please choose level, the following choice is avaliable :";
echo PHP_EOL;
echo "A";
echo PHP_EOL;
echo "B";
echo PHP_EOL;
echo "C";
echo PHP_EOL;
echo "D";
echo PHP_EOL;


$line = fgets($handle);

if (!in_array(trim($line), ["A", "B", "C", "D"])){
    echo "invalid choice, please choose again!";
    $line = fgets($handle);
}else{
    echo "your choice is {$line}" . PHP_EOL;
}





