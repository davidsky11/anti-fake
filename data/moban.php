<?php
//手机版防伪查询显示
//首次查询
$notices1 = '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#50B018" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-check-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">您购买的产品为原装正品！</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该防伪码是第<span class="hits">{{hits}}</span>次查询！ </span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="100" align="center" valign="middle" bgcolor="#FFFFFF"><button type="submit" class="fw_btn" onclick="history.go(0)">点击重新查询</button></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="{{tupian}}" width="100%" height="100%"  class="tupian" /></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_text">{{jianjie}}</span></td>
    </tr>
    <tr>
      <td height="19" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_h1">您查询的防伪码是：</span><span class="red">{{bianhao}}</span><br />
     <span class="fw_h1">产品名称：</span><span class="fw_h2">{{product}}</span> <br />
    <span class="fw_h1"> 所属代理：</span><span class="fw_h2">{{zd1}}</span><br />
    <span class="fw_h1">销售区域：</span><span class="fw_h2">{{zd2}} </span></td>
    </tr>
  </table>';
  
  
//非第一次查询显示的结果
$notices2 =  '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#00ABE3" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-exclamation-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">您购买的产品为原装正品！</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该防伪码是第<span class="hits">{{hits}}</span>次查询！<br />如不是您本人操作,请注意假冒！  </span></td>
    </tr>
  
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="100" align="center" valign="middle" bgcolor="#FFFFFF"><button type="submit" class="fw_btn" onclick="history.go(0)">点击重新查询</button></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="{{tupian}}" width="100%" height="100%"  class="tupian" /></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_text">{{jianjie}}</span></td>
    </tr>
    <tr>
      <td height="19" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_h1">您查询的防伪码是：</span><span class="red">{{bianhao}}</span><br />
     <span class="fw_h1">产品名称：</span><span class="fw_h2">{{product}}</span> <br />
    <span class="fw_h1"> 所属代理：</span><span class="fw_h2">{{zd1}}</span><br />
    <span class="fw_h1">销售区域：</span><span class="fw_h2">{{zd2}} </span></td>
    </tr>
  </table>';

//未查询前显示的提示信息
$notices3 = ' <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E74C3C" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-times-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">无此防伪码！</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">您可能是盗版产品的受害者!</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="100" align="center" valign="middle" bgcolor="#FFFFFF"><button type="submit" class="fw_btn" onclick="history.go(0)">点击重新查询</button></td>
    </tr>
  </table>';
  
  
  //
  //扫码查询结果样式
  //2016-7月修改，为了让扫码查询结果更形像，将手机版和扫码版分开定义。
  
//首次查询
$qlist1 = '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#50B018" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-check-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">您购买的产品为原装正品！</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该防伪码是第<span class="hits">{{hits}}</span>次查询！ </span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
 
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="{{tupian}}" width="100%" height="100%"  class="tupian" /></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_text">{{jianjie}}</span></td>
    </tr>
    <tr>
      <td height="19" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_h1">您查询的防伪码是：</span><span class="red">{{bianhao}}</span><br />
     <span class="fw_h1">产品名称：</span><span class="fw_h2">{{product}}</span> <br />
    <span class="fw_h1"> 所属代理：</span><span class="fw_h2">{{zd1}}</span><br />
    <span class="fw_h1">销售区域：</span><span class="fw_h2">{{zd2}} </span></td>
    </tr>
  </table>';
  
  
//非第一次查询显示的结果
$qlist2 =  '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#00ABE3" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-exclamation-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">您购买的产品为原装正品！</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该防伪码是第<span class="hits">{{hits}}</span>次查询！<br />如不是您本人操作,请注意假冒！  </span></td>
    </tr>
  
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
   
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="{{tupian}}" width="100%" height="100%"  class="tupian" /></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_text">{{jianjie}}</span></td>
    </tr>
    <tr>
      <td height="19" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" align="left" valign="top"><span class="fw_h1">您查询的防伪码是：</span><span class="red">{{bianhao}}</span><br />
     <span class="fw_h1">产品名称：</span><span class="fw_h2">{{product}}</span> <br />
    <span class="fw_h1"> 所属代理：</span><span class="fw_h2">{{zd1}}</span><br />
    <span class="fw_h1">销售区域：</span><span class="fw_h2">{{zd2}} </span></td>
    </tr>
  </table>';

//未查询前显示的提示信息
$qlist3 = ' <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E74C3C" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-times-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">无此防伪码！</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">您可能是盗版产品的受害者!</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
   
  </table>';


//
//在这里修改代理商查询的显示效果
//代理查询结果显示
//
//

 //手机版代理商查询显示
  $agent1 = '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#50B018" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-check-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">该代理是本公司正规授权</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该代理是第<span class="hits">{{hits}}</span>次查询！ </span></td>
    </tr>
	 <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">长按下面的授权证书，即可保存证书图片 </span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="zs/wapzs.php?keyword={{agentid}}"  width="100%"></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top"></td>
    </tr>
  </table>';
//非第一次查询显示的结果
$agent2 =  '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#00ABE3" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-check-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">该代理已经本公司正规授权</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该代理是第<span class="hits">{{hits}}</span>次查询！ </span></td>
    </tr>
	 <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">长按下面的授权证书，即可保存证书图片 </span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="zs/wapzs.php?keyword={{agentid}}"  width="100%"></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top"></td>
    </tr>
  </table>
 ';

//未查询前显示的提示信息
$agent3 = '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E74C3C" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-times-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">对不起，没有找到相关的代理信息</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">如有疑问请与我们联系</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
';

  
  //扫码版代理商查询显示
  $qagent1 = '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#50B018" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-check-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">该代理是本公司正规授权</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该代理是第<span class="hits">{{hits}}</span>次查询！ </span></td>
    </tr>
	 <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">长按下面的授权证书，即可保存证书图片 </span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="zs/wapzs.php?keyword={{agentid}}"  width="100%"></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top"></td>
    </tr>
  </table>';
//非第一次查询显示的结果
$qagent2 =  '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#00ABE3" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-check-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">该代理已经本公司正规授权</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">该代理是第<span class="hits">{{hits}}</span>次查询！ </span></td>
    </tr>
	 <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">长按下面的授权证书，即可保存证书图片 </span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fw_table">
    <tr>
      <td height="5" align="center" valign="middle"><div class="line"></div></td>
    </tr>
    <tr>
      <td height="123" align="center" valign="middle"><img src="zs/wapzs.php?keyword={{agentid}}"  width="100%"></td>
    </tr>

    <tr>
      <td height="19" align="center" valign="top"></td>
    </tr>
  </table>
 ';

//未查询前显示的提示信息
$qagent3 = '<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E74C3C" class="fw_table">
    <tr>
      <td height="123" align="center" valign="middle"><span class="fw_ts"><i class="fa fa-times-circle fa-5x "></i></span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts">对不起，没有找到相关的代理信息</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top"><span class="fw_ts2">如有疑问请与我们联系</span></td>
    </tr>
    <tr>
      <td height="35" align="center" valign="top">&nbsp;</td>
    </tr>
</table>
';
?>