<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="format-detection" content="telephone=no, email=no" />
		<!-- 启用360浏览器的极速模式(webkit) -->
		<meta name="renderer" content="webkit">
		<!-- 删除默认的苹果工具栏和菜单栏 -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!-- 避免IE使用兼容模式 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- 针对手持设备优化，主要是针对一些老的不识别viewport的浏览器，比如黑莓 -->
		<meta name="HandheldFriendly" content="true">
		<!-- 微软的老式浏览器 -->
		<meta name="MobileOptimized" content="320">
		<!-- UC强制全屏 -->
		<meta name="full-screen" content="yes">
		<!-- QQ强制全屏 -->
		<meta name="x5-fullscreen" content="true">
		<!-- UC应用模式 -->
		<meta name="browsermode" content="application">
		<!-- QQ应用模式 -->
		<meta name="x5-page-mode" content="app">
		<!-- windows phone 点击无高光 -->
		<meta name="msapplication-tap-highlight" content="no">
		<meta name="keywords" content="h5游戏，手机页游,在线小游戏，喜悦城">
		<meta name="description" content="喜悦城游戏是玩家将以创业为基点，自己开店铺，招聘员工等，真实体验商业地产中的乐趣，成为风云的资本大鳄，打造属于自己的商业王国。">
		<title>喜悦城</title>
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/main.css" />
		<link rel="stylesheet" type="text/css" href="/Public/Home/css/common.css" />
		<script type="text/javascript" src="/Public/Home/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="/Public/Home/js/echarts.common.min.js"></script>
        <style type="text/css">
        	.caifenMask{display: none;}
        </style>

	</head>
	<body>
		<!--游戏加载-->
		<div class="text_wait">
			<p>正在加载中，请稍后...</p>
			<img src="<?php echo ($curlurl); ?>/Public/Home/img/wait.gif" class="lazyload" width="300" height="300" />
		</div>
		<!--头部-->
		<div class="main_head" style="position: fixed;">
			<div class="main_head_top">
				<span>名字</span>
				<span id="main_name"><?php echo ($username["name"]); ?></span>
				<span>店铺</span>
				<span id="main_shop"><?php echo ($username["shopname"]); ?></span>
			</div>
			<div class="main_head_down">
				<div class="head_box">
					<img src="<?php echo ($curlurl); ?>/Public/Home/img/mall_2.png" class="topHead lazyload" />
				</div>
				<!--<div class="head_gold">-->
					<!--<div class="gold_number"><span class="pic_gold"></span><span id="gold_number">111</span></div>-->
					<!--<div class="gold_number"><span class="pic_safe"></span><span id="goldd_number">111</span></div>-->
				<!--</div>-->
			</div>
		</div>
		<!--头部 end-->


		<!--尾部-->
		<div class="main_foot">
			<div class="main_down_top">
				<span class="main_change_ren  change_ren" id="liushui"></span>
				<span class="main_change_company change_company changMain" id="openCaifen"></span>
				<!-- <span class="main_change_shop change_shop changMain" style="position: relative;">
					<div class="yindao"></div>
				</span> -->
				<span class="main_change_yuan change_yuan changMain openMY" style="position: relative;">
					<div class="yindao"></div>
				</span>
				<span class="main_change_so change_so changMain" id="logout"></span>

			</div>
			<div class="main_down_bottom">
				<span class="main_down_ub change_ren">财务明细</span>
				<span class="main_down_ub change_company changMain">拆分走势</span>
				<!-- <span class="main_down_ub change_shop changMain">店铺</span> -->
				<span class="main_down_ub change_yuan">个人中心</span>
				<span class="main_down_ub change_so changMain"> 退出登录</span>
			</div>
		</div>
		<!--尾部end-->

		<!-- 中间大楼 -->
		<div class="main_box main">
			<!-- <div class="carred"></div>
			<div class="carorage"></div>
			<div class="carwhite"></div>
			<div class="carwhite2"></div>
			<div class="carwhite3"></div>
			<div class="carorage"></div>
			<div class="moto"></div> -->
			<div class="main_game"> 
			     <img src="<?php echo ($curlurl); ?>/Public/Home/img_b/9.png" alt="" class="tower1 tower"  id="xiaji">
			     <img src="<?php echo ($curlurl); ?>/Public/Home/img_b/13.png" alt="" class="tower2 tower" id="openfinnace">
			     <img src="<?php echo ($curlurl); ?>/Public/Home/img_b/26.png" alt="" class="tower3 tower" id="firstMask">
			     <img src="<?php echo ($curlurl); ?>/Public/Home/img_b/25.png" alt="" class="tower4 tower" id="goods">
			     <img src="<?php echo ($curlurl); ?>/Public/Home/img_b/27.png" alt="" class="tower5 tower" id="reg">
			     <img src="<?php echo ($curlurl); ?>/Public/Home/img_b/22.png" alt="" class="tower6 tower" id="transact">
			
			</div>
		</div>
		<!-- 中间大楼end-->
	
		<!-- 商城大楼弹窗 -->
		<div class="main_mengban main_add_rw main_add_div goodsMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>商城大楼</span>
					<span class="main_close">  </span>
				</div>
				<ul class="main_pop_body mission">
					<?php if(is_array($product)): foreach($product as $key=>$v): ?><li class="main_pop_body_li main_pop_body_li1">
						<ul>
							<li class="main_pop_body_ul1">
								<img src="<?php echo ($curlurl); ?>/Public/Home/img/ren1.png" class="renwu_head">
							</li>
							<li class="main_pop_body_ul2">
								<span class="renwu_title"><?php echo ($v["name"]); ?>：<?php echo ($v["cont"]); ?></span>
							</li>
							<li class="main_pop_body_ul3">
								<img src="<?php echo ($curlurl); ?>/Public/Home/img/gold.png" class="rwgold">
								<span>￥<?php echo ($v["price"]); ?></span>
								<span class="renwu_ling renwu_ling1 buyy" data-id="<?php echo ($v["id"]); ?>" data-money="<?php echo ($v["price"]); ?>">购买</span>
							</li>
						</ul>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="main_body_pop sureBuyMask">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span>确认购买</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">
					<form action="<?php echo U('index.php/Home/Index/buy');?>" method="post" enctype="multipart/form-data">
					<ul class="main_com_body1 main_com_body">
					    <input type="hidden" name="price" id="buyMoney" />
					    <input type="hidden" name="productid" id="goodsId" />
						<li class="main_com_li">
							<span class="main_com_li_left">收货地址:</span>
							<input type="text" name="addr"/>
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">收货人姓名:</span>
							<input type="text" name="username"/>
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">电话:</span>
							<input type="number" name="tel" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">邮编:</span>
							<input type="number" name="youbian" />
						</li>
					</ul>
					<button class="setSwithBtn main_com addBtn">确认购买</button>
				    </form>
				</div>
			</div>
		</div>


		<!-- 交易大楼弹窗 -->
		<div class="main_mengban main_mengban2 mengban transactMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>交易大楼</span>
					<span class="main_close">  </span>
				</div>
				<div class="main_pop_body">
					<form action="<?php echo U('index.php/Home/Index/jiaoyi');?>" method="post" enctype="multipart/form-data">
					<ul class="main_com_body1 main_com_body">
					<li class="main_com_li">
							<span class="main_com_li_left">可出售币数量:</span>
							<input type="text" name="xiyue"  value="<?php echo ($username["xiyue"]); ?>" readonly = "readonly" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">目标用账户:</span>
							<input type="text" name="tel"  value=""/>
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">目标姓名:</span>
							<input type="text" name="name"  value=""/>
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">交易数量:</span>
							<input type="number" name="num"  value="" id="jiaoyiNUM" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">目标微信:</span>
							<input type="text" name="weixin" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">手续费</span>
							<input type="text" name="souxu"  value="<?php echo 0.1 ?> " readonly = "readonly" id="shouxu" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">银行信托基金</span>
							<input type="text" name="jijin" readonly = "readonly" value="<?php echo 0.1 ?>" id="yinhang"  />
						</li>

					</ul>
					<ul class="main_com_body2 main_com_body">
						
						<button class="buy_money buy_mishu regBtn">
							确认交易
						</button>
					</ul>
					</form>
				</div>
			</div>
		</div>
		<!-- 交易大楼弹窗end -->
          

          <!-- 注册弹框 -->
		<div class="main_mengban main_mengban2 mengban regMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>注册大楼</span>
					<span class="main_close">  </span>
				</div>
				<div class="main_pop_body">
				    <form action="<?php echo U('index.php/Home/Index/reg');?>" method="post" enctype="multipart/form-data">
					<ul class="main_com_body1 main_com_body">
						<li class="main_com_li">
							<span class="main_com_li_left">推荐人账号:</span>
							<input type="text" name="mytel" id="tot_assets" value=""/>
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">当前余额:</span>
							<input type="text" name="mymoney"  value="<?php echo ($username["xiyue"]); ?>" readonly = "readonly" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">注册消耗币:</span>
							<input type="text" name="income"  value="800" readonly = "readonly" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">喜悦城账号:</span>
							<input type="text" name="nextel"  value="" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">真实姓名:</span>
							<input type="text" name="name"  value="" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">一级密码:</span>
							<input type="password" name="pwd1" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">确认一级密码:</span>
							<input type="password" name="pwd1c" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">二级密码:</span>
							<input type="password" name="pwd2" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">确认二级密码:</span>
							<input type="password" name="pwd2c" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">微信:</span>
							<input type="text" name="weixin"  value="" />
						</li>
					</ul>
					<ul class="main_com_body2 main_com_body">
						
						<button class="buy_money buy_mishu regBtn">
							确认开通会员
						</button>
					</ul>
					</form>
				</div>
			</div>
		</div>
         
        <!-- 流水大楼 -->
        <div class="main_mengban main_add_sh main_add_div liushuiMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>流水大楼</span>
					<span class="main_close"> </span>
				</div>
				<div class="main_pop_body">
				    <table class="liushui">
						<?php if(is_array($income)): foreach($income as $key=>$v): ?><tr>
					   		<td><?php echo ($v["reson"]); ?></td>
					   		<td><?php echo ($v["income"]); ?></td>
					   		<td style="width: 50%;"><?php echo date('Y-m-d H:i:s',$v['addtime']) ?></td>
					   	</tr><?php endforeach; endif; ?>
					   		<!--<tr>-->
					   		<!--<td>开商铺</td>-->
					   		<!--<td>1200</td>-->
					   		<!--<td style="width: 50%;">2015-3-3 12:00:00</td>-->
					   	<!--</tr>-->
					   <!---->
				    </table>
				  
				</div>
			</div>
		</div>

		<!-- 我的下级大楼 -->
        <div class="main_mengban main_add_sh main_add_div xiajiMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>我的下级大楼</span>
					<span class="main_close"> </span>
				</div>
				<div class="main_pop_body">
					<a href="/index.php/Home/Index/nexIncome/"><button class="buy_money buy_mishu" style="margin:0.1rem auto;display: block;background: #fd3b0c;">
							一键收取
					</button>
					</a>
				    <table class="liushui">

					   	<tr>
					   		<td>会员账号</td>
					   		<td>姓名</td>
					   		<td>下线收益</td>
					   		<!-- <td>收取下级货品</td> -->
					   	</tr>

						<?php if(is_array($xiaji)): foreach($xiaji as $key=>$v): ?><tr>
					   		<td><?php echo ($v["orderid"]); ?></td>
					   		<td><?php echo ($v["cont"]); ?></td>
					   		<td><a href="/index.php/Home/Index/nexIncome/id/<?php echo ($v["id"]); ?>"><button type="button" class="lingqu">领取</button></a> </td>
					   		<!-- <td>222</td> -->
					   	</tr><?php endforeach; endif; ?>

				    </table>
				  
				</div>
			</div>
		</div>
        

         <!-- 一星商铺 -->
        <div class="main_mengban main_add_sz main_add_div firstStore">
			<div class="main_body_pop setUp_on">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span><?php echo ($xin); ?>星商铺大楼</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp">
					<div class="setUpBtn">
						<button class="setUp_li setUp_switch openMyHuogui">我的货柜</button>
						<button class="setUp_li setUp_switch openHuopin">当前商铺货品</button>
						<button class="setUp_li setUp_switch openHuigui">已拥有货柜</button>
						<button class="setUp_li setUp_switch openShop"><?php echo ($username["shangpu"]); ?></button>
						
					</div>
				</div>
			</div>
			<!-- 当前商铺货品 -->
			<div class="main_body_pop huopinMask">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span>当前商铺货品</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">
					<ul class="main_com_body1 main_com_body">
						<li class="main_com_li">
							<span class="main_com_li_left" style="width: 1.2rem">当前商铺货品总额:</span>
							<input type="text" name="" value="<?php echo ($nums); ?>" disabled="disabled" />
						</li>
						
					</ul>
				</div>
			</div>
             <!-- 当前商铺货品 -->  
			<div class="main_body_pop huoguiMask">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span>已拥有货柜</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">
					<div class="setUpBtn">
						<button class="setUp_li setUp_switch">一号货柜<?php if($huogui[0]['state'] == 0): ?>未<?php elseif($huogui[0]['state'] == 1): ?>已<?php endif; ?>开通</button>
						<button class="setUp_li setUp_switch">二号货柜<?php if($huogui[1]['state'] == 0): ?>未<?php elseif($huogui[1]['state'] == 1): ?>已<?php endif; ?>开通</button>
						<button class="setUp_li setUp_switch">三号货柜<?php if($huogui[2]['state'] == 0): ?>未<?php elseif($huogui[2]['state'] == 1): ?>已<?php endif; ?>开通</button>
						<button class="setUp_li setUp_switch">四号货柜<?php if($huogui[3]['state'] == 0): ?>未<?php elseif($huogui[3]['state'] == 1): ?>已<?php endif; ?>开通</button>
						<button class="setUp_li setUp_switch">五号货柜<?php if($huogui[4]['state'] == 0): ?>未<?php elseif($huogui[4]['state'] == 1): ?>已<?php endif; ?>开通</button>
					</div>
				</div>
			</div>
			 <!-- 我的货柜 -->  
			<div class="main_body_pop myHuoguiMask">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span>我的货柜</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">
					<ul class="main_pop_body mission myHuogui">
						<li class="main_pop_body_li main_pop_body_li1">
							<ul>
								<li class="main_pop_body_ulT">
									<span class="renwu_title">一号货柜</span>
									<span class="renwu_title">当前货品：<?php echo ($huogui[0]['curlnum']); ?></span>
								</li>
								<li class="main_pop_body_ul3">
									<span class="renwu_ling renwu_ling1 bigBtn addgoods" data-id="1">增加货品数量</span>
								</li>
								<?php if($huogui[0]['curlincome'] > 0): ?><a href="/index.php/Home/Index/dealshouyi/id/<?php echo ($huogui[0]['id']); ?>"><span class="shouyi">领取收益 <?php echo ($huogui[0]['curlincome']); ?></span></a> <?php else: ?><span class="shouyi">暂无收益</span><?php endif; ?>

							</ul>
						</li>
						<li class="main_pop_body_li main_pop_body_li1">
							<ul>
								<li class="main_pop_body_ulT">
									<span class="renwu_title">二号货柜</span>
									<span class="renwu_title">当前货品：<?php echo ($huogui[1]['curlnum']); ?></span>
								</li>
								<li class="main_pop_body_ul3">
									<span></span> 
									<span class="renwu_ling renwu_ling1 bigBtn addgoods" data-id="2">增加货品数量</span>
								</li>
								<?php if($huogui[1]['curlincome'] > 0): ?><span class="shouyi">领取收益 <?php echo ($huogui[1]['curlincome']); ?></span><?php else: ?><span class="shouyi">暂无收益</span><?php endif; ?>
							</ul>
						</li>

						<!--三号货柜-->
						<li class="main_pop_body_li main_pop_body_li1">
							<?php if($huogui[2]['state'] == 0): ?><ul>
							    <li class="tTitle">三号货柜</li>
								<div class="btns">
									<span class="middleBtn fl openjinbi" data-id="3">金币开通</span>
								    <span class="middleBtn fr openZmd" data-id="3">知名度开通</span>
								</div>
							</ul>
							<?php else: ?>
								<ul>
									<li class="main_pop_body_ulT">
										<span class="renwu_title">三号货柜</span>
										<span class="renwu_title">当前货品：<?php echo ($huogui[2]['curlnum']); ?></span>
									</li>
									<li class="main_pop_body_ul3">
										<span></span>
										<span class="renwu_ling renwu_ling1 bigBtn addgoods" data-id="3">增加货品数量</span>
									</li>
									<?php if($huogui[2]['curlincome'] > 0): ?><span class="shouyi">领取收益 <?php echo ($huogui[2]['curlincome']); ?></span><?php else: ?><span class="shouyi">暂无收益</span><?php endif; ?>
								</ul><?php endif; ?>
						</li>


						<!--四号货柜-->
						<li class="main_pop_body_li main_pop_body_li1">
							<?php if($huogui[3]['state'] == 0): ?><ul>
							    <li class="tTitle">四号货柜</li>
								<div class="btns">
									<span class="middleBtn fl openjinbi" data-id="4">金币开通</span>
								    <span class="middleBtn fr openZmd" data-id="4">知名度开通</span>
								</div>
							</ul>
							 <?php else: ?>
							 <ul>
									<li class="main_pop_body_ulT">
										<span class="renwu_title">四号货柜</span>
										<span class="renwu_title">当前货品：<?php echo ($huogui[3]['curlnum']); ?></span>
									</li>
									<li class="main_pop_body_ul3">
										<span></span>
										<span class="renwu_ling renwu_ling1 bigBtn addgoods" data-id="4">增加货品数量</span>
									</li>
									<?php if($huogui[3]['curlincome'] > 0): ?><span class="shouyi">领取收益 <?php echo ($huogui[3]['curlincome']); ?></span><?php else: ?><span class="shouyi">暂无收益</span><?php endif; ?>
							  </ul><?php endif; ?>
						</li>


						<!--五号货柜-->

						<li class="main_pop_body_li main_pop_body_li1">
							<?php if($huogui[4]['state'] == 0): ?><ul>
							    <li class="tTitle">五号货柜</li>
								<div class="btns">
									<span class="middleBtn fl openjinbi" data-id="5">金币开通</span>
								    <span class="middleBtn fr openZmd" data-id="5">知名度开通</span>
								</div>
							</ul>
							<?php else: ?>
							<ul>
								<li class="main_pop_body_ulT">
									<span class="renwu_title">五号货柜</span>
									<span class="renwu_title">当前货品：<?php echo ($huogui[4]['curlnum']); ?></span>
								</li>
								<li class="main_pop_body_ul3">
									<span></span>
									<span class="renwu_ling renwu_ling1 bigBtn addgoods" data-id="5">增加货品数量</span>
								</li>
								<?php if($huogui[4]['curlincome'] > 0): ?><span class="shouyi">领取收益 <?php echo ($huogui[4]['curlincome']); ?></span><?php else: ?><span class="shouyi">暂无收益</span><?php endif; ?>
							</ul><?php endif; ?>
						</li>
					</ul>
				</div>
			</div>

			<!-- 金币开通 -->
			<div class="main_body_pop jinbiMask">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span id="jinbTitle">一号货柜金币开通</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">
					 <form action="<?php echo U('index.php/Home/Index/jinbikai');?>" method="post" enctype="multipart/form-data">
					<ul class="main_com_body1 main_com_body">
						<li class="main_com_li">
						    <input type="hidden" name="id" id="jinbID" value="">
							<input type="hidden" name="type"  value="1">
							<span class="main_com_li_left">开通扣除金币:</span>
							<input type="text" value="<?php echo ($kai["xiyue"]); ?>" name="num" readonly="readonly" id="jinbNum" />
						</li>
						
					</ul>
					<button class="setSwithBtn main_com addBtn" id="openJjinb">确认开通</button>
					 </form>
				</div>
			</div>

			<!-- 知名度开通 -->
			<div class="main_body_pop zmdMask">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span id="zmdTitle">一号货柜知名度开通</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">
					<form action="<?php echo U('index.php/Home/Index/zhiminkai');?>" method="post" enctype="multipart/form-data">
					<ul class="main_com_body1 main_com_body">
						<li class="main_com_li" style="text-align: center;">
						    <input type="hidden" name="id" id="zmdID">
							<input type="hidden" name="type"  value="2">
							<input type="hidden" name="num"  value="<?php echo ($kai["zhiming"]); ?>">
							开通需扣除&nbsp;&nbsp;<span style="font-size: 15px;color: red;" id="zmdNum"><?php echo ($kai["zhiming"]); ?></span>&nbsp;&nbsp;知名度
						</li>
					</ul>
					<button class="setSwithBtn main_com addBtn" id="openZmd">确认开通</button>
					</form>
				</div>
			</div>

			<!-- 增加货品开通 -->
			<div class="main_body_pop addGoodsMask">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span id="addGoodsTitle">一号货柜增加货品</span>
					<span class="main_close"></span>
				</div>
				<form action="<?php echo U('index.php/Home/Index/addhuo');?>" method="post" enctype="multipart/form-data">
				<div class="main_pop_body setUp qiehuan">
					<ul class="main_com_body1 main_com_body">
						<li class="main_com_li">
						    <input type="hidden" name="id" id="addgoodsID">
							<span class="main_com_li_left">增加货品:</span>
							<input type="number" name="num" value="100" id="goodsNUM" />
						</li>
					</ul>
					<button class="setSwithBtn main_com addBtn" id="opengoods">确认增加</button>
				</div>
				</form>
			</div>
		</div>


		<!-- 财务中心 -->
        <div class="main_mengban main_add_sh main_add_div financeMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>财务中心</span>
					<span class="main_close"> </span>
				</div>
				<div class="main_pop_body" style="width: 100%;margin:0;">
				    <ul class="pop_top">
					   	<li>
					   		<ul>
					   			<li>我的货品</li>
					   			<li><?php echo ($username["huoping"]); ?></li>
					   		</ul>
					   	</li>
					   	<li>
					   		<ul>
					   			<li>喜悦币</li>
					   			<li><?php echo ($username["xiyue"]); ?></li>
					   		</ul>
					   	</li>
					   	<li>
					   		<ul>
					   			<li>商城积分</li>
					   			<li><?php echo ($username["jifeng"]); ?></li>
					   		</ul>
					   	</li>
					   	<li>
					   		<ul>
					   			<li>知名度</li>
					   			<li><?php echo ($username["zhiming"]); ?></li>
					   		</ul>
					   	</li>
				    </ul>
					<form action="<?php echo U('index.php/Home/Index/caiwu');?>" method="post" enctype="multipart/form-data">
				    <ul class="main_com_body1 main_com_body" id="duihuan">
						<li class="main_com_li">
							<span class="main_com_li_left">货品兑换喜悦币:</span>
							<input type="text" value="1" name="huobi" class="huobi" /> : <input type="text" name="huobilv"  value="1" readonly = "readonly" class="xiyuebi" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">喜悦币兑换货品:</span>
							<input type="text" value="1" name="xiyuebi1" class="xiyuebi1" /> : <input type="text" name="xiyuebi1lv" value="1" readonly = "readonly" class="huobi1" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left" style="font-size: 12px;">货品兑换商城积分:</span>
							<input type="text" value="1" name="huobi2" class="huobi2" /> : <input type="text" name="huobi2lv" value="0.7" readonly = "readonly" class="jifen" />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left" style="font-size: 12px;">喜悦币兑换商城积分:</span>
							<input type="text" value="1" name="xiyuebi2" class="xiyuebi2" /> : <input type="text" name="xiyuebi2lv" value="1" readonly = "readonly" class="jifen1" />
						</li>
					     <button class="setSwithBtn main_com addBtn">确认兑换</button>

					</ul>
					</form>
				</div>
			</div>
		</div>

		<!-- 走势图弹窗 -->
		<div class="main_mengban main_add_sh main_add_div caifenMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>拆分走势</span>
					<span class="main_close"> </span>
				</div>
				<div class="main_pop_body" style="width: 100%;margin:0;">
					<div id="mains" style="height:200px;width: 90%;"></div>
				</div>
			</div>
		</div>

		<!-- 走势图弹窗end -->
		

		<!-- 个人中心弹窗 -->
		<div class="main_mengban main_mengban2 mengban myMask">
			<div class="main_body_pop">
				<div class="main_pop_head">
					<span class="main_return"></span>
					<span>个人中心</span>
					<span class="main_close">  </span>
				</div>
				<div class="main_pop_body" style="width: 100%;margin:0;">
					<ul class="main_com_body1 main_com_body myList">
					   <li class="main_com_li padingl">
						    喜悦币：<?php echo ($username["xiyue"]); ?>
						</li>
					    <li class="main_com_li padingl">
						    我的货品：<?php echo ($username["huoping"]); ?>
						</li>
						
						<li class="main_com_li padingl">
						    商城积分：<?php echo ($username["jifeng"]); ?>
						</li>
						<li class="main_com_li padingl">
						    我的知名度：<?php echo ($username["zhiming"]); ?>
						</li>
					    <!-- 没购买显示尚未购买商品，购买了显示已发货 -->
						<li class="main_com_li padingl">
						    物流信息：尚未购买商品
						</li>
						<li class="main_com_li padingl">
						    我的账号：<?php echo ($username["tel"]); ?>
						</li>
						<li class="main_com_li padingl">
						    我的姓名：<?php echo ($username["name"]); ?>
						</li>
						<li class="main_com_li padingl">
						    我的微信号：<?php echo ($username["weixin"]); ?>
						</li>
						<button class="buy_money buy_mishu modifyPwd openPwd1">
								修改一级密码
						</button>
						<button class="buy_money buy_mishu modifyPwd openPwd2">
								修改二级密码
						</button>
					</ul>
					
				</div>
			</div>
			<!-- 修改一级密码 -->
			<div class="main_body_pop modifyMask1">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span>修改一级密码</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">

					<form action="<?php echo U('index.php/Home/Index/updatepwd');?>" method="post" enctype="multipart/form-data">
					<ul class="main_com_body1 main_com_body">
						<li class="main_com_li">
							<input type="hidden" name="one" value="1" />
							<span class="main_com_li_left">旧一级密码:</span>
							<input type="password" name="oldone"  />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">新一级密码:</span>
							<input type="password" name="newone1"  />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">重复新一级密码:</span>
							<input type="password" name="newone2"  />
						</li>
						
					</ul>
					<button class="setSwithBtn main_com addBtn">确认修改</button>
					</form>
				</div>
			</div>
			<!-- 修改二级密码 -->
			<div class="main_body_pop modifyMask2">
				<div class="main_pop_head">
					<span class="main_return return setUp_return"></span>
					<span>修改二级密码</span>
					<span class="main_close"></span>
				</div>
				<div class="main_pop_body setUp qiehuan">
					<form action="<?php echo U('index.php/Home/Index/updatepwd');?>" method="post" enctype="multipart/form-data">
					<ul class="main_com_body1 main_com_body">
						<li class="main_com_li">
							<span class="main_com_li_left">旧二级密码:</span>
							<input type="hidden" name="two" value="1" />
							<input type="password" name="oldtwo"  />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">新二级密码:</span>
							<input type="password" name="newtwo1"  />
						</li>
						<li class="main_com_li">
							<span class="main_com_li_left">重复新二级密码:</span>
							<input type="password" name="newtwo2"  />
						</li>
						
					</ul>
					<button class="setSwithBtn main_com addBtn">确认修改</button>
					</form>
				</div>
			</div>
			<!-- 修改二级密码 end-->

		</div>
		<!-- 个人中心end -->
		

	</body>
	<script type="text/javascript" src="/Public/Home/js/jquery-1.js"></script>
	<script type="text/javascript" src="/Public/Home/js/toast.js"></script>
	<script type="text/javascript" src="/Public/Home/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="/Public/Home/js/rem.js"></script>
	<script type="text/javascript" src="/Public/Home/js/md5.js" ></script>
	<!-- <script type="text/javascript" src="/Public/Home/js/ajax.js" ></script> -->
	<script type="text/javascript" src="/Public/Home/js/tween.js"></script>
	<script type="text/javascript" src="/Public/Home/js/index.js"></script>

	<script type="text/javascript">
        // 基于准备好的dom，初始化echarts图表
        var myChart = echarts.init(document.getElementById("mains"));
        var option = {
            title : {
                text: '一周曲线变化'
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['收益率']
            },
            //右上角工具条
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    magicType : {show: true, type: ['line', 'bar']},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            calculable : true,
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    data : ['<?php echo ($seven[6]["date"]); ?>','<?php echo ($seven[5]["date"]); ?>','<?php echo ($seven[4]["date"]); ?>','<?php echo ($seven[3]["date"]); ?>','<?php echo ($seven[2]["date"]); ?>','<?php echo ($seven[1]["date"]); ?>','<?php echo ($seven[0]["date"]); ?>']
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel : {
                        formatter: '{value} '
                    }
                }
            ],
            series : [
                {
                    name:'收益率',
                    type:'line',
                    smooth:true,
                    data:[<?php echo ($seven[6]["cont"]); ?>, <?php echo ($seven[5]["cont"]); ?>, <?php echo ($seven[4]["cont"]); ?>, <?php echo ($seven[3]["cont"]); ?>, <?php echo ($seven[2]["cont"]); ?>, <?php echo ($seven[1]["cont"]); ?>,<?php echo ($seven[0]["cont"]); ?>],
                    markPoint : {
                        data : [
                            {type : 'max', name: '最大值'}
                        ]
                    }
                }
            ]
        };

        // 为echarts对象加载数据
        myChart.setOption(option);

	</script>

</html>