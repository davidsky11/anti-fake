$(function(){
	var $anvlfteb=$('#anvlfteb'),
		$posbox=$anvlfteb.find('div.posbox'),
		$seledbox=$("#seledbox"),
		anvjson={
			bbs:'<a href="#"><img src="img/ico7.gif">抚州快讯</a>'+
				'<a href="#"><img src="img/ico17.gif">国内新闻</a>'+
				'<a href="#"><img src="img/ico3.gif">军事快讯</a>',
        	news:'<a href="#"><img src="img/ico7.gif">抚州快讯</a>'+
				'<a href="#"><img src="img/ico4.gif">抚州教育</a>'+
				'<a href="#"><img src="img/ico34.gif">江西快讯</a>'+
				'<a href="#"><img src="img/ico17.gif">国内新闻</a>'+
				'<a href="#"><img src="img/ico3.gif">军事快讯</a>',
        	post:'<a href="#"><img src="img/ico7.gif">抚州快讯</a>'+
				'<a href="#"><img src="img/ico4.gif">抚州教育</a>'+
				'<a href="#"><img src="img/ico17.gif">国内新闻</a>'+
				'<a href="#"><img src="img/ico3.gif">军事快讯</a>',
        	youhui:'<a href="#"><img src="img/ico7.gif">抚州快讯</a>'+
				'<a href="#"><img src="img/ico4.gif">抚州教育</a>'+
				'<a href="#"><img src="img/ico34.gif">江西快讯</a>'+
				'<a href="#"><img src="img/ico17.gif">国内新闻</a>'+
				'<a href="#"><img src="img/ico3.gif">军事快讯</a>',
        	other:'<a href="#"><img src="img/ico7.gif">抚州快讯</a>'+
				'<a href="#"><img src="img/ico4.gif">抚州教育</a>'+
				'<a href="#"><img src="img/ico17.gif">国内新闻</a>'+
				'<a href="#"><img src="img/ico3.gif">军事快讯</a>',
        	store:'<a href="#"><img src="img/ico7.gif">抚州快讯</a>'+
				'<a href="#"><img src="img/ico4.gif">抚州教育</a>'+
				'<a href="#"><img src="img/ico34.gif">江西快讯</a>'+
				'<a href="#"><img src="img/ico17.gif">国内新闻</a>'+
				'<a href="#"><img src="img/ico3.gif">军事快讯</a>'
		};
		 

		$posbox.mouseover(function(){
			var i=$(this).index();
			$(this).addClass("anvh").siblings().removeClass("anvh");
			var selec=$(this).attr("selec");
			if($seledbox.is(":hidden")){
				$seledbox.show().css("left",64*i+1).html("<div>"+anvjson[selec]+"</div>")
			}else{
				$seledbox.stop().animate({left:64*i+1},200,function(){
					$("#seledbox").html("<div>"+anvjson[selec]+"</div>")
				})
			}
		});
		$anvlfteb.mouseleave(function(){
			$seledbox.hide();
			$posbox.removeClass("anvh");
		})
})
