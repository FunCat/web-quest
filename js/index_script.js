function window_res(){
	$(".wrap_info").css({
		"width": $(window).width() - 440 + "px",
	});
}

//Вызывается функий для измения размера при изменении размеров экрана
$(window).resize(function(){window_res();});

$(document).ready(function(){
	window_res();
	

	//Анимация выезжания блока профиля
		//При наведении курсора
	$(".block_profile").mouseenter(function(){
		$(".block_profile").animate({"height" : "85px"}, 300);
		$(".profile").animate({"padding-top" : "40px"}, 300);
	});
		//При отводе курсора
	$(".block_profile").mouseleave(function(){
		$(".block_profile").animate({"height" : "60px"}, 300);
		$(".profile").animate({"padding-top" : "15px"}, 300);
		$(".form_profile").css("display", "none");
	});
	$(".block_profile").click(function(){
		$(".block_profile").animate({"height" : "230px"}, 300);
		$(".profile").animate({"padding-top" : "15px"}, 300);
		$(".form_profile").css("display", "block");
	});


});