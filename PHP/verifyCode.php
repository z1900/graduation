<?php 
/**
 * @param  source   字体文件路径
 * @param  integer  验证码图片宽度
 * @param  integer  验证码图品高度
 * @param  integer  干扰像素个数
 * @param  integer  干扰线段个数
 * @param  integer  干扰弧度个数
 * @return void
 */
ob_clean();
header("Content-type: image/jpeg");
function verify($fontfile, $width=180, $height=50, $length=4, $pixel=100, $line=0, $arc=2) {
	// $width=180;
	// $height=40;
	$image=imagecreatetruecolor($width, $height);
	$white=imagecolorallocate($image, 255, 255, 255);
	imagefilledrectangle($image,0, 0, $width, $height, $white);
	function randColor($image) {
		return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
	}
	$str=join("", array_merge(range(0, 9), range("a", "z")));
//取得字体宽度
	$textWidth=imagefontwidth(26);
//取得字体高度
	$textHeight=imagefontheight(26);
	for ($i=0; $i < $length; $i++) { 
		$size=mt_rand(20, 26);
		$angle=mt_rand(-15, 15);
		$randCol=randColor($image);
	// $x=40+20*$i;
	// $y=30;
		$x=($width/$length)*$i+$textWidth;
		$y=mt_rand(25, $height-$textHeight);	
		$text=str_shuffle($str)[0];	
		imagettftext($image, $size, $angle, $x, $y, $randCol, $fontfile, $text);
		$string.=$text;	
	}
	//把验证码存入session会话中
		session_start();
		$_SESSION["codeName"]=$string;



//绘制像素点干扰元素
	if ($pixel>0) {
		for ($i=0; $i < $pixel; $i++) { 
			imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), randColor($image));
		}
	}

//绘制线段干扰元素
	if ($line>0) {
		for ($i=0; $i < $line; $i++) { 
			imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), randColor($image));
		}
	}

//绘制圆弧 imagearc(image, cx, cy, width, height, start, end, color)
	if ($arc>0) {
		for ($i=0; $i < $arc; $i++) { 
			imagearc($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width/2), mt_rand(0, $height/2), mt_rand(0, 360), mt_rand(0, 360), randColor($image));
		}
	}

	header("content-type:image/png");
	imagepng($image);
	imagedestroy($image);
}

verify("../font/msyh.ttc");