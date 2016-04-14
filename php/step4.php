<?php
	include "../config.php";
	include "cookie.php";
	include "step4_script.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step4.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_correct.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/step4.js" type="text/javascript"></script>
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


		<form method="post" action="step4.php">
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
						Шаг 4
					</div>
					<div class="wrap_main_steps_menu">
						<div class="wrap_main_text">

							<div class="wrap_vvod_text">
								<div class="vvod_text">
									<div class="title_vvod_text">
										Вводный текст:
									</div>
									<div class="box_vvod_text">
										<textarea name="vvod_text" class="box_vvod">Ясное вступление, где четко описаны главные роли участников или сценарий квеста, предварительный план работы, обзор всего квеста. Также здесь вы можете более подробно описать для обучающихся, что им необходимо найти, используя предоставленные источники или сконцентрировать их внимание на каком-то определённом ресурсе.</textarea>
									</div>
								</div>
							</div>

							<div class="wrap_book_example">
								<div class="book_example">
									<div class="title_books">Пример:</div>
									<div class="block_book">
										<div class="text_book">Источник:</div>
										<div class="block_for_book">
											<input class="input_text_book" type="text" value="Онлайн справочник по HTML и CSS" disabled />
										</div>
									</div>
									<div class="block_book">
										<div class="text_book">Электронный адрес:</div>
										<div class="block_for_book">
											<input class="input_text_book" type="text" style="width:400px;" value="htmlbook.ru" disabled />
										</div>
									</div>
								</div>
							</div>

							<div class="wrap_book">
								<div class="title_books_2">Перечень источников:<img class="plus" src="../img/plus.png" onclick="add_book()" /></div>
								<div class="books book_1">
									<div class="book_block block_1">
										<div class="block_book">
											<div class="text_book">Источник:</div>
											<div class="block_for_book">
												<input name="book[]" class="input_text_book" type="text"/><img src="../img/close.png" class="close_pict" onclick="del_book('.book_1')"/>
											</div>
										</div>
										<div class="block_book">
											<div class="text_book">Электронный адрес:</div>
											<div class="block_for_book">
												<input name="adres[]" class="input_text_book" type="text" style="width:400px;"/>
											</div>
										</div>
									</div>
								</div>
							</div>



						</div>
					</div>

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
