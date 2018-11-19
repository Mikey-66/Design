<?php

$image = "cut.jpg"; // 原图
$imgstream = file_get_contents($image);
$im = imagecreatefromstring($imgstream);

$x = imagesx($im);//获取图片的宽
$y = imagesy($im);//获取图片的高
// 缩略后的大小
$xx = intval($x * 1);
$yy = intval($y * 1);
if(function_exists("imagecreatetruecolor"))
{
    $dim = imagecreatetruecolor($xx, $yy); // 创建目标图gd2
}
else
{
    $dim = imagecreate($xx, $yy); // 创建目标图gd1
}
imageCopyreSampled($dim, $im, 0, 0, 0, 0, $xx, $yy, $x, $y);
header("Content-type: image/jpeg");
imagejpeg($dim, null, 10);