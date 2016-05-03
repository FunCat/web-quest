<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/ajaxupload.3.5.js"></script>
		<script type="text/javascript">
		$(function(){
			var btnUpload=$('#upload');
			var status=$('#status');
			new AjaxUpload(btnUpload, {
				action: 'upload.php',
				name: 'uploadfile',
				onSubmit: function(file, ext){
				if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					// extension is not allowed 
					status.text('Поддерживаемые форматы JPG, PNG или GIF');
					return false;
				}
				status.text('Загрузка...');
				},
				onComplete: function(file, response){
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files').html('<img src="../img/uploads/'+file+'" alt="" /><br />'+file).addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
				}
			}); 
		});
		</script>
	</head>
	<body>
		<div id="mainbody">
			<!-- Upload Button, use any id you wish-->
			<div id="upload"><span>Выбрать файл<span></div><span id="status"></span>

			<ul id="files"></ul>
		</div>
	</body>
</html>