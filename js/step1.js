$(document).ready(function(){
	$(".regist_but").click(function(){
		$(".content_menu").animate({"height" : "0px"}, 1000, function(){
			$('.wrap_buttons').css('display', 'none');
			$('.step_first').css('display', 'block');
		});
		$(".content_menu").animate({"height" : "680px"}, 1000);
	});
	$(".enter_but").click(function(){
		$(".content_menu").animate({"height" : "0px"}, 1000, function(){
			$('.wrap_buttons').css('display', 'none');
			$('.step_first_enter').css('display', 'block');
		});
		$(".content_menu").animate({"height" : "300px"}, 1000);
	});
});