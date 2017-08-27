//----加载-----
var n = 0;
var pic_load = ["http://localhost/devxiyue/Public/Home/img/bg.png", "http://localhost/devxiyue/Public/Home/img/back_pic.png", "http://localhost/devxiyue/Public/Home/img/background.png", "http://localhost/devxiyue/Public/Home/img/barbg.gif", "http://localhost/devxiyue/Public/Home/img/bed.png", "http://localhost/devxiyue/Public/Home/img/block.png", "http://localhost/devxiyue/Public/Home/img/boult.png", "http://localhost/devxiyue/Public/Home/img/building.png", "http://localhost/devxiyue/Public/Home/img/choose_left.png", "http://localhost/devxiyue/Public/Home/img/choose_right.png", "http://localhost/devxiyue/Public/Home/img/code.png", "http://localhost/devxiyue/Public/Home/img/moto.png", "http://localhost/devxiyue/Public/Home/img/enter.png", "http://localhost/devxiyue/Public/Home/img/email.png", "http://localhost/devxiyue/Public/Home/img/gold.png", "http://localhost/devxiyue/Public/Home/img/green.png", "http://localhost/devxiyue/Public/Home/img/maidi.png", "http://localhost/devxiyue/Public/Home/img/main_bootom_add.png", "http://localhost/devxiyue/Public/Home/img/main_firm.png", "http://localhost/devxiyue/Public/Home/img/people1.png", "http://localhost/devxiyue/Public/Home/img/people2.png", "http://localhost/devxiyue/Public/Home/img/people3.png", "http://localhost/devxiyue/Public/Home/img/main_shop.png", "http://localhost/devxiyue/Public/Home/img/main_task.png", "http://localhost/devxiyue/Public/Home/img/wait.gif", "http://localhost/devxiyue/Public/Home/img/shop.png", "http://localhost/devxiyue/Public/Home/img/mall_101.png", "http://localhost/devxiyue/Public/Home/img/mall_102.png", "http://localhost/devxiyue/Public/Home/img/mall_103.png", "http://localhost/devxiyue/Public/Home/img/mall_104.png", "http://localhost/devxiyue/Public/Home/img/mall_105.png", "http://localhost/devxiyue/Public/Home/img/staff.png", "http://localhost/devxiyue/Public/Home/img/staff1_pic.png", "http://localhost/devxiyue/Public/Home/img/staff2_pic.png", "http://localhost/devxiyue/Public/Home/img/staff3_pic.png", "http://localhost/devxiyue/Public/Home/img/carw.png", "http://localhost/devxiyue/Public/Home/img/pic_gold.png", "http://localhost/devxiyue/Public/Home/img/carbb.png", "http://localhost/devxiyue/Public/Home/img/pic_safe.png"];
for(var i = 0; i < pic_load.length; i++) {
	var imgStr = pic_load[i];
	var oneImg = new Image();
	oneImg.src = imgStr;
	oneImg.onload = function() {
		n++;
		if(n >= 39) {
			$('.text_wait').hide();
			$('.main_box').show();
		}
	}
}

$("#reg").click(function() {
	$(".regMask").show();
});
$(".regMask .main_close").click(function() {
	$(".regMask").hide();
});


$("#goods").click(function() {
	$(".goodsMask").show();
});

$(".goodsMask .main_close").click(function() {
	$(".goodsMask").hide();
});

$("#transact").click(function() {
	$(".transactMask").show();
});
$(".transactMask .main_close").click(function() {
	$(".transactMask").hide();
});

$("#liushui").click(function() {
	$(".liushuiMask").show();
});
$(".liushuiMask .main_close").click(function() {
	$(".liushuiMask").hide();
});

$("#xiaji").click(function() {
	$(".xiajiMask").show();
});
$(".xiajiMask .main_close").click(function() {
	$(".xiajiMask").hide();
});

$(".buyy").click(function() {
	$(".sureBuyMask").show();
	var buyMoney=$(this).attr('data-money');
	var id=$(this).attr('data-id');
	$("#buyMoney").val(buyMoney)
	$("#goodsId").val(id)
	
});


$(".sureBuyMask .setUp_return").click(function() {
	 $(".sureBuyMask").hide();
});



// 入驻商铺
$(".openRuzhu").click(function() {
	$(".ruzhuMask").show()
});

$(".ruzhuMask .setUp_return").click(function() {
	$(".ruzhuMask").hide()
});

// 当前商铺货品
$(".openHuopin").click(function() {
	$(".huopinMask").show()
});

$(".huopinMask .setUp_return").click(function() {
	$(".huopinMask").hide()
});


// 已拥有货柜
$(".openHuigui").click(function() {
	$(".huoguiMask").show()
});
$(".huoguiMask .setUp_return").click(function() {
	$(".huoguiMask").hide()
});



// 我的货柜开关
$(".openMyHuogui").click(function() {
	$(".myHuoguiMask").show()
});
$(".myHuoguiMask .setUp_return").click(function() {
	$(".myHuoguiMask").hide()
});



// 金币开通
$(".openjinbi").click(function() {
	var id=Number($(this).attr("data-id"));
	var that=$("#jinbTitle").get(0);
	switch(id) {
		case 1:
			 $(that).html("一号货柜金币开通")
			break;
		case 2:
			 $(that).html("二号货柜金币开通")
			break;
		case 3:
			 $(that).html("三号货柜金币开通")
			break;
		case 4:
			 $(that).html("四号货柜金币开通")
			break;
		case 5:
			 $(that).html("五号货柜金币开通")
			break;
	}
	$("#zmdID").val(id);
	$(".jinbiMask").show()

});
$(".jinbiMask .setUp_return").click(function() {
	$(".jinbiMask").hide()
});


// 知名度开通
$(".openZmd").click(function() {
	var id=Number($(this).attr("data-id"));
	var that=$("#zmdTitle").get(0);
	switch(id) {
		case 1:
			 $(that).html("一号货柜知名度开通")
			break;
		case 2:
			 $(that).html("二号货柜知名度开通")
			break;
		case 3:
			 $(that).html("三号货柜知名度开通")
			break;
		case 4:
			 $(that).html("四号货柜知名度开通")
			break;
		case 5:
			 $(that).html("五号货柜知名度开通")
			break;
	}
	$("#zmdID").val(id);
	$(".zmdMask").show()

});
$(".zmdMask .setUp_return").click(function() {
	$(".zmdMask").hide()
});

// 增加货品开通
$(".addgoods").click(function() {
	var id=Number($(this).attr("data-id"));
	var that=$("#addGoodsTitle").get(0);
	switch(id) {
		case 1:
			 $(that).html("一号货柜增加货品")
			break;
		case 2:
			 $(that).html("二号货柜增加货品")
			break;
		case 3:
			 $(that).html("三号货柜增加货品")
			break;
		case 4:
			 $(that).html("四号货柜增加货品")
			break;
		case 5:
			 $(that).html("五号货柜增加货品")
			break;
	}
	$("#addgoodsID").val(id);
	$(".addGoodsMask").show()

});
$(".addGoodsMask .setUp_return").click(function() {
	$(".addGoodsMask").hide()
});


// 一星商铺
$("#firstMask").click(function() {
	$(".firstStore").show();
});
$(".firstStore .main_close").click(function() {
	$(".firstStore").hide();
});


$("#duihuan .huobi").on('input', function(event) {
	var n=(Number($(this).val())*0.7).toFixed(2);
	  $(".xiyuebi").val(n)
});

$("#duihuan .xiyuebi1").on('input', function(event) {
	var n=$(this).val();
	  $(".huobi1").val(n)
});

$("#duihuan .xiyuebi2").on('input', function(event) {
	var n=$(this).val();
	  $(".jifen1").val(n)
});


$("#duihuan .huobi2").on('input', function(event) {
	var n=(Number($(this).val())*0.7).toFixed(2);
	 $(".jifen").val(n)
});


$(".financeMask .main_close").click(function() {
	$(".financeMask").hide()
});
$("#openfinnace").click(function() {
	$(".financeMask").show()
});


$("#jiaoyiNUM").on('input',  function(event) {
	var n=(Number($(this).val())*0.1).toFixed(2); 
   $("#shouxu").val(n)
   $("#yinhang").val(n)
});



// 个人中心开关
$(".openMY").click(function() {
	$(".myMask").show();
});
// 个人中心开关
$(".myMask .main_close").click(function() {
	$(".myMask").hide();
});


// 修改密码一开关
$(".openPwd1").click(function() {
	 $(".modifyMask1").show(); 
});
$(".modifyMask1 .setUp_return").click(function() {
	 $(".modifyMask1").hide(); 
});
// 修改密二开关
$(".openPwd2").click(function() {
	 $(".modifyMask2").show(); 
});
$(".modifyMask2 .setUp_return").click(function() {
	 $(".modifyMask2").hide(); 
});