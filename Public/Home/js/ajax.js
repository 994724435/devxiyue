// 开通金币
$("#openJjinb").click(function() {
	 $.ajax({
	   type: "POST",
	   url: "",
	   data: {
	   	  id:$("#jinbID").val(),
	   	  num:$("#jinbNum").val()
	   },
	   success: function(msg){
	     alert( "Data Saved: " + msg );
	   },
	   error:function(err){
	   	   console.log(err)
	   }
	});
});

// 开通知名度
$("#openZmd").click(function() {
	 $.ajax({
	   type: "POST",
	   url: "",
	   data: {
	   	  id:$("#zmdID").val(),
	   	  num:$("#zmdNum").val()
	   },
	   success: function(msg){
	     alert( "Data Saved: " + msg );
	   },
	   error:function(err){
	   	   console.log(err)
	   }
	});
});


// 增加货品数量
$("#opengoods").click(function() {
	 $.ajax({
	   type: "POST",
	   url: "",
	   data: {
	   	  id:$("#addgoodsID").val(),
	   	  num:$("#goodsNUM").val()
	   },
	   success: function(msg){
	     alert( "Data Saved: " + msg );
	   },
	   error:function(err){
	   	   console.log(err)
	   }
	});
});