<?php
	include "../config.php";
	include "cookie.php";

?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_index.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/page_smothing.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="logo">Web-quest</div>

		<?php 
			if(isset($_COOKIE["name"])){
		?>

		<div class="block_profile">
			<div class="profile">
				<?php echo $_COOKIE["log"]; ?>
			</div>
			<form method="post" action="index.php">
				<div class="form_profile" style="display: none;">
					<table>
						<tr>
							<td colspan="2" style="text-align:center;">Здравствуйте, <?php echo $_COOKIE["name"]; ?></td>
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
			<form method="post" action="index.php">
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
					<div class="active_menu">Главная</div>
					<a href="quests.php"><div class="noactive_menu">Квесты</div></a>
					<div class="noactive_menu">Контакты</div>
				</div>

				<div class="content_menu">
					<div class="title_content_menu">
						Web-quest за пару шагов
					</div>
					<div class="wrap_main_content_menu">
						<div class="wrap_main_text">
							<div class="main_content_menu">
								Самое время создать СВОЙ веб-квест.<br />Это отличная возможность решить проблемное задание с элементами ролевой игры. 
							</div>
						</div>
						<div class="wrap_main_button">
							<div class="button_content_menu">
								<a href="steps.php"><input class="start_button" type="button" value="Создать" /></a>
							</div>
						</div>
					</div>
				</div>

				<div class="advantage_content">
					<div class="advantage_title">
						Преимущества Web-questa
					</div>
					<div class="advantage_picture">
						<div class="wrap_picture">
							<div class="picture" style="margin-top: 200px;">
								<div class="icon">
									<img class="size_icon" src="../img/index_01.png" />
								</div>
								<div class="icon_text">
									Индивидуальный подход к обучающимся
								</div>
							</div>
						</div>
						<div class="wrap_picture">
							<div class="picture" style="margin-top: 100px;">
								<div class="icon">
									<img class="size_icon" src="../img/index_02.png" />
								</div>
								<div class="icon_text">
									Удобная система оценивания и отслеживания выполняемой работы
								</div>
							</div>
						</div>
						<div class="wrap_picture">
							<div class="picture">
								<div class="icon">
									<img class="size_icon" src="../img/index_03.png" />
								</div>
								<div class="icon_text">
									Возможность использования интегрируемых сервисов
								</div>
							</div>
						</div>
						<div class="wrap_picture">
							<div class="picture" style="margin-top: 100px;">
								<div class="icon">
									<img class="size_icon" src="../img/index_04.png" />
								</div>
								<div class="icon_text">
									Работа с различными информационными источниками
								</div>
							</div>
						</div>
						<div class="wrap_picture" style="margin-top: 200px;">
							<div class="picture">
								<div class="icon">
									<img class="size_icon" src="../img/index_05.png" />
								</div>
								<div class="icon_text">
									Удобный интерфейс для обучающихся  с ОВЗ
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>
