<?php
error_reporting(0);
session_start();
require("conn.php");
require("function.php");
require("moban.php");
require('lang_zh_cn.php');

////数据库连接
$conn = mysql_connect($db_host, $db_user,$db_pwd);
mysql_query ( 'SET NAMES utf8' ,$conn);
mysql_query ( "SET CHARACTER_SET_CLIENT='utf8'" ,$conn);
mysql_query ( "SET CHARACTER_SET_RESULTS='utf8'" ,$conn);
if(!$conn)
{
   die("数据库读取失败，请打开data中的conn.php修改数据库连接。");
}
mysql_select_db($db_name,$conn);

///系统初如化
$cf = get_site_config(1);
if($HTTP_X_FORWARDED_FOR!="")
$REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;
$tmp_ip=explode(",",$REMOTE_ADDR);
$REMOTE_ADDR=$tmp_ip[0];
function getRealIp(){
    $ip=false;
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
}
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
   	}
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
$real_ip=getRealIp();
$GLOBALS['tgs']['cur_ip']    = $real_ip;////因部分PHP服务器无法识别IP，新方法定义IP获取方式。
$GLOBALS['tgs']['cur_time']  = date($cf['time_format'],(time()+$cf['timezone']*3600));///用户当前时区的当前时间

require("lang_".$cf['site_lang'].".php");
?>