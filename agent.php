<?php

//代理商查询
//易网软件 www.ew80.com  QQ:270012912
//界面模板可根据用户的需求订制。

error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php");
$act = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'agent';
 if($act == "agent"){
	 $result_str = unstrreplace($cf['agents']);
	 ////模板选择
	 if($_REQUEST['themes']!=""){
	   $_SESSION['ag_themes'] = $_REQUEST['themes'];	 
	 }else if($_SESSION['ag_themes'] == ""){
	   $_SESSION['ag_themes'] = $cf['agent_themes'];
	 }
	 require("themes/".$_SESSION['ag_themes']."/index.php");
	 echo "<!--Power by http://www.ew80.com-->";
 }
 ////ajax 查询返回
 if($act == "query"){ 
	$keyword = trim($_GET["keyword"]);	
	$search  = $_GET['search'];
	$yzm     = trim($_GET['yzm']);
	$result  = 0;
	$msg0    = 1;	
    //输入不为空
	if($keyword != ""){
	  if($cf['yzm_status'] == 1 && $yzm == ""){
		 $msg1 = "请输入验证码";
		 $msg0 = 0;		
	  }
	  if($cf['yzm_status'] == 1 && $yzm != $_SESSION['authnum_session']){
		 $msg1 = "验证码输入错误";
		 $msg0 = 0;
	  }      
	  if($msg0 == 1){
	   $sql="select * from tgs_agent where weixin='$keyword' || qq='$keyword' || phone='$keyword' || agentid='$keyword' || name='$keyword' limit 1";
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
		  $results     = "电脑查询  [真]第一次查询";
		  $msg1        = str_replace("{{weixin}}",$weixin,unstrreplace($cf['agent_1']));
		  if($_SESSION['s_query_time']==""){
			 $_SESSION['s_query_time'] = $query_time;
		   }	
		   ////非第一次查询	   
		   if($hits>0){			
			   $results =  "电脑查询  [真] 非第一次查询";
			   $msg1    = str_replace("{{weixin}}",$weixin,unstrreplace($cf['agent_2']));
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
		  mysql_query("update tgs_agent set hits=hits+1,query_time='".$GLOBALS['tgs']['cur_time']."' where weixin='".$keyword."' or agentid='".$keyword."'  or qq='".$keyword."'  or phone='".$keyword."' limit 1");		  
		  $msg0 = 1;
	   }else{
		 $results =  "电脑查询  [假]没有找到该代理信息";		 
		 $msg1   = str_replace("{{keyword}}",$weixin,unstrreplace($cf['agent_3']));
	   }
	   ///保存查询记录
	   $sql = "insert into tgs_hisagent set keyword='".$keyword."',results='".$results."',addtime='".$GLOBALS['tgs']['cur_time']."',addip='".$GLOBALS['tgs']['cur_ip']."'";
	   mysql_query($sql);
	  }	
	}else{
	    $msg1 = "请输搜索关键词！";
	}
  echo $msg0."|".$msg1;
 }
?>