<?php
error_reporting(0);
session_start();
require('../data/head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?=$cf['site_name']?></title>
      <meta name="keywords" content="<?=$cf['page_keywords']?>" />
      <meta name="description" content="<?=$cf['page_desc']?>" />
<link rel="stylesheet" type="text/css" href="css/login.css" media="all">
        </head>
 <body>
	<?php
$act = $_REQUEST["act"];
if ($act == "adminlogin")
{
  $username = trim($_POST["Username"]);
  $password = trim($_POST["Password"]);
   $sql="select * from tgs_admin where username='".$username."' and password='".md5($password)."'";
   $res=mysql_query($sql);
   $b=mysql_fetch_array($res);
   if(!$b[0])
	{
	     echo "<script>alert('帐号密码错误!');location.href='index.php';</script>";
	     exit();
    }
    else
    {
		 $_SESSION["Adminname"] = $username;
		 mysql_query( "update tgs_admin set logins=logins+1 where username='$username' limit 1");
		  
		 echo "<script>location.href='main.php';</script>"; 
		 exit;
	 }
} 

//退出后台************************************************************

if ($act=="logout")
{
session_unregister("Adminname");
echo "<script>location.href='index.php';</script>"; 
} 
?>

    <div class="loing_main">
    <div class="lg">
        <div style="height: 150px;"></div>
    <form name="Login" action="?act=adminlogin" method="post" onSubmit="return CheckForm();">
         <div style="margin: 0px auto; width: 410px; height: 140x; position: relative;">
        <img style="margin-bottom: 20px;" src="images/login_logo.png" height="81" width="408">        </div>
        <div style="margin: 0px auto; width: 700px; height: 395px; position: relative;">
                        <div class="login_box">
                <div class="login_need">
                    <p style="border-bottom: 1px solid rgb(230, 230, 230);"><label for="account">账号：</label><input style="color: rgb(0, 0, 0);" id="Username" name="Username" placeholder="请输入管理员帐号" _placeholder="请输入管理员帐号" type="text">
                    </p>
                    <p><label for="password">密码：</label><input style="color: rgb(187, 187, 187);" id="Password" name="Password" placeholder="请输入管理员密码" _placeholder="请输入管理员密码" type="password"></p>
                   
				  
				    <div class="cls">
					</div>
                </div>
                <div style="margin-top: 25px; position: relative; z-index: 999;" align="center">
                  <input type="submit" name="Submit" value="管理登录" class="login_btn_a">
                </div>
            </div>
            <div style="background-color: rgb(255, 255, 255); opacity: 0.8; height: 395px; position: absolute; top: 0px; left: 0px; width: 100%; z-index: 20;">
            </div>
        </div>
      </form>
        
   

      <div style="margin: 20px auto 0px; width: 700px; height: 80px; position: relative; text-align: center; color: rgb(109, 109, 109); font-size: 12px;">
        Copyright&copy;2016-2017 KVLT All Rights Reserved </div>
    </div>
        </div>

</body>
</html>
    </body>

</html>

