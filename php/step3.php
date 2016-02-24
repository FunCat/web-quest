<?php
	include"../config.php";
	include"cookie.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step3.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/step3.js" type="text/javascript"></script>
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
						Шаг 3
					</div>
					<div class="wrap_main_steps_menu">
						<div class="wrap_main_text">
							<div class="subtitle_step3">Выберите тип задания:</div>
							
							<div class="types_quest">
								<div class="wrap_type_quest_act" style="border-radius: 15px 0px 0px 15px;">
									<div class="type_quest">
										<div class="pict_type"><img class="pict" src="../img/types/one.png" /></div>
										<div class="text_type">Одиночный<br />выбор</div>
									</div>
								</div>
								<div class="wrap_type_quest">
									<div class="type_quest">
										<div class="pict_type"><img class="pict" src="../img/types/some.png" /></div>
										<div class="text_type">Множественный выбор</div>
									</div>
								</div>
								<div class="wrap_type_quest">
									<div class="type_quest">
										<div class="pict_type"><img class="pict" src="../img/types/write.png" /></div>
										<div class="text_type">Ручной ввод <br/>ответа</div>
									</div>
								</div>
								<div class="wrap_type_quest" style="border-radius: 0px 15px 15px 0px;">
									<div class="type_quest">
										<div class="pict_type"><img class="pict" src="../img/types/match.png" style="padding-top: 25px; width: 60px;"/></div>
										<div class="text_type">Установление соответствия</div>
									</div>
								</div>
							</div>

							<div class="wrap_question_example">
								<div class="question_example">
									<div class="title_questions">Пример:</div>
									<div class="block_quest">
										<div class="text_quest">Вопрос:</div>
										<div class="block_for_quest">
											<input class="input_text_quest" type="text" value="2+2" disabled />
										</div>
									</div>
									<div class="block_answer">
										<div class="text_answer">Варианты ответа:</div>
										<div class="var_answer var_example">
											<input name="example" type="radio" disabled><input class="box_answer" type="text" value="1" disabled/></input>
										</div>
										<div class="var_answer var_example">
											<input name="example" type="radio" disabled><input class="box_answer" type="text" value="2" disabled/></input>
										</div>
										<div class="var_answer var_example">
											<input name="example" type="radio" disabled><input class="box_answer" type="text" value="3" disabled/></input>
										</div>
										<div class="var_answer var_example">
											<input name="example" type="radio" checked disabled><input class="box_answer" type="text" value="4" disabled/></input>
										</div>
									</div>
								</div>
							</div>

							<div class="wrap_question">
								<div class="title_questions_2">Перечень вопросов:<img class="plus" src="../img/plus.png" onclick="add_question()" /></div>
								<div class="questions question_1" value="2">
									<div class="question_block block_1">
										<div class="block_quest">
											<div class="text_quest">
												Вопрос:
											</div>
											<div class="block_for_quest">
												<input class="input_text_quest" type="text" /><img class="close_pict" src="../img/close.png"  onclick="del_question('.question_1')">
											</div>
										</div>
										<div class="block_answer">
											<div class="text_answer">
												Варианты ответа:<img class="plus" src="../img/plus.png"  onclick="add_var('.question_1 .block_answer', 'question_1')"/>
											</div>
											<div class="var_answer var_1">
												<input name="question_1" type="radio"><input class="box_answer" type="text" /></input><img class="close_pict" src="../img/close.png" onclick="del_var('.question_1 .var_1', '.question_1')">
											</div>
											<div class="var_answer var_2">
												<input name="question_1" type="radio"><input class="box_answer" type="text" /></input><img class="close_pict" src="../img/close.png" onclick="del_var('.question_1 .var_2', '.question_1')">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wrap_steps_line">
					<div class="but_back">
							<a href="step2.php" class="transition"><button class="back_button"><img class="back_pict" src="../img/but_back.png"/>Назад</button></a>
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
							<div class="del_steps2"></div>
							<div class="num_step">Шаг4</div>
							<div class="del_steps"></div>
							<div class="del_steps2"></div>
							<div class="num_step">Шаг5</div>
							<div class="right_coner_steps"></div>
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
