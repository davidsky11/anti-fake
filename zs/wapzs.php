<?php
require("../data/head.php");
$keyword = $_GET["keyword"];
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
	


//��ȡ֤�鱳��ͼƬ
$im = imagecreatefrompng("wapzs.png");
//����������ɫ
$color=imagecolorallocate($im,0,0,0);
//��ȡ֤���ϵ��ֶ�����
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
//��ȡ��������

$font = 'msyh.ttf';

//�������ִ�С

$fontSize =13;
$fontSize2 =12;
//��ȡͼƬA�Ŀ��

list($width, $height, $type, $attr) = getimagesize("wapzs.png"); 

//��������X

$x=16;

//��������Y

$fontY = 265;
//�������ֵ�λ�� �������ֱַ�Ϊб�ȣ�X��Y����

imagettftext($im,$fontSize,0,120,265,$color,$font,$t1); 
imagettftext($im,$fontSize,0,240,265,$color,$font,$t2);
imagettftext($im,$fontSize,0,60,300,$color,$font,$t3);
imagettftext($im,$fontSize,0,180,300,$color,$font,$t4);
imagettftext($im,$fontSize,0,110,340,$color,$font,$t5);
imagettftext($im,$fontSize,0,280,340,$color,$font,$t6);
imagettftext($im,$fontSize2,0,125,455,$color,$font,$t7);
imagettftext($im,$fontSize2,0,240,455,$color,$font,$t8);
imagettftext($im,$fontSize2,0,130,480,$color,$font,$t9);

$dest=imagecreatetruecolor($width,$height+$height2);

imagecopy($dest,$im,0,0,0,0,$width,$height);


//����ͼƬ�������

header('Content-type: image/png');

//����ͼƬ

imagepng($im);
imagedestroy($im) ;


?>