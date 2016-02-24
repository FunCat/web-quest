<?php
	include "../config.php";
	include "reg_script.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_registration.css" />
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

			<form method="post" action="registration.php">
				<div class="content_menu">
					<div class="title_content_menu">
						Регистрация
					</div>
					<div class="wrap_main_steps_menu">
						<div class="wrap_main_text">

							<div class="step_first">
								<table class="reg_table">
									<tr>
										<td colspan="2" style="text-align: center;"><?php echo $prov; ?></td>
									</tr>
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
										<td>Выберите:</td>
										<td>
										<select name="type_function">
											<option value="0">Преподаватель</option>
											<option value="1">Обучающийся</option>
										</select>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="text-align: center;">
											<input type="submit" value="Зарегистрироваться" class="registrstion_button" name="registrstion_button"/>
										</td>
									</tr>
								</table>
							</div>

						</div>
					</div>
				</div>
			</form>

				
				</div>
			</div>
		</div>

	</body>
</html>
