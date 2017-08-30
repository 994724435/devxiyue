/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : devxiyue

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-30 22:09:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `p_article`
-- ----------------------------
DROP TABLE IF EXISTS `p_article`;
CREATE TABLE `p_article` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `type` int(11) DEFAULT '1' COMMENT '1首页 2公告 3值班团队 4分析专家 5公司简介',
  `cont` text,
  `addtime` varchar(128) DEFAULT NULL,
  `addymd` varchar(128) DEFAULT NULL,
  `admin` varchar(64) DEFAULT NULL,
  `num` int(11) DEFAULT '1',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_article
-- ----------------------------
INSERT INTO `p_article` VALUES ('1', '曼雷弗风控基金', '1', '<p class=\"MsoNormal\" align=\"right\" style=\"text-indent:12.0500pt;text-align:right;\">\r\n	<b>&nbsp;صنإندوق إدارة المخاطر (الدولي) مانويل </b><b><span>【</span>MIF<span>】</span></b><b>هو صندوق التحكم في مخاطر تداول الأسهم في العالم (هو مسمى </b><b>MIF</b><b>&nbsp;في التالي)، وإن الحكومة الجزائرية وصندوق الصخرة الألماني وجمعية </b><b>JRT</b><b>&nbsp;المالية الهولندية وأسرة </b><b>R</b><b>·</b><b>BY</b><b>&nbsp;</b><b>السويد، أسرة الكليفلاند الأمريكية هم إستثمرو أربعة مليارات وثمانمائة مليون دولارا لبناء هذا الصندوق.</b><b></b> \r\n</p>\r\n<br />', '2017-08-16 09:20:25', '2017-08-16', 'admin', '1');
INSERT INTO `p_article` VALUES ('2', '公司简介标题', '2', '<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n	<b><span style=\"font-size:24px;color:#9933E5;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;kkkk</strong></span></b>\r\n</p>', '2017-08-16 11:42:33', '2017-08-16', 'admin', '1');
INSERT INTO `p_article` VALUES ('5', '值班团队标题', '3', '值班的团队', '2017-08-16 09:51:46', '2017-08-16', 'admin', '1');
INSERT INTO `p_article` VALUES ('6', '分析专家李云龙标题', '4', '分析啊啊', '2017-08-16 09:52:56', '2017-08-16', 'admin', '1');
INSERT INTO `p_article` VALUES ('7', '公司简介', '5', '<table class=\"table\" style=\"width:1272px;color:#333333;font-family:Roboto, sans-serif;font-size:16px;\">\r\n	<tbody>\r\n		<tr class=\"info\">\r\n			<th style=\"text-align:left;vertical-align:top;font-size:0.85em;color:#999999;background-color:#D9EDF7;\">\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span><span style=\"font-size:24px;color:#9933E5;\"><span>&nbsp; 曼雷弗（国际）风控基金【</span></span><span style=\"font-size:24px;color:#9933E5;\"><span>MIF</span></span><span style=\"font-size:24px;color:#9933E5;\"><span>】</span></span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span>صندوق إدارة المخاطر (الدولي) مانويل</span><span>المقدمة الموجزة</span>\r\n				</p>\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">曼雷弗（国际）风控基金简称【</span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">】是由阿尔及利亚政府及德国磐石基金、荷兰</span><span style=\"font-size:18px;\">JRT</span><span style=\"font-size:18px;\">财团、瑞典</span><span style=\"font-size:18px;\">R</span></span><span><span style=\"font-size:18px;\">·</span></span><span><span style=\"font-size:18px;\">BY</span><span style=\"font-size:18px;\">家族、美国克利夫兰家族共同出资</span><span style=\"font-size:18px;\">48</span><span style=\"font-size:18px;\">亿美元所组成的全球股权交易风控基金（下称</span></span><span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">）</span></span><span><span style=\"font-size:18px;\">。</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-indent:2em;text-align:right;\">\r\n					<span><span style=\"font-size:18px;\">إن صندوق إدارة المخاطر (الدولي) مانويل&nbsp;</span></span><span><span style=\"font-size:18px;\">【</span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">】</span></span><span><span style=\"font-size:18px;\">هو صندوق التحكم في مخاطر تداول الأسهم في العالم (هو مسمى&nbsp;</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">&nbsp;في التالي)، وإن الحكومة الجزائرية وصندوق الصخرة الألماني وجمعية&nbsp;</span></span><span><span style=\"font-size:18px;\">JRT</span></span><span><span style=\"font-size:18px;\">&nbsp;المالية الهولندية وأسرة</span></span><span><span style=\"font-size:18px;\">R</span></span><span><span style=\"font-size:18px;\">·</span></span><span><span style=\"font-size:18px;\">BY</span></span><span><span style=\"font-size:18px;\">&nbsp;</span></span><span><span style=\"font-size:18px;\">السويد، أسرة الكليفلاند الأمريكية هم إستثمرو أربعة مليارات وثمانمائة مليون دولارا لبناء هذا الصندوق.</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-indent:2em;text-align:right;\">\r\n					<span><span style=\"font-size:18px;\">&nbsp;</span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">成立于</span><span style=\"font-size:18px;\">2014</span><span style=\"font-size:18px;\">年</span><span style=\"font-size:18px;\">9</span><span style=\"font-size:18px;\">月，总部位于阿尔及利亚比斯克拉省首府比斯克拉苏埃尔大街</span><span style=\"font-size:18px;\">1698</span><span style=\"font-size:18px;\">号。</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-indent:2em;text-align:right;\">\r\n					<span><span style=\"font-size:18px;\">إن تأسُس&nbsp;</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">&nbsp;في سبتمبر في عام 2014، ومركزه الرئيسي وقع في رقم 1698 من شارع سيويل من حاضرة محافظة بسكرة&nbsp;</span></span><span><span style=\"font-size:18px;\">–</span></span><span><span style=\"font-size:18px;\">&nbsp;الجزائر.</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">目前拥有阿尔及利亚比斯克拉省油田储量</span><span style=\"font-size:18px;\">3864</span><span style=\"font-size:18px;\">万桶，高储量精选钻石矿</span><span style=\"font-size:18px;\">3</span><span style=\"font-size:18px;\">座。主要业务涵盖</span></span><span><span style=\"font-size:18px;\">全球股权交易风控、石油开发、钻石开采、酒店管理、体育博彩等二十几类业务。</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-align:right;text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">يملك&nbsp;</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">&nbsp;ثمانية وثلاثين مليون و ستمائة وأربعين ألف برميلا من النفط من احتياطي النفط في محافظة بسكرة&nbsp;</span></span><span><span style=\"font-size:18px;\">–</span></span><span><span style=\"font-size:18px;\">&nbsp;الجزائر، وثلاثة مناجم الماس المميز الآن ولهم احتياطي الماس الكبير . تضمنت الأعمال الرئيسية الأكثر من عشرين العمل مثل التحكم في مخاطر تداول الأسهم في العالم، واستخراج النفط واستخراج الماس وإدارة الفنادق، الرهان الرياضي وإلخ.</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">独创的</span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">数据网络区域链</span></span><span><span style=\"font-size:18px;\">MIF(Memory Initialization File)</span><span style=\"font-size:18px;\">文件是</span></span><span><span style=\"font-size:18px;\">MapInfo</span></span><span><span style=\"font-size:18px;\">通用数据交换格式，这种格式是</span><span style=\"font-size:18px;\">ASCⅡ</span><span style=\"font-size:18px;\">码，可以编辑，容易生成，且可以工作在支持</span><span style=\"font-size:18px;\">MapInfo</span><span style=\"font-size:18px;\">的所有平台上</span></span><span><span style=\"font-size:18px;\">。</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-indent:2em;text-align:right;\">\r\n					<span><span style=\"font-size:18px;\">إن سلسلة&nbsp;</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">&nbsp;بيانات الشبكة المحلية التي هي مبتكرة من&nbsp;</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">، وثيقة</span></span><span><span style=\"font-size:18px;\">&nbsp;</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">&nbsp;(ملف تهيئة الذاكرة) هي تهيئة</span></span><span><span style=\"font-size:18px;\">MapInfo</span></span><span><span style=\"font-size:18px;\">&nbsp;لتبادل البيانات المشتركة، وهذه التهيئة هي</span></span><span><span style=\"font-size:18px;\">ASC</span></span><span><span style=\"font-size:18px;\">Ⅱ</span></span><span><span style=\"font-size:18px;\">، فممكن أن تحررها ومن السهل توليدها، وبالإضافة إلى ذلك، ممكن أنها مستخدمة في أي سطوح التدعيم</span></span><span><span style=\"font-size:18px;\">MapInfo</span></span><span><span style=\"font-size:18px;\">.</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">通过</span></span><span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">旗下各大财团高级理财风控专家团队每天精准分析，遴选出全球</span><span style=\"font-size:18px;\">34</span><span style=\"font-size:18px;\">个国家股权交易市场绩优股权进行操作交易，实现基金投资客财富增值，进一步提升风控基金的稳健运营，降低交易风险！</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-align:right;text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">اختيار الأسهم ذات الجودة العالية من سوق الأسهم من 34 دولة في جميع أنحاء العالم لتداول الأسهم وفقا للتحليل الدقيق اليومي من فريق كبار الخبراء من الجمعيات المالية ل</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">&nbsp;لمراقبة المخاطر المالية، الأمر الذي يؤدي إلى المستثمرين يزيدون الثروة، ويقوي إجراء العملية السلمية للحد من مخاطر الصندوق، ويقلل مخاطر الصفقة!</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" style=\"text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">2017</span><span style=\"font-size:18px;\">年</span><span style=\"font-size:18px;\">6</span><span style=\"font-size:18px;\">月，</span><span style=\"font-size:18px;\">MIF</span><span style=\"font-size:18px;\">正式启动中华区（含中国、东南亚、朝鲜半岛、日本、印度等）交易市场。并委托位于中国（四川）自由贸易实验区成都高新区吉泰五路</span><span style=\"font-size:18px;\">88</span><span style=\"font-size:18px;\">号</span><span style=\"font-size:18px;\">3</span><span style=\"font-size:18px;\">栋</span><span style=\"font-size:18px;\">9</span><span style=\"font-size:18px;\">层</span><span style=\"font-size:18px;\">5</span><span style=\"font-size:18px;\">号的成都曼雷弗网络科技有限公司负责中华区网络维护、市场巡查、会员管理、基金定投发放等相关业务。</span></span><span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-align:right;text-indent:2em;\">\r\n					<span><span style=\"font-size:18px;\">يونيو في عام 2017، فتح&nbsp;</span></span><span><span style=\"font-size:18px;\">MIF</span></span><span><span style=\"font-size:18px;\">&nbsp;السوف في منطقة آسيا(من ضمنها الصين وجنوب سرق آسي وشبه الجزيرة الكورية واليابان والهند وإلخ). ثم أسند شركة مانويل الشبكة والتكنولوجيا المحدودة بتشنغدو التي موقعها في الغرفة 5 الطابق 9 العمارة 3 رقم 88 من شارع جي تاي الخامس&nbsp;</span></span><span><span style=\"font-size:18px;\">–</span></span><span><span style=\"font-size:18px;\">الحي العالي والجديد بتشنغدو&nbsp;</span></span><span><span style=\"font-size:18px;\">–</span></span><span><span style=\"font-size:18px;\">&nbsp;منطقة التجارة الحرة التجريبية&nbsp;</span></span><span><span style=\"font-size:18px;\">–</span></span><span><span style=\"font-size:18px;\">&nbsp;(سيتشوان) الصين لمسؤولة عن صيانة الشبكة في منطقة آسيا، وتفتيش السوق وإدارة الأعضاء وقرارات إستخدام الموارد المالية والأعمال الأخرى المتعلقة.</span></span>\r\n				</p>\r\n				<p class=\"MsoNormal\" align=\"right\" style=\"text-align:right;text-indent:2em;\">\r\n					<span><span style=\"font-size:24px;\">曼雷弗（国际）风控基金：</span></span><span><span style=\"font-size:24px;\">您身边的财富增值天使，期待与</span></span><span><span style=\"font-size:24px;\">您扬帆起航</span><span style=\"font-size:24px;\">!!!</span></span><span><span style=\"font-size:24px;\">&nbsp;&nbsp;</span>&nbsp; &nbsp; &nbsp;&nbsp;</span>\r\n				</p>\r\n				<div>\r\n					<span><br />\r\n</span>\r\n				</div>\r\n			</th>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2017-08-16 09:55:01', '2017-08-16', 'admin', '1');

-- ----------------------------
-- Table structure for `p_config`
-- ----------------------------
DROP TABLE IF EXISTS `p_config`;
CREATE TABLE `p_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL,
  `complan` varchar(255) DEFAULT NULL COMMENT '注释说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_config
-- ----------------------------
INSERT INTO `p_config` VALUES ('1', 'MIF价格', '50', 'MIF价格');
INSERT INTO `p_config` VALUES ('2', 'MIF静态收益', '0.3', 'MIF静态收益');
INSERT INTO `p_config` VALUES ('3', '推荐奖 1代', '0.05', '推荐奖 ');
INSERT INTO `p_config` VALUES ('4', '推荐奖 2代', '0.04', null);
INSERT INTO `p_config` VALUES ('5', '推荐奖 3代', '0.03', null);
INSERT INTO `p_config` VALUES ('6', '推荐奖 4代', '0.02', null);
INSERT INTO `p_config` VALUES ('7', '推荐奖 5代', '0.01', null);
INSERT INTO `p_config` VALUES ('8', '推荐奖 6代', '0.01', null);
INSERT INTO `p_config` VALUES ('9', '回馈奖1代', '0.025', null);
INSERT INTO `p_config` VALUES ('10', '回馈奖2代', '0.02', null);
INSERT INTO `p_config` VALUES ('11', '回馈奖3代', '0.015', null);
INSERT INTO `p_config` VALUES ('12', '回馈奖4代', '0.01', null);
INSERT INTO `p_config` VALUES ('13', '回馈奖5代', '0.01', null);
INSERT INTO `p_config` VALUES ('14', '回馈奖6代', '0.01', null);
INSERT INTO `p_config` VALUES ('15', '最低提现金额', '10', '最大提现金额');
INSERT INTO `p_config` VALUES ('16', '每日最大提现次数', '50', '每日最大提现次数');
INSERT INTO `p_config` VALUES ('17', '公排价格', '70', '公排价格');
INSERT INTO `p_config` VALUES ('18', '静态提现手续费', '0.00', '静态提现手续费');
INSERT INTO `p_config` VALUES ('19', '动态提现手续费', '0.1', '动态提现手续费');

-- ----------------------------
-- Table structure for `p_incomelog`
-- ----------------------------
DROP TABLE IF EXISTS `p_incomelog`;
CREATE TABLE `p_incomelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT '1' COMMENT '1收益 2充值 3提现 4钱包互转  5 注册下级 6下单购买  8转账 ',
  `state` int(11) DEFAULT '1' COMMENT '1收入   2支出 3失败',
  `reson` varchar(255) DEFAULT NULL COMMENT '原因',
  `addymd` date DEFAULT NULL,
  `addtime` int(12) DEFAULT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `income` varchar(64) DEFAULT '0' COMMENT '金额',
  `cont` varchar(1000) NOT NULL COMMENT '后台备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=475 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_incomelog
-- ----------------------------
INSERT INTO `p_incomelog` VALUES ('465', '5', '2', '注册下级', '2017-08-29', '1504013311', '24', '1', '800', '');
INSERT INTO `p_incomelog` VALUES ('466', '6', '2', '注册下级', '2017-08-29', '1504016159', '0', '1', '500', '');
INSERT INTO `p_incomelog` VALUES ('467', '8', '0', '转账交易', '2017-08-30', '1504098752', null, '1', '', '');
INSERT INTO `p_incomelog` VALUES ('468', '8', '0', '转账交易', '2017-08-30', '1504098896', '2', '1', '1', 'asdad');
INSERT INTO `p_incomelog` VALUES ('469', '4', '1', '货品兑换喜悦币', '2017-08-30', '1504100782', '1639', '1', '10', '');
INSERT INTO `p_incomelog` VALUES ('470', '4', '1', '货品兑换喜悦币', '2017-08-30', '1504100968', '1646', '1', '10', '');
INSERT INTO `p_incomelog` VALUES ('471', '4', '1', '喜悦币兑换货品', '2017-08-30', '1504101305', '10', '1', '10', '');
INSERT INTO `p_incomelog` VALUES ('472', '4', '1', '货品兑换商城积分', '2017-08-30', '1504101557', '10', '1', '10', '');
INSERT INTO `p_incomelog` VALUES ('473', '4', '1', '喜悦币兑换商城积分', '2017-08-30', '1504101838', '10', '1', '10', '');
INSERT INTO `p_incomelog` VALUES ('474', '4', '1', '喜悦币兑换货品', '2017-08-30', '1504101879', '10', '1', '10', '');

-- ----------------------------
-- Table structure for `p_menber`
-- ----------------------------
DROP TABLE IF EXISTS `p_menber`;
CREATE TABLE `p_menber` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `shopname` varchar(100) DEFAULT NULL COMMENT '店铺名字',
  `pwd` varchar(100) DEFAULT NULL,
  `tel` varchar(64) DEFAULT NULL,
  `type` int(4) DEFAULT '1' COMMENT '1普通 2 3 4',
  `xiyue` varchar(20) DEFAULT '0' COMMENT '喜悦币',
  `huoping` varchar(20) DEFAULT '0' COMMENT '货品',
  `jifeng` varchar(20) DEFAULT '0' COMMENT '积分',
  `zhiming` varchar(20) DEFAULT '0' COMMENT '知名度',
  `fuid` int(11) DEFAULT '0' COMMENT '注册上家',
  `fuids` varchar(1000) DEFAULT NULL COMMENT '上家',
  `addtime` int(12) DEFAULT NULL,
  `addymd` date DEFAULT NULL,
  `pwd2` varchar(255) NOT NULL,
  `zhifubao` varchar(100) DEFAULT NULL COMMENT '支付宝账号',
  `zhifubaoname` varchar(100) DEFAULT NULL COMMENT '支付宝姓名',
  `weixin` varchar(64) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL COMMENT '银行卡号',
  `bankname` varchar(64) DEFAULT NULL COMMENT '银行卡姓名',
  `bankfrom` varchar(100) DEFAULT NULL COMMENT '银行卡开户行',
  `isdelete` int(1) DEFAULT '0' COMMENT '0 未经用 1禁用',
  `isling` int(2) DEFAULT '0' COMMENT '上级是否领取',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_menber
-- ----------------------------
INSERT INTO `p_menber` VALUES ('1', '100', '紫悦城', '2', '100', '1', '1616', '10', '20', '4', '0', '1,', null, null, '3', null, null, '9527', null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('2', '101', '紫悦城', '1', '101', '1', '435.98', '275.00', '0', null, '1', '1,2,', '1502892880', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('3', '102', '紫悦城', '1', '102', '1', '14', '174', '0', null, '1', '1,3,', '1502893254', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('4', '103', '紫悦城', '1', '103', '1', '41.08', '172', '0', null, '1', '1,4,', '1502893292', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('5', '104', '紫悦城', '1', '104', '1', '41', '172', '0', null, '1', '1,5,', '1502893314', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('6', '105', '紫悦城', '1', '105', '1', '6', '172', '0', null, '2', '1,2,6,', '1502893727', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('7', '106', '紫悦城', '1', '106', '1', '6', '172', '0', null, '2', '1,2,7,', '1502893743', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('8', '107', '紫悦城', '1', '107', '1', '2', '172', '0', null, '4', '1,4,8,', '1502894185', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('9', '108', '紫悦城', '1', '108', '1', '2', '172', '0', null, '4', '1,4,9,', '1502894209', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('10', '109', '紫悦城', '1', '109', '1', '2', '172', '0', null, '5', '1,5,10,', '1502894771', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('11', '110', '紫悦城', '1', '110', '1', '2', '172', '0', null, '5', '1,5,11,', '1502894790', '2017-08-16', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('12', '111', '紫悦城', '1', '111', '1', '7', '172', '0', null, '2', '1,2,12,', '1502899216', '2017-08-17', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('13', '112', '紫悦城', '1', '112', '1', '22.35', '172', '0', null, '2', '1,2,13,', '1502899236', '2017-08-17', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('14', '113', '紫悦城', '1', '113', '1', '2', '91', '0', null, '12', '1,2,12,14,', null, null, '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('15', '114', '紫悦城', '1', '114', '1', '21.80', '91', '0', null, '13', '1,2,13,15,', null, null, '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('16', '115', '紫悦城', '1', '115', '1', '0', '91', '0', null, '15', '1,2,13,15,16,', '1502977631', '2017-08-17', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('17', '116', '紫悦城', '1', '116', '1', '2.25', '91', '0', null, '15', '1,2,13,15,17,', '1502977659', '2017-08-17', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('18', '117', '紫悦城', '1', '117', '1', '0', '91', '0', null, '17', '1,2,13,15,17,18,', '1502977871', '2017-08-17', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('19', '118', '紫悦城', '1', '118', '1', '0', '1.00', '0', null, '17', '1,2,13,15,17,19,', '1502977892', '2017-08-17', '1', null, null, null, null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('20', '1', null, '1', '1', '1', '0', '0', '0', '0', '0', '1,20,', null, null, '1', null, null, '1', null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('21', '1', null, '2', '1', '1', '0', '0', '0', '0', '0', '1,21,', '1504011849', '2017-08-29', '2', null, null, '9', null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('22', '10', '紫悦城', '1', '1', '1', '0', '0', '0', '0', '0', '1,20,22,', '1504012105', '2017-08-29', '1', null, null, '1', null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('23', '1', '紫悦城', '1', '1', '1', '0', '0', '0', '0', '0', '1,20,23,', '1504012149', '2017-08-29', '1', null, null, '1', null, null, null, '0', '0');
INSERT INTO `p_menber` VALUES ('24', '2', '紫悦城', '2', '122223442', '1', '0', '0', '0', '0', '0', '24,', '1504013311', '2017-08-29', '2', null, null, '2', null, null, null, '0', '0');

-- ----------------------------
-- Table structure for `p_message`
-- ----------------------------
DROP TABLE IF EXISTS `p_message`;
CREATE TABLE `p_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `cont` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `time` int(12) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `state` int(1) DEFAULT '1' COMMENT '1有效  2 无效',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of p_message
-- ----------------------------
INSERT INTO `p_message` VALUES ('11', 'af814b00d0a1a723cfd2773f998c85c3', '7056', '18883287644', null, '1502616589', '2017-08-13', '1');
INSERT INTO `p_message` VALUES ('12', '6d5975dfcd0b523497d7e09fcbb01003', '2876', '15538867970', null, '1502616778', '2017-08-13', '1');

-- ----------------------------
-- Table structure for `p_orderlog`
-- ----------------------------
DROP TABLE IF EXISTS `p_orderlog`;
CREATE TABLE `p_orderlog` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '用户id',
  `productid` int(11) NOT NULL,
  `productname` varchar(64) DEFAULT NULL,
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '0待支付 1收益中 2已完成',
  `orderid` varchar(128) NOT NULL COMMENT '订单id',
  `addtime` int(12) DEFAULT NULL,
  `num` int(5) DEFAULT NULL COMMENT '公排数量 购买数量',
  `price` varchar(40) DEFAULT NULL COMMENT '购买单价',
  `totals` varchar(40) DEFAULT NULL,
  `addymd` date DEFAULT NULL,
  `type` int(2) DEFAULT '1' COMMENT '1下单购买MIF  2公排',
  `addr` varchar(255) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `youbian` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_orderlog
-- ----------------------------
INSERT INTO `p_orderlog` VALUES ('54', '1', '2', null, '1', '', '1504016159', '1', '500', '500', '2017-08-29', '1', '重庆花花村子', '18883287642', '3423456', '李大爷');

-- ----------------------------
-- Table structure for `p_product`
-- ----------------------------
DROP TABLE IF EXISTS `p_product`;
CREATE TABLE `p_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '产品名',
  `cont` text COMMENT '产品描述',
  `pic` varchar(255) DEFAULT NULL COMMENT '产品图片',
  `price` varchar(100) DEFAULT NULL COMMENT '售卖价格',
  `effectdays` varchar(30) DEFAULT NULL COMMENT '理财有效天数',
  `daycome` varchar(100) DEFAULT NULL COMMENT '理财每日收益',
  `daynum` int(11) DEFAULT NULL COMMENT '每日发放数量',
  `one` varchar(50) DEFAULT NULL COMMENT '一代每日返利',
  `two` varchar(50) DEFAULT NULL,
  `state` int(3) DEFAULT '1' COMMENT '1上架  2下架',
  `addtime` int(11) DEFAULT NULL,
  `addymd` date DEFAULT NULL,
  `salenum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_product
-- ----------------------------
INSERT INTO `p_product` VALUES ('1', '土豆1', '商品介绍商品1', '/devxiyue/Public/Uploads/2017-08-27/59a2d8966001c.png', '801', null, null, null, null, null, '1', '2017', null, '0');
INSERT INTO `p_product` VALUES ('2', '大米', '商品介绍商品介绍', '/devxiyue/Public/Uploads/2017-08-27/59a2d8a24224b.png', '500', null, null, null, null, null, '1', '2017', null, '0');

-- ----------------------------
-- Table structure for `p_rite`
-- ----------------------------
DROP TABLE IF EXISTS `p_rite`;
CREATE TABLE `p_rite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cont` varchar(30) DEFAULT NULL COMMENT '利率',
  `date` varchar(30) DEFAULT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_rite
-- ----------------------------
INSERT INTO `p_rite` VALUES ('1', '0.01', '07-01');
INSERT INTO `p_rite` VALUES ('2', '0.02', '07-02');
INSERT INTO `p_rite` VALUES ('3', '0.03', '07-03');
INSERT INTO `p_rite` VALUES ('4', '0.02', '07-04');
INSERT INTO `p_rite` VALUES ('5', '0.02', '07-05');
INSERT INTO `p_rite` VALUES ('6', '0.03', '07-06');
INSERT INTO `p_rite` VALUES ('7', '0.02', '07-07');
INSERT INTO `p_rite` VALUES ('10', '0.04', '08-12');
INSERT INTO `p_rite` VALUES ('12', '0.3', '08-13');
INSERT INTO `p_rite` VALUES ('13', '0.8', '08-14');
INSERT INTO `p_rite` VALUES ('14', '0.09', '08-15');
INSERT INTO `p_rite` VALUES ('15', '0..08', '08-16');
INSERT INTO `p_rite` VALUES ('16', '0.3', '08-17');

-- ----------------------------
-- Table structure for `p_user`
-- ----------------------------
DROP TABLE IF EXISTS `p_user`;
CREATE TABLE `p_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '登录名',
  `openid` varchar(255) DEFAULT NULL COMMENT '微信ID',
  `nickname` varchar(255) DEFAULT NULL COMMENT '微信昵称',
  `address` varchar(255) DEFAULT NULL COMMENT '微信地址',
  `userface` varchar(255) DEFAULT NULL COMMENT '维信头像',
  `addtime` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `manager` int(2) DEFAULT '0' COMMENT '0 普通 1管理员 2 超级管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_user
-- ----------------------------
INSERT INTO `p_user` VALUES ('1', '123asd', 'admin', null, null, null, null, '2017-03-10 13:56:27', '2');
INSERT INTO `p_user` VALUES ('2', '123456', 'admin2', null, null, null, null, '2017-03-10 13:56:27', '2');
