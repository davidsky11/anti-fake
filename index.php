<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php");
$act = isset($_REQUEST['act']) ? trim($_REQUEST['act']) : 'default';
 if($act == "default"){
	 $result_str = unstrreplace($cf['notices']);
	 ////模板选择
	 if($_REQUEST['themes']!="")
	 {
	   $_SESSION['new_themes'] = $_REQUEST['themes'];
	 
	 }else if($_SESSION['new_themes'] == ""){
	   $_SESSION['new_themes'] = $cf['site_themes'];
	 }
	 require("themes/".$_SESSION['new_themes']."/index.html");
	 echo "<!--Power by www.vs-china.com-->";
 }
 ////ajax 查询返回
 if($act == "query"){ 
	$bianhao = trim($_GET["bianhao"]);	
	$search  = $_GET['search'];
	$yzm     = trim($_GET['yzm']);
	$result  = 0;//搜索结查默认值 1=正确搜索到结果,2=搜索到结果但非第一次,3=没搜索到结果,
	$msg0    = 1;	
	/*
	for($i=1;$i<=$cf['text_type'];$i++)
	{
	  $bianhao .= trim($_GET["bianhao".$i])
	}
	*/

	if($bianhao != ""){
		if($cf['yzm_status'] == 1 && $yzm == "")
		{
		 $msg1 = "请输入验证码";
		 $msg0 = 0;		
		}
		if($cf['yzm_status'] == 1 && $yzm != $_SESSION['authnum_session'])
		{
		 $msg1 = "验证码输入错误";
		 $msg0 = 0;
		}      
	  if($msg0 == 1){
		///防伪码信息
	   $sql="select * from tgs_code where bianhao='$bianhao' limit 1";
	   ///echo $sql;
	   $res=mysql_query($sql);
	   if(mysql_num_rows($res)>0){
		   $arr = mysql_fetch_array($res);
		   $bianhao  =  $arr["bianhao"];
		   $riqi     =  $arr["riqi"];
		   $product  =  $arr["product"];
		   $zd1      =  $arr["zd1"];
		   $zd2      =  $arr["zd2"];
		   $tupian      =  $arr["tupian"];
		   $jianjie      =  $arr["jianjie"];
		   $query_time  = $arr["query_time"];
		   $hits        = $arr['hits'];		   
		   $results     = "电脑查询  [真]首次查询";
		   $msg1        = str_replace("{{product}}",$product,unstrreplace($cf['notice_1']));
		   if($_SESSION['s_query_time']==""){
			 $_SESSION['s_query_time'] = $query_time;
		   }		   
		   if($hits>0){////非第一次查询			
			   $results = "电脑查询  [真]非第一次查询";
			   $msg1        = str_replace("{{product}}",$product,unstrreplace($cf['notice_2']));
		   }
            $msg1        = str_replace("{{bianhao}}",$bianhao,$msg1);
		    $msg1        = str_replace("{{riqi}}",$riqi,$msg1);
			$msg1        = str_replace("{{zd1}}",$zd1,$msg1);
			$msg1        = str_replace("{{zd2}}",$zd2,$msg1);
			$msg1        = str_replace("{{tupian}}",$tupian,$msg1);
			$msg1        = str_replace("{{jianjie}}",$jianjie,$msg1);
			$msg1        = str_replace("{{hits}}",$hits+1,$msg1);
			$msg1        = str_replace("{{query_time}}",$_SESSION['s_query_time'],$msg1);	   
		  mysql_query("update tgs_code set hits=hits+1,query_time='".$GLOBALS['tgs']['cur_time']."' where bianhao='".$bianhao."' limit 1");		  
		  $msg0 = 1;
	   }
	   else
	   {
		 $results = '电脑查询[假]没有找到该防伪码';		 
		 $msg1   = str_replace("{{bianhao}}",$bianhao,unstrreplace($cf['notice_3']));
	   }
	      ///保存查询记录
		$sql = "insert into tgs_history set keyword='".$bianhao."',results='".$results."',addtime='".$GLOBALS['tgs']['cur_time']."',addip='".$GLOBALS['tgs']['cur_ip']."'";
		mysql_query($sql);
	    //$msg1 = eregi_replace("[\]",'',$msg1);
	 }	
	}else{
	    $msg1 = "请输入防伪码";
	}
  echo $msg0."|".$msg1;
 }
?>