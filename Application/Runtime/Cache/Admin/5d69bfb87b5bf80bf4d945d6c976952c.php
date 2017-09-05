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
                                    <a href="/index.php/Admin/User/crontab">手动刷新</a>
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
  	       <h3>新增用户</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">用户名</label>
									<div class="col-sm-8">
										<input type="text" name="name" value="<?php echo ($res["name"]); ?>" class="form-control1" id="focusedinput" placeholder="">
									</div>
									<div class="col-sm-2">
										<p class="help-block"></p>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">电话</label>
									<div class="col-sm-8">
										<input type="text" name="tel" value="<?php echo ($res["name"]); ?>" class="form-control1" id="focusedinput" placeholder="">
									</div>
									<div class="col-sm-2">
										<p class="help-block"></p>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">上级用户ID</label>
									<div class="col-sm-8">
										<input type="text" name="fuid" value="<?php echo ($res["name"]); ?>" class="form-control1" id="focusedinput" placeholder="">
									</div>
									<div class="col-sm-2">
										<p class="help-block"></p>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">一级密码</label>
									<div class="col-sm-8">
										<input type="text" name="pwd" value="<?php echo ($res["pwd"]); ?>" class="form-control1" id="focusedinput" placeholder="">
									</div>
									<div class="col-sm-2">
										<p class="help-block"></p>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">二级密码</label>
									<div class="col-sm-8">
										<input type="text" name="pwd2" value="<?php echo ($res["pwd2"]); ?>" class="form-control1" id="focusedinput" placeholder="">
									</div>
									<div class="col-sm-2">
										<p class="help-block"></p>
									</div>
								</div>




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