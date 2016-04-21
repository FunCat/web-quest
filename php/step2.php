<?php
	include "../config.php";
	include "cookie.php";
	include "step2_script.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_correct.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step2.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/step2.js" type="text/javascript"></script>
		<script src="../js/page_smothing.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#add_rol").change(function(){
					if($(this).prop("checked"))
						$(".wrap_role").fadeIn().show;
					else
						$(".wrap_role").fadeOut(500);
				});
			});
		</script>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 2d39850758ca10e1aa5d916ffb67306d9209b81b
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
<<<<<<< HEAD
=======
=======
>>>>>>> 36280587c97de042c38fbc66d1f2f7c3d5dd39b0
>>>>>>> 2d39850758ca10e1aa5d916ffb67306d9209b81b
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
								<input type="submit" class="transition" id="but_ent" name = "but_ent" value="Войти"/>
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
				<form method="post" action="step2.php">
					<div class="content_menu">

						<?php 
							if(isset($_COOKIE["name"])){
								$logres = $_COOKIE["log"];

								$result_stud = mysqli_query($mysqli, "SELECT * FROM student WHERE student.login =  '$logres'");
								$bol_enter_stud = mysqli_num_rows($result_stud);

								$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.login =  '$logres'");
								$bol_enter_teach = mysqli_num_rows($result_teach);


								if($bol_enter_stud == 1){
							?>
								<div class="wrap_thanks">
									<div class="text_thanks">
										Создавать Web-quest может только преподаватель!<br />
										<a href="index.php"><div class="mini_text">Перейти на главную странцу</div></a>
									</div>
								</div>
							<?php 

								}
								else if($bol_enter_teach == 1){
							?>


						<div class="title_content_menu">
							Шаг 2
						</div>
						<div class="wrap_main_steps_menu">
							<div class="wrap_main_text">
								<div class="subtitle_step2">Название Web-questa:</div>
								<input type="text" class="list_tipy" name="test_name"/>
								<div class="subtitle_step2">Выберите область Web-questa:</div>
								<select name="val_top" class="list_tipy">
									<option value="1">Базы данных</option>
									<option value="2">Безопасность</option>
									<option value="3">Биология</option>
									<option value="4">Информатика</option>
									<option value="5">Информационная безопасность</option>
									<option value="6">Литература</option>
									<option value="7">Математика</option>
									<option value="8">Операционные системы</option>
									<option value="9">Программирование</option>
									<option value="10">Русский язык</option>
									<option value="11">Сетевые технологии</option>
									<option value="12">Физика</option>
									<option value="13">Химия</option>
									<option value="14">Экономика</option>
									<option>Другая...</option>
								</select><br />
								<!--<div class="checkbox">
									<input id="add_works" type="checkbox" />
									<label for="add_works">Добавить возможность получения работ обучающихся</label><br />
									<input id="add_messsage" type="checkbox"/>
									<label for="add_messsage">Добавить систему Сообщений для общения с обучающимися</label>
								<br />
								</div>-->
								<div class="subtitle_step2">Выберите тип доступа:</div>
								<div class="radio">
									<input id="r_all" name="type_test" type="radio" value="1" checked/>
									<label for="r_all">Общедоступный</label>
									<input id="r_link" name="type_test" type="radio" value="2"/>
									<label for="r_link">Доступ по ссылке</label>
									<input id="r_permission" name="type_test" type="radio" value="3">
									<label for="r_permission">Доступ по разрешению</label>
									<input id="r_close" name="type_test" type="radio" value="4"/>
									<label for="r_close">Закрытый доступ</label><br />
								</div>
								<div class="checkbox">
									<input id="add_rol" name="add_rol" type="checkbox"/>
									<label for="add_rol">Добавить ролевые возможности</label><br />
								</div>

								<div class="wrap_role" style="display: none;">
									<div class="title_roles">Перечень ролей:<img class="plus" src="../img/plus.png" /></div>
									<div class="roles">
										<div class="role_block block_1">
											<div class="title_role">Роль:</div>
											<div class="pole_role"><input type="text" name="role[]"/></div>
											<img class="close_pict" src="../img/close.png" onclick="disappend('.block_1')" />
										</div>
									</div>
								</div>
								

							</div>
						</div>

						<?php
								}
							}else{
						?>
								<div class="wrap_thanks">
									<div class="text_thanks">
										Вы не авторизовались!<br />
										<a href="index.php"><div class="mini_text">Перейти на главную странцу</div></a>
									</div>
								</div>

						<?php } ?>



					</div>
				

					<div class="wrap_steps_line">
						<div class="but_back">
								<a href="step1.php" class="transition"><button class="back_button"><img class="back_pict" src="../img/but_back.png"/>Назад</button></a>
						</div>
						<div class="steps_line">
							<div class="stepl">
								<div class="left_coner_steps_act"></div>
								<div class="num_step_act">Шаг1</div>
								<div class="del_steps_act"></div>
								<div class="del_steps2_act"></div>
								<div class="num_step_act">Шаг2</div>
								<div class="del_steps_act"></div>
								<div class="del_steps2"></div>
								<div class="num_step">Шаг3</div>
								<div class="del_steps"></div>
								<div class="del_steps2"></div>
								<div class="num_step">Шаг4</div>
								<div class="del_steps"></div>
								<div class="del_steps2"></div>
								<div class="num_step">Шаг5</div>
								<div class="right_coner_steps"></div>
							</div>
						</div>

						<div class="but_next">
								<button name="n_but" class="next_button">Далее<img class="next_pict" src="../img/but_next.png"/></button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</body>
</html>
