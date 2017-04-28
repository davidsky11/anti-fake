-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 07 月 11 日 14:53
-- 服务器版本: 5.5.19
-- PHP 版本: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yun_fwdl`
--

-- --------------------------------------------------------

--
-- 表的结构 `tgs_admin`
--

CREATE TABLE IF NOT EXISTS `tgs_admin` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `logins` mediumint(8) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tgs_admin`
--

INSERT INTO `tgs_admin` (`id`, `username`, `password`, `logins`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245', 42);

-- --------------------------------------------------------

--
-- 表的结构 `tgs_agent`
--

CREATE TABLE IF NOT EXISTS `tgs_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agentid` varchar(50) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `quyu` varchar(100) DEFAULT NULL,
  `shuyu` varchar(100) DEFAULT NULL,
  `qudao` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `about` varchar(250) DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  `jietime` date DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `danwei` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `qq` varchar(100) DEFAULT NULL,
  `weixin` varchar(100) DEFAULT NULL,
  `wangwang` varchar(100) DEFAULT NULL,
  `paipai` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `dizhi` varchar(250) DEFAULT NULL,
  `beizhu` varchar(250) DEFAULT NULL,
  `hits` int(8) DEFAULT '0',
  `query_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tgs_agent`
--

INSERT INTO `tgs_agent` (`id`, `agentid`, `product`, `quyu`, `shuyu`, `qudao`, `url`, `about`, `addtime`, `jietime`, `name`, `tel`, `fax`, `phone`, `danwei`, `email`, `qq`, `weixin`, `wangwang`, `paipai`, `zip`, `dizhi`, `beizhu`, `hits`, `query_time`) VALUES
(1, 'WS001', '移动电源', '省代', '362200111000000', '全国总代', 'www.ew80.com', '专业销售本公司相关产品', '2016-01-01', '2019-03-06', '李易', '', '', '18170521585', '', '', '', 'ew80net', '', '李易', '', '', '易网软件 简单易用', 33, '2016-07-11 14:50:01');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_code`
--

CREATE TABLE IF NOT EXISTS `tgs_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bianhao` varchar(50) DEFAULT NULL,
  `riqi` varchar(30) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `zd1` varchar(250) DEFAULT NULL,
  `zd2` varchar(250) DEFAULT NULL,
  `tupian` varchar(200) NOT NULL,
  `jianjie` varchar(300) NOT NULL,
  `hits` int(8) DEFAULT '0',
  `query_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tgs_config`
--

CREATE TABLE IF NOT EXISTS `tgs_config` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `parentid` smallint(5) NOT NULL DEFAULT '1',
  `code` varchar(30) NOT NULL,
  `code_name` varchar(30) NOT NULL,
  `code_value` text,
  `store_range` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `tgs_config`
--

INSERT INTO `tgs_config` (`id`, `parentid`, `code`, `code_name`, `code_value`, `store_range`, `type`) VALUES
(1, 1, 'site_url', '系统网址', 'http://fwdl.ew80.com', '', 'text'),
(2, 1, 'site_name', '系统名称', '易网防伪防串货和代理授权查询系统', '', 'text'),
(3, 1, 'timezone', '', '0', '', 'text'),
(4, 1, 'time_format', '系统日期格式', 'Y-m-d H:i:s', '', 'text'),
(5, 1, 'site_lang', '系统语言', 'zh_cn', '', 'text'),
(6, 1, 'text_type', '', '1', '', 'text'),
(7, 1, 'site_themes', '防伪系统皮肤', 'default', '', 'text'),
(8, 1, 'agent_themes', '代理商系统皮肤', 'agent', '', 'text'),
(9, 1, 'yzm_status', '是否启用验证码', '1', '', 'checkbox'),
(10, 1, 'page_title', '', '', '', 'text'),
(11, 1, 'page_keywords', '系统关键词', '在此输入网页关键词', '', 'text'),
(12, 1, 'page_desc', '系统描述', '在此输入网页描述', '', 'text'),
(13, 1, 'site_close', '网站是否关闭', '', '', 'text'),
(14, 1, 'site_close_reason', '网站关闭原因', '', '', 'text'),
(15, 1, 'notices', '防伪查询说明', '测试防伪码：SN11672841117185<br>请依次输入您要查询的防伪码.<br>扫描上图中间二维码测试手机版<br>扫码上图右侧二维码，测试免输入查询效果。', '', 'text'),
(16, 1, 'notice_1', '防伪码首次查询', '<table width=&quot;600&quot; height=&quot;651&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/yes.png&quot; width=&quot;47&quot; height=&quot;47&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>恭喜，您购买的产品为本公司原装正品！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>该防伪码为第<span class=&quot;red&quot;>{{hits}}</span>次查询！ </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onclick=&quot;history.go(0)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;left&quot; valign=&quot;middle&quot;><div class=&quot;line&quot;></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;><img src=&quot;{{tupian}}&quot;  class=&quot;tupian&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;> <span class=&quot;fw_text&quot;>{{jianjie}}</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;19&quot; align=&quot;left&quot; valign=&quot;top&quot;> </td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;><span class=&quot;fw_h1&quot;>您查询的防伪码是：</span><span class=&quot;red&quot;>{{bianhao}}</span><br />\r\n     <span class=&quot;fw_h1&quot;>产品名称：</span><span class=&quot;fw_h2&quot;>{{product}}</span> <br />\r\n    <span class=&quot;fw_h1&quot;> 所属代理：</span><span class=&quot;fw_h2&quot;>{{zd1}}</span><br />\r\n    <span class=&quot;fw_h1&quot;>销售区域：</span><span class=&quot;fw_h2&quot;>{{zd2}} </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;19&quot; align=&quot;left&quot; valign=&quot;top&quot;> </td>\r\n  </tr>\r\n</table>', '', 'text'),
(17, 1, 'notice_2', '防伪码非首次查询', '<table width=&quot;600&quot; height=&quot;554&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/!.png&quot; width=&quot;47&quot; height=&quot;47&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>恭喜，您购买的产品为本公司原装正品！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>该防伪码已被查<span class=&quot;red&quot;>{{hits}}</span>次，如不是您本人操作请注意假冒！ </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onclick=&quot;history.go(0)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;left&quot; valign=&quot;middle&quot;><div class=&quot;line&quot;></div></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;><img src=&quot;{{tupian}}&quot;  class=&quot;tupian&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;><span class=&quot;fw_text&quot;>{{jianjie}}</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;19&quot; align=&quot;left&quot; valign=&quot;top&quot;> </td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;><span class=&quot;fw_h1&quot;>您查询的防伪码是：</span><span class=&quot;red&quot;>{{bianhao}}</span><br />\r\n        <span class=&quot;fw_h1&quot;>产品名称：</span><span class=&quot;fw_h2&quot;>{{product}}</span> <br />\r\n        <span class=&quot;fw_h1&quot;> 所属代理：</span><span class=&quot;fw_h2&quot;>{{zd1}}</span><br />\r\n        <span class=&quot;fw_h1&quot;>销售区域：</span><span class=&quot;fw_h2&quot;>{{zd2}} </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;19&quot; align=&quot;center&quot;> </td>\r\n  </tr>\r\n</table>', '', 'text'),
(18, 1, 'notice_3', '防伪码未找到', '<table width=&quot;600&quot; height=&quot;231&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/x.png&quot; width=&quot;47&quot; height=&quot;47&quot; ></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>对不起，没有找到您要查询的防伪码！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>您可能是盗版产品的受害者，如有疑问请致电我们</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;> <button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onClick=&quot;history.go(0)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n</table>', '', 'text'),
(19, 1, 'agents', '代理查询说明', '测试代理商编号：WS002  手机号：18170521585  QQ：270012912  微信号：ew80com <br>支持微信号/手机号/代理编号/QQ号等任意查询<br>查询界面可订制。', '', 'text'),
(20, 1, 'agent_1', '代理首次查询', '<table width=&quot;800&quot; height=&quot;362&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/yes.png&quot; width=&quot;47&quot; height=&quot;47&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>该代理商是本公司正规代理！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>该代理信息是第<span class=&quot;red&quot;>{{hits}}</span>次查询！ </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>在证书上点右键，选择图片另存为 可保存证书到本地 </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;left&quot; valign=&quot;middle&quot;>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;center&quot; valign=&quot;middle&quot;><img src=&quot;zs/myzs.php?keyword={{agentid}}&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onclick=&quot;history.go(-1)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;>&nbsp;</td>\r\n  </tr>\r\n</table>', '', 'text'),
(21, 1, 'agent_2', '代理查询非首次', '<table width=&quot;800&quot; height=&quot;362&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/yes.png&quot; width=&quot;47&quot; height=&quot;47&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>该代理商是本公司正规代理！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>该代理信息是第<span class=&quot;red&quot;>{{hits}}</span>次查询！ </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>在证书上点右键，选择图片另存为 可保存证书到本地 </span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;left&quot; valign=&quot;middle&quot;>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;43&quot; align=&quot;center&quot; valign=&quot;middle&quot;><img src=&quot;zs/myzs.php?keyword={{agentid}}&quot; /></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onclick=&quot;history.go(-1)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;left&quot; valign=&quot;top&quot;>&nbsp;</td>\r\n  </tr>\r\n</table>', '', 'text'),
(22, 1, 'agent_3', '代理未找到', '<table width=&quot;800&quot; height=&quot;231&quot; border=&quot;0&quot; align=&quot;center&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;>\r\n  <tr>\r\n    <td height=&quot;76&quot; align=&quot;center&quot;><img src=&quot;themes/default/images/x.png&quot; width=&quot;47&quot; height=&quot;47&quot; ></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;><span class=&quot;fw_ts&quot;>对不起，没有找到相关的代理商信息！</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;45&quot; align=&quot;center&quot;><span class=&quot;fw_ts2&quot;>如有疑问，请与我们联系</span></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=&quot;55&quot; align=&quot;center&quot;> <button type=&quot;submit&quot; class=&quot;fw_btn btn-primary&quot; onClick=&quot;history.go(-1)&quot;>点击重新查询</button></td>\r\n  </tr>\r\n</table>', '', 'text'),
(23, 1, 'list_num', '分页数', '100', '', 'text');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_hisagent`
--

CREATE TABLE IF NOT EXISTS `tgs_hisagent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) DEFAULT NULL,
  `addtime` datetime DEFAULT '0000-00-00 00:00:00',
  `addip` varchar(40) DEFAULT NULL,
  `results` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- 转存表中的数据 `tgs_hisagent`
--

INSERT INTO `tgs_hisagent` (`id`, `keyword`, `addtime`, `addip`, `results`) VALUES
(1, 'ws001', '2016-07-10 16:51:39', '127.0.0.2', '电脑查询  [假]没有找到该代理信息'),
(2, 'ws001', '2016-07-10 18:45:10', '127.0.0.2', '电脑查询  [真]第一次查询'),
(3, 'ws002', '2016-07-10 18:48:19', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(4, 'ws001', '2016-07-10 18:55:10', '127.0.0.2', '电脑查询  [真] 非第一次查询'),
(5, 'aaaa', '2016-07-10 18:55:55', '127.0.0.2', '电脑查询  [假]没有找到该代理信息'),
(6, '李易', '2016-07-10 18:56:24', '127.0.0.2', '移动端 [假] 没有找到该代理信息'),
(7, 'ws001', '2016-07-10 18:56:57', '127.0.0.2', '移动端 [真] 非第一次查询'),
(8, '李易', '2016-07-10 18:57:05', '127.0.0.2', '移动端 [假] 没有找到该代理信息'),
(9, '李易', '2016-07-10 18:57:17', '127.0.0.2', '移动端 [假] 没有找到该代理信息'),
(10, 'WS001', '2016-07-11 09:04:17', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(11, 'ws002', '2016-07-11 09:04:30', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(12, 'WS001', '2016-07-11 09:04:36', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(13, 'ws004', '2016-07-11 09:19:29', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(14, 'ws004', '2016-07-11 09:19:31', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(15, 'WS001', '2016-07-11 09:19:47', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(16, 'WS001', '2016-07-11 09:20:58', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(17, 'ws002', '2016-07-11 09:21:02', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(18, 'ws002', '2016-07-11 09:21:04', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(19, 'ws002', '2016-07-11 09:21:07', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(20, 'ws002', '2016-07-11 09:23:25', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(21, 'ws002', '2016-07-11 09:23:36', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(22, 'ws002', '2016-07-11 09:23:54', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(23, 'ws002', '2016-07-11 09:24:16', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(24, 'WS001', '2016-07-11 09:28:10', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(25, 'WS001', '2016-07-11 09:29:03', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(26, 'WS001', '2016-07-11 09:30:02', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(27, 'WS001', '2016-07-11 09:32:32', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(28, 'WS001', '2016-07-11 09:32:59', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(29, 'WS001', '2016-07-11 09:41:47', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(30, 'WS001', '2016-07-11 10:59:29', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(31, 'WS001', '2016-07-11 11:00:20', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(32, 'ws001', '2016-07-11 12:19:41', '127.0.0.2', '移动端 [真] 非第一次查询'),
(33, 'ws003', '2016-07-11 12:19:56', '127.0.0.2', '移动端 [假] 没有找到该代理信息'),
(34, 'ws001', '2016-07-11 12:20:15', '127.0.0.2', '移动端 [真] 非第一次查询'),
(35, 'ws001', '2016-07-11 12:22:45', '127.0.0.2', '移动端 [真] 非第一次查询'),
(36, 'ws001', '2016-07-11 12:22:57', '127.0.0.2', '移动端 [真] 非第一次查询'),
(37, 'ws001', '2016-07-11 12:23:22', '127.0.0.2', '移动端 [真] 非第一次查询'),
(38, 'WS001', '2016-07-11 12:23:42', '127.0.0.2', '移动端 [真] 非第一次查询'),
(39, 'WS001', '2016-07-11 12:28:16', '127.0.0.2', '移动端 [真] 非第一次查询'),
(40, 'WS001', '2016-07-11 12:37:38', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(41, 'WS001', '2016-07-11 12:38:08', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(42, 'WS001', '2016-07-11 12:38:11', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(43, '', '2016-07-11 12:39:21', '127.0.0.2', '扫码查询 [假] 找不到代理信息'),
(44, '李易', '2016-07-11 12:42:03', '127.0.0.2', '移动端 [假] 没有找到该代理信息'),
(45, 'WS001', '2016-07-11 12:42:03', '127.0.0.2', '扫码查询 [真] 非第一次查询'),
(46, '李易', '2016-07-11 12:44:24', '127.0.0.2', '电脑查询  [真] 非第一次查询'),
(47, 'wwww', '2016-07-11 12:47:55', '127.0.0.2', '电脑查询  [假]没有找到该代理信息'),
(48, 'ssss', '2016-07-11 12:48:40', '127.0.0.2', '电脑查询  [假]没有找到该代理信息'),
(49, '', '2016-07-11 12:48:40', '127.0.0.2', '移动端查询 [假] 找不到代理信息'),
(50, '', '2016-07-11 14:06:09', '127.0.0.2', '移动端查询 [假] 找不到代理信息'),
(51, '', '2016-07-11 14:06:20', '127.0.0.2', '移动端查询 [假] 找不到代理信息'),
(52, '', '2016-07-11 14:07:18', '127.0.0.2', '移动端查询 [假] 找不到代理信息'),
(53, '', '2016-07-11 14:07:35', '127.0.0.2', '移动端查询 [假] 找不到代理信息'),
(54, '', '2016-07-11 14:07:57', '127.0.0.2', '移动端查询 [假] 找不到代理信息'),
(55, '', '2016-07-11 14:14:40', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(56, '', '2016-07-11 14:15:54', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(57, '', '2016-07-11 14:16:55', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(58, '', '2016-07-11 14:17:44', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(59, '', '2016-07-11 14:18:11', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(60, '', '2016-07-11 14:18:57', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(61, '', '2016-07-11 14:19:37', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(62, '', '2016-07-11 14:20:39', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(63, '', '2016-07-11 14:32:34', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(64, '', '2016-07-11 14:33:03', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(65, '', '2016-07-11 14:33:13', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(66, '', '2016-07-11 14:33:44', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(67, '', '2016-07-11 14:35:08', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(68, '', '2016-07-11 14:35:12', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(69, '', '2016-07-11 14:37:55', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(70, '', '2016-07-11 14:37:58', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(71, '', '2016-07-11 14:39:30', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(72, '', '2016-07-11 14:39:45', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(73, '苛', '2016-07-11 14:39:45', '127.0.0.2', '电脑查询  [假]没有找到该代理信息'),
(74, '', '2016-07-11 14:41:27', '127.0.0.2', '电脑端查询 [假] 找不到代理信息'),
(75, 'WS001', '2016-07-11 14:41:42', '127.0.0.2', '电脑端查询 [真] 非第一次查询'),
(76, 'WS001', '2016-07-11 14:47:19', '127.0.0.2', '电脑端查询 [真] 非第一次查询'),
(77, 'WS001', '2016-07-11 14:47:25', '127.0.0.2', '移动端查询 [真] 非第一次查询'),
(78, 'WS001', '2016-07-11 14:47:28', '127.0.0.2', '电脑端查询 [真] 非第一次查询'),
(79, 'WS001', '2016-07-11 14:48:33', '127.0.0.2', '电脑端查询 [真] 非第一次查询'),
(80, 'WS001', '2016-07-11 14:49:12', '127.0.0.2', '电脑端查询 [真] 非第一次查询'),
(81, 'WS001', '2016-07-11 14:50:01', '127.0.0.2', '电脑端查询 [真] 非第一次查询');

-- --------------------------------------------------------

--
-- 表的结构 `tgs_history`
--

CREATE TABLE IF NOT EXISTS `tgs_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) DEFAULT NULL,
  `addtime` datetime DEFAULT '0000-00-00 00:00:00',
  `addip` varchar(40) DEFAULT NULL,
  `results` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tgs_history`
--

INSERT INTO `tgs_history` (`id`, `keyword`, `addtime`, `addip`, `results`) VALUES
(1, 'SN7928344560', '2016-07-11 14:08:25', '127.0.0.2', '电脑查询[假]没有找到该防伪码');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
