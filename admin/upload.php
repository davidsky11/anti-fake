<?php
session_start();
error_reporting(0);
header('Content-type: text/html;charset=utf-8');
require("../data/session.php");
require("../data/head.php");
require('../data/reader.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>易网防伪防串货系统翼云版</title>
		<link href="css/admin.css" rel="stylesheet" type="text/css">
		<link href="css/css.css" rel="stylesheet" type="text/css">

      <style type="text/css">
<!--
.ta {
	height: 35px;
	width: 100%;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
-->
      </style>
</head>

<body >

<table width="100%" border="1" cellpadding="0" cellspacing="0" class="ta">
  <tr>
    <td width="25%" align="left" >
	
	<?php
      if ($_GET['up']==up) {
		  if ($_SESSION['file']==$_GET['irand']) {
			  $_size=200000;                    //设置限制文件大小
			  $_dir='../upload/';                   //文件保存目录
			  function size($_size) {
				  //判断文件大小是否大于1024bit 如果大于，则将大小取值为KB
				  if ($_size>10024*10024) {
					  return round($_size/1024/1024,2).' MB';
				  }else if ($_size>10024) {
					  $_size=$_size/10024;
					  return ceil($_size).'KB';
				  }else {
					  return $_size.' bit';
				  }
			  }
			  //设置上传图片的类型,设置图片上传大小
			  $_upfiles = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
			  if (is_array($_upfiles)) {
				  if (!in_array($_FILES['userfile']['type'],$_upfiles)) {
					  exit('请上传格式为：jpg,png,gif的文件<br /><a href="upload.php">返回</a>');
				  }
			  }
			  if ($_FILES['userfile']['size']>$_size) {
				  exit('上传文件不能超过：'.size($_size));
			  }
			  if ($_FILES['userfile']['error']>0) {
				  switch ($_FILES['userfile']['error']) {
					 case 1: echo '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
						 break;
					 case 2: echo '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值'; 
						 break;
					 case 3: echo '文件只有部分被上传';
						 break;
					 case 4: echo '没有文件被上传';
						 break;
					 case 6: echo '找不到临时文件夹';
						 break;
					 case 7: echo '文件写入失败';
						 break;
				  }
				  exit;
			  }
			  //获取文件扩展名
			  if (!is_dir($_dir)) {
				 mkdir($_dir,0700); 
			  }
			  $_rand=mt_rand(0,100000);
			  $_n=explode('.',$_FILES['userfile']['name']);  //将文件名分割
			  $_file_len=count($_n);         //返回数组长度
			  $_name=$_dir.time().'_'.$_rand.'.'.$_n[$_file_len-1];
			  
			  if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
				 if (!@move_uploaded_file($_FILES['userfile']['tmp_name'],$_name)) {
					 exit('文件移动失败');
				 }else {
				     echo "<script>window.parent.document.getElementById(\"tupian\").value ='" . $_name . "';</script>";
					 echo '文件上传成功<a href="upload.php">【重新上传】</a>';
				 } 
			  }else {
				 exit('上传的临时文件不存在，无法将文件移动到指定文件夹'); 
			  }

			  exit;
		  }else {
			 exit('您已经提交过了，不能重复提交<br /><a href="upload.php">返回</a>'); 
		  }
      }
      ?>
  <?php $_irand=mt_rand(0,1000000); $_SESSION['file']=$_irand; ?>

	<form action="?up=up&amp;irand=<?php echo $_irand; ?>" method="post" enctype="multipart/form-data">
      <label> <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> </label>
      <label> <input type="file" name="userfile" id="file"  class="input_text2"></label>
       <label><input type="submit" name="send" value=" 点击上传 " id="send" class="btn_gray"/></label>
    
    </form></td>
  </tr>
</table>
</body>
</html>