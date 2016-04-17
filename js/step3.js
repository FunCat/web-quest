var ind = 1;
var v = 2;

function add_question(){
	ind++;
	var buffer = "<div class='questions question_"+ind+"' value='2'>";
	buffer +=	"<div class='question_block block_"+ind+"'>";
	buffer +=	"<div class='block_quest'><div class='text_quest'>Вопрос:</div>";
	buffer +=	"<div class='block_for_quest'><input name='questions' class='input_text_quest' type='text' /><img class='close_pict del_quest' src='../img/close.png'  onclick=\"del_question(\'.question_"+ind+"\')\"></div>";
	buffer +=	"</div><div class='block_answer'><div class='text_answer'>";
	buffer +=	"Варианты ответа:<img class='plus' src='../img/plus.png'  onclick=\"add_var('.question_"+ind+" .block_answer', 'question_"+ind+"')\"/></div>";
	buffer +=	"<div class='var_answer var_1'><input name='question_"+ind+"' type='radio'><input name='ans_question_"+ind+"' class='box_answer' type='text' /></input><img class='close_pict' src='../img/close.png' onclick=\"del_var(\'.question_"+ind+" .var_1\', \'.question_"+ind+"\')\"></div>";
	buffer +=	"<div class='var_answer var_2'><input name='question_"+ind+"' type='radio'><input name='ans_question_"+ind+"' class='box_answer' type='text' /></input><img class='close_pict' src='../img/close.png' onclick=\"del_var(\'.question_"+ind+" .var_2\', \'.question_"+ind+"\')\"></div>";
	buffer +=	"</div></div></div>";
	$('.wrap_question').append(buffer);
}

function add_var(name, val){
	v++;
	var buffer = "<div class='var_answer var_"+v+"'><input name='"+val+"' type='radio'>";
	buffer += "<input name='ans_"+val+"' class='box_answer' type='text' /></input><img class='close_pict' src='../img/close.png' onclick=\"del_var(\'."+val+" .var_"+v+"\', \'."+val+"\')\">";
	buffer += "</div>"
	$(name).append(buffer);
	$b = $('.'+val).attr("value");
	$b++;
	$('.'+val).attr("value",$b);
}

function del_question(name){
	$(name).detach();
}

function del_var(name, val){
	$(name).detach();
	$b = $(val).attr("value");
	$b--;
	$(val).attr("value",$b);
}

