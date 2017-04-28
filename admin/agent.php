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
      <title><?php echo $cf['site_name'] ?></title>
        <link rel="stylesheet" href="css/admin.css">
        <link href="css/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
<body>

<div class="headbox">
  <div id="topnavbar" style="display: block;">
<div class="headmenu">
   <a href="?" target="rightFrame" class="btn2"><i class="fa fa-paper-plane"></i> 代理商管理</a>
	<a href="?act=add" target="rightFrame" class="btn2"><i class="fa fa-paper-plane"></i> 新增代理商</a>
	<a href="?act=import" target="rightFrame" class="btn2"><i class="fa fa-line-chart"></i> 导入代理商</a>
	<a href="?act=query_record" target="rightFrame" class="btn2"><i class="fa fa-search"></i> 代理查询记录</a>
	<a href="../agent.php" target="_blank" class="btn2"><i class="fa fa-tv"></i> 代理查询前端</a>
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

		document.myform.action="?act=delagent";

		if(confirm("确定要删除选中的记录吗？本操作不可恢复！"))

		    return true;

		else

			return false;

	}else if(document.myform.Action.value=="export_agent"){

	  document.myform.action="?act=export_agent";
	}
}
</SCRIPT>


<?php

        $agent_list = array();
		$agentid = trim($_REQUEST["agentid"]);     //代理商编号
		$product = trim($_REQUEST['product']);     //代理产品
		$quyu     = trim($_REQUEST['quyu']);      //代理区域
		$weixin    = trim($_REQUEST['weixin']); //代理商微信号
		$name     = trim($_REQUEST['name']);      //代理商姓名
		$qq     = trim($_REQUEST['qq']);          //代理商QQ
		$tel     = trim($_REQUEST['tel']);        //代理商电话
		$phone     = trim($_REQUEST['phone']);
		$qudao     = trim($_REQUEST['qudao']);
		$url     = trim($_REQUEST['url']);
		$shuyu     = trim($_REQUEST['shuyu']);
		$paipai     = trim($_REQUEST['paipai']);
		$h       = trim($_REQUEST["h"]);
		$pz      = trim($_REQUEST['pz']);
		
		$sql="select * from  tgs_agent  where 1";

		if($agentid != ""){

		 $sql.= " and agentid like '%$agentid%'";

		 }
        if($weixin != ""){

		 $sql.=" and weixin like '%$weixin%'";
		}

		if($product != ""){

		 $sql.=" and product like '%$product%'";

		}

		if($phone != ""){

		 $sql.=" and phone like '%$phone%'";

		}

		
		if($name != ""){

		 $sql.=" and name like '%$name%'";

		}

		if($qq != ""){

		 $sql.=" and qq like '%$qq%'";

		}

		if($tel != ""){

		 $sql.=" and tel like '%$tel%'";

		}

		if($quyu != ""){

		 $sql.=" and quyu like '%$quyu%'";

		}

		if($qudao != ""){

		 $sql.=" and qudao like '%$qudao%'";

		}

		if($url != ""){

		 $sql.=" and url like '%$url%'";

		}

		if($shuyu != ""){

		 $sql.=" and shuyu like '%$shuyu%'";

		}
		if($paipai != ""){

		 $sql.=" and paipai like '%$paipai%'";

		}

		if($qudao!=""){

		 $sql.=" and qudao like '%$qudao%'";

		}

		if($h == "1"){

		 $sql.=" order by hits desc,id desc";

		}

		elseif($h=="0"){

		 $sql.=" order by hits asc,id desc";

		}

		else{

		 $sql.=" order by id desc";

		}

		///echo $sql;

		$result = mysql_query($sql);



	   if($pz == ""){

         $pagesize = $cf['list_num'];//每页所要显示的数据个数。

		 $pz       = $cf['list_num'];

	   }

	   else{

	     $pagesize = $pz;

	   }

       $total    = mysql_num_rows($result);

       $filename = "?agentid=".$agentid." &weixin=".$weixin." &product=".$product." &qq=".$qq." &quyu=".$quyu." &shuyu=".$shuyu." &h=".$h."  &pz=".$pz." ";



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

     if($i>$pagesize)
	 break;

      $agent_list[] = $arr;

	 }

?>



<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">



		<table cellpadding="3" cellspacing="0" class="table_98">

		 <form action="?" method="post" name="form1">

		  <tr>
		    <td ><div class="formtitle"><span>代理商管理</span></div></td>
	       </tr>
		  <tr>

			<td >
			  <input type="text" name="agentid" size="18" class="input-text2" placeholder="代理编号"/>
			  <input name="weixin"  type="text"  id="weixin" size="15" class="input-text2" placeholder="代理商微信号">
			  
<input name="name" type="text" id="name" size="10" class="input-text2" placeholder="代理商姓名">
<input name="phone" type="text" id="phone" size="18" class="input-text2" placeholder="代理商手机号" >
<input name="qq" type="text" id="qq" size="15" class="input-text2" placeholder="代理商QQ" />
              <input name="product" type="text" id="product" size="18" class="input-text2" placeholder="代理的产品" />
              

			<button  name="submit" type="submit" id="submit" class="btn_green"> <i class="fa fa-search fa-lg"></i> 点击查询</button></td>
		  </tr>
		  <tr>
		    <td >
              <input name="quyu" type="text" id="quyu" size="10" class="input-text2" placeholder="代理区域" />
              <input name="qudao" type="text" id="qudao" size="20" class="input-text2" placeholder="代理商等级" />
              
              <input name="url" type="text" id="url" size="20" class="input-text2" placeholder="授权网址" />
             
              <input name="shuyu" type="text" id="shuyu" size="28" class="input-text2" placeholder="身份证号" />
              <input name="paipai" type="text" id="paipai" size="20" class="input-text2" placeholder="上级代理"  />
 <input type="hidden" name="pz" id="pz" value="<?php echo $pz?>" />
<button  name="submit" type="submit" id="submit" class="btn_green"> <i class="fa fa-search fa-lg"></i> 点击查询</button></td>
	       </tr>
		 </form>
		</table>

	<form method="post" name="myform" id="myform" action="?" onSubmit="return ConfirmDel();">

	<input type="hidden" name="agentid" value="<?php echo $agentid?>" />

	<input type="hidden" name="product" value="<?php echo $product?>" />

	<input type="hidden" name="quyu" value="<?php echo $quyu?>" />

	<input type="hidden" name="shuyu" value="<?php echo $shuyu?>" />
	
	<input type="hidden" name="qq" value="<?php echo $qq?>" />

	<input type="hidden" name="weixin" value="<?php echo $weixin?>" />

	<input type="hidden" name="email" value="<?php echo $email?>" />

	<input type="hidden" name="paipai" value="<?php echo $paipai?>" />

	<input type="hidden" name="h" value="<?php echo $h?>" />

	<table cellpadding="3" cellspacing="0" class="table_98">

        <tr>

          <td height="53">
		  
		  <button  name="check"  type="submit" class="btn3"  onClick="document.myform.Action.value='delete'" > <i class="fa fa-trash-o fa-lg"></i> 删除选定记录</button>
		  
		 <button  name="check" type='submit' class="btn_blue" onClick="document.myform.Action.value='export_agent'" > <i class="fa fa-line-chart fa-lg"></i> 导出选定的记录</button>

		

		  </td>

		  <td align="right">&nbsp;</td>

        </tr>

    </table>

      <table cellpadding="3" cellspacing="1"  class="tablelist">
        <thead>
          <tr>
            <th width="3%"><input type="checkbox" name="chkAll" id="chkAll" title="全选"  onClick="CheckAll(this.form)">
              &nbsp;</th>
            <th width="4%">序号</th>
            <th width="10%">代理商编号</th>
			 <th width="10%">微信</th>
            <th width="12%">代理产品</th>
            <th width="6%">代理区域</th>
            <th width="6%">代理等级</th>
            <th width="7%">姓名</th>
            <th width="8%">手机号</th>
           <th width="8%">二维码</th>
            <th width="8%">上级代理</th>
            <th width="5%"> <?php

		  if($_GET["h"]==1){

		  ?>
                <a href="?bianhao=<?php echo $bianhao?>&product=<?php echo $product?>&zd1=<?php echo $zd1?>&zd2=<?php echo $zd2?>&h=0&pz=<?php echo $pz?>&page=<?php echo $currpage?>">查询次数</a>
                <?php  }else{ ?>
                <a href="?bianhao=<?php echo $bianhao?>&product=<?php echo $product?>&zd1=<?php echo $zd1?>&zd2=<?php echo $zd2?>&h=1&pz=<?php echo $pz?>&page=<?php echo $currpage?>">查询次数</a>
                <?php 

		  }

		  ?>
            </th>
            <th width="8%">操作</th>
          </tr>
        </thead>
        <?php for($i=0;$i<count($agent_list);$i++){?>
        <tr >
          <td><input name="chk[]2" type="checkbox" id="chk[]2" value="<?php echo $agent_list[$i]["id"];?>"></td>
          <td><?php echo $i+1?></td>
          <td><a href="?act=edit&id=<?php echo $agent_list[$i]["id"];?>" title="编辑该代理商"><?php echo $agent_list[$i]["agentid"];?></a></td>
           <td><?php echo $agent_list[$i]["weixin"]?></td>
		  <td><?php echo $agent_list[$i]["product"]?></td>
          <td><a href="?quyu=<?php echo $agent_list[$i]["quyu"]?>"><?php echo $agent_list[$i]["quyu"]?></a></td>
          <td><?php echo $agent_list[$i]["qudao"]?></td>
          <td><a href="?name=<?php echo $agent_list[$i]["name"]?>"><?php echo $agent_list[$i]["name"]?></a></td>
          <td><?php echo $agent_list[$i]["phone"]?></td>
          
		   <td><a href="qragent.php?act=edit&id=<?php echo $agent_list[$i]["id"];?>" title="查看二维码"><?php echo "查看二维码";?></a></td>
         
          <td><a href="?paipai=<?php echo $agent_list[$i]["paipai"]?>"><?php echo $agent_list[$i]["paipai"];?></a></td>
          <td><?php echo $agent_list[$i]["hits"];?></td>
          <td><a href="?act=edit&id=<?php echo $agent_list[$i]["id"];?>" title="编辑该代理商"><i class="fa fa-pencil-square-o fa-lg"></i> 编辑</a></td>
        </tr>
        <?php

		}

		?>
      </table>
      <table cellpadding="3" cellspacing="0" class="table_98">

		<tr><td >
		
		  <button  name="check"  type="submit" class="btn3"  onClick="document.myform.Action.value='delete'" > <i class="fa fa-trash-o fa-lg"></i> 删除选定记录</button>
		  
		
		
		
		

			  <input name="Action" type="hidden" id="Action" value="">

			 
			  
			   <button  name="check" type='submit' class="btn_blue" onClick="document.myform.Action.value='export_agent'" > <i class="fa fa-line-chart fa-lg"></i> 导出选定的记录</button>

	       </td>

		   <td align="right">每页显示
<?php echo $pagesize?>
条&nbsp;&nbsp;&nbsp;&nbsp;

		      当前第
		      <?php echo $currpage?>
		      页, 共
		      <?php echo$totalpage?>
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
<select name='select' size='1' id="select" onchange='javascript:submit()' class="input-select">
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

/////导出/////

if($act == "export_agent")

{

?>

免费版，无此功能!如需商业版本，请访问官网：www.ew80.com

<?php

}

///////导入////////////

if($act =="import"){

?>

免费版，无此功能!如需商业版本，请访问官网：www.ew80.com



<?php

}

//上传增加数据库

if($act == "save_uplod"){

	echo "<script>alert('免费版，无此功能!如需商业版本，请访问官网：www.ew8');location.href='?'</script>";
	exit;

}



////////添加////////////

if($act == "add"){

?>

<table align="center" cellpadding="0" cellspacing="0"  class="table_list_98">

  <tr>

    <td valign="top">

	<form name="formagent" method="post" enctype="multipart/form-data" action="?act=Addagent">

       <table cellpadding="3" cellspacing="1"  class="table_98">

          <tr>

            <td colspan="2" align="center"><div class="formtitle"><span>增加代理信息</span></div></td>
		  </tr>

          <tr>

            <td width="7%"> <h3>代理编号：</h3></td>

            <td width="93%"><input name="agentid" type="text" id="agentid" size="30" class="input-text2">
              代理商编号如：WS002</td>
          </tr>
          <tr>
            <td><h3>代理商姓名：</h3></td>
            <td><input type="text" name="name" size="15" id="name" class="input-text2"></td>
          </tr>
          <tr >
            <td><h3>代理商手机：</h3></td>
            <td><input type="text" name="phone" size="20" id="phone" class="input-text2" ></td>
          </tr>
          <tr>
            <td><h3>代理商微信：</h3></td>
            <td><input type="text" name="weixin" size="20" id="weixin" class="input-text2"></td>
          </tr>

          <tr>

            <td><h3>代理产品：</h3></td>

            <td><input type="text" name="product" size="25" class="input-text2">
            代理的产品</td>
          </tr>

		  <tr>

            <td> <h3>代理区域：</h3></td>

            <td><input name="quyu" type="text" size="18" class="input-text2">
            代理的区域</td>
          </tr>

		  <tr>

            <td><h3>身份证号：</h3></td>

            <td><input type="text" name="shuyu" size="20" class="input-text2">
            代理商身份证号</td>
          </tr>

		  <tr>

            <td><h3>代理网址：</h3></td>

            <td><input type="text" name="url" size="50" value="www.ew80.com" class="input-text2">
            授权代理的网站或网店</td>
          </tr>

		  <tr>

            <td><h3>代理等级：</h3></td>

            <td><input type="text" name="qudao" size="20" value="全国总代" class="input-text2">
            代理的等级,如全国总代</td>
          </tr>
		  <tr>
            <td><h3>上级代理：</h3></td>
		    <td><input type="text" name="paipai" size="20" id="paipai" class="input-text2">
		      填写所属上级代理的编号</td>
	      </tr>
		  <tr>
            <td><h3>开始代理日期：</h3></td>
		    <td><input type="text" name="addtime" value="2016-1-1" class="input-text2"></td>
	      </tr>
		  <tr>
            <td><h3>代理结束日期：</h3></td>
		    <td><input type="text" name="jietime" value="2019-03-06" class="input-text2"></td>
	      </tr>

		  <tr>
		    <td height="95"></td>
	        <td height="95"><button  name="check"  type="submit" class="btn3" > <i class="fa fa-plus fa-lg"></i> 确认新增代理商</button> </td>
		  </tr>
		  <tr>
		    <td height="95" colspan="2"><div class="formtitle"><span>以下内容项选填写</span></div></td>
	      </tr>
		  <tr>

            <td><h3>代理商介绍：</h3></td>

            <td><textarea name="about" id="about" cols="50" rows="5" class="input-text3">专业销售本公司相关产品</textarea>
            选填</td>
          </tr>

		  <tr>

            <td><h3>固定电话：</h3></td>

            <td><input type="text" name="tel" size="18" class="input-text2">
            选填</td>
          </tr>

		  <tr>

            <td><h3>传真号码：</h3></td>

            <td><input type="text" name="fax" size="18" class="input-text2">
            选填</td>
          </tr>

		  <tr>

            <td><h3>所属单位：</h3></td>

            <td><input type="text" name="danwei" size="30" class="input-text2">
            选填</td>
          </tr>

		  <tr>

            <td><h3>邮箱：</h3></td>

            <td><input type="text" name="email" size="25" class="input-text2">
            选填</td>
          </tr>

		  <tr>

            <td><h3>QQ：</h3></td>

            <td><input type="text" name="qq" size="20" class="input-text2">
              选填</td>
          </tr>

		  <tr>

            <td><h3>阿里旺旺：</h3></td>

            <td><input type="text" name="wangwang" size="18" class="input-text2">
            选填</td>
          </tr>

		  <tr>

            <td><h3>邮编：</h3></td>

            <td><input type="text" name="zip" size="8" class="input-text2" >
            选填</td>
          </tr>

		  <tr>

            <td><h3>联系地址：</h3></td>

            <td><input type="text" name="dizhi" size="50" class="input-text2">
            选填</td>
          </tr>

		  <tr>

            <td><h3>备注：</h3></td>

            <td><textarea name="beizhu" id="beizhu" cols="50" rows="5" class="input-text3">易网软件 简单易用</textarea>
            选填</td>
          </tr>

          <tr>

            <td>&nbsp;</td>

            <td><button  name="check"  type="submit" class="btn3" > <i class="fa fa-plus fa-lg"></i> 确认增加代理商</button> </td>
          </tr>
        </table>

	  </form>

    </td>

  </tr>

</table>

<?php

}

////添加代理信息

if($act == "Addagent")

{

    $agentid      = trim($_REQUEST["agentid"]);

	$product      = trim($_REQUEST["product"]);

	$quyu         = trim($_REQUEST["quyu"]);

	$shuyu        = trim($_REQUEST["shuyu"]);

	$url          = strreplace(trim($_REQUEST["url"]));

	$qudao        = trim($_REQUEST["qudao"]);

	$about        = strreplace(trim($_REQUEST["about"]));

	$addtime      = trim($_REQUEST["addtime"]);

	$jietime      = trim($_REQUEST["jietime"]);

	$name         = trim($_REQUEST["name"]);

	$tel          = trim($_REQUEST["tel"]);

	$fax          = trim($_REQUEST["fax"]);

	$phone        = trim($_REQUEST["phone"]);

	$danwei       = trim($_REQUEST["danwei"]);

	$email        = trim($_REQUEST["email"]);

	$qq           = trim($_REQUEST["qq"]);

	$weixin       = trim($_REQUEST["weixin"]);

	$wangwang     = trim($_REQUEST["wangwang"]);

	$paipai       = trim($_REQUEST["paipai"]);

	$zip          = trim($_REQUEST["zip"]);

	$dizhi        = strreplace(trim($_REQUEST["dizhi"]));

	$beizhu       = strreplace(trim($_REQUEST["beizhu"]));

	if($agentid=="")

	{

	  echo "<script>alert('代理商编号不能为空');location.href='?act=add'</script>";

	  exit;

	}

	$sql = "select id from tgs_agent where agentid='".$agentid."' limit 1";

	$res = mysql_query($sql);

	$arr = mysql_fetch_array($res);

	if(mysql_num_rows($res)>0){

	  echo "<script>alert('代理商编号已存在');location.href='?act=edit&id=".$arr["id"]."'</script>";

	  exit;

	}

	$sql="insert into tgs_agent (agentid,product,quyu,shuyu,qudao,about,addtime,jietime,name,tel,fax,phone,danwei,email,url,qq,weixin,wangwang,paipai,zip,dizhi,beizhu)values('$agentid','$product','$quyu','$shuyu','$qudao','$about','$addtime','$jietime','$name','$tel','$fax','$phone','$danwei','$email','$url','$qq','$weixin','$wangwang','$paipai','$zip','$dizhi','$beizhu')";

	//$sql="insert into tgs_agent set agentid = '	".$agentid."',product='".$product."',quyu='".$quyu."',shuyu='".$shuyu."',qudao='".$qudao."',about='".$about."',addtime='".$addtime."',jietime='".$jietime."',name='".$name."',tel='".$tel."',fax='".$fax."',phone='".$phone."',danwei='".$danwei."',email='".$email."',url='".$url."',qq='".$qq."',weixin='".$weixin."',wangwang='".$wangwang."',paipai='".$paipai."',zip='".$zip."',dizhi='".$dizhi."',beizhu='".$beizhu."'";



	mysql_query($sql);

	echo "<script>alert('添加成功');location.href='?'</script>";

	exit;

}



////为编辑获取数据

if($act == "edit") {

	$editid = $_GET["id"];

	$sql = "select * from tgs_agent where id='$editid' limit 1";

	//echo $sql;

	$result = mysql_query($sql);

	$arr = mysql_fetch_array($result);

	$agentid = $arr["agentid"];

	$product = $arr["product"];

	$quyu = $arr["quyu"];

	$shuyu = $arr["shuyu"];

	$qudao = $arr["qudao"];

	$about = $arr["about"];

	$addtime = $arr["addtime"];

	$jietime = $arr["jietime"];

	$name = $arr["name"];

	$tel = $arr["tel"];

	$fax = $arr["fax"];

	$phone = $arr["phone"];

	$danwei = $arr["danwei"];

	$email = $arr["email"];

	$url = $arr["url"];

	$qq = $arr["qq"];

	$weixin = $arr["weixin"];

	$wangwang = $arr["wangwang"];

	$paipai = $arr["paipai"];

	$zip = $arr["zip"];

	$dizhi = $arr["dizhi"];

	$beizhu = $arr["beizhu"];

}

?>



<table align="center" cellpadding="0" cellspacing="0" class="table_list_98">

  <tr>

    <td valign="top">

	<form name="form1" method="post" enctype="multipart/form-data" action="?act=save_agentedit">

        <table cellpadding="3" cellspacing="1"  class="table_98">

		  <tr>

            <td colspan="2" align="left"><input name="editid" type="hidden" id="editid" value="<?php echo $editid?>">
            <div class="formtitle"><span>修改代理商信息</span></div></td>
		  </tr>

          <tr>

            <td width="7%"> <h3>代理编号：</h3></td>

            <td width="93%"><input name="agentid" type="text" id="agentid" size="30" value="<?php echo $agentid?>" class="input-text2" ></td>
          </tr>
          <tr>
            <td><h3>代理商姓名：</h3></td>
            <td><input name="name" type="text" id="name" value="<?php echo $name?>" size="15" class="input-text2"></td>
          </tr>
          <tr >
            <td><h3>代理商手机:</h3>             </td>
            <td><input name="phone" type="text" id="phone" value="<?php echo $phone?>" size="20" class="input-text2"></td>
          </tr>
          <tr>
            <td><h3>代理商微信：</h3></td>
            <td><input name="weixin" type="text" id="weixin" value="<?php echo $weixin?>" size="20" class="input-text2"></td>
          </tr>

          <tr>

            <td><h3>代理产品：</h3></td>

            <td><input type="text" name="product" size="25" value="<?php echo $product?>" class="input-text2"></td>
          </tr>

		  <tr>

            <td> <h3>代理区域：</h3></td>

            <td><input name="quyu" type="text" size="15" value="<?php echo $quyu?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>身份证号：</h3></td>

            <td><input type="text" name="shuyu" size="25" value="<?php echo $shuyu?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>代理网址：</h3></td>

            <td><input type="text" name="url" size="40" value="<?php echo $url?>" class="input-text2"></td>
          </tr>

		  <tr>

            <td><h3>代理等级：</h3></td>

            <td><input type="text" name="qudao" size="20" value="<?php echo $qudao?>" class="input-text2" ></td>
          </tr>
		  <tr>
            <td><h3>开始代理日期：</h3></td>
		    <td><input type="text" name="addtime" value="<?php echo $addtime?>" class="input-text2" >
	        格式2016-12-2</td>
	      </tr>
		  <tr>
            <td><h3>代理结束日期：</h3></td>
		    <td><input type="text" name="jietime" value="<?php echo $jietime?>" class="input-text2" >
格式2019-12-2</td>
	      </tr>
		  <tr>
            <td><h3>上级代理：</h3></td>
		    <td><input name="paipai" type="text" class="input-text2" id="paipai" value="<?php echo $paipai?>" size="15">
		      填写所属上级代理的编号</td>
	      </tr>
 <tr>
		    <td height="95" colspan="2"><div class="formtitle"><span>以下内容项选填写</span></div></td>
	      </tr>
 <tr>
   <td><h3>代理商介绍：</h3></td>
   <td><textarea name="about" id="about" cols="50" rows="5" class="input-text3"><?php echo $about?></textarea></td>
 </tr>

		  <tr>

            <td><h3>电话：</h3></td>

            <td><input type="text" name="tel" size="20" value="<?php echo $tel?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>传真：</h3></td>

            <td><input type="text" name="fax" size="20" value="<?php echo $fax?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>单位：</h3></td>

            <td><input type="text" name="danwei" size="30" value="<?php echo $danwei?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>邮箱：</h3></td>

            <td><input type="text" name="email" size="20" value="<?php echo $email?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>QQ：</h3></td>

            <td><input type="text" name="qq" size="15" value="<?php echo $qq?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>旺旺：</h3></td>

            <td><input type="text" name="wangwang" size="18" value="<?php echo $wangwang?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>邮编：</h3></td>

            <td><input type="text" name="zip" size="8" value="<?php echo $zip?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>地址：</h3></td>

            <td><input type="text" name="dizhi" size="40" value="<?php echo $dizhi?>" class="input-text2" ></td>
          </tr>

		  <tr>

            <td><h3>备注：</h3></td>

            <td><textarea name="beizhu" id="beizhu" cols="50" rows="5" class="input-text3"><?php echo $beizhu?></textarea></td>
          </tr>
		  <tr>
            <td height="95"></td>
		    <td height="95"><button  name="check"  type="submit" class="btn3" > <i class="fa fa-edit fa-lg"></i> 确认修改代理商</button></td>
	      </tr>
        </table>

	  </form>

    </td>

  </tr>

</table>

<?php

/////修改代理信息//////////

if($act == "save_agentedit"){



    $editid     = $_REQUEST["editid"];

	$agentid      = trim($_REQUEST["agentid"]);

	$product      = trim($_REQUEST["product"]);

	$quyu         = trim($_REQUEST["quyu"]);

	$shuyu        = trim($_REQUEST["shuyu"]);

	$url          = strreplace(trim($_REQUEST["url"]));

	$qudao        = trim($_REQUEST["qudao"]);

	$about        = trim($_REQUEST["about"]);

	$addtime      = trim($_REQUEST["addtime"]);

	$jietime      = trim($_REQUEST["jietime"]);

	$name         = trim($_REQUEST["name"]);

	$tel          = trim($_REQUEST["tel"]);

	$fax          = trim($_REQUEST["fax"]);

	$phone        = trim($_REQUEST["phone"]);

	$danwei       = trim($_REQUEST["danwei"]);

	$email        = strreplace(trim($_REQUEST["email"]));

	$qq           = trim($_REQUEST["qq"]);

	$weixin       = trim($_REQUEST["weixin"]);

	$wangwang     = trim($_REQUEST["wangwang"]);

	$paipai       = trim($_REQUEST["paipai"]);

	$zip          = trim($_REQUEST["zip"]);

	$dizhi        = strreplace(trim($_REQUEST["dizhi"]));

	$beizhu       = strreplace(trim($_REQUEST["beizhu"]));

	if($editid == "")

	{

	  echo "<script>alert('ID参数有误');location.href='?'</script>";

	  exit;

	}

	if($editid=="")

	{

	  echo "<script>alert('代理商编号不能为空');location.href='?act=edit&id=".$editid."'</script>";

	  exit;

	}

	//$sql="update tgs_code set bianhao='$bianhao',riqi='$riqi',product='$product',zd1='$zd1',zd2='$zd2' where id='$editid' limit 1";



	$sql="update tgs_agent set agentid = '".$agentid."',product='".$product."',quyu='".$quyu."',shuyu='".$shuyu."',qudao='".$qudao."',about='".$about."',addtime='".$addtime."',jietime='".$jietime."',name='".$name."',tel='".$tel."',fax='".$fax."',phone='".$phone."',danwei='".$danwei."',email='".$email."',url='".$url."',qq='".$qq."',weixin='".$weixin."',wangwang='".$wangwang."',paipai='".$paipai."',zip='".$zip."',dizhi='".$dizhi."',beizhu='".$beizhu."'where id='$editid' limit 1";

	//echo $sql;

	mysql_query($sql);



	echo "<script>alert('修改成功');location.href='?'</script>";

	exit;



}



 /////多选或全选删除功能//////////////

if($act == "delagent"){

	$chk = $_REQUEST["chk"];

	if(count($chk)>0){

	  $countchk = count($chk);

		for($i=0;$i<=$countchk;$i++)

		{

		 //echo  $chk[$i]."<br>";

		  mysql_query("delete from tgs_agent where id='$chk[$i]' limit 1");

		}

		echo "<script>alert('删除成功');location.href='?'</script>";

	}

}



/////查询记录////////

if($act == "query_record")

{

  $agent_list = array();

  $key       = trim($_REQUEST["key"]);

  $agpz        = trim($_REQUEST['agpz']);

  $sql="select * from tgs_hisagent where 1";

  if($key != ""){

    $sql.=" and keyword like '%$key%'";

  }

  $sql.=" order by id desc";

  ///echo $sql;

  $result=mysql_query($sql);

  if($agpz == ""){

    $pagesize = $cf['list_num'];//每页所要显示的数据个数。

	$agpz       = $cf['list_num'];

  }else{

	$pagesize = $agpz;

  }

  $total    = mysql_num_rows($result);

  $filename = "?act=query_record&keyword=".$key."&agpz=".$agpz."";

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



		 $agent_list[] = $arr;

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

		 <form action="?act=query_record" method="post" name="form1">

		  <tr>
		    <td><div class="formtitle"><span>代理商查询记录</span></div></td>
	       </tr>
		  <tr>

			<td><input name="key" type="text" class="input-text2" size="30" placeholder="请输入搜索的关键词"> 	
		    <button  name="submit" type="submit" id="submit" class="btn_green"> <i class="fa fa-search fa-lg"></i> 点击查询</button> </td>
		  </tr>
		 </form>
		</table>

	<form method="post" name="myform" id="myform" action="?act=query_record" onSubmit="return ConfirmDel();">

	<input type="hidden" name="key" value="<?php echo $key?>" />

	<table cellpadding="3" cellspacing="0" class="table_98">

        <tr>

          <td width="11%" height="20">
		  	<button  name="check"  type="submit" class="btn3" onClick="document.myform.Action.value='delete_history'"> <i class="fa fa-trash-o fa-lg"></i> 删除选定记录</button>
		 </td>

		  <td width="89%" align="right">

	        <span class='red'>(*请定期清理查询记录)</span></td>

        </tr>

    </table>



      <table cellpadding="3" cellspacing="1" class="tablelist">
        <thead>
          <tr>
            <th width="3%"><input type="checkbox" name="chkAll" id="chkAll" title="全选"  onClick="CheckAll(this.form)"></th>
            <th width="5%">序号</th>
            <th width="18%">搜索关键字</th>
            <th width="24%">搜索日期</th>
            <th width="16%">搜索结果</th>
            <th width="34%">搜索IP</th>
          </tr>
        </thead>
        <?php for($i=0;$i<count($agent_list);$i++){?>
        <tr >
          <td><input name="chk[]" type="checkbox" id="chk[]" value="<?php echo $agent_list[$i]["id"];?>"></td>
          <td><?php echo $i+1;?></td>
          <td><?php echo $agent_list[$i]["keyword"];?></td>
          <td><?php echo $agent_list[$i]["addtime"]?></td>
          <td><?php echo $agent_list[$i]["results"]?></td>
          <td>来自：
              <script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=<?php echo $agent_list[$i]["addip"]?>"></script>
              <script>document.write(remote_ip_info.country + ' - ' + remote_ip_info.province + ' - ' + remote_ip_info.city);</script>
            IP地址： <a href="http://www.ip138.com/ips138.asp?ip=<?php echo $agent_list[$i]["addip"]?>" title="点击查看地区" target="_blank"><?php echo $agent_list[$i]["addip"]?></a></td>
        </tr>
        <?php

		}

		?>
      </table>
      <table cellpadding="3" cellspacing="0" class="table_98">

		<tr><td >	<button  name="check"  type="submit" class="btn3" onClick="document.myform.Action.value='delete_history'"> <i class="fa fa-trash-o fa-lg"></i> 删除选定记录</button>

			  <input name="Action" type="hidden" id="Action" value="">

	       </td>

		   <td align="right">每页显示<?php echo $pagesize?>条 当前第
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
<select name='page' size='1' id="page" onchange='javascript:submit()'>
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



/////删除查询记录

if($act == "delete_history")

{

	$chk = $_REQUEST["chk"];

	if(count($chk)>0){

	  $countchk = count($chk);

		for($i=0;$i<=$countchk;$i++)

		{

		 //echo  $chk[$i]."<br>";

		  mysql_query("delete from tgs_hisagent where id='$chk[$i]' limit 1");

		}

		echo "<script>alert('删除成功');location.href='?act=query_record'</script>";

	}

}

?>

<?php

//csv读取函数

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

</body>

</html>