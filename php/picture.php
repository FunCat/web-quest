<?php
	include"../config.php";
	include"cookie.php";
	include "guest_script.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step5.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_picture.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_correct.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/ajaxupload.3.5.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/page_smothing.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(function(){
				var btnUpload = $('#upload');
				var status = $('#status');
				new AjaxUpload(btnUpload, {
					action: 'picture_script.php',
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
						var d = "<?php echo $_GET['d']; ?>";
						var str = "d="+d+"&file="+file;
						send_request(str);
					} else{
						$('<li></li>').appendTo('#files').text(file).addClass('error');
					}
					}
				}); 
			});

			$(document).ready(function(){
				$('.save_button').click(function(){


				});
			});


			function send_request(str)
			{
				var r = new XMLHttpRequest();

				var url = "upload_picture.php";
				var string = str;
				var vars = str;

				r.open("POST", url, true);

				r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				r.onreadystatechange = function(){
					if(r.readyState == 4 && r.status == 200){
						var return_data = r.responseText;

					}
				}

				r.send(vars);
			}
		</script>

		<!-- Yandex.Metrika counter -->
		<script type="text/javascript">
		    (function (d, w, c) {
		        (w[c] = w[c] || []).push(function() {
		            try {
		                w.yaCounter36841460 = new Ya.Metrika({
		                    id:36841460,
		                    clickmap:true,
		                    trackLinks:true,
		                    accurateTrackBounce:true,
		                    webvisor:true
		                });
		            } catch(e) { }
		        });

		        var n = d.getElementsByTagName("script")[0],
		            s = d.createElement("script"),
		            f = function () { n.parentNode.insertBefore(s, n); };
		        s.type = "text/javascript";
		        s.async = true;
		        s.src = "https://mc.yandex.ru/metrika/watch.js";

		        if (w.opera == "[object Opera]") {
		            d.addEventListener("DOMContentLoaded", f, false);
		        } else { f(); }
		    })(document, window, "yandex_metrika_callbacks");
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/36841460" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->
	</head>
	<body>
		<div class="logo">Web-quest</div>


		<?php 
			if(isset($_COOKIE['name'])){
		?>

		<div class="block_profile">
			<div class="profile">
				<?php echo $_COOKIE['log']; ?>
			</div>
			<form>
				<div class="form_profile" style="display: none;">
					<table>
						<tr>
							<td colspan="2" style="text-align:center;">Здравствуйте, <?php echo $_COOKIE['name']; ?></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;"><a href="kabinet.php">Личный кабинет</a></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<input type="submit" class="transition" id="but_ent" name = "but_exit" value="Выйти"/>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</div>

		<?php
			}else{
		?>
		<div class="block_profile">
			<div class="profile">
				Вход / Регистрация
			</div>
			<form>
				<div class="form_profile" style="display: none;">
					<table>
						<tr>
							<td>Логин:</td><td><input type="text" name="log_ent" id="log_ent"/></td>
						</tr>
						<tr>
							<td>Пароль:</td><td><input type="password" name="pass_ent" id="pass_ent"/></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<a href="registration.php">Регистрация</a><br />
								<input type="submit" class="transition" id="but_ent" name = "but_ent" value="Войти"/><br/>
								<input type="submit" class="guest" name="guest_mode" value="Гостевой режим" />
							</td>
						</tr>
					</table>
				</div>
			</form>
		</div>
		<?php } ?>


		<div class="wrap_center_menu">
			<div class="center_menu">
				<div class="menu_line">
					<a href="index.php"><div class="noactive_menu">Главная</div></a>
					<a href="quests.php"><div class="noactive_menu">Квесты</div></a>
					<div class="noactive_menu">Контакты</div>
				</div>

				<div class="content_menu">

					<?php 
						if(isset($_COOKIE["name"])){
					?>

					<div class="title_content_menu">
						Добавить картинки
					</div>
					<div class="wrap_main_steps_menu">
						<div class="wrap_main_text">

							<?php
								$test_id = $_COOKIE['num'];
								$n = $_GET['n'];
							?>
								<div class='wrapper_q_l'><div class='title_q_l'>Выберите вопрос: </div><select class='q_l' ONCHANGE="location.href =
    							'http://web-quest.hol.es/php/picture.php?n='+ this.options[this.selectedIndex].value">
    						<?php
								$result=mysqli_query($mysqli, "SELECT id, question FROM test WHERE info_test_id = '$test_id' ORDER BY id");
								$i = 1;
								while($row=mysqli_fetch_array($result))
								{
									if($i == $n)
										echo "<option value='".$i."&d=".$row["id"]."' selected>".$i." - ".$row["question"]."</option>";
									else
										echo "<option value='".$i."&d=".$row["id"]."'>".$i." - ".$row["question"]."</option>";
									$i++;
								}
								echo "</select></div>";
								$j = 1;
								$result=mysqli_query($mysqli, "SELECT question FROM test WHERE info_test_id = '$test_id' ORDER BY id");
								while($row=mysqli_fetch_array($result))
								{
									if($j == $n){
										echo "<div class='q'>".$row['question']."</div>";
										echo "<div id='mainbody'>
												<!-- Upload Button, use any id you wish-->
												<div id='upload'><span class='s'>Выбрать файл<span></div><span id='status'></span>

												<ul id='files'></ul>
											</div>";
										}
									$j++;
								}

							?>

						</div>
					</div>

					<div name="save" class="save_button">Сохранить</div>

					<?php
						}
						else
						{
					?>
							<div class="wrap_thanks">
								<div class="text_thanks">
									Вы не авторизовались!<br />
									<a href="index.php"><div class="mini_text">Перейти на главную странцу</div></a>
								</div>
							</div>
					<?php 
						} 
					?>
					
				</div>

				<div class="wrap_steps_line">
					<div class="but_back">
							<a href="step3.php" class="transition"><button class="back_button"><img class="back_pict" src="../img/but_back.png"/>Назад</button></a>
					</div>
					<div class="steps_line">
						<div class="stepl">
							<div class="left_coner_steps_act"></div>
							<div class="num_step_act">Шаг1</div>
							<div class="del_steps_act"></div>
							<div class="del_steps2_act"></div>
							<div class="num_step_act">Шаг2</div>
							<div class="del_steps_act"></div>
							<div class="del_steps2_act"></div>
							<div class="num_step_act">Шаг3</div>
							<div class="del_steps_act"></div>
							<div class="del_steps2_act"></div>
							<div class="num_step_act">Шаг4</div>
							<div class="del_steps_act"></div>
							<div class="del_steps2_act"></div>
							<div class="num_step_act">Шаг5</div>
							<div class="right_coner_steps_act"></div>
						</div>
					</div>

					<div class="but_next">
							<a href="step4.php" class="transition"><button class="next_button">Далее<img class="next_pict" src="../img/but_next.png"/></button></a>
					</div>
				</div>

			</div>
		</div>

	</body>
</html>
