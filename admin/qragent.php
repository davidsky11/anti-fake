<?php
error_reporting(0);
require("../data/session.php");
require("../data/head.php");
require('../data/reader.php');
include 'phpqrcode.php'; 
$codeurl=$cf['site_url'];
?>
<?php
$act = $_GET["act"];
if($act == "")
{
echo "<script>alert('错误：二维码参数错误！');location.href='http://www.ew80.com'</script>";}
?>

<?php
if($act == "edit"){

    $editid = $_GET["id"];

	$sql="select * from tgs_agent where id='$editid' limit 1";

	//echo $sql;

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

	$rn         = "查看二维码";


?>
<html>
<!DOCTYPE html>
<head>
 <meta charset="utf-8">
      <title>易网防伪防串货系统翼云版</title>
        <!-- CSS -->
		<link href="css/admin.css" rel="stylesheet" type="text/css">
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
        <script type="text/javascript" src="js/select-ui.min.js"></script>
</head>
<div class="headbox">
  <div id="topnavbar" style="display: block;">
<div class="headmenu">

	<a href="admin.php?act=add" target="rightFrame" class="btn2"><i class="fa fa-paper-plane"></i> 批量新增防伪码</a>
	<a href="admin.php?act=add2" target="rightFrame" class="btn2"><i class="fa fa-plus"></i> 单条新增防伪码</a>
	<a href="admin.php?act=import" target="rightFrame" class="btn2"><i class="fa fa-line-chart"></i> 导入防伪码</a>
	<a href="admin.php?act=query_record" target="rightFrame" class="btn2"><i class="fa fa-search"></i> 查询记录</a>
	<a href="/index.php" target="_blank" class="btn2"><i class="fa fa-tv"></i> 查询前端</a>
  </div>
  </div>
</div>
<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">
  <tr>
    <td valign="top">
   
      <table cellpadding="3" cellspacing="1" class="table_98">
        <tr>
          <td colspan="2" align="left"><div class="formtitle"><span><?php echo $rn?></span></div>
            <input name="editid2" type="hidden" id="qrcodeid" value="<?php echo $editid?>" /></td>
        </tr>
        <tr >
          <td height="54" colspan="2"><?php    
$value = "$codeurl/waplist.php?keyword=$agentid"; //二维码内容 
$errorCorrectionLevel = 'H';//容错级别 
$matrixPointSize = 5;//生成图片大小 
//生成二维码图片 
QRcode::png($value, 'qrcodeimg/qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$logo = 'qrcodeimg/qlogo.png';//准备好的logo图片 
$QR = 'qrcodeimg/qrcode.png';//已经生成的原始二维码图 
  
if ($logo !== FALSE) { 
 $QR = imagecreatefromstring(file_get_contents($QR)); 
 $logo = imagecreatefromstring(file_get_contents($logo)); 
 $QR_width = imagesx($QR);//二维码图片宽度 
 $QR_height = imagesy($QR);//二维码图片高度 
 $logo_width = imagesx($logo);//logo图片宽度 
 $logo_height = imagesy($logo);//logo图片高度 
 $logo_qr_width = $QR_width / 5; 
 $scale = $logo_width/$logo_qr_width; 
 $logo_qr_height = $logo_height/$scale; 
 $from_width = ($QR_width - $logo_qr_width) / 2; 
 //重新组合图片并调整大小 
 imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, 
 $logo_qr_height, $logo_width, $logo_height); 
} 
//输出图片 
imagepng($QR, "qrcodeimg/ew80qragent.png"); 
echo "<img src='qrcodeimg/ew80qragent.png'>";  

//易网软件备注：图片会另存方案
// imagepng($QR, "qrcodeimg/$bianhao.png"); 
// echo "<img src='qrcodeimg/$bianhao.png'>";  
 ?>
</td>
        </tr>
        <tr >
          <td height="74" colspan="2" valign="bottom"><?php QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, $margin);  ?>
            <div class="tip2">扫码验证真假。使用导出功能导出二维码字符串，印刷公司根据字符串即可印刷二维码.</div></td>
        </tr>
        <tr >
          <td height="45" colspan="2"><h3>代理商编号： <?php echo $agentid ?></h3></td>
        </tr>
        <tr >
          <td height="45" colspan="2"><h3>代理商姓名： <?php echo $name ?></h3></td>
        </tr>
        <tr >
          <td height="45" colspan="2"><h3>代理商手机：<?php echo $phone ?></h3></td>
        </tr>
        <tr >
          <td height="48"><h3>代理商微信：<?php echo $weixin ?></h3></td>
        </tr>
        <tr >
          <td height="45" colspan="2" valign="middle"><h3>代理产品：<?php echo $product ?></h3></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php 
}
?>

