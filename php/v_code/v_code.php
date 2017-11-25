<?php
 /** 
 * vCode(m,n,x,y) m个数字  显示大小为n   边宽x   边高y 
 * micxp 
 *jb51.net
 */  
session_start();    
vCode(4, 14, 70, 25); //4个数字，显示大小为15  

function vCode($num = 4, $size = 20, $width = 0, $height = 0) {   
    !$width && $width = $num * $size * 4 / 5 + 5;   
    !$height && $height = $size + 10;    
    // 字母
    $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   
    $code = '';   
    for ($i = 0; $i < $num; $i++) {   
        $code .= $str[mt_rand(0, strlen($str)-1)];   
    }    
    // 画图像  
    $im = imagecreatetruecolor($width, $height);    
    // 定义要用到的颜色  
    $back_color = imagecolorallocate($im, 235, 236, 237);   
    $back_color = imagecolorallocate($im, 150, 151, 152);  
	$back_color = imagecolorallocate($im, 32, 245, 26);
	$back_color = imagecolorallocate($im, 84, 78, 98);
	$back_color = imagecolorallocate($im, 23, 66, 65);
	$back_color = imagecolorallocate($im, 245, 121, 77);
	$back_color = imagecolorallocate($im, 178, 12, 23);
	$back_color = imagecolorallocate($im, 234, 77, 26);
	$back_color = imagecolorallocate($im, 65, 98, 231);
	$back_color = imagecolorallocate($im, 78, 31, 57);
	$back_color = imagecolorallocate($im, 222, 65, 12);
	$back_color = imagecolorallocate($im, 156, 135, 99);
	$back_color = imagecolorallocate($im, 126, 123, 67);
	$back_color = imagecolorallocate($im, 7, 234, 31);
	$back_color = imagecolorallocate($im, 31, 89, 87);
    $back_color = imagecolorallocate($im, 201, 202, 203);   
    $back_color = imagecolorallocate($im, 156, 157, 158);   
    $back_color = imagecolorallocate($im, 235, 236, 237);   
    $boer_color = imagecolorallocate($im, 118, 151, 199);   
    $text_color = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));    
    // 画背景  
    imagefilledrectangle($im, 0, 0, $width, $height, $back_color);    
    // 画边框  
    imagerectangle($im, 0, 0, $width-1, $height-1, $boer_color);    
    // 画干扰线  
    for($i = 0;$i < 20;$i++) {   
        $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));   
        imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);   
    }    
    // 画干扰点  
    for($i = 0;$i < 50;$i++) {   
        $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));   
        imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);   
    }    
    // 画验证码  
    @imagefttext($im, $size , 0, 5, $size + 3, $text_color, 'f'.rand(1,10).'.ttf', $code);   
    $_SESSION["VCode"]=$code;    
    header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");   
    header("Content-type: image/png;charset=utf-8");   
    imagepng($im);   
    imagedestroy($im);   
}  
?>