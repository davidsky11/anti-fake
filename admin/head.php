<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品防伪防串货管理系统</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>
</head>
<body style="background:url(images/topbg.gif) repeat-x;">
        
    <ul class="nav">
	
     <li><a href="welcom.html"  target="rightFrame" class="selected" ><img src="images/icon0.png"  />
    <h2>管理首页</h2>
    </a></li>
	
    <li><a href="admin.php?" target="rightFrame"><img src="images/icon01.png"/ >
    <h2>防伪码管理</h2>
    </a></li>
	
	<!-- li><a href="admin.php?act=add" target="rightFrame" ><img src="images/icon02.png" />
    <h2>新增防伪码</h2>
    </a></li -->

	 <!--<li><a href="agent.php?"  target="rightFrame"><img src="images/icon04.png"  />
    <h2>代理商管理</h2>
    </a></li>
	
	 <li><a href="agent.php?act=add"  target="rightFrame"> <img src="images/icon05.png"  />
    <h2>新增代理商</h2>
    </a></li>-->
	
    <li><a href="sys.php?act=config"  target="rightFrame"><img src="images/icon06.png"  >
    <h2>系统配置</h2>
    </a></li>
	
	 <li><a href="index.php?act=logout"  target="_parent"><img src="images/icon07.png"  >
      <h2>安全退出</h2>
    </a></li>
    </ul>
<div class="topright"></div>
	
<div class="clear"></div>

</body>
</html>
