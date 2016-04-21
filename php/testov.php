<html>
	<head>
		<meta charset="utf-8" />
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript">
			var n = 5;
			$(document).ready(function(){
				$('.send').click(function(){
					$.post( "testov_script.php", 
						{
							text: n,
						},
						function(data){ $('.area').val(data);}
					);
				});
			});
		</script>
	</head>
	<body>
		<input class="test" type="text" />
		<div class="send">Отправить</div>
		<textarea class="area"></textarea>
	</body>
</html>