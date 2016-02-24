<?php
	include"../config.php";
	include"cookie.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step2.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/step2.js" type="text/javascript"></script>
		<script src="../js/page_smothing.js" type="text/javascript"></script>
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
							<td colspan="2" style="text-align: center;">Личный кабинет</td>
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
					<div class="noactive_menu">Шаблоны</div>
					<div class="noactive_menu">Контакты</div>
				</div>

				<div class="content_menu">
					<div class="title_content_menu">
						Шаг 2
					</div>
					<div class="wrap_main_steps_menu">
						<div class="wrap_main_text">
							<div class="subtitle_step2">Выберите область Web-questa:</div>
							<select class="list_tipy">
								<option>Базы данных</option>
								<option>Безопасность</option>
								<option>Биология</option>
								<option>Информатика</option>
								<option>Информационная безопасность</option>
								<option>Литература</option>
								<option>Математика</option>
								<option>Операционные системы</option>
								<option>Программирование</option>
								<option>Русский язык</option>
								<option>Сетевые технологии</option>
								<option>Физика</option>
								<option>Химия</option>
								<option>Экономика</option>
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
								<input id="r_all" name="type_test" type="radio" value="r_all" checked/>
								<label for="r_all">Общедоступный</label>
								<input id="r_link" name="type_test" type="radio" />
								<label for="r_link">Доступ по ссылке</label>
								<input id="r_permission" name="type_test" type="radio">
								<label for="r_permission">Доступ по разрешению</label>
								<input id="r_close" name="type_test" type="radio" />
								<label for="r_close">Закрытый доступ</label><br />
							</div>
							<div class="checkbox">
								<input id="add_rol" type="checkbox" checked />
								<label for="add_rol">Добавить ролевые возможности</label><br />
							</div>

							<div class="wrap_role">
								<div class="title_roles">Перечень ролей:<img class="plus" src="../img/plus.png" /></div>
								<div class="roles">
									<div class="role_block block_1">
										<div class="title_role">Роль:</div>
										<div class="pole_role"><input type="text" /></div>
										<img class="close_pict" src="../img/close.png" onclick="disappend('.block_1')" />
									</div>
								</div>
							</div>
						</div>
					</div>
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
							<a href="step3.php" class="transition"><button class="next_button">Далее<img class="next_pict" src="../img/but_next.png"/></button></a>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
