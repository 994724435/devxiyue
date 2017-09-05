<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="/Public/Admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/Public/Admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="/Public/Admin/css/lines.css" rel='stylesheet' type='text/css' />
<link href="/Public/Admin/css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->
<script src="/Public/Admin/js/jquery.min.js"></script>
<link href="/Public/Admin/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="/Public/Admin/js/metisMenu.min.js"></script>
<script src="/Public/Admin/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="/Public/Admin/js/d3.v3.js"></script>
<script src="/Public/Admin/js/rickshaw.js"></script>
   <script src="/Public/Admin/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">当前登录员：<font color=red><?php echo ($names); ?></font></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
        
      </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/index.php/Admin/Index/main"><i class="fa fa-dashboard fa-fw nav_icon"></i>管理员列表</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>产品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/index.php/Admin/Index/addproduct">添加产品</a>
                                </li>
                                <li>
                                    <a href="/index.php/Admin/Index/productlist">产品管理</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i> 订单管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/index.php/Admin/Index/select">订单查询</a>
                                </li>
                                <!--<li>-->
                                    <!--<a href="/index.php/Admin/Index/userlist">所有签到</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<a href="/index.php/Admin/Index/send">考勤提请</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<a href="/index.php/Admin/Index/addsign">添加补签</a>-->
                                <!--</li>-->
                            </ul>                         
                        </li>
                      <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                  <li>
                                    <a href="/index.php/Admin/Menber/select">用户列表</a>
                                </li>
                                <li>
                                    <a href="/index.php/Admin/Menber/addUser">新增用户</a>
                                </li>
                                <!--<li>-->
                                    <!--<a href="/index.php/Admin/Menber/scope">范围规则</a>-->
                                <!--</li>-->
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>资金明细<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/index.php/Admin/Menber/usermessage">资金列表</a>
                                </li>
                                <!--<li>-->
                                    <!--<a href="/index.php/Admin/Menber/tixiansheng">提现审核</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<a href="/index.php/Admin/Menber/chargesheng">充值审核</a>-->
                                <!--</li>-->
                                <li>
                                    <a href="/index.php/Admin/Menber/charge">用户充值</a>
                                </li>
                                <li>
                                    <a href="/index.php/Admin/User/crontab">触发拆分</a>
                                </li>
                            </ul>
                        </li>
                        <!--<li>-->
                            <!--<a href="#"><i class="fa fa-indent nav_icon"></i>文章管理<span class="fa arrow"></span></a>-->
                            <!--<ul class="nav nav-second-level">-->
                                <!--<li>-->
                                    <!--<a href="/index.php/Admin/Article/lists">文章管理</a>-->
                                <!--</li>-->
                            <!--</ul>-->
                        <!--</li>-->
                        <li>
                            <a href="#"><i class="fa fa-indent nav_icon"></i>系统配置<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/index.php/Admin/Config/index">配置列表</a>
                                </li>
                                <!--<li>-->
                                <!--<a href="/index.php/Admin/Index/setstime">时间规则</a>-->
                                <!--</li>-->
                                <!--<li>-->
                                <!--<a href="/index.php/Admin/Menber/scope">范围规则</a>-->
                                <!--</li>-->
                            </ul>
                        </li>

                          <li>
                            <a href="/index.php/admin/User/logOut"><i class="fa fa-flask fa-fw nav_icon"></i>退出系统</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
	<div id="page-wrapper">
		<div class="graphs">
			<div class="xs">
				<h3>收益配置(格式必须一致)</h3>
				<div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[0]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="jiage" value="<?php echo ($res[0]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[1]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="jintai" value="<?php echo ($res[1]['value']); ?>"  class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->
							<!-- 推荐奖 -->
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[2]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="tuijian1" value="<?php echo ($res[2]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[3]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="tuijian2" value="<?php echo ($res[3]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[4]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="tuijian3" value="<?php echo ($res[4]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[5]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="tuijian4" value="<?php echo ($res[5]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[6]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="tuijian5" value="<?php echo ($res[6]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[7]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="tuijian6" value="<?php echo ($res[7]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->
                        <!--推荐 6-->

					<!--回馈奖 6-->
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[8]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="huikui1" value="<?php echo ($res[8]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[9]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="huikui2" value="<?php echo ($res[9]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[10]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="huikui3" value="<?php echo ($res[10]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[11]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="huikui4" value="<?php echo ($res[11]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[12]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="huikui5" value="<?php echo ($res[12]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<!--<div class="form-group">-->
							<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[13]['name']); ?></label>-->
							<!--<div class="col-sm-8">-->
								<!--<input type="text" name="huikui6" value="<?php echo ($res[13]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
							<!--</div>-->
							<!--<div class="col-sm-2">-->
								<!--<p class="help-block"></p>-->
							<!--</div>-->
						   <!--</div>-->

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[14]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="tixiannum" value="<?php echo ($res[14]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<!--<div class="form-group">-->
								<!--<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[15]['name']); ?></label>-->
								<!--<div class="col-sm-8">-->
									<!--<input type="text" name="tixiantime" value="<?php echo ($res[15]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">-->
								<!--</div>-->
								<!--<div class="col-sm-2">-->
									<!--<p class="help-block"></p>-->
								<!--</div>-->
							<!--</div>-->

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[16]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="gongpai" value="<?php echo ($res[16]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[17]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="jintaifei" value="<?php echo ($res[17]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[18]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="dongtaifei" value="<?php echo ($res[18]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[19]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="huikuixi" value="<?php echo ($res[19]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[20]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="in21" value="<?php echo ($res[20]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label"><?php echo ($res[21]['name']); ?></label>
								<div class="col-sm-8">
									<input type="text" name="in22" value="<?php echo ($res[21]['value']); ?>" class="form-control1" id="focusedinput" placeholder="">
								</div>
								<div class="col-sm-2">
									<p class="help-block"></p>
								</div>
							</div>
					<!--回馈奖 6-->

							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn-success btn">Submit</button>
									</div>
								</div>
							</div>


						</form>
					</div>
				</div>



			</div>
			<div class="copy_layout">
				<p>Copyright &copy; 2016 name All rights reserved.</p>
			</div>
		</div>
	</div>
	<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<!-- Nav CSS -->
	<link href="/Public/admin/css/custom.css" rel="stylesheet">
	<!-- Metis Menu Plugin JavaScript -->
	<script src="/Public/admin/js/metisMenu.min.js"></script>
	<script src="/Public/admin/js/custom.js"></script>
	<script src="/Public/admin/js/bootstrap.min.js"></script>
	</body>
</html>