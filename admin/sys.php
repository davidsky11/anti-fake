<?php
error_reporting(0);
require("../data/session.php");
require("../data/head.php");
require('../data/reader.php');
?>
<html>
<!DOCTYPE html>
<head>
 <meta charset="utf-8">
      <title>防伪防串货系统</title>
        <!-- CSS -->
		<link href="css/admin.css" rel="stylesheet" type="text/css">
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
		<script type="text/javascript" src="js/topanv.js"></script>
        <script type="text/javascript" src="js/select-ui.min.js"></script>
        
		
</head>
<body>
<div class="headbox">
  <div id="topnavbar" style="display: block;">
<div class="headmenu">

	<a href="sys.php?act=config" target="rightFrame" class="btn2"><i class="fa fa-cog"></i> 系统参数配置</a>
	<a href="sys.php?act=fwconfig" target="rightFrame" class="btn2"><i class="fa fa-commenting"></i> 防伪参数配置</a>
	<!--<a href="sys.php?act=dlconfig" target="rightFrame" class="btn2"><i class="fa fa-hand-o-up"></i> 代理商参数配置</a>-->
	<a href="sys.php?act=superadmin" target="rightFrame" class="btn2"><i class="fa fa-user"></i> 管理员设置</a>
  </div>
  </div>
</div>
<?php
$act = $_GET["act"];
if($act == "")
{
}
?>
<?php

////系统相关设置

if($act == "config"){  
?>
<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">	

	<form name="form1" method="post" enctype="multipart/form-data" action="?act=save_config">    

		<table cellpadding="3" cellspacing="1" class="table_98">


          <tr >
            <td colspan="3"><div class="formtitle"><span>系统参数配置</span></div></td>
          </tr>
          <tr >

            <td width="10%"> <h3>系统名称：</h3></td>

            <td colspan="2" ><input name="cf[site_name]" type="text" id="cf[site_name]" size="45" value="<?php echo $cf['site_name']?>" class="input-text2">
            系统的名称。</td>
		  </tr>

          <tr >

            <td><h3>系统网址：</h3></td>

            <td colspan="2"><input type="text" name="cf[site_url]" value="<?php echo $cf['site_url']?>" size="40" class="input-text2">
            结尾不要加“/ ”，此项必须填写正确，否则生成的二维码无效。 </td>
		  </tr>

		  <tr >

            <td height="120"> <h3>系统关键字(keywords)：</h3></td>

            <td colspan="2"><textarea name="cf[page_keywords]" cols="65" rows="5" class="input-text3"><?php echo $cf['page_keywords']?></textarea></td>
		  </tr>

		  <tr >

            <td height="116"> <h3>系统描述(description)：</h3></td>

            <td colspan="2"><textarea name="cf[page_desc]" cols="65" rows="5" class="input-text3" ><?php echo $cf['page_desc']?></textarea></td>
		  </tr>		  

		   <tr >

            <td height="45"><h3>验证码：</h3></td>

            <td height="45" colspan="2"><input type="radio" name="cf[yzm_status]" value="1" <?php if($cf['yzm_status']==1) echo "checked='checked'"?>/>
              启用 
              <input type="radio" name="cf[yzm_status]" value="0" <?php if($cf['yzm_status']==0) echo "checked='checked'"?> />
             不启用

			 <?php $arr1_gd_info = gd_info();

			       if(!$arr1_gd_info['PNG Support'])

					   {

					   echo "(<span class='red'>当前操作系统的GD库不支持PNG格式的图片,验证码无法生成</span>)";

					   }

			 ?>
			 
  		     &nbsp;查询时是否启用验证码。</td>
  </tr>

		   <tr >

            <td><h3>每页显示</h3></td>

            <td colspan="2"><input type="text" name="cf[list_num]" id="list_num" value="<?php echo $cf['list_num']?>" class="input-text2"/>
            列表中每页显示的条数</td>
		  </tr>

		  <tr>

		   <td width="10%"><h3>系统时区：</h3></td>

			<td width="40%"><select name="cf[timezone]" class="input-select2">

					<option value="-12" <?php if($cf['timezone']=='-12') echo "selected='selected'";?>>(GMT -12:00) Eniwetok, Kwajalein</option>

					<option value="-11" <?php if($cf['timezone']=='-11') echo "selected='selected'";?>>(GMT -11:00) Midway Island, Samoa</option>

					<option value="-10" <?php if($cf['timezone']=='-10') echo "selected='selected'";?>>(GMT -10:00) Hawaii</option>

					<option value="-9" <?php if($cf['timezone']=='-9') echo "selected='selected'";?>>(GMT -09:00) Alaska</option>

					<option value="-8" <?php if($cf['timezone']=='-8') echo "selected='selected'";?>>(GMT -08:00) Pacific Time (US &amp; Canada), Tijuana</option>

					<option value="-7" <?php if($cf['timezone']=='-7') echo "selected='selected'";?>>(GMT -07:00) Mountain Time (US &amp; Canada), Arizona</option>

					<option value="-6" <?php if($cf['timezone']=='-6') echo "selected='selected'";?>>(GMT -06:00) Central Time (US &amp; Canada), Mexico City</option>

					<option value="-5" <?php if($cf['timezone']=='-6') echo "selected='selected'";?>>(GMT -05:00) Eastern Time (US &amp; Canada), Bogota, Lima, Quito</option>

					<option value="-4" <?php if($cf['timezone']=='-4') echo "selected='selected'";?>>(GMT -04:00) Atlantic Time (Canada), Caracas, La Paz</option>

					<option value="-3.5" <?php if($cf['timezone']=='-3.5') echo "selected='selected'";?>>(GMT -03:30) Newfoundland</option>

					<option value="-3" <?php if($cf['timezone']=='-3') echo "selected='selected'";?>>(GMT -03:00) Brassila, Buenos Aires, Georgetown, Falkland Is</option>

					<option value="-2" <?php if($cf['timezone']=='-2') echo "selected='selected'";?>>(GMT -02:00) Mid-Atlantic, Ascension Is., St. Helena</option>

					<option value="-1" <?php if($cf['timezone']=='-1') echo "selected='selected'";?>>(GMT -01:00) Azores, Cape Verde Islands</option>

					<option value="0" <?php if($cf['timezone']=='0') echo "selected='selected'";?>>(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia</option>

					<option value="1" <?php if($cf['timezone']=='1') echo "selected='selected'";?>>(GMT +01:00) Amsterdam, Berlin, Brussels, Madrid, Paris, Rome</option>

					<option value="2" <?php if($cf['timezone']=='2') echo "selected='selected'";?>>(GMT +02:00) Cairo, Helsinki, Kaliningrad, South Africa</option>

					<option value="3" <?php if($cf['timezone']=='3') echo "selected='selected'";?>>(GMT +03:00) Baghdad, Riyadh, Moscow, Nairobi</option>

					<option value="3.5" <?php if($cf['timezone']=='3.5') echo "selected='selected'";?>>(GMT +03:30) Tehran</option>

					<option value="4" <?php if($cf['timezone']=='4') echo "selected='selected'";?>>(GMT +04:00) Abu Dhabi, Baku, Muscat, Tbilisi</option>

					<option value="4.5" <?php if($cf['timezone']=='4.5') echo "selected='selected'";?>>(GMT +04:30) Kabul</option>

					<option value="5" <?php if($cf['timezone']=='5') echo "selected='selected'";?>>(GMT +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>

					<option value="5.5" <?php if($cf['timezone']=='5.5') echo "selected='selected'";?>>(GMT +05:30) Bombay, Calcutta, Madras, New Delhi</option>

					<option value="5.75" <?php if($cf['timezone']=='5.75') echo "selected='selected'";?>>(GMT +05:45) Katmandu</option>

					<option value="6" <?php if($cf['timezone']=='6') echo "selected='selected'";?>>(GMT +06:00) Almaty, Colombo, Dhaka, Novosibirsk</option>

					<option value="6.5" <?php if($cf['timezone']=='6.5') echo "selected='selected'";?>>(GMT +06:30) Rangoon</option>

					<option value="7" <?php if($cf['timezone']=='7') echo "selected='selected'";?>>(GMT +07:00) Bangkok, Hanoi, Jakarta</option>

					<option value="8" <?php if($cf['timezone']=='8') echo "selected='selected'";?>>(GMT +08:00) Beijing, Hong Kong, Perth, Singapore, Taipei</option>

					<option value="9" <?php if($cf['timezone']=='9') echo "selected='selected'";?>>(GMT +09:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk</option>

					<option value="9.5" <?php if($cf['timezone']=='9.5') echo "selected='selected'";?>>(GMT +09:30) Adelaide, Darwin</option>

					<option value="10" <?php if($cf['timezone']=='10') echo "selected='selected'";?>>(GMT +10:00) Canberra, Guam, Melbourne, Sydney, Vladivostok</option>

					<option value="11" <?php if($cf['timezone']=='11') echo "selected='selected'";?>>(GMT +11:00) Magadan, New Caledonia, Solomon Islands</option>

					<option value="12" <?php if($cf['timezone']=='12') echo "selected='selected'";?>>(GMT +12:00) Auckland, Wellington, Fiji, Marshall Island</option>

					<option value="13" <?php if($cf['timezone']=='13') echo "selected='selected'";?>>(GMT +13:00) Nukualofa</option>

				  </select>			 </td>

			<td width="50%"></td>
		  </tr>

		  <tr>

		   <td><h3>系统时间格式：</h3></td>

		   <td colspan="2"><input name="cf[time_format]" type="text" size="12" value="<?php echo $cf['time_format'];?>" class="input-text2">
		     服务器时间：
		     <?php echo date($cf['time_format'],time());?>
		    &nbsp;&nbsp; 程序时间:
	        <?php echo $GLOBALS['tgs']['cur_time'];?></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td>
			<button  name="Submit" type="submit" id="Submit" class="btn3" > <i class="fa fa-cog fa-lg"></i> 确认修改</button>
			</td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr>
		    <td height="37"><a name="fwm"></a></td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>
        </table>      
	  </form>	  

    </td>

  </tr>

</table>
<?php
}
?>
<?php
if($act == "fwconfig"){
?>


<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">
  <tr>
    <td valign="top"><form name="form1" method="post" enctype="multipart/form-data" action="?act=save_config">
      <table cellpadding="3" cellspacing="1" class="table_98">
        <tr >
          <td colspan="3" align="center"><div class="formtitle"><span>防伪查询信息配置</span></div></td>
        </tr>
        <tr >
          <td width="10%" height="118"><h3>首次查询结果：</h3></td>
          <td width="40%"><textarea  name="cf[notice_1]" id="cf[notice_1]" cols="65" rows="5" class="input-text3"><?php echo ($cf['notice_1'])?></textarea></td>
          <td width="50%" rowspan="2" style="line-height:25px; padding:5px 8px;"> (内容可自由编辑成您要的内容，支持HTML代码，其中防伪编号：{{bianhao}}，产品名称：{{product}}，到期日期：{{riqi}}，查看次数：{{hits}}，代理商：{{zd1}}，销售区域：{{zd2}}，产品图片：{{tupian}}，产品介绍：{{jianjie}} "系统类字符串"可自由组合，如保留一定要是完整“系统类字符串”) </td>
        </tr>
        <tr >
          <td height="120"><h3>非首次查询结果：</h3></td>
          <td><textarea name="cf[notice_2]" id="cf[notice_2]" cols="65" rows="5" class="input-text3"><?php echo $cf['notice_2']?></textarea>          </td>
        </tr>
        <tr >
          <td height="126"><h3>查询失败结果：</h3></td>
          <td><textarea name="cf[notice_3]" id="cf[notice_3]" cols="65" rows="5" class="input-text3" ><?php echo ($cf['notice_3'])?></textarea>          </td>
          <td > (内容可自由编辑成您要的内容，支持HTML代码，其中仅用到了“{{bianhao}}系统类字符串") </td>
        </tr>
        <tr >
          <td height="121"><h3>首页查询说明：</h3></td>
          <td><textarea name="cf[notices]" id="cf[notices]" cols="65" rows="5" class="input-text3" ><?php echo $cf['notices']?></textarea></td>
          <td > (内容可自由编辑成您要的内容，支持HTML代码。) </td>
        </tr>
        <tr >
          <td align="center">&nbsp;</td>
          <td><button  name="Submit" type="submit" id="Submit" class="btn3" > <i class="fa fa-cog fa-lg"></i> 确认修改</button></td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr >
          <td height="46" align="center"><a name="dls"></a></td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>


<?php
}
?>
<?php
if($act == "dlconfig"){
?>

<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">
  <tr>
    <td valign="top"><form name="form1" method="post" enctype="multipart/form-data" action="?act=save_config">
      <table cellpadding="3" cellspacing="1" class="table_98">
        <tr >
          <td colspan="3" align="center"><div class="formtitle"><span>代理信息配置</span></div></td>
        </tr>
        <tr >
          <td height="78" colspan="3"><div class="tip2">证书直接生成图片，如需修改证书相关内容项，打开根目录下的ZS目录下的文件修改.</div></td>
          </tr>
        <tr >
          <td height="126"><h3>首次查询：</h3></td>
          <td><textarea name="cf[agent_1]" id="cf[agent_1]" cols="65" rows="5" class="input-text3" ><? echo ($cf['agent_1'])?></textarea>          </td>
          <td > (内容可自由编辑成您要的内容，支持HTML代码。</td>
        </tr>
        <tr >
          <td height="126"><h3>非首次查询：</h3></td>
          <td><textarea name="cf[agent_2]" id="cf[agent_2]" cols="65" rows="5" class="input-text3" ><? echo ($cf['agent_2'])?></textarea>
          </td>
          <td > (内容可自由编辑成您要的内容，支持HTML代码。</td>
        </tr>
        <tr >
          <td width="10%" height="126"><h3>查询失败结果：</h3></td>
          <td width="40%"><textarea name="cf[agent_3]" id="cf[agent_3]" cols="65" rows="5" class="input-text3" ><? echo ($cf['agent_3'])?></textarea>          </td>
          <td > (内容可自由编辑成您要的内容，支持HTML代码。</td>
        </tr>
        <tr >
          <td height="121"><h3>查询说明：</h3></td>
          <td><textarea name="cf[agents]" id="cf[agents]" cols="65" rows="5" class="input-text3" ><? echo $cf['agents']?></textarea></td>
          <td > (内容可自由编辑成您要的内容，支持HTML代码。) </td>
        </tr>
        <tr >
          <td align="center">&nbsp;</td>
          <td><button  name="Submit" type="submit" id="Submit" class="btn3" > <i class="fa fa-cog fa-lg"></i> 确认修改</button></td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr >
          <td height="46" align="center"><a name="dls"></a></td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>


<?php
}
?>
<?php
if($act == "save_config"){
    $arr = array();

    $sql = "SELECT id, value FROM tgs_config";

    $res = mysql_query($sql);

    while($row = mysql_fetch_array($res))

    {

        $arr[$row['id']] = $row['value'];

    }

	 foreach ($_POST['cf'] AS $key => $val)

    {

        if($arr[$key] != $val)

        { 

		  ///变量格式化

		  if($key=='notices' or $key=='notice_1' or $key == 'notice_2' or $key=='notice_3' or $key=='agents' or $key=='agent_1' or $key=='agent_2' or $key=='agent_3'){

              $val = strreplace($val);

		  }

		  if($key=='site_close_reason'){

              $val = strreplace($val);

		  }



	      $sql="update tgs_config set code_value='".trim($val)."' where code='".$key."' limit 1";

		  mysql_query($sql) or die("err:".$sql);

		}

	}



	/* 处理上传文件 */

    $file_var_list = array();

    $sql = "SELECT * FROM tgs_config WHERE parentid > 0 AND type = 'file'";

	$res = mysql_query($sql);



	while($row = mysql_fetch_array($res))

    {

        $file_var_list[$row['code']] = $row;

    }

	foreach ($_FILES AS $code => $file)

    {

		/* 判断用户是否选择了文件 */

        if ((isset($file['error']) && $file['error'] == 0) || (!isset($file['error']) && $file['tmp_name'] != 'none'))

        {   

			

			$file_size_max    = 307200; //300k

			$accept_overwrite = true;

			$ext_arr          = array('gif','jpg','png');//定义允许上传的文件扩展名

			$add              = true;

			$ext              = extend($file['name']);

			

			//检查扩展名

			if (in_array($ext,$ext_arr) === false) {

				   $msg .= $_LANG["page"]["_you_upload_pic_type_"]."<br />";

				   

			}else if ($file['size'] > $file_size_max) {

				  $msg .= $_LANG["page"]["_you_upload_pic_larger_than_300k_"]."<br />";

				  

			}else{

				

				if($code == 'site_logo'){

					$date1       =  "logo".date("His");

					$store_dir   = "../upload/logo/";

					$newname     = $date1.".".$ext;



					if (!move_uploaded_file($file['tmp_name'],$store_dir.$newname)) {

					  $msg .= $_LANG['page']['_Copy_file_failed_']."<br />";

					  

					}else{

						///删除原图

						if (file_exists($store_dir.$file_var_list[$code]['value']))

                        {

                          

						  @unlink($store_dir.$file_var_list[$code]['value']);

                        }



						$sql = "UPDATE tgs_config SET code_value = '$newname' WHERE code = '$code' limit 1";

                        mysql_query($sql);

					}



				}

			}

		}



	}

	   echo "<script>alert('修改成功');location.href='?act=config'</script>";

	   exit; 

}

////管理员设置

if($act == "superadmin"){

?>

<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">

      <div class="formtitle"><span>管理员设置</span></div>
      <table cellpadding="3" cellspacing="1" class="tablelist">        
<thead>
		<tr>

          <th width="11%">id</th>

          <th width="52%">管理员帐户 (请至少保留一个管理员，否则无法登陆）</th>

          <th width="37%">操作</th>          

		</tr>
</thead>
		<?php

		 $sql = "select * from tgs_admin order by id asc";

		 $res = mysql_query($sql);

		 while($arr = mysql_fetch_array($res)){		

		?>
 <tbody>
        <tr >

          <td><?php echo $arr["id"];?></td>

          <td><a href="?act=edit_superadmin&id=<?php echo $arr["id"];?>" title="编辑"><?php echo $arr["username"];?></a></td>
          <td><a href="?act=delete_superadmin&id=<?php echo $arr['id']?>" onClick="return window.confirm('确实要删除吗？删除后将不可恢复！');"> <i class="fa fa-trash-o fa-lg"></i> 删除 </a>&nbsp;&nbsp;<a href="?act=edit_superadmin&id=<?php echo $arr["id"];?>" title="编辑"> <i class="fa fa-edit fa-lg"></i> 编辑</a></td>

        </tr>
</tbody>
		<?php

		}

		?>

	  </table>

    

	</td>

  </tr>

</table>

<br />

<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">

	

	<form name="form1" method="post" enctype="multipart/form-data" action="?act=save_add_superadmin">

    

		<table cellpadding="3" cellspacing="1" class="table_98">

          <tr>

            <td colspan="2" align="center"><div class="formtitle"><span>新增管理员</span></div></td></tr>

          <tr >

            <td width="11%"> <h3>管理员帐户：</h3></td>

            <td width="89%" ><input name="username" type="text" id="username" size="20" value="" class="input-text2"></td>
          </tr>

          <tr >

            <td><h3>管理密码：</h3></td>

            <td><input type="password" name="password" value="" class="input-text2" />密码建议在六位数以上</td>
          </tr>

		  <tr >

            <td><h3>确认管理密码：</h3></td>

            <td><input type="password" name="repassword" value="" class="input-text2"/></td>
          </tr>

          

          <tr >

            <td>&nbsp;</td>

            <td>
			
			<button  type="submit" name="Submit"  class="btn3" > <i class="fa fa-user-plus fa-lg"></i> 确认新增</button>
			</td>
          </tr>
        </table>
	  </form>

	  

    </td>

  </tr>

</table>

<?php

}



//////////////////////////////////////////

if($act == "save_add_superadmin"){



       $username   = trim($_POST["username"]);

	   $password   = trim($_POST["password"]);

	   $repassword = trim($_POST["repassword"]);

	   $a          = 0;



	   if($username==""){

	      echo "<script>alert('管理员帐户不能为空');window.location.href='?act=superadmin'</script>";

		   exit;

	   }	  

		   if(strlen($password)<4){

			   echo "<script>alert('密码长度不能小于4位');window.location.href='?act=superadmin'</script>";

			   exit;

		   }

		   if($password != $repassword)

		   {

			   echo "<script>alert('两次输入的密码不一致');window.location.href='?act=superadmin'</script>";

			   exit;

		   }



	   $sql="insert into tgs_admin set username='".$username."', password='".md5($password)."'";

	   mysql_query($sql) or die("err:".$sql);

	   

       echo "<script>alert('管理帐户添加成功');</script>";

	   echo "<script>window.location.href='?act=superadmin'</script>";

	   exit; 

}



////编辑管理员

if($act == "edit_superadmin"){ 

 $id  = $_GET['id'];

 $sql = "select * from tgs_admin where id=".$id." limit 1";

 $res = mysql_query($sql);

 $arr = mysql_fetch_array($res);

 $username  = $arr['username'];

?>



<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">

	

	<form name="form1" method="post" enctype="multipart/form-data" action="?act=save_edit_superadmin">

    <input type="hidden" name="id" id="id" value="<?php echo $id?>" />

		<table cellpadding="3" cellspacing="1" class="table_98">

          <tr>

            <td colspan="2" align="center"><div class="formtitle"><span>修改管理员</span></div></td>
          </tr>

          <tr >

            <td width="11%"> 管理帐户：</td>

            <td width="89%" ><input name="username" type="text" id="username" size="20" value="<?php echo $username?>"  class="input-text2"></td>
          </tr>

          <tr >

            <td>管理密码：</td>

            <td><input type="password" name="password"  class="input-text2">
            密码长度建议六位数以上</td>
          </tr>

		  <tr >

            <td>确认管理密码：</td>

            <td><input type="password" name="repassword" value=""  class="input-text2">
            密码长度建议六位数以上</td>
          </tr>

          

          <tr >

            <td>&nbsp;</td>

            <td><button  type="submit" name="Submit"  class="btn3" > <i class="fa fa-edit fa-lg"></i> 确认修改</button></td>
          </tr>
        </table>      
	  </form>	  

    </td>

  </tr>

</table>

<?php 

}



////保存编辑的管理员帐户//////////////////////////////////////

if($act == "save_edit_superadmin"){



       $id         = $_POST['id'];

	   $username   = trim($_POST["username"]);

	   $password   = trim($_POST["password"]);

	   $repassword = trim($_POST["repassword"]);

	   $a          = 0;

	   if(!$id){

			   echo "<script>alert('id参数有误');window.location.href='?act=superadmin'</script>";

			   exit;

	  }

	   if($username!=""){

	      $sql="update tgs_admin set username='".$username."' where id=".$id." limit 1";

	      mysql_query($sql) or die("err:".$sql);

		  $a = 1;

	   }

	   if($password != ""){

		   if(strlen($password)<4){

			   echo "<script>alert('密码长度不能小于4位');window.location.href='?act=superadmin'</script>";

			   exit;

		   }

		   if($password != $repassword)

		   {

			   echo "<script>alert('两次输入的密码不一致');window.location.href='?act=superadmin'</script>";

			   exit;

		   }



		   $sql="update tgs_admin set password='".md5($password)."' where id=".$id." limit 1";

	       mysql_query($sql) or die("err:".$sql);

		   $a= 1;

	   }



	   if($a == 1){

         echo "<script>alert('管理帐户更新成功');</script>";

	   }else{

	     echo "<script>alert('管理帐户信息失败!!');</script>";

	   }

	   echo "<script>window.location.href='?act=superadmin'</script>";



	   exit; 



}



////删除管理员帐户//////////////////////////////////////

if($act == "delete_superadmin"){



      $id         = $_GET['id'];

	   

	  if(!$id){

			   echo "<script>alert('id参数有误');window.location.href='?act=superadmin'</script>";

			   exit;

	  }



	  

	  $sql="delete from tgs_admin where id=".$id." limit 1";

	  mysql_query($sql) or die("err:".$sql);

		 

	   

      echo "<script>alert('管理帐户删除成功');</script>";

	  echo "<script>window.location.href='?act=superadmin'</script>";

	  exit; 



}



////csv读取函数

function __fgetcsv(&$handle, $length = null, $d = ",", $e = '"')

{

      $d = preg_quote($d);

      $e = preg_quote($e);

      $_line = "";

      $eof   = false;

      while ($eof != true)

      {

         $_line .= (empty ($length) ? fgets($handle) : fgets($handle, $length));

         $itemcnt = preg_match_all('/' . $e . '/', $_line, $dummy);

         if ($itemcnt % 2 == 0)

            $eof = true;

      }

      $_csv_line = preg_replace('/(?: |[ ])?$/', $d, trim($_line));      $_csv_pattern = '/(' . $e . '[^' . $e . ']*(?:' . $e . $e . '[^' . $e . ']*)*' . $e . '|[^' . $d . ']*)' . $d . '/';

      preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);

      $_csv_data = $_csv_matches[1];

      for ($_csv_i = 0; $_csv_i < count($_csv_data); $_csv_i++)

      {       $_csv_data[$_csv_i] = preg_replace("/^" . $e . "(.*)" . $e . "$/s", "$1", $_csv_data[$_csv_i]);

         $_csv_data[$_csv_i] = str_replace($e . $e, $e, $_csv_data[$_csv_i]);

      }

      return empty($_line) ? false : $_csv_data;

}

?>
  <script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
  <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>
</html>