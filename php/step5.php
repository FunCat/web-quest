<?php
	include"../config.php";
	include"cookie.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step5.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
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
						Шаг 5
					</div>
					<div class="wrap_main_steps_menu">
						<div class="wrap_main_text">

							<div class="wrap_question">
								<div class="text_question">
									<img class="img_spravka" src="../img/spravka.png"/>Не знаете где взять код вашей работы? Перейдите по ссылке ->
								</div>
							</div>
							<div class="wrap_form_kod">
								<div class="form_kod">


									<div class="wrap_kod">
										<div class="title_kod">Добавить работу</div>
										<div class="block_kod">
											<div class="text_kod">Код:</div>
											<div class="block_for_kod">
												<textarea class="input_text_book" type="text"></textarea>
											</div>
										</div>
										<div class="block_kod">
											<div class="text_kod">Подпись:</div>
											<div class="block_for_kod">
												<textarea class="input_text_book" type="text"></textarea>
											</div>
										</div>
										<div class="but_add_kod">
											<input class="but_add" type="button" value="Добавить" />
										</div>
									</div>


								</div>
							</div>

							



						</div>
					</div>
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
							<a href="step6.php" class="transition"><button class="next_button">Далее<img class="next_pict" src="../img/but_next.png"/></button></a>
					</div>
				</div>

			</div>
		</div>

	</body>
</html>
