<!doctype html>
<html lang="zh-cn">
<head>

    <meta charset="utf-8">

    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">

    <meta name="apple-mobile-web-app-capable" content="yes" />
	 <meta name="keywords" content="<?php echo $cf['page_keywords']?>" />
      <meta name="description" content="<?php echo $cf['page_desc']?>" />

    <title><?php echo $cf['site_name']?></title>

    <!--[if lt IE 9]>

    <script src="/Theme/js/html5.js"></script>

    <![endif]-->
    <link href="themes/agent/wapskin/css/base.css" rel="stylesheet" />

    <link href="themes/agent/wapskin/css/common.css" rel="stylesheet" />

    

</head>

<body class="Security">
    <div class="content">
        <div class="catecom">
		<div  id="result_agent">
            <div class="imgbox"><img src="themes/agent/wapskin/images/logo.png" alt="" /></div>
			
            <div class="m20_t">
              <form method="get" action="wapzslist.php?" >
			   <input name="keyword" id="keyword" class="input-46 input-block" type="text" placeholder="微信号/手机号/代理编号/QQ号">
				<? if($cf['yzm_status']==1){?>
                 <input  type="yzm" class="input-46 input-block2 " id='yzm' name="yzm"   placeholder="请输入验证码！">
				 <div class="yzm"> <img src="data/code.php" alt="验证码" title="点击刷新" class="code" onClick="window.location.reload()"/>&nbsp;</div> <? }?>
				  <button type="submit" class="btn btn-orange btn-46 btn-block m20_t" onClick="return GetQuery();">点击查询</button>
                   <INPUT value='' type='hidden' name='search' id='search'>
                   <INPUT value="<?=$cf['yzm_status']?>" type="hidden" name="yzm_status" id="yzm_status">
			</form>
             </div>
<div class="connect"> <?php echo $result_str;?> </div>
</div>
	</div>
</div>
<br />
		<div class="foot">
		 <span class="copyright">代理商授权查询系统 copyright © 2016 <a href="http://www.ew80.com" target="_blank">易网软件</a>版权所有<br>易网软件 简单易用  轻松管理您的代理商授权信息</span>		</div>
        <!-- Javascript --><br />
        <SCRIPT type="text/javascript" src="data/js/wapagent.js"></SCRIPT>

</body>


</html>

