<?php
	include "../config.php";
	include "cookie.php";
	include "step1_script.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step1.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/step1.js" type="text/javascript"></script>
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


		<form method="post" action="step1.php">
		<div class="wrap_center_menu">
			<div class="center_menu">
				<div class="menu_line">
					<a href="index.php"><div class="noactive_menu">Главная</div></a>
					<a href="quests.php"><div class="noactive_menu">Квесты</div></a>
					<div class="noactive_menu">Контакты</div>
				</div>

				<div class="content_menu">
					<div class="title_content_menu">
						Шаг 1
					</div>
					<div class="wrap_main_steps_menu">
						<div class="wrap_main_text">
							<div class="wrap_buttons">
								<div class="chose_button">
									<div class="regist_but">Создать новую учётную запись</div>
								</div>
								<div class="bet_block"></div>
								<div class="chose_button">
									<div class="enter_but">Войти в учётную запись</div>
								</div>
							</div>

							<div class="step_first">
								<table class="reg_table">
									<tr>
										<td>Имя:</td>
										<td><input class="reg_text_pole" type="text" name="user_name" /></td>
									</tr>
									<tr>
										<td>Фамилия:</td>
										<td><input class="reg_text_pole" type="text" name="user_lastname" /></td>
									</tr>
									<tr>
										<td>Логин:</td>
										<td><input class="reg_text_pole" type="text" name="user_login" /></td>
									</tr>
									<tr>
										<td>E-mail:</td>
										<td><input class="reg_text_pole" type="text" name="user_mail" /></td>
									</tr>
									<tr>
										<td>Пароль:</td>
										<td><input class="reg_text_pole" type="password" name="user_pass" /></td>
									</tr>
									<tr>
										<td>Повторите пароль:</td>
										<td><input class="reg_text_pole" type="password" name="user_sec_pass" /></td>
									</tr>
									<tr>
										<td colspan = "2" style="text-align: center;"><?php echo $prov; ?></td>
									</tr>
								</table>
							</div>

							<div class="step_first_enter">
								<?php
									if($but_buf == 0){
										echo "<div style='text-align:center; font-size: 40px;'>Вы уже вошли. Нажмите кнопку Далее.</div>";
									}
								?>
								<table class="reg_table">
									<tr>
										<td>Логин:</td>
										<td><input class="reg_text_pole" type="text" name="log_ent" /></td>
									</tr>
									<tr>
										<td>Пароль:</td>
										<td><input class="reg_text_pole" type="password" name="pass_ent" /></td>
									</tr>
									<tr>
										<td colspan = "2" style="text-align: center;"><?php echo $prov_in; ?></td>
									</tr>
								</table>
							</div>

						</div>
					</div>
				</div>

				<div class="wrap_steps_line">
					<div class="but_back">
						<a href="steps.php" class="transition"><button class="back_button"><img class="back_pict" src="../img/but_back.png"/>Назад</button></a>
					</div>
					<div class="steps_line">
						<div class="stepl">
							<div class="left_coner_steps_act"></div>
							<div class="num_step_act">Шаг1</div>
							<div class="del_steps_act"></div>
							<div class="del_steps2"></div>
							<div class="num_step">Шаг2</div>
							<div class="del_steps"></div>
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
			</div>
		</div>
	</form>

	</body>
</html>
