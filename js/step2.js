var ind = 1;


function disappend(name){
	$(name).detach();
}

$(document).ready(function(){
	$('.plus').click(function(){
		ind++;
		var buf_name = "<div class='role_block block_";
		buf_name += ind;
		buf_name +="'><div class='title_role'>Роль:</div><div class='pole_role'><input type='text' /></div><img class='close_pict' src='../img/close.png' onclick=\"disappend('";
		buf_name +=".block_"+ind;
		buf_name += "\')\" /></div>";
		$('.roles').append(buf_name);
	});
});