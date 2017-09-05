<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>登录</title>
	<style type="text/css">
		body{background: url('/Public/Home/img/logoBg.jpg') repeat-y;background-size: 100% auto;}
		.logoImg{width: 40%;margin:30px auto 0;display: block;}
		::-webkit-input-placeholder { /* WebKit browsers */
			color: #fff;
		}
		:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
			color: #fff;
		}
		::-moz-placeholder { /* Mozilla Firefox 19+ */
			color: #fff;
		}
		:-ms-input-placeholder { /* Internet Explorer 10+ */
			color: #fff;
		}
		li{list-style: none;}
		.loginDiv{width:70%;margin:20px auto;}
		.loginDiv div{width: 70px;background: #fff;position: absolute;right: 0;top: 0;color: red;text-align: center;font-size: 15px;border-radius: 10px;}
		.loginDiv li{height: 40px;line-height: 40px;color: #fff;background:#43c1f1;margin-top: 10px;border-radius: 10px; position: relative}
		.loginDiv span{display: inline-block;width: 30%;text-align: center;}
		.loginDiv  input{width: 50%;color: #fff;background:#43c1f1;border: none;outline: none; }
		.loginBtn{width: 150px;height: 45px;line-height: 45px;
			background: url('/Public/Home/img/btn.png') no-repeat;background-size: 100% 100%;text-align: center;border:none;color: #fff;
			display: block;margin:20px  auto 0;}

	</style>
</head>
<body>
<img src="/Public/Home/img/logo.png" alt="" class="logoImg">
<form action="" method="post" enctype="multipart/form-data">
	<ul  class="loginDiv">
		<li><span>手机</span><input type="text" name="tel" placeholder="输入手机号"></li>
		<li><span>密码</span><input type="password" name="pwd" placeholder="输入密码"></li>
		<input type="hidden" name="number" value="<?php echo ($numbers); ?>">
		<li><span>验证码</span><input type="text"  name="numbers" placeholder="输入验证码"><div><?php echo ($numbers); ?></div></li>
		<button class="loginBtn">登录</button>
	</ul>
</form>
</body>
</html>