var ind = 1;
var col = 1;


function disappend(name){
	$(name).detach();
	col--;
}

$(document).ready(function(){
	$('.plus').click(function(){
		if(col < 6){
			ind++;
			col++;
			var buf_name = "<div class='role_block block_";
			buf_name += ind;
			buf_name +="'><div class='title_role'>Роль:</div><div class='pole_role'><input type='text' name='role[]'/></div><img class='close_pict' src='../img/close.png' onclick=\"disappend('";
			buf_name +=".block_"+ind;
			buf_name += "\')\" /></div>";
			$('.roles').append(buf_name);
		}
		else{
			alert("Больше нельзя добавлять роли.");
		}
	});
});