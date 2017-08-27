/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : devmif

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-08-24 22:47:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for p_article
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
-- Table structure for p_config
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
-- Table structure for p_incomelog
-- ----------------------------
DROP TABLE IF EXISTS `p_incomelog`;
CREATE TABLE `p_incomelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT '1' COMMENT '1收益 2充值 3静态提现  4动态体现  5 注册下级 6下单购买 7退本 8静态转账 9动态转账 10静态收益 11 动态收益',
  `state` int(11) DEFAULT '1' COMMENT '1收入   2支出 3失败',
  `reson` varchar(255) DEFAULT NULL COMMENT '原因',
  `addymd` date DEFAULT NULL,
  `addtime` int(12) DEFAULT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `income` varchar(64) DEFAULT '0' COMMENT '金额',
  `cont` varchar(1000) NOT NULL COMMENT '后台备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=465 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_incomelog
-- ----------------------------
INSERT INTO `p_incomelog` VALUES ('461', '6', '2', '下单购买', '2017-08-17', '1502983180', '2', '2', '50', '');
INSERT INTO `p_incomelog` VALUES ('462', '11', '1', '下级购买MIF', '2017-08-17', '1502983180', '2', '1', '2.50', '1');
INSERT INTO `p_incomelog` VALUES ('463', '10', '1', '静态收益', '2017-08-17', '1502983248', '53', '2', '15.0', '');
INSERT INTO `p_incomelog` VALUES ('464', '10', '1', '静态收益', '2017-08-18', '1503064232', '53', '2', '15.0', '');

-- ----------------------------
-- Table structure for p_menber
-- ----------------------------
DROP TABLE IF EXISTS `p_menber`;
CREATE TABLE `p_menber` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `pwd` varchar(100) DEFAULT NULL,
  `tel` varchar(64) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` int(4) DEFAULT '1' COMMENT '1普通 2 3 4',
  `dongbag` varchar(50) DEFAULT '0' COMMENT '动态钱包',
  `jingbag` varchar(50) DEFAULT '0' COMMENT '静态钱包',
  `fuid` int(11) DEFAULT '0' COMMENT '注册上家',
  `fuids` varchar(1000) DEFAULT NULL COMMENT '上家',
  `addtime` int(12) DEFAULT NULL,
  `addymd` date DEFAULT NULL,
  `pwd2` varchar(255) NOT NULL,
  `chargebag` varchar(50) DEFAULT '0' COMMENT '充值钱包',
  `realname` varchar(100) DEFAULT NULL COMMENT '真实姓名',
  `zhifubao` varchar(100) DEFAULT NULL COMMENT '支付宝账号',
  `zhifubaoname` varchar(100) DEFAULT NULL COMMENT '支付宝姓名',
  `weixin` varchar(64) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL COMMENT '银行卡号',
  `bankname` varchar(64) DEFAULT NULL COMMENT '银行卡姓名',
  `bankfrom` varchar(100) DEFAULT NULL COMMENT '银行卡开户行',
  `mif` int(11) DEFAULT '0' COMMENT 'mif',
  `isdelete` int(1) DEFAULT '0' COMMENT '0 未经用 1禁用',
  `jifeng` int(11) DEFAULT '0' COMMENT '排位积分',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_menber
-- ----------------------------
INSERT INTO `p_menber` VALUES ('1', '100', '1', '100', null, '1', '169.10', '83', '0', '1,', null, null, '1', '142.00', null, null, null, null, null, null, null, '1', '0', '30');
INSERT INTO `p_menber` VALUES ('2', '101', '1', '101', null, '1', '435.98', '275.00', '1', '1,2,', '1502892880', '2017-08-16', '1', '1189.08', null, null, null, null, null, null, null, '1', '0', '14');
INSERT INTO `p_menber` VALUES ('3', '102', '1', '102', null, '1', '14', '174', '1', '1,3,', '1502893254', '2017-08-16', '1', '6.00', null, null, null, null, null, null, null, '2', '0', '14');
INSERT INTO `p_menber` VALUES ('4', '103', '1', '103', null, '1', '41.08', '172', '1', '1,4,', '1502893292', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '6');
INSERT INTO `p_menber` VALUES ('5', '104', '1', '104', null, '1', '41', '172', '1', '1,5,', '1502893314', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '6');
INSERT INTO `p_menber` VALUES ('6', '105', '1', '105', null, '1', '6', '172', '2', '1,2,6,', '1502893727', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '6');
INSERT INTO `p_menber` VALUES ('7', '106', '1', '106', null, '1', '6', '172', '2', '1,2,7,', '1502893743', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '6');
INSERT INTO `p_menber` VALUES ('8', '107', '1', '107', null, '1', '2', '172', '4', '1,4,8,', '1502894185', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '2');
INSERT INTO `p_menber` VALUES ('9', '108', '1', '108', null, '1', '2', '172', '4', '1,4,9,', '1502894209', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '2');
INSERT INTO `p_menber` VALUES ('10', '109', '1', '109', null, '1', '2', '172', '5', '1,5,10,', '1502894771', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '2');
INSERT INTO `p_menber` VALUES ('11', '110', '1', '110', null, '1', '2', '172', '5', '1,5,11,', '1502894790', '2017-08-16', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '2');
INSERT INTO `p_menber` VALUES ('12', '111', '1', '111', null, '1', '7', '172', '2', '1,2,12,', '1502899216', '2017-08-17', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '2');
INSERT INTO `p_menber` VALUES ('13', '112', '1', '112', null, '1', '22.35', '172', '2', '1,2,13,', '1502899236', '2017-08-17', '1', '38.00', null, null, null, null, null, null, null, '1', '0', '2');
INSERT INTO `p_menber` VALUES ('14', '113', '1', '113', null, '1', '2', '91', '12', '1,2,12,14,', null, null, '1', '30.00', null, null, null, null, null, null, null, '2', '0', '2');
INSERT INTO `p_menber` VALUES ('15', '114', '1', '114', null, '1', '21.80', '91', '13', '1,2,13,15,', null, null, '1', '30.00', null, null, null, null, null, null, null, '2', '0', '2');
INSERT INTO `p_menber` VALUES ('16', '115', '1', '115', null, '1', '0', '91', '15', '1,2,13,15,16,', '1502977631', '2017-08-17', '1', '30.00', null, null, null, null, null, null, null, '2', '0', '0');
INSERT INTO `p_menber` VALUES ('17', '116', '1', '116', null, '1', '2.25', '91', '15', '1,2,13,15,17,', '1502977659', '2017-08-17', '1', '30.00', null, null, null, null, null, null, null, '2', '0', '0');
INSERT INTO `p_menber` VALUES ('18', '117', '1', '117', null, '1', '0', '91', '17', '1,2,13,15,17,18,', '1502977871', '2017-08-17', '1', '30.00', null, null, null, null, null, null, null, '2', '0', '0');
INSERT INTO `p_menber` VALUES ('19', '118', '1', '118', null, '1', '0', '1.00', '17', '1,2,13,15,17,19,', '1502977892', '2017-08-17', '1', '30.00', null, null, null, null, null, null, null, '2', '0', '0');

-- ----------------------------
-- Table structure for p_message
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
-- Table structure for p_orderlog
-- ----------------------------
DROP TABLE IF EXISTS `p_orderlog`;
CREATE TABLE `p_orderlog` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '用户id',
  `productid` int(11) NOT NULL,
  `productname` varchar(64) DEFAULT NULL,
  `productmoney` varchar(32) DEFAULT NULL COMMENT '产品带来的利润',
  `states` int(1) NOT NULL DEFAULT '0' COMMENT '0待支付 1收益中 2已完成',
  `orderid` varchar(128) NOT NULL COMMENT '订单id',
  `addtime` int(12) DEFAULT NULL,
  `num` int(5) DEFAULT NULL COMMENT '公排数量 购买数量',
  `prices` varchar(40) DEFAULT NULL COMMENT '购买单价',
  `totals` varchar(40) DEFAULT NULL,
  `addymd` date DEFAULT NULL,
  `type` int(2) DEFAULT '1' COMMENT '1下单购买MIF  2公排',
  `ceng` int(3) DEFAULT NULL COMMENT '公排层数',
  `bianhao` int(11) DEFAULT NULL COMMENT '公排编号',
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_orderlog
-- ----------------------------
INSERT INTO `p_orderlog` VALUES ('53', '2', '1', 'MIF', '50', '1', '2', '1502983180', '1', '50', '50', '2017-08-17', '1', null, null);

-- ----------------------------
-- Table structure for p_product
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
  `addtime` varchar(100) DEFAULT NULL,
  `salenum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_product
-- ----------------------------
INSERT INTO `p_product` VALUES ('1', '钱付壹号', '钱付壹号，每日收益投资本金0.8%,连本带利2400元出局，普卡享受一代会员日收益0.7%，直到享受完一代会员投资金额100%，享受二代会员日收益0.5%，直到享受完二代会员投资金额50%。', '/register/Public/Uploads/2017-03-31/58ddce212bd61.png', '800', '375', '6.4', '100', '0.70', '0.50', '1', '2017-03-31 11:33:53', '0');
INSERT INTO `p_product` VALUES ('2', '钱付贰号', '钱付贰号，每日收益投资本金1%,连本带利4500元出局，银卡享受一代会员日收益0.8%，直到享受完一代会员投资金额100%，享受二代会员日收益0.6%，直到享受完二代会员投资金额50%。', '/register/Public/Uploads/2017-03-31/58ddce2af1148.png', '1500', '15', '12', '100', '1', '1', '1', '2017-03-31 22:35:41', '0');
INSERT INTO `p_product` VALUES ('3', '钱付叁号', '钱付叁号，每日收益投资本金1.2%,连本带利4500元出局，金卡享受一代会员日收益0.9%，直到享受完一代会员投资金额100%，享受二代会员日收益0.7%，直到享受完二代会员投资金额50%。', '/register/Public/Uploads/2017-03-31/58ddce371bfd2.png', '3000', '36', '24', '100', '1', '1', '1', '2017-03-31 22:35:54', '0');
INSERT INTO `p_product` VALUES ('4', '钱付肆号', '钱付肆号，每日收益投资本金1.5%,连本带利18000元出局，钻卡享受一代会员日收益1%，直到享受完一代会员投资金额100%，享受二代会员日收益0.8%，直到享受完二代会员投资金额50%。', '/register/Public/Uploads/2017-03-31/58ddce42c1d6e.png', '6000', '90', '30', '100', '', '', '1', '2017-03-31 22:37:31', '0');
INSERT INTO `p_product` VALUES ('6', '3', '234', '/register', '234', null, null, null, null, null, '1', '2017-05-31 21:38:33', '0');
INSERT INTO `p_product` VALUES ('7', '萝卜种子', '萝卜种子', '/register/Public/Uploads/2017-05-31/592ec9fc43a05.png', '20', null, null, null, null, null, '1', '2017-05-31 21:49:48', '0');

-- ----------------------------
-- Table structure for p_rite
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
-- Table structure for p_user
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
