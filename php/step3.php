<?php
	include "../config.php";
	include "cookie.php";

	$active = $_GET['active'];
	$kol = $_GET['kol'];

	if(isset($_POST['n_but'])){
		header('location: http://web-quest.hol.es/php/step4.php');
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step3.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_correct.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/step3.js" type="text/javascript"></script>
		<script src="../js/page_smothing.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				var num_answer = 1;
				var now;
				var active = 0;
				var kol = 0;
				$(".save_button").click(function(){
					var str = "";
					var role = "<?php echo $active; ?>"; 
					var buf = new Array();
					var right_answer = new Array();
					var i = 0;
					var id_test = "<?php echo $_COOKIE['num'] ?>";

					str += "id_test=|"+id_test+"|";
					str += "&role=|" + role+"|";
					str += "&num_answer=|"+num_answer+"|";

					buf = document.getElementsByName("questions");
					str += "&questions=|";
					for (i = 0; i < buf.length; i++)
				 	{
						str += buf[i].value + "|";
					}


					str += "&answers=|";
					for(now = 1; now <= num_answer; now++){
				 		buf = document.getElementsByName("question_"+now);
				 		for (i = 0; i < buf.length; i++)
				 		{
							if(buf[i].checked) {right_answer[now] = i; str += i + "|";}
						}
					}

					str += "&n=|";
					for(now = 1; now <= num_answer; now++){
				 		buf = document.getElementsByName("ans_question_"+now);
						str += buf.length + "|";
					}

					
					for(now = 1; now <= num_answer; now++){
						str += "&ans"+now+"=|";
				 		buf = document.getElementsByName("ans_question_"+now);
				 		for (i = 0; i < buf.length; i++)
				 		{
							str += buf[i].value + "|";
						}
					}
					send_request(str);

				});
				$(".add_quest").click(function(){num_answer++;});
				$(".del_quest").click(function(){num_answer--;});
				$(".next_role_button").click(function(){
					active = "<?php echo $active; ?>"; 
					kol = "<?php echo $kol; ?>"; 
					active++;
					document.location.href = "http://web-quest.hol.es/php/step3.php?active=" + active + "&kol=" + kol;
				});
			});

			function send_request(str)
			{
				var r = new XMLHttpRequest();

				var url = "step3_script.php";
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

				<form method="post" action="step3.php">
					<div class="content_menu">

						<?php 
							if(isset($_COOKIE["name"])){
						?>

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

								<?php
									
									if(isset($_GET['kol'])){
										
										if($kol != 0){
											$id_test = $_COOKIE['num'];
											echo "<div class='block_all_roles'>
													<div class='title_roles'>Роли</div>";
											$result=mysqli_query($mysqli, "SELECT role1, role2, role3, role4, role5 FROM info_test WHERE id = '$id_test'");
											$row=mysqli_fetch_array($result);
											for($i = 1; $i <= $kol; $i++)
											{
												if($i == $active && $active == $kol)
													echo "<div class='block_roles_last_active'>".$row["role$i"]."</div>";
												else if($i == $active)
													echo "<div class='block_roles_active'>".$row["role$i"]."</div>";
												else
													echo "<div class='block_roles'>".$row["role$i"]."</div>";
											}
											echo "</div>";
										}
									}
								?>

								<div class="wrap_question">
									<div class="title_questions_2">Перечень вопросов:<img class="plus add_quest" src="../img/plus.png" onclick="add_question()" /></div>
									<div class="questions question_1" value="2">
										<div class="question_block block_1">
											<div class="block_quest">
												<div class="text_quest">
													Вопрос:
												</div>
												<div class="block_for_quest">
													<textarea name="questions" class="input_text_quest"></textarea><img class="close_pict del_quest" src="../img/close.png"  onclick="del_question('.question_1')">
												</div>
											</div>
											<div class="block_answer" id="block_answer">
												<div class="text_answer">
													Варианты ответа:<img class="plus" src="../img/plus.png"  onclick="add_var('.question_1 .block_answer', 'question_1')"/>
												</div>
												<div class="var_answer var_1">
													<input name="question_1" type="radio"><textarea name="ans_question_1" class="box_answer"></textarea></input><img class="close_pict" src="../img/close.png" onclick="del_var('.question_1 .var_1', '.question_1')">
												</div>
												<div class="var_answer var_2">
													<input name="question_1" type="radio"><textarea name="ans_question_1" class="box_answer"></textarea></input><img class="close_pict" src="../img/close.png" onclick="del_var('.question_1 .var_2', '.question_1')">
												</div>
											</div>
										</div>
									</div>
								</div>
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

						<?php 
							if($kol == $active){
								echo "<div class='but_next'>
										<button name='n_but' class='next_button'>Далее<img class='next_pict' src='../img/but_next.png'/></button>
									</div>";
							}
							else{
								echo "<div class='but_next'>
										<div name='n_role' class='next_role_button'>Далее<img class='next_pict' src='../img/but_next.png'/></div>
									</div>";
							}
						?>
						
					</div>
				</form>
			</div>
		</div>

	</body>
</html>
