var maxheight = 0;

$(document).ready(function(){
	$("div.quest_block").each(function() {
		if($(this).height() > maxheight)
			maxheight = $(this).height();
	});

	$("div.quest_block").height(maxheight);
});