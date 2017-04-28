<?php
error_reporting(0);
require("../data/head.php");
$keyword = trim($_GET["keyword"]);
$sql="select * from tgs_agent where weixin='$keyword' or qq='$keyword' or phone='$keyword' or agentid='$keyword' or name='$keyword'  limit 1";
	$result=mysql_query($sql);
	$arr=mysql_fetch_array($result);
	
	$agentid      = $arr["agentid"];

	$product      = $arr["product"];

	$quyu         = $arr["quyu"];

	$shuyu        = $arr["shuyu"];

	$qudao        = $arr["qudao"];

	$about        = $arr["about"];

	$addtime      = $arr["addtime"];

	$jietime      = $arr["jietime"];

	$name         = $arr["name"];

	$tel          = $arr["tel"];

	$fax          = $arr["fax"];

	$phone        = $arr["phone"];

	$danwei       = $arr["danwei"];

	$email        = $arr["email"];

	$url          = $arr["url"];

	$qq           = $arr["qq"];

	$weixin       = $arr["weixin"];

	$wangwang     = $arr["wangwang"];

	$paipai       = $arr["paipai"];

	$zip          = $arr["zip"];

	$dizhi          = $arr["dizhi"];

	$beizhu       = $arr["beizhu"];

//读取证书背景图片
$im = imagecreatefrompng("zs.png");
//定义字体颜色
$color=imagecolorallocate($im,0,0,0);
//获取证书上的字段名字
$text1 = $name;
$text2 = $product;
$text3 = $qudao;
$text4 = $quyu;
$text5 = $phone;
$text6 = $weixin;
$text7 = $addtime;
$text8 = $jietime;
$text9 = $agentid;
$t1 = mb_convert_encoding($text1, "html-entities","utf-8" );
$t2 = mb_convert_encoding($text2, "html-entities","utf-8" );
$t3 = mb_convert_encoding($text3, "html-entities","utf-8" );
$t4 = mb_convert_encoding($text4, "html-entities","utf-8" );
$t5 = mb_convert_encoding($text5, "html-entities","utf-8" );
$t6 = mb_convert_encoding($text6, "html-entities","utf-8" );
$t7 = mb_convert_encoding($text7, "html-entities","utf-8" );
$t8 = mb_convert_encoding($text8, "html-entities","utf-8" );
$t9 = mb_convert_encoding($text9, "html-entities","utf-8" );
//获取文字字体
$font = 'msyh.ttf';
//设置文字大小
$fontSize =18;
$fontSize2 =14;
//获取图片的宽高
list($width, $height, $type, $attr) = getimagesize("zs.png"); 

//定义文字X

$x=16;

//定义文字Y

$fontY = 265;

//定义文字的位置 三个数字分别为斜度，X和Y坐标
imagettftext($im,$fontSize,0,150,345,$color,$font,$t1); 
imagettftext($im,$fontSize,0,315,345,$color,$font,$t2);
imagettftext($im,$fontSize,0,80,395,$color,$font,$t3);
imagettftext($im,$fontSize,0,235,395,$color,$font,$t4);
imagettftext($im,$fontSize,0,135,445,$color,$font,$t5);
imagettftext($im,$fontSize,0,360,445,$color,$font,$t6);
imagettftext($im,$fontSize2,0,160,590,$color,$font,$t7);
imagettftext($im,$fontSize2,0,290,590,$color,$font,$t8);
imagettftext($im,$fontSize2,0,170,625,$color,$font,$t9);

$dest=imagecreatetruecolor($width,$height+$height2);

imagecopy($dest,$im,0,0,0,0,$width,$height);


//设置图片输出类型

header('Content-type: image/png');

//生成图片

imagepng($im);
imagedestroy($im) ;
?>
