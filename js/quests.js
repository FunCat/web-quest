var maxheight = 0;

function resize(){
	$("div.quest_block").each(function() {
		if($(this).height() > maxheight)
			maxheight = $(this).height();
	});

	$("div.quest_block").height(maxheight);
}


$(document).ready(function(){
	$(window).resize(resize());
});