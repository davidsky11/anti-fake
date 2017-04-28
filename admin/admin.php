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
        <script type="text/javascript" src="js/select-ui.min.js"></script>
</head>
<body>
<div class="headbox">
  <div id="topnavbar" style="display: block;">
<div class="headmenu">

	<!-- a href="?act=add" target="rightFrame" class="btn2"><i class="fa fa-paper-plane"></i> 批量新增防伪码</a -->
	<a href="?act=add2" target="rightFrame" class="btn2"><i class="fa fa-plus"></i>新增防伪码</a>
	<a href="?act=import" target="rightFrame" class="btn2"><i class="fa fa-line-chart"></i> 导入防伪码</a>
	<a href="?act=query_record" target="rightFrame" class="btn2"><i class="fa fa-search"></i> 查询记录</a>
	<a href="/index.php" target="_blank" class="btn2"><i class="fa fa-tv"></i> 查询前端</a>
  </div>
  </div>
</div>

<?php
$act = $_GET["act"];
if($act == "")
{
?>
<SCRIPT language="javascript">
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.Name != "chkAll"&&e.disabled==false)
       e.checked = form.chkAll.checked;
    }
  }
function CheckAll2(form)

  {

  for (var i=0;i<form.elements.length;i++)

    {

    var e = form.elements[i];

    if (e.Name != "chkAll2"&&e.disabled==false)

       e.checked = form.chkAll2.checked;

    }

  }   

function ConfirmDel()

{
	if(document.myform.Action.value=="delete")

	{
		document.myform.action="?act=delart";

		if(confirm("确定要删除选中的记录吗？本操作不可恢复！"))

		    return true;
		else
			return false;

	}else if(document.myform.Action.value=="export_code"){

	  document.myform.action="?act=export_code";
	}

}

</SCRIPT>

<?php		

        $code_list = array();

		$bianhao = trim($_REQUEST["bianhao"]);

		$product = trim($_REQUEST['product']);

		$zd1     = trim($_REQUEST['zd1']);

		$zd2     = trim($_REQUEST['zd2']);
		
		$tupian  = trim($_REQUEST['tupian']);
		
		$jianjie = trim($_REQUEST['jianjie']);

		$h       = trim($_REQUEST["h"]);

		$pz      = trim($_REQUEST['pz']);

		$sql="select * from tgs_code where 1";		

		if($bianhao!=""){

		 $sql.=" and bianhao like '%$bianhao%'";

		}

		if($product != ""){

		 $sql.=" and product like '%$product%'";

		}

		if($zd1!=""){

		 $sql.=" and zd1 like '%$zd1%'";

		}

		if($zd2!=""){

		 $sql.=" and zd2 like '%$zd2%'";

		}

		if($h == "1"){

		$sql.=" order by hits desc,id desc";

		}elseif($h=="0"){

		$sql.=" order by hits asc,id desc";

		}else{

		$sql.=" order by id desc";

		}

		///echo $sql;

		$result = mysql_query($sql);



	   if($pz == ""){

         $pagesize = $cf['list_num'];//每页所要显示的数据个数。

		 $pz       = $cf['list_num'];

	   }else{

	     $pagesize = $pz;

	   }

       $total    = mysql_num_rows($result); 	

       $filename = "?bianhao=".$bianhao."&product=".$product."&zd1=".$zd1."&zd2=".$zd2."&h=".$h."&pz=".$pz."";

    

      $currpage  = intval($_REQUEST["page"]);

      if(!is_int($currpage))

	    $currpage=1;

	  if(intval($currpage)<1)$currpage=1;

      if(intval($currpage-1)*$pagesize>$total)$currpage=1;



	  if(($total%$pagesize)==0)

	   {

		   $totalpage=intval($total/$pagesize); 

	   }

	  else

	    $totalpage=intval($total/$pagesize)+1;

	  if ($total!=0&&$currpage>1)

       mysql_data_seek($result,(($currpage-1)*$pagesize));



       $i=0;

     while($arr=mysql_fetch_array($result)) 
     { 
     $i++;
     if($i>$pagesize)break; 
		 $code_list[] = $arr;
	 }
?>

<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">
  <tr>
   <td valign="top">
		<table cellpadding="3" cellspacing="0" class="table_98">
		 <form action="?" method="post" name="form1">
		  <tr>
		    <td ><div class="formtitle"><span>商品防伪码管理</span></div></td>
	       </tr>
		   
		  <tr>

			<td >
				<input type="text" name="bianhao" size="20"  class="input-text2"  value="<?php echo $bianhao?>"  placeholder="防伪码"/>
				
				<input type="text" name="product" size="10"  class="input-text2"  value="<?php echo $product?>"  placeholder="产品名称">
			
				<!-- input type="text" name="zd1" size="10" class="input-text2" value="<?php echo $zd1?>" placeholder="代理商" -->
			
				<!-- input type="text" name="zd2" size="10" class="input-text2" value="<?php echo $zd2?>" placeholder="代理区域"/ -->

				<input type="hidden" name="pz" id="pz" value="<?php echo $pz?>" />

				<button  name="submit" type="submit" id="submit" class="btn_green"> <i class="fa fa-search fa-lg"></i> 点击查询</button> 
			</td>
		  </tr>
		 </form>
		</table>	

	<form method="post" name="myform" id="myform" action="?" onSubmit="return ConfirmDel();">	

	<input type="hidden" name="bianhao" value="<?php echo $bianhao?>" />

	<input type="hidden" name="product" value="<?php echo $product?>" />

	<input type="hidden" name="zd1" value="<?php echo $zd1?>" />

	<input type="hidden" name="zd2" value="<?php echo $zd2?>" />

	<input type="hidden" name="h" value="<?php echo $h?>" />

	<table cellpadding="3" cellspacing="0" class="table_1">

        <tr>

          <td height="20">
		  <button  name="check" type='submit' class="btn3" onClick="document.myform.Action.value='delete'" > <i class="fa fa-trash-o fa-lg"></i> 删除选定</button>
			  <!-- button  name="check" type='submit' class="btn_blue" onClick="document.myform.Action.value='export_code'"  > <i class="fa fa-line-chart fa-lg"></i> 导出选定</button-->
		</td></td>
		  </tr>
    </table>

      <table class="tablelist">
	   <thead>
        <tr>
          <th width="2%" ><INPUT TYPE="checkbox" NAME="chkAll" id="chkAll" title="全选"  onclick="CheckAll(this.form)"></th>
          <th width="6%">本页序号</th>
          <th width="5%">记录号</th>
          <th width="10%">防伪码</th>
          <th width="16%">产品名称</th>
          <!-- th width="9%">有效日期</th>
          <th width="10%">代理商</th>
          <th width="10%">代理区域</th -->
		  <!--th width="8%">二维码</th-->
          <th width="5%"><?php

		  if($_GET["h"]==1){

		  ?>
              <a href="?bianhao=<?php echo $bianhao?>&product=<?php echo $product?>&zd1=<?php echo $zd1?>&zd2=<?php echo $zd2?>&h=0&pz=<?php echo $pz?>&page=<?php echo $currpage?>">查询次数</a>
              <? }else{ ?>
              <a href="?bianhao=<?php echo $bianhao?>&product=<?php echo $product?>&zd1=<?php echo $zd1?>&zd2=<?php echo $zd2?>&h=1&pz=<?php echo $pz?>&page=<?php echo $currpage?>">查询次数</a>
              <?

		  }

		  ?>          </th>
          <!--th width="8%">操作</th-->
        </tr>
		
	    </thead>	
		 <tbody>
        <?php for($i=0;$i<count($code_list);$i++){?>
	
        <tr >
          <td><input name="chk[]" type="checkbox" id="chk[]" value="<? echo $code_list[$i]["id"];?>"></td>
          <td><?php echo $i+1?></td>
          <td><?php echo $code_list[$i]['id']?></td>
          <td><a href="?act=edit&id=<? echo $code_list[$i]["id"];?>" title="编辑本条防伪码"><?php echo $code_list[$i]["bianhao"];?></a></td>
          <td><?php echo $code_list[$i]["product"]?></td>
          <!-- td><?php echo $code_list[$i]["riqi"]?></td>
          <td><?php echo $code_list[$i]["zd1"]?>&nbsp;</td>
          <td><?php echo $code_list[$i]["zd2"]?>&nbsp;</td -->
		  <!-- td><a href="qrcode.php?act=qrcode&id=<? echo $code_list[$i]["id"];?>" title="查看二维码"><?php echo "查看二维码";?></a></td-->
          <td><? echo $code_list[$i]["hits"];?>&nbsp;</td>
          <!-- td><a href="?act=edit&id=<? echo $code_list[$i]["id"];?>" title="编辑本条防伪码" >	<i class="fa fa-pencil-square-o fa-lg"></i> 编辑</a></td -->
        </tr>
		
        <?php

		}

		?>
		</tbody>
      </table>
	  
      <table cellpadding="3" cellspacing="0" class="table_1">

		<tr><td >

		
		 <button  name="check" type='submit' class="btn3" onClick="document.myform.Action.value='delete'" > <i class="fa fa-trash-o fa-lg"></i> 删除选定</button>
		 


			  <input name="Action" type="hidden" id="Action" value="">

			 <!-- button  name="check" type='submit' class="btn_blue" onClick="document.myform.Action.value='export_code'"  > <i class="fa fa-line-chart fa-lg"></i> 导出选定</button -->

	       </td>

		   <td align="right">

              

			  每页显示<?php echo $pagesize?>条 
&nbsp;&nbsp;&nbsp;&nbsp;

		     

		      当前第
		      <?php echo $currpage?>
		      页, 共
		      <?php echo $totalpage?>
		      页/
		      <?php  echo $total;?>
		      个记录&nbsp;
              <?php if($currpage==1){?>
首页&nbsp;上一页&nbsp;
<?php } else {?>
<a href="<?php echo $filename;?>&page=1">首页</a>&nbsp;<a href="<?php echo $filename;?>&page=<?php echo ($currpage-1);?>">上一页</a>&nbsp;
<?php }

			  if($currpage==$totalpage)

			  {?>
下一页&nbsp;尾页&nbsp;
<?php }else{?>
<a href="<?php echo $filename;?>&page=<?php echo ($currpage+1);?>">下一页</a>&nbsp;<a href="<?php echo $filename;?>&page=<?php echo  $totalpage;?>">尾页</a>&nbsp;
<?php }?>
<select name='page' size='1' id="page" onchange='javascript:submit()' class="input-select" >
  <?php

			  for($i=1;$i<=$totalpage;$i++)

			  {

			  ?>
  <option value="<?php echo $i; ?>" <?php if ($currpage==$i) echo "selected"; ?>> 第<?php echo $i;?>页</option>
  <?php }?>
</select></td>
		</tr>
      </table>
  </FORM>



    </td>
  </tr>

</table>


<?php

}





////防伪码导出，可选择导出项

if($act == "export_code")

{

?>
无此功能!
<?php

}

////防伪码导入///////////////////////////////////
if($act =="import"){
?>

<div class="formbody">
	<form action="insertdb.php" method="post" name="form1" enctype="multipart/form-data">
	<table align="center" cellpadding="3" cellspacing="1" class="table_98">
		<tr>
			<td ><div class="formtitle"><span>防伪码批量导入</span></div></td>
		</tr>

		<tr>
			<td><table width="100%" border="0" cellpadding="0" cellspacing="0" >
					<tr >
						<td width="8%" height="55"> <h3>Excel文件：</h3></td>
						<td height="55" valign="middle">
							<input name="filename" type="file" id="filename">（EXCEL字段顺序：PRODUCT - CODE）
						</td>
					</tr>
					<tr >
						<td height="55">&nbsp;</td>
						<td height="55">
							<button  name="check"  type="submit" class="btn3" > <i class="fa fa-plus fa-lg"></i> 确认导入</button>      </tr>
					</tr>
				</table></td>
		</tr>
		<tr>

			<td>&nbsp;</td>
		</tr>
	</table>
	</form>
</div>

<?php
}

 

if($act == "save_add"){
	echo "<script>alert('无此功能!');location.href='?'</script>";

	exit;

}



////////////////////
?>
<?php
if($act == "add"){
?>

<div class="formbody">
 <form name="form1" method="post" action="?act=save_create">
<table align="center" cellpadding="3" cellspacing="1" class="table_98">

  <tr>

    <td height="87"><div class="formtitle"><span>批量新增防伪码</span></div></td>
  </tr>

  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <tr >
        <td width="8%" height="55"> <h3>防伪码长度：</h3></td>
        <td height="55" valign="middle"><input name="code_length" type="text" id="code_length"   size="20" value="12" class="input-text2" >
          （建议8-18以内）</td>
      </tr>
      <tr >
        <td height="55"><h3>防伪码前缀：</h3></td>
        <td height="55" valign="middle"><input type="text" name="code_pre" value="" class="input-text2" maxlength="4">
          （建议2-4位） </td>
      </tr>
      <tr >
        <td height="55"><h3>防伪码形式：</h3></td>
        <td height="55" valign="middle"><select name="code_type" class="input-select2">
            <option value="0">前缀+数字和字母</option>
            <option value="1">前缀+字母(不限大小写)</option>
            <option value="2">前缀+数字</option>
            <option value="3">前缀+字母(大写)</option>
          </select>
          选择防伪码形式</td>
      </tr>
      <tr>
        <td height="55"><h3>生成数量：</h3></td>
        <td height="55" valign="middle"><input type="text" name="code_count" value="1000" class="input-text2">
          建议每次生成不要超过10万条</td>
      </tr>
      <tr >
        <td height="55"><h3>产品名称：</h3></td>
        <td height="55" valign="middle"><input name="product" type="text" class="input-text2" id="product" value="">
          产品名如:移动电源</td>
      </tr>
      <tr>
        <td height="55"><h3>有效日期：</h3></td>
        <td height="55" valign="middle"><input name="riqi" type="text" class="input-text2" id="riqi" value="">
          （格式为：2016-5-10）</td>
      </tr>
      <tr >
        <td height="55"><h3>产品图片：</h3></td>
        <td height="55" valign="middle"><input name="tupian" type="text" class="input-text2" style="width:400px;" id="tupian" value="<?php echo $cf['site_url']?>/upload/nopic.jpg">
          填写图片地址或上传图片</td>
      </tr>
      <tr >
        <td height="55"><h3>上传图片：</h3></td>
        <td height="55" valign="middle"><iframe src="upload.php" width="100%" height="45px" scrolling="no"></iframe>
                   </td>
      </tr>
      <tr >
        <td height="55"><h3>所属代理：</h3></td>
        <td height="55" valign="middle"><input name="zd1" type="text" class="input-text2" id="zd1" value="">
          该防伪码所属产品的代理商</td>
      </tr>
      <tr >
        <td height="55"><h3>销售区域：</h3></td>
        <td height="55" valign="middle"><input name="zd2" type="text" id="zd2"  class="input-text2" value="">
          该防伪码所属产品的销售区域，可以有效控制串货</td>
      </tr>
      <tr >
        <td height="117" align="left"><h3>产品介绍：</h3></td>
        <td height="117"><textarea name="jianjie" rows="5" class="input-text3" id="jianjie"></textarea></td>
      </tr>
      <tr >
        <td height="55">&nbsp;</td>
        <td height="55">
		<button  name="check"  type="submit" class="btn3" > <i class="fa fa-plus fa-lg"></i> 确认开始生成</button>      </tr>
    </table></td>
  </tr>
  <tr>

    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<?php
}
?>

<?php
if($act == "add2"){
?>
<div class="formbody">
 <form name="form1" method="post" enctype="multipart/form-data" action="?act=save_add2">
<table align="center" cellpadding="3" cellspacing="1" class="table_98">

  <tr>

    <td height="87"><div class="formtitle"><span>单条新增防伪码</span></div></td>
  </tr>

  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="8%" height="55"><h3>防伪码：</h3></td>
        <td height="55" valign="middle"><input name="bianhao" type="text" class="input-text2" id="bianhao">
          输入您需要的防伪码</td>
      </tr>
      <tr >
        <td height="55"><h3>产品名称：</h3></td>
        <td height="55" valign="middle"><input name="product" type="text" class="input-text2" id="product" value="">
          产品名如:移动电源</td>
      </tr>
      <!--tr>
        <td height="55"><h3>有效日期：</h3></td>
        <td height="55" valign="middle"><input name="riqi" type="text" class="input-text2" id="riqi" value="">
          （格式为：2016-5-10）</td>
      </tr>
      <tr >
        <td height="55"><h3>产品图片：</h3></td>
        <td height="55" valign="middle"><input name="tupian" type="text" class="input-text2" style="width:400px;" id="tupian" value="<?php echo $cf['site_url']?>/upload/nopic.jpg">
          填写图片地址或上传图片</td>
      </tr>
      <tr >
        <td height="55"><h3>上传图片：</h3></td>
        <td height="55" valign="middle"><iframe src="upload.php" width="100%" height="45px" scrolling="no"></iframe>
                   </td>
      </tr>
      <tr >
        <td height="55"><h3>所属代理：</h3></td>
        <td height="55" valign="middle"><input name="zd1" type="text" class="input-text2" id="zd1" value="">
          该防伪码所属产品的代理商</td>
      </tr>
      <tr >
        <td height="55"><h3>销售区域：</h3></td>
        <td height="55" valign="middle"><input name="zd2" type="text" id="zd2"  class="input-text2" value="">
          该防伪码所属产品的销售区域，可以有效控制串货</td>
      </tr>
      <tr >
        <td height="117" align="left"><h3>产品介绍：</h3></td>
        <td height="117"><textarea name="jianjie" rows="5" class="input-text3" id="jianjie"></textarea></td>
      </tr -->
      <tr >
        <td height="55">&nbsp;</td>
        <td height="55">
		<button  name="check"  type="submit" class="btn3" > <i class="fa fa-plus fa-lg"></i> 确认开始生成</button>      </tr>
    </table></td>
  </tr>
  <tr>

    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>

<?php }
?>


<?php
////单条添加

     if($act == "save_add2"){  
	  
    $bianhao      = trim($_REQUEST["bianhao"]);	
	$riqi         = trim($_REQUEST["riqi"]);
	$product      = strreplace(trim($_REQUEST["product"]));
	$zd1          = strreplace($_REQUEST["zd1"]);
	$zd2          = strreplace($_REQUEST["zd2"]);
	$tupian       = strreplace($_REQUEST["tupian"]);
	$jianjie      = strreplace($_REQUEST["jianjie"]);

	if($bianhao=="")

	{

	  echo "<script>alert('防伪码不能为空');location.href='?act=add'</script>";

	  exit;

	}

	$sql = "select id from tgs_code where bianhao='".$bianhao."' limit 1";

	$res = mysql_query($sql);

	$arr = mysql_fetch_array($res);

	if(mysql_num_rows($res)>0){



	  echo "<script>alert('防伪码已存在');location.href='?act=edit&id=".$arr["id"]."'</script>";

	  exit;

	}

    if($product == "")

	{

	  $product = "产品名称";

	}

	if($riqi == "")

	{

	  $riqi = "2020-12-31";

	}

	if($zd1 == "")

	{

	  $zd1 = "--";

	}

	if($zd2 == "")

	{

	  $zd2 = "--";

	}

	$sql="insert into tgs_code (bianhao,riqi,product,zd1,zd2,tupian,jianjie)values('$bianhao','$riqi','$product','$zd1','$zd2','$tupian','$jianjie')";

	//echo $sql;

	mysql_query($sql);

	echo "<script>alert('成功添加一条防伪码');location.href='?'</script>";

	exit;
}
?>
<?php

/////保存批量生成的防伪码

if($act == "save_create")
{

    $code_length = trim($_POST['code_length']);//长度

	$code_pre    = trim($_POST['code_pre']);//前缀

	$code_type   = $_POST['code_type'];//形式

	$code_count  = trim($_POST['code_count']);//数量	

	$riqi        = trim($_POST['riqi']);//有效日期

	$product     = strreplace(trim($_POST['product']));//产品

	$zd1         = strreplace($_POST['zd1']);//代理商

	$zd2         = strreplace($_POST['zd2']);//代理区域
	
	$tupian      = trim($_POST['tupian']);//产品图片
	
	$jianjie     = trim($_POST['jianjie']);//产品介绍

	if(strlen($code_pre)>= $code_length)

	{

	  echo "<script>alert('防伪码前缀的长度不能大于等于防伪码长度');location.href='?act=add'</script>";

	  exit;

	}	

	if(!is_numeric($code_length))

	{

	  echo "<script>alert('防伪码长度请输入数字');location.href='?act=add'</script>";

	  exit;

	}

	if($code_length<4)

	{

	  echo "<script>alert('防伪码长度最少为4位');location.href='?act=add'</script>";

	  exit;

	}


	if($code_pre == "")

	{

	  echo "<script>alert('建议输入防伪码前缀！');location.href='?act=add'</script>";

	  exit;

	}

	if($product == "")

	{

	 echo "<script>alert('产品名称未填写！');location.href='?act=add'</script>";
	 exit;

	}

	if($riqi == "")

	{

	  $riqi = "2020-12-31";

	}

	if($zd1 == "")

	{

	  $zd1 = "--";

	}

	if($zd2 == "")

	{

	  $zd2 = "--";

	}

	$new_code_length = $code_length-strlen($code_pre);//防伪码长度
	for($i=1;$i<=$code_count;$i++)
	{

	   $bianhao  = $code_pre.genRandomString($new_code_length,$code_type);

	   $sql = "insert into tgs_code set bianhao = '".$bianhao."',product='".$product."',riqi='".$riqi."',zd1='".$zd1."',zd2='".$zd2."',tupian='".$tupian."',jianjie='".$jianjie."' ";

	   mysql_query($sql);

	}
	
	echo "<script>alert('批量生成".$code_count."成功');location.href='?'</script>";

	exit;

}



////编辑

if($act == "edit"){

   

       $editid = $_GET["id"];

		$sql="select * from tgs_code where id='$editid' limit 1";

		//echo $sql;

		$result=mysql_query($sql);

		$arr=mysql_fetch_array($result);

		

		$bianhao    = $arr["bianhao"];

		$riqi       = $arr["riqi"];

		$product    = $arr["product"];

		$zd1        = $arr["zd1"];

		$zd2        = $arr["zd2"];		
		
		$tupian        = $arr["tupian"];	
		
		$jianjie        = $arr["jianjie"];	

		$rn         = "修改商品防伪码";

?>
<br>

<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">	

	<form name="form1" method="post" enctype="multipart/form-data" action="?act=save_edit">    

		<table cellpadding="3" cellspacing="1" class="table_98">

          <tr>

            <td colspan="2" align="left"><div class="formtitle"><span><?php echo $rn?></span></div>
              

            <input name="editid" type="hidden" id="editid" value="<?php echo $editid?>"></td></tr>

          <tr >
            <td height="40" colspan="2"><div class="tip2">只要不修改变更防伪码，可以先把防伪码和二维码印刷好，然后在此处修改其它内容。</div></td>
          </tr>
          <tr >

            <td width="8%" height="50"> <h3>防伪码：</h3></td>

            <td width="92%" height="50" ><input name="bianhao" type="text" id="bianhao" class="input-text2" value="<?php echo $bianhao?>" >
            防伪码不要修改，如不需要可直接删除。</td>
          </tr>

          <!--tr >

            <td height="50"><h3>有效日期：</h3></td>

            <td height="50"><input type="text" name="riqi" value="<?php echo $riqi?>" class="input-text2">
            有效的日期如：2018-12-5</td>
          </tr>
          <tr >
            <td height="50"><h3>产品图片：</h3></td>
            <td height="50" valign="middle">
			<input name="tupian" type="text" class="input-text2" id="tupian" style="width:400px;" value="<?php echo $tupian?>" >
            填写图片地址或上传图片</td>
          </tr>
          <tr >
            <td height="50"><h3>上传图片：</h3></td>
            <td height="50" valign="middle"><iframe src="upload.php" width="100%" height="45px" scrolling="no"></iframe>
                
            </td>
          </tr -->

		  <tr >

            <td height="50"> <h3>产品名称：</h3></td>

            <td height="50"><input type="text" name="product" value="<?php echo $product?>" class="input-text2" />
            产品名如:纤塑古方</td>
          </tr>

		  <!-- tr >

            <td height="50"><h3>所属代理：</h3></td>

            <td height="50"><input type="text" name="zd1" value="<?php echo $zd1?>" class="input-text2">
            该防伪码所属产品的代理商</td>
          </tr>

		  <tr >

            <td height="50"><h3>销售区域：</h3></td>

            <td height="50"><input type="text" name="zd2" value="<?php echo $zd2?>" class="input-text2">
            该防伪码所属产品的销售区域</td>
          </tr>
		  <tr >
            <td height="114"><h3>产品介绍：</h3></td>
		    <td height="114"><textarea name="jianjie" rows="5"  id="jianjie" class="input-text3" ><? echo $jianjie?></textarea></td>
	      </tr -->   

          <tr >

            <td>&nbsp;</td>

            <td><button  name="check"  type="submit" class="btn3" > <i class="fa fa-edit fa-lg"></i> 确认修改</button></td>
          </tr>
        </table>      
	  </form>  

    </td>

  </tr>

</table>

<p>
  <?php

}



//////////////////////////////////////////

if($act == "save_edit"){

    $editid     = $_REQUEST["editid"]; 

    $bianhao    = trim($_REQUEST["bianhao"]);

	$riqi          = trim($_REQUEST["riqi"]);

	$product       = strreplace(trim($_REQUEST["product"]));	

	$zd1           = strreplace($_REQUEST["zd1"]);

	$zd2           = strreplace($_REQUEST["zd2"]);	

    $tupian        = trim($_REQUEST["tupian"]);

	$jianjie       = trim($_REQUEST["jianjie"]);	

	if($editid == "")

	{

	  echo "<script>alert('ID参数有误');location.href='?'</script>";

	  exit;

	}

	if($bianhao=="")

	{

	  echo "<script>alert('防伪码不能为空');location.href='?act=edit&id=".$editid."'</script>";

	  exit;

	}



	$sql="update tgs_code set bianhao='$bianhao',riqi='$riqi',product='$product',zd1='$zd1',zd2='$zd2' ,tupian='$tupian',jianjie='$jianjie' where id='$editid' limit 1";

	//echo $sql;

	mysql_query($sql);



	echo "<script>alert('防伪信息修改成功');location.href='?'</script>";

	exit; 



}



 /////多选或全选删除功能////////////////////////////////////////////
if($act == "delart"){
	$chk = $_REQUEST["chk"];

	if(count($chk)>0){
	  $countchk = count($chk);

		for($i=0;$i<=$countchk;$i++)  
		{  

		 //echo  $chk[$i]."<br>"; 
		  mysql_query("delete from tgs_code where id='$chk[$i]' limit 1");  

		} 
		echo "<script>alert('删除成功');location.href='?'</script>";
	}
	else echo "<script>alert('还没有选择哦');location.href='?'</script>";

}

//查询历史信息

if($act == "query_record")

{ 

  $code_list = array();

  $key       = trim($_REQUEST["key"]);

  $qupz        = trim($_REQUEST['qupz']);

  $sql="select * from tgs_history where 1";

  if($key != ""){

    $sql.=" and keyword like '%$key%'";

  }  

  $sql.=" order by id desc";

  ///echo $sql;

  $result=mysql_query($sql); 

  if($qupz == ""){ 

    $pagesize = $cf['list_num'];//每页所要显示的数据个数。

	$qupz       = $cf['list_num'];

  }else{

	$pagesize = $qupz;

  }

  $total    = mysql_num_rows($result); 	

  $filename = "?act=query_record&keyword=".$key."&qupz=".$qupz."";

  $currpage  = intval($_REQUEST["page"]);

  if(!is_int($currpage))

	$currpage=1;

	if(intval($currpage)<1)$currpage=1;

    if(intval($currpage-1)*$pagesize>$total)$currpage=1;



	if(($total%$pagesize)==0){

	  $totalpage=intval($total/$pagesize); 

	}

	else

	  $totalpage=intval($total/$pagesize)+1;

	  if ($total!=0&&$currpage>1)

       mysql_data_seek($result,(($currpage-1)*$pagesize));

     $i=0;

     while($arr=mysql_fetch_array($result)) 

     { 

     $i++;

     if($i>$pagesize)break; 

         

		 $code_list[] = $arr;

	 }

?>
  
  
  
  <SCRIPT language="javascript">

function CheckAll(form)

  {

  for (var i=0;i<form.elements.length;i++)

    {

    var e = form.elements[i];

    if (e.Name != "chkAll"&&e.disabled==false)

       e.checked = form.chkAll.checked;

    }

  }

function CheckAll2(form)

  {

  for (var i=0;i<form.elements.length;i++)

    {

    var e = form.elements[i];

    if (e.Name != "chkAll2"&&e.disabled==false)

       e.checked = form.chkAll2.checked;

    }

  }  

  

function ConfirmDel()

{

	if(document.myform.Action.value=="delete_history")

	{

		document.myform.action="?act=delete_history";

		if(confirm("确定要删除选中的记录吗？本操作不可恢复！"))

		    return true;

		else

			return false;

	}	

}



</SCRIPT>
  
  
<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">

		

		<table cellpadding="3" cellspacing="0" class="table_98">

		

		  <tr>
		    <td><div class="formtitle"><span>防伪码查询记录</span></div></td>
          </tr>
		  
		</table>

	

	<form method="post" name="myform" id="myform" action="?act=query_record" onSubmit="return ConfirmDel();">

	<input type="hidden" name="key" value="<?php echo $key?>" />

	<table  cellpadding="3" cellspacing="0" class="table_1" >
        <tr>
          <td width="12%" height="45" align="left">
		  	<button  name="check"  type="submit" class="btn3" onClick="document.myform.Action.value='delete_history'"> <i class="fa fa-trash-o fa-lg"></i> 删除选定记录</button>
	</td>
		  <td width="88%" height="45" align="right">
 <form action="?act=query_record" method="post" name="form1">
			
		    <input type="text" name="key" class="input-text2" placeholder="请输入搜索的关键词"> 	<button  name="submit" type="submit" id="submit" class="btn_green"> <i class="fa fa-search fa-lg"></i> 点击查询</button>
		  
	  </form>
  </tr>
</table>



      <table cellpadding="3" cellspacing="1" class="tablelist">

        
<thead>
		<tr>

          <th width="6%" ><INPUT TYPE="checkbox" NAME="chkAll" id="chkAll" title="全选"  onclick="CheckAll(this.form)">&nbsp;全选</th>

		  <th width="10%" >序号</th>

          <th width="22%" >搜索关键字</th>

          <th width="17%" >搜索日期</th>

          <th width="17%" >查询结果</th>
          <th width="28%" >搜索IP</th>
		  
		</tr>

		<?php for($i=0;$i<count($code_list);$i++){?>
</thead>
        <tr >

          <td><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $code_list[$i]["id"];?>">&nbsp;</td>

		  <td><?php echo $i+1;?></td>

          <td><?php echo $code_list[$i]["keyword"];?></td>

          <td><?php echo $code_list[$i]["addtime"]?></td>

          <td><?php echo $code_list[$i]["results"]?></td>
          <td>来自：<script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=<?php echo $code_list[$i]["addip"]?>"></script>

		  <script>document.write(remote_ip_info.country + ' - ' + remote_ip_info.province + ' - ' + remote_ip_info.city);</script> IP地址：

		  <a href="http://www.ip138.com/ips138.asp?ip=<?php echo $code_list[$i]["addip"]?>" title="点击查看地区" target="_blank"><?php echo $code_list[$i]["addip"]?></a></td>
        </tr>

		<?php

		}

		?>
</table>



		<table cellpadding="3" cellspacing="0" class="table_1">

		<tr><td >
		<button  name="check"  type="submit" class="btn3" onClick="document.myform.Action.value='delete_history'"> <i class="fa fa-trash-o fa-lg"></i> 删除选定记录</button>
			  <input name="Action" type="hidden" id="Action" value="">
	       </td>
		   <td  align="right">
			  当前第<?php echo $currpage?>页,&nbsp;共<?php echo $totalpage?>页/<?php  echo $total;?>个记录&nbsp;

              <?php if($currpage==1){?>

              首页&nbsp;上一页&nbsp;

              <?php } else {?>

              <a href="<?php echo $filename;?>&page=1">首页</a>&nbsp;<a href="<?php echo $filename;?>&page=<?php echo ($currpage-1);?>">上一页</a>&nbsp;

              <?php }

			  if($currpage==$totalpage)

			  {?>

			  下一页&nbsp;尾页&nbsp;

              <?php }else{?>

              <a href="<?php echo $filename;?>&page=<?php echo ($currpage+1);?>">下一页</a>&nbsp;<a href="<?php echo $filename;?>&page=<?php echo  $totalpage;?>">尾页</a>&nbsp;

              <?php }?>			  </td>
		</tr>
      </table>
	  </FORM>

    

	</td>

  </tr><?php

}



/////删除查询记录

if($act == "delete_history")

{



	$chk = $_REQUEST["chk"];

	if(count($chk)>0){



	  $countchk = count($chk);

		for($i=0;$i<=$countchk;$i++)  

		{  

		 //echo  $chk[$i]."<br>"; 

		  mysql_query("delete from tgs_history where id='$chk[$i]' limit 1");		  

		} 

		echo "<script>alert('删除成功');location.href='?act=query_record'</script>";

	}

}

?>


  <script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
	  <script type="text/javascript"> 
      $("#usual12 ul").idTabs2(); 
    </script>
  <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>
</html>