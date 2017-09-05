var arrlist =  JSON.parse(localStorage.getItem("arrlist"));
//----加载-----
var n = 0;
var pic_load = ["http://366757.ouyouhui.com/Public/Home/img/bg.png", "http://366757.ouyouhui.com/Public/Home/img/back_pic.png", "http://366757.ouyouhui.com/Public/Home/img/background.png", "http://366757.ouyouhui.com/Public/Home/img/barbg.gif", "http://366757.ouyouhui.com/Public/Home/img/bed.png", "http://366757.ouyouhui.com/Public/Home/img/block.png", "http://366757.ouyouhui.com/Public/Home/img/boult.png", "http://366757.ouyouhui.com/Public/Home/img/building.png", "http://366757.ouyouhui.com/Public/Home/img/choose_left.png", "http://366757.ouyouhui.com/Public/Home/img/choose_right.png", "http://366757.ouyouhui.com/Public/Home/img/code.png", "http://366757.ouyouhui.com/Public/Home/img/moto.png", "http://366757.ouyouhui.com/Public/Home/img/enter.png", "http://366757.ouyouhui.com/Public/Home/img/email.png", "http://366757.ouyouhui.com/Public/Home/img/gold.png", "http://366757.ouyouhui.com/Public/Home/img/green.png", "http://366757.ouyouhui.com/Public/Home/img/maidi.png", "http://366757.ouyouhui.com/Public/Home/img/main_bootom_add.png", "http://366757.ouyouhui.com/Public/Home/img/main_firm.png", "http://366757.ouyouhui.com/Public/Home/img/people1.png", "http://366757.ouyouhui.com/Public/Home/img/people2.png", "http://366757.ouyouhui.com/Public/Home/img/people3.png", "http://366757.ouyouhui.com/Public/Home/img/main_shop.png", "http://366757.ouyouhui.com/Public/Home/img/main_task.png", "http://366757.ouyouhui.com/Public/Home/img/wait.gif", "http://366757.ouyouhui.com/Public/Home/img/shop.png", "http://366757.ouyouhui.com/Public/Home/img/mall_101.png", "http://366757.ouyouhui.com/Public/Home/img/mall_102.png", "http://366757.ouyouhui.com/Public/Home/img/mall_103.png", "http://366757.ouyouhui.com/Public/Home/img/mall_104.png", "http://366757.ouyouhui.com/Public/Home/img/mall_105.png", "http://366757.ouyouhui.com/Public/Home/img/staff.png", "http://366757.ouyouhui.com/Public/Home/img/staff1_pic.png", "http://366757.ouyouhui.com/Public/Home/img/staff2_pic.png", "http://366757.ouyouhui.com/Public/Home/img/staff3_pic.png", "http://366757.ouyouhui.com/Public/Home/img/carw.png", "http://366757.ouyouhui.com/Public/Home/img/pic_gold.png", "http://366757.ouyouhui.com/Public/Home/img/carbb.png", "http://366757.ouyouhui.com/Public/Home/img/pic_safe.png"];
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
//加载完成后，加载用户信息
jiazai();

//---------底部导航栏----------
$('.changMain').on("click", function() {
	var mengban = $(this).index() - 1;
	$(".mengban").hide();
	$(".main_mengban").hide();
	$(".emailContent").hide();
	$(".main_second_mengban").hide();
	$(".mengban").eq(mengban).show();
	console.log(mengban)
	if(mengban == 2) {
		myrabbit(5);
		$(".industry_branch").html("");
		fenpeibefor();
	};
	if(mengban == 1) {
		$(".shop_list").html("");
		list();
	};
});
$(".main_close").click(function() {
	$(".mengban").hide();
	$(".main_mengban").hide();
	$(".emailContent").hide();
	$(".main_second_mengban").hide();
	$(".staffContent").hide();
	$('.main_game_bland').removeClass('cur');
	$(".shopInContent").hide();
	$(".branch").hide();
});
$(".companyJ").click(function() {
	$(".main_mengban2").show();
	$(".main_mengban2 .main_body_pop").show();
	return false;
});
$(".companyY").click(function() {
	$(".main_mengban4").show();
	$(".main_mengban4 .allPeople").show();
	myrabbit(5);
	return false;
});

$('.main_game_bland').click(function() {
	var main_game_bland = $(this).index();
	$(".box").val($(this).index());
	if($(this).find(".build_img").attr("src") != "") {
		if($(this).find(".build_img").attr("src") == "http://366757.ouyouhui.com/Public/Home/img_b/0.png") {

			$(".choose_shop").show();
			return false
		}
		$(".main_mengban3").show();
		$(".shopInContent").show();
		var floorid = $(".box").val();
		farminfo1(floorid);
		
		var fid = $(".fid100").eq($(".box").val()-3).val()*1-1;
		$(".shopTopHead1").text(louName[fid]);
		return false
	}
	$(this).addClass("cur").siblings().removeClass('cur');
	$(".main_mai").show();
	$("#coor").html($(this).attr('data-number'));
});
$(".maidi_sure").click(function() {
	$(".main_mengban").hide();
	$(".choose_shop").show();
});
//------选择店铺轮播--------
var contentDiv = document.getElementById('content');
var index = 0;
$("#left").click(function() {
	if(index == 0) {
		index = 28;
		contentDiv.style.left = -1 * index + 'rem';
	}
	index--;
	scroll();
	moneyNumber();

	return index;

});
$("#right").click(function() {
	if(index == 28) {
		index = 0;
		contentDiv.style.left = 0;
	}
	index++;
	scroll();
	moneyNumber();
	return index;

});

$(".maidi_sure").on("click", function() {
	moneyNumber();
	$("#gold_number").html($("#gold_number").html() - $('#di_money').html());
	
	//调用接口，开垦土地
	var floorid = $(".box").val();
	var f_id = $("#louceng").val() * 1 + 1;
	kaiken(f_id, floorid);
	jiazai();

});
$(".shop_sure").on("click", function() {

	choosePhoto();
	$("#gold_number").html($("#gold_number").html() - $('#money').html());
	//调用接口建造房子		
	var floorid = $(".box").val();
	var f_id = $("#louceng").val() * 1 + 1;
	fence(f_id, floorid);
	jiazai();
});

var timer1;

function scroll() {
	var t = 0;
	var b = contentDiv.offsetLeft;
	var c = -1 * index - b;
	var d = 10;

	function move() {
		t++;
		contentDiv.style.left = Tween.Cubic.easeInOut(t, b, c, d) + 'rem';
		if(t == 10) {
			clearInterval(timer1);
		}
	}
	clearInterval(timer1);
	timer1 = setInterval(move, 10);
}

function choosePhoto() {
	var index1 = $(".box").val() - 3;
	var index2 = $(".box").val() - 3;
	if(index2 < 0) {
		index2 = 0;
	}
	$(".building").eq(index2).show();
	styleCss();

	setTimeout(function() {
		$(".building").hide();
		jiazai()
		$(".blank").hide();
		$(".yindaoC").show();

	}, 5000);
};

function styleCss() {
	$(".main_mengban").hide();
	$(".blank").show();
	$(".cur").removeClass('cur');
	var x = 0;
	y = 0;
	var a = setInterval(function() {
		if(y <= -4) {
			y = 0;
			x -= 0.8;
			if(x <= -3.2) {
				x = -0.8
				clearTimeout(a)
			}
		}
		y -= 1;
		$(".building").css("background-position", x + 'rem ' + y + 'rem')
	}, 250);
};

function moneyNumber() {
	if(index == 0) {
		$("#money").text("0");
	} else if(index == 1) {
		$("#money").text("100");
	} else if(index == 2) {
		$("#money").text("150");
	} else if(index == 3) {
		$("#money").text("200");
	} else if(index == 4) {
		$("#money").text("250");
	} else if(index == 5) {
		$("#money").text("350");
	} else if(index == 6) {
		$("#money").text("450");
	} else if(index == 7) {
		$("#money").text("550");
	} else if(index == 8) {
		$("#money").text("650");
	} else if(index == 9) {
		$("#money").text("750");
	} else if(index == 10) {
		$("#money").text("900");
	} else if(index == 11) {
		$("#money").text("1050");
	} else if(index == 12) {
		$("#money").text("1200");
	} else if(index == 13) {
		$("#money").text("1350");
	} else if(index == 14) {
		$("#money").text("1500");
	} else if(index == 15) {
		$("#money").text("1700");
	} else if(index == 16) {
		$("#money").text("1900");
	} else if(index == 17) {
		$("#money").text("2100");
	} else if(index == 18) {
		$("#money").text("2300");
	} else if(index == 19) {
		$("#money").text("2500");
	} else if(index == 20) {
		$("#money").text("2750");
	} else if(index == 21) {
		$("#money").text("3000");
	} else if(index == 22) {
		$("#money").text("3250");
	} else if(index == 23) {
		$("#money").text("3500");
	} else if(index == 24) {
		$("#money").text("3750");
	} else if(index == 25) {
		$("#money").text("4050");
	} else if(index == 26) {
		$("#money").text("4350");
	} else if(index == 27) {
		$("#money").text("4650");
	} else if(index == 28) {
		$("#money").text("0");
	}
};
//------------更换形象--------------
$(".head_box").click(function() {
	jiazai();
	$(".main_add_pe").show();
});
$(".head_return").click(function() {
	$(".main_add_pe").show();
	$(".change_head").hide();
});
$(".chang_messBtn").click(function() {
	$(".change_head").show();
});
$(".choose_head").on("click", ".changHead", function() {
	$(this).addClass("changHeadCur").siblings().removeClass('changHeadCur');
	$(this).children().addClass("greenCur").parent().siblings().children().removeClass('greenCur');
	var change = $(this).find('img').attr('src');
	$(".changSave").on("click", function() {
		$(".change_head_img").attr('src', change);
		$(".mess_img").attr('src', change);
		$(".change_head").hide();
		$(".changSaveBtn").on("click", function() {
			$(".topHead").attr('src', change);
			$(".main_add_pe").hide();
		});
	});
});

//------------公司--------------
$("#main_com_qu").click(function() {
	$(".main_second_mengban").show();
	$(".body_second").show();
});
$("#main_com_cun").click(function() {
	$(".main_second_mengban").show();
	$(".body_three").show();
});

$(".main_com_return").click(function() {
	$(".main_second_mengban").hide();
	$(".main_body_second").hide();
});

//------------更多--------------
$('.main_add').on("click", function() {
	var main_add = $(this).index();
	$(".main_add_div").hide();
	$(".main_add_div").eq(main_add).show();
});
//------交易中心------
$('.fenye_exchange li').on("click", function() {
	$(this).addClass("exchange_cur").siblings().removeClass('exchange_cur');
	var add_saexbuy = $(this).index();
	$(".add_saexbuy").hide();
	$(".add_saexbuy").eq(add_saexbuy).show();
});

//*------邮件-------
$('.fenye_email li').on("click", function() {
	var add_emailEG = $(this).index();
	$(this).addClass("exchange_cur").siblings().removeClass('exchange_cur');
	$(".add_emailEG").hide();
	$(".add_emailEG").eq(add_emailEG).show();
});

$(".main_add_em").click(function() {
	$(".emailEM").show();
	$(".emailGM").hide();
	$(".main_add_e .exchange_cur").removeClass('exchange_cur');
	$(".email_inbox").addClass('exchange_cur');
});

///------------------店铺列表-------------------
function animate() {
	$(".charts").each(function(i, item) {
		var a = parseInt($(item).attr("w"));
		$(item).animate({
			width: a + "%"
		}, 1000);
	});
}
animate();

$(".shop_list").on("click", ".shop_body_li", function() {
	$(".shopInContent").show();
	var floorid = $(".f_id2").eq($(this).index()).val();
	farminfo(floorid);
	$(".shopTopHead1").text(louName[arrlist[($(this).index()-1)]]);
});
$(".shopReturn").click(function() {
	$(".shopOnContent").show();
	$(".shopInContent").hide();
});
$(".shopBtn").click(function() {
	$(".main_up").show();
	var fid = $(".fid100").eq($(".box").val()-3).val();
	//调取接口升级店铺0.
	upgrade(fid);
	jiazai();
});
$(".noUpBtn,.noDownBtn,.addBedBtn,.takeBtn").click(function() {
	$(".main_second_mengban").hide();
});

//------------------员工列表-------------------
$('.fenye_staff li').on("click", function() {
	$(this).addClass("exchange_cur").siblings().removeClass('exchange_cur');
	var industry = $(this).index();
	$(".industry").hide();
	$(".industry").eq(industry).show();
});
$(".staff_bed").click(function() {
	$(".main_addBed").show();

});
$(".staff_recruit").click(function() {
	$(".staffRecruit").show();
});
$(".industry").on("click", ".industry_li", function() {
	$(".staffContent").show();
	var aa = $(this).index();
	var fid = $(".box").val();
	var id = JSON.parse(localStorage.getItem("yuangongid"))[aa];
	var ygtype = $(".ygtype").eq($(this).index()).val();
	$(".staffIn_li1").find("img").attr("src","http://366757.ouyouhui.com/Public/Home/img/head0"+ygtype+".png")
	
	info(id);
	$(".staffOut").on("click", function() {
		$(".staff_out").show();			
	});	
	$(".jiegu").on("click", function() {
		out(id);
		jiazai();
		$(".mengban").hide();
		$(".staffContent").hide();
		$(".shopInContent").hide();
		$(".branch").hide();
	});
	//分配工作
	$(".staffDis").on("click", function() {
		$(".branch").show();
		$(".staffContent").hide();
	});
	//点击进行分配工作
	$(".industry_branch").on("click", ".branch_li2", function(event) {
		event.stopPropagation();
		var fid = $(".f_id3").eq($(this).parent().parent().index()).val();		
		fenpei(fid, id);
		jiazai();
		$(".mengban").hide();
		$(".staffContent").hide();
		$(".shopInContent").hide();
		$(".branch").hide();
	});
});

$(".staffReturn").click(function() {
	$(".staffOn").show();
	$(".staffContent").hide();
	$(".main_second_mengban").hide();
});
$(".staffDel").click(function() {
	$(".staff_up").show();
});

$('.fenye_branch li').on("click", function() {
	$(this).addClass("exchange_cur").siblings().removeClass('exchange_cur');
	var industry_branch = $(this).index();
	$(".industry_branch").hide();
	$(".industry_branch").eq(industry_branch).show();
});

$(".branch_return").click(function() {
	$(".staffContent").show();
	$(".branch").hide();
});

//----------动画-------
var right2 = "right";
var top2 = "top";
var right3 = "right";
var top3 = "top";

(function() {
	var css = {
		'left': '4rem',
		'top': '3.8rem'
	};
	if(right3 === 'right' && top3 === 'top') {
		right3 = 'left';
		top3 = 'bottom';
		css.left = '6.32rem';
		css.top = '2.3rem';
		$(".carogold").css({
			"background": "url(http://366757.ouyouhui.com/Public/Home/img/cary.png) no-repeat",
			"background-size": "100% 100%"
		});
	} else {
		right3 = 'right';
		top3 = 'top';
		$(".carogold").css({
			"background": "url(http://366757.ouyouhui.com/Public/Home/img/carry.png) no-repeat",
			"background-size": "100% 100%"
		});
	}
	$('.carogold').animate(css, 10000, arguments.callee);
})();

//----------任务-----------
$(".renwu_ling").click(function() {
	$(".main_take").show();
});

//补货
$(".shopRepair").on("click", function() {
	var fid = $(".fid100").eq($(".box").val()-3).val();
	feed(fid);
	jiazai();
});
//招聘员工
$(".recruitInUp").on("click", function() {
	var type = $(this).index() + 1;
	buyrabbit(type);
	jiazai();
})

//出售列表
$(".exchange_mail").on("click", function() {
	scaleCen();
	var sid = $("#sid").val();
	console.log(sid);

})
$(".exchange_buy").on("click", function() {
	buyCen();
});
$(document).ready(function(){
	 $("#gamer_gold").blur(function(){
		var gamerGold = $("#gamer_gold").val();
	    $("#can_counter").text(gamerGold*0.01);
	    $("#total_glod").text(Number(gamerGold)+Number(gamerGold*0.01));
	});
});
//---------游戏设置--------------
$(".setUp_return").click(function(){
	$(".setUp_in").hide();
	$(".setUp_on").show();
});	
$(".setUpBtn .setUp_li").on("click", function() {
	var  setUp_li = $(this).index();
	$(".setUp_on").hide();
	$(".setUp_in").eq(setUp_li).show();
});	



