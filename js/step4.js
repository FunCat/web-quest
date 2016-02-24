var ind = 1;


function add_book(){
	ind++;
	var buf = "<div class='books book_"+ind+"'><div class='book_block block_"+ind+"'>";
	buf += "<div class='block_book'><div class='text_book'>Источник:</div>";
	buf += "<div class='block_for_book'><input class='input_text_book' type='text'/><img src='../img/close.png' class='close_pict' onclick=\"del_book(\'.book_"+ind+"\')\"/></div>";
	buf += "</div><div class='block_book'><div class='text_book'>Электронный адрес:</div><div class='block_for_book'>";
	buf += "<input class='input_text_book' type='text' style='width:400px;'/></div></div></div></div>";
	$('.wrap_book').append(buf);
}

function del_book(name){
	$(name).detach();
}