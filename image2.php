<?php

$fontfile = __DIR__ . DIRECTORY_SEPARATOR . 'FZDHTJW.TTF';
$code = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'code.txt');
$code = explode("、", $code);
$code = array_filter($code);
foreach($code as &$info)
{
    $info = trim($info);
}
unset($info);
$image = imagecreatetruecolor(300, 90);    //1>设置验证码图片大小的函数
//5>设置验证码颜色 imagecolorallocate(int im, int red, int green, int blue);
$bgcolor = imagecolorallocate($image, 255, 255, 255); //#ffffff
//6>区域填充 int imagefill(int im, int x, int y, int col) (x,y) 所在的区域着色,col 表示欲涂上的颜色
imagefill($image, 0, 0, $bgcolor);

$arr_content = array();
$content = $code[rand(0, count($code) - 1)];
$length = mb_strlen($content, 'UTF-8');
for($i = 0; $i < $length; $i++)
{
    $arr_content[] = mb_substr($content, $i, 1);
}
//设置字体大小
$fontsize = 32;
//10>.=连续定义变量
for($i = 0; $i < 4; $i++)
{
    //设置字体颜色，随机颜色
    $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));      //0-120深颜色
    //设置数字
    $fontcontent = $arr_content[$i];
    //10>.=连续定义变量
    //设置坐标
    $x = ($i * 200 / 3) + rand(10, 15);
    $y = rand(40, 70);
    imagettftext($image, $fontsize, 0, $x, $y, $fontcolor, $fontfile, $fontcontent);
}
for($i = 0; $i < 5000; $i++)
{
    //设置点的颜色，50-200颜色比数字浅，不干扰阅读
    $pointcolor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
    //imagesetpixel — 画一个单一像素
    imagesetpixel($image, rand(1, 299), rand(1, 89), $pointcolor);
}
//9>增加干扰元素，设置横线
for($i = 0; $i < 20; $i++)
{
    //设置线的颜色
    $linecolor = imagecolorallocate($image, rand(80, 220), rand(80, 220), rand(80, 220));
    //设置线，两点一线
    imageline($image, rand(1, 299), rand(1, 89), rand(1, 299), rand(1, 89), $linecolor);
}
//设置坐标

//2>设置头部，image/png
header('Content-Type: image/png');
//3>imagepng() 建立png图形函数
imagepng($image);
//4>imagedestroy() 结束图形函数 销毁$image
imagedestroy($image);