<html>
<!DOCTYPE html>
<html lang="en" class="no-js">
 <head>

        <meta charset="utf-8">
      <title><?php echo $cf['site_name']?></title>
      <meta name="keywords" content="<?php echo $cf['page_keywords']?>" />
      <meta name="description" content="<?php echo $cf['page_desc']?>" />
        <!-- CSS -->
        <link rel="stylesheet" href="themes/agent/skin/css/reset.css">
        <link rel="stylesheet" href="themes/agent/skin/css/supersized.css">
        <link rel="stylesheet" href="themes/agent/skin/css/style.css">

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
location.href = 'wapagent.php';
break; } } 
</script>		
        </head>

    <body>

        <div class="page-container">
		
            <h1>代理商授权查询系统</h1>
			<form method="get" action="zslist.php?" >
			 <input name="keyword" id="keyword" class="username" type="text" placeholder="微信号/手机号/代理编号/QQ号">
				<?php if($cf['yzm_status']==1){?>
                 <input  type="yzm" class="Captcha" id='yzm' name="yzm"  placeholder="请输入验证码！">
				 <div class="yzm"> <img src="data/code.php" alt="验证码" title="点击刷新" class="code" onClick="window.location.reload()"/>&nbsp;</div> <? }?>
				  <button type="submit" class="submit_button" onClick="return GetQuery();">点击查询</button>
                   <INPUT value='' type='hidden' name='search' id='search'>
                   <INPUT value="<?php echo $cf['yzm_status']?>" type="hidden" name="yzm_status" id="yzm_status">
				   </form>
            <div class="connect"><?php echo $result_str;?> </div>
			
        </div>
		
		<br />
		<div class="foot">
		 <span class="copyright">代理商授权查询系统 copyright © 2016 <a href="http://www.ew80.com" target="_blank">易网软件</a>版权所有<br>易网软件 简单易用  轻松管理您的代理商授权信息</span>		</div>
        <!-- Javascript --><br />
        <SCRIPT type="text/javascript" src="data/js/agent.js"></SCRIPT>
        <script src="themes/agent/skin/js/jquery-1.8.2.min.js" ></script>
        <script src="themes/agent/skin/js/supersized.3.2.7.min.js" ></script>
        <script src="themes/agent/skin/js/supersized-init.js" ></script>
        <script src="themes/agent/skin/js/scripts.js" ></script>

    </body>

</html>

