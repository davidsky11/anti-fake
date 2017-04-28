<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php");
require("data/fwdl.php");
?>
<html>
<!DOCTYPE html>
<html lang="en" class="no-js">
 <head>
        <meta charset="utf-8">
      <title><?php echo $cf['site_name']?></title>
      <meta name="keywords" content="<?php echo $cf['page_keywords']?>" />
      <meta name="description" content="<?php echo $cf['page_desc']?>" />
        <!-- CSS -->
        <link rel="stylesheet" href="themes/default/css/style.css">
        <SCRIPT type="text/javascript" src="data/js/ajax.js"></SCRIPT>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	<script type="text/javascript">
var mobileAgent = new Array("iphone", "ipod", "ipad", "android", "mobile", "blackberry", "webos", "incognito", "webmate", "bada", "nokia", "lg", "ucweb", "skyfire");
var browser = navigator.userAgent.toLowerCase(); 
var isMobile = false; 
for (var i=0; i<mobileAgent.length; i++){ if (browser.indexOf(mobileAgent[i])!=-1){ isMobile = true; 
//alert(mobileAgent[i]); 
location.href = 'wap.php';
break; } } 
</script>	
        </head>

<body>

 <div class="page-container">
		<!--顶部信息 -->
		<div class="header">
		  <div class="top">
		       <div class="t_l"><img src="themes/default/images/logo.png"></div>
		        <div class="t_r">
				<h1><?php echo $cf['site_name']?></h1> 
		        <h4>国内领先的代理授权查询系统，助您轻松管理代理商(微商）渠道</h4> 
		        </div>
		       
		   </div>
		</div>
		<!--顶部结束 -->
		
		<div class="main">
			<div class="welcome"> <h3>查询代理商授权真伪</h3></div>
		<div class="sbox">
<?php
$keyword = trim($_GET["keyword"]);
	$result  = 0;
	$msg0    = 1;	
	  if($msg0 == 1){
$sql="select * from tgs_agent where weixin='$keyword' or qq='$keyword' or phone='$keyword' or agentid='$keyword' or name='$keyword'  limit 1";
	   $res=mysql_query($sql);
	   if(mysql_num_rows($res)>0){
	   
	      $arr = mysql_fetch_array($res);
		  $agentid  =  $arr["agentid"];
		  $product  =  $arr["product"];
		  $quyu     =  $arr["quyu"];
		  $shuyu    =  $arr["shuyu"];   
		  $qudao    =  $arr["qudao"];
		  $url      =  $arr["url"];
		  $about    =  $arr["about"];
		  $addtime  =  $arr["addtime"];
		  $jietime  =  $arr["jietime"];		   
		  $name     =  $arr["name"];
		  $tel      =  $arr["tel"];
		  $fax      =  $arr["fax"];
		  $phone    =  $arr["phone"];
		  $danwei   =  $arr["danwei"];		   
		  $email    =  $arr["email"];
		  $qq       =  $arr["qq"];
		  $weixin   =  $arr["weixin"];
		  $wangwang =  $arr["wangwang"];
		  $paipai   =  $arr["paipai"];
		  $zip      =  $arr["zip"];
		  $dizhi    =  $arr["dizhi"];
		  $beizhu   =  $arr["beizhu"];		   
		  $query_time  = $arr["query_time"];
		  $hits        = $arr['hits'];		   
		  $results     = "电脑端查询 [真] 第一次查询";
		   $msg1        = str_replace("{{product}}",$product,unstrreplace($cf['agent_1']));
		   if($_SESSION['s_query_time']==""){
			 $_SESSION['s_query_time'] = $query_time;
		   }		   
		   if($hits>0){		
			   $results = "电脑端查询 [真] 非第一次查询";
			   $msg1        = str_replace("{{product}}",$product,unstrreplace($cf['agent_2']));
		   }
		    $msg1        = str_replace("{{agentid}}",$agentid,$msg1);
			$msg1        = str_replace("{{product}}",$product,$msg1);
			$msg1        = str_replace("{{quyu}}",$quyu,$msg1);
			$msg1        = str_replace("{{shuyu}}",$shuyu,$msg1);
			$msg1        = str_replace("{{qudao}}",$qudao,$msg1);
			$msg1        = str_replace("{{url}}",$url,$msg1);
			$msg1        = str_replace("{{about}}",$about,$msg1);
			$msg1        = str_replace("{{addtime}}",$addtime,$msg1);
			$msg1        = str_replace("{{jietime}}",$jietime,$msg1);
			$msg1        = str_replace("{{name}}",$name,$msg1);
			$msg1        = str_replace("{{tel}}",$tel,$msg1);
			$msg1        = str_replace("{{fax}}",$fax,$msg1);
			$msg1        = str_replace("{{bianhao}}",$bianhao,$msg1);
			$msg1        = str_replace("{{phone}}",$phone,$msg1);
			$msg1        = str_replace("{{danwei}}",$danwei,$msg1);
			$msg1        = str_replace("{{email}}",$email,$msg1);
			$msg1        = str_replace("{{qq}}",$qq,$msg1);
			$msg1        = str_replace("{{weixin}}",$weixin,$msg1);
			$msg1        = str_replace("{{wangwang}}",$wangwang,$msg1);
			$msg1        = str_replace("{{paipai}}",$paipai,$msg1);
			$msg1        = str_replace("{{zip}}",$zip,$msg1);
			$msg1        = str_replace("{{dizhi}}",$dizhi,$msg1);
			$msg1        = str_replace("{{beizhu}}",$beizhu,$msg1);
            $msg1        = str_replace("{{hits}}",$hits+1,$msg1);
			$msg1        = str_replace("{{query_time}}",$_SESSION['s_query_time'],$msg1);			    
		  mysql_query("update tgs_agent set hits=hits+1,query_time='".$GLOBALS['tgs']['cur_time']."' where agentid='".$agentid."' limit 1");	  
		  $msg0 = 1;
	   }
	   else
	   {
		 $results = "电脑端查询 [假] 找不到代理信息";	 
		 $msg1   = str_replace("{{bianhao}}",$bianhao,unstrreplace($cf['agent_3']));
	   }
		$sql = "insert into tgs_hisagent  set keyword='".$agentid."',results='".$results."',addtime='".$GLOBALS['tgs']['cur_time']."',addip='".$GLOBALS['tgs']['cur_ip']."'";
		mysql_query($sql);
	}else{
	    $msg1 = "请输入关键词";
	}
//echo $msg0."|".$msg1;  
 echo $msg1;
?>
</div>
</div>
</div>

		<!--底部版权说明 -->
		<div class="foot">
		 <span class="copyright">
		 <?php echo $cf['site_name']?> copyright © 2016 <a href="http://www.ew80.com" target="_blank">www.ew80.net</a> 版权所有<br>易网软件 简单易用  高效管理产品防伪和产品防串货</span>		</div>
		 
		 <!--版权说明结束 -->
		 
		  </div>
    </body>
</html>
