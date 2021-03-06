<?php
	session_start();
	include "../config.php";
	include "cookie.php";
	include "test_script.php";
	include "guest_script.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_test.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/page_smothing.js" type="text/javascript"></script>
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

		<?php $t = $_GET['number']; $r = $_GET['r']; $line = "test.php?number=".$t."&r=".$r;?>
		<form method="post" action="<?php echo $line; ?>">
		<div class="wrap_center_menu">
			<div class="center_menu">
				<div class="menu_line">
					<a href="index.php"><div class="noactive_menu">Главная</div></a>
					<a href="quests.php"><div class="noactive_menu">Квесты</div></a>
					<div class="noactive_menu">Контакты</div>
				</div>
				<?php
				if(isset($_SESSION['now_quest'])) $now_quest = $_SESSION['now_quest'];
				else {$now_quest = 1; $_SESSION['now_quest'] = $now_quest;}

				if(isset($_SESSION['right'])) $right = $_SESSION['right'];
				else {$right = 0; $_SESSION['right'] = $right;}


					$login = $_COOKIE['log'];
					$prov_log_teach_prev = mysqli_query($mysqli, "SELECT * FROM teacher WHERE login = '$login'");
					$prov_log_teach = mysqli_num_rows($prov_log_teach_prev);
					$prov_log_stud_prev = mysqli_query($mysqli, "SELECT * FROM student WHERE login = '$login'");
					$prov_log_stud = mysqli_num_rows($prov_log_stud_prev);

					if($prov_log_teach == 0 && $prov_log_stud != 0){
					?>

					<?php
						if(isset($_GET['number'])){
							$test_id = $_GET['number'];
							$r = mysqli_query($mysqli, "SELECT name, roles, role1, role2, role3, role4, role5, first_text FROM info_test WHERE id = '$test_id'");
							$i= mysqli_fetch_assoc($r);

							$test_name = $i['name'];
							if($i['roles'] != 0){
							?>

							<div class="content_menu" style="overflow: hidden;">
								<div class="name_test">
									<?php echo $test_name; ?>
								</div>
								<div class="wrap_question">

									<?php 
										$test_id = $_GET['number'];
										$num_role = $_GET['r'];

										$result=mysqli_query($mysqli, "SELECT question, answer_1, answer_2, answer_3, answer_4, answer_5, answer_6, answer_7, answer_8, right_answer, img FROM test WHERE info_test_id = '$test_id' AND role_id = '$num_role'");
										$i = 1;
										while($row=mysqli_fetch_array($result))
										{
											if($i == $now_quest)
											{
											echo "<div class='questions question_$i'>
													<div class='question_block block_$i' name='question_block'>
														<div class='block_quest'>
															<div class='text_quest'>
																Вопрос:
															</div>
															<div class='block_for_quest'>
																<div name='questions' class='input_text_quest'>".$row['question']."</div>
															</div>";
															if($row['img'] != "")
																echo"<br/><div class='test_image'><img src='../img/uploads/".$row['img']."' /></div>";
												echo"</div>
														<div class='block_answer' id='block_answer'>
															<div class='text_answer'>
																Варианты ответа:
															</div>";

															if($row['answer_1'] != ""){
																echo "<div class='var_answer var_1'>
																		<input name='question_$i"."[]"."' type='radio' value='1'><div name='ans_question_$i' class='box_answer'>".$row['answer_1']."</div></input>
																	</div>";
															}
															if($row['answer_2'] != ""){
																echo "<div class='var_answer var_2'>
																		<input name='question_$i"."[]"."' type='radio' value='2'><div name='ans_question_$i' class='box_answer'>".$row['answer_2']."</div></input>
																	</div>";
															}
															if($row['answer_3'] != ""){
																echo "<div class='var_answer var_3'>
																		<input name='question_$i"."[]"."' type='radio' value='3'><div name='ans_question_$i' class='box_answer'>".$row['answer_3']."</div></input>
																	</div>";
															}
															if($row['answer_4'] != ""){
																echo "<div class='var_answer var_4'>
																		<input name='question_$i"."[]"."' type='radio' value='4'><div name='ans_question_$i' class='box_answer'>".$row['answer_4']."</div></input>
																	</div>";
															}
															if($row['answer_5'] != ""){
																echo "<div class='var_answer var_5'>
																		<input name='question_$i"."[]"."' type='radio' value='5'><div name='ans_question_$i' class='box_answer'>".$row['answer_5']."</div></input>
																	</div>";
															}
															if($row['answer_6'] != ""){
																echo "<div class='var_answer var_6'>
																		<input name='question_$i"."[]"."' type='radio' value='6'><div name='ans_question_$i' class='box_answer'>".$row['answer_6']."</div></input>
																	</div>";
															}
															if($row['answer_7'] != ""){
																echo "<div class='var_answer var_7'>
																		<input name='question_$i"."[]"."' type='radio' value='7'><div name='ans_question_$i' class='box_answer'>".$row['answer_7']."</div></input>
																	</div>";
															}
															if($row['answer_8'] != ""){
																echo "<div class='var_answer var_8'>
																		<input name='question_$i"."[]"."' type='radio' value='8'><div name='ans_question_$i' class='box_answer'>".$row['answer_8']."</div></input>
																	</div>";
															}
														
														echo "</div>
														</div>
													</div>";
												}
											$i++;
										}


									?>
								</div>
							</div>
							<div class="wrap_steps_line">
								<div class="but_next">
									<button name="n_but" class="next_question_button next_b">Следующий<img class="next_pict" src="../img/but_next.png"/></button>
									<button name="exit_quest" class="next_button next_b">Завершить<img class="next_pict" src="../img/but_next.png"/></button>
								</div>
							</div>
							<?php
							}
							else 
							{
							?>
								<div class="content_menu" style="overflow: hidden;">
									<div class="name_test">
										<?php echo $test_name; ?>
									</div>
									<div class="wrap_question">
										<?php 
											$test_id = $_GET['number'];
											$num_role = $_GET['r'];

											$result=mysqli_query($mysqli, "SELECT question, answer_1, answer_2, answer_3, answer_4, answer_5, answer_6, answer_7, answer_8, right_answer, img FROM test WHERE info_test_id = '$test_id' AND role_id = '$num_role'");
											$i = 1;
											while($row=mysqli_fetch_array($result))
											{
												echo "<div class='questions question_$i'>
														<div class='question_block block_$i' name='question_block'>
															<div class='block_quest'>
																<div class='text_quest'>
																	Вопрос:
																</div>
																<div class='block_for_quest'>
																	<div name='questions' class='input_text_quest'>".$row['question']."</div>
																</div>";
															if($row['img'] != "")
																echo"<br/><div class='test_image'><img src='../img/uploads/".$row['img']."' /></div>";
													echo"</div>
															<div class='block_answer' id='block_answer'>
																<div class='text_answer'>
																	Варианты ответа:
																</div>";

																if($row['answer_1'] != ""){
																	echo "<div class='var_answer var_1'>
																			<input name='question_$i"."[]"."' type='radio' value='1'><div name='ans_question_$i' class='box_answer'>".$row['answer_1']."</div></input>
																		</div>";
																}
																if($row['answer_2'] != ""){
																	echo "<div class='var_answer var_2'>
																			<input name='question_$i"."[]"."' type='radio' value='2'><div name='ans_question_$i' class='box_answer'>".$row['answer_2']."</div></input>
																		</div>";
																}
																if($row['answer_3'] != ""){
																	echo "<div class='var_answer var_3'>
																			<input name='question_$i"."[]"."' type='radio' value='3'><div name='ans_question_$i' class='box_answer'>".$row['answer_3']."</div></input>
																		</div>";
																}
																if($row['answer_4'] != ""){
																	echo "<div class='var_answer var_4'>
																			<input name='question_$i"."[]"."' type='radio' value='4'><div name='ans_question_$i' class='box_answer'>".$row['answer_4']."</div></input>
																		</div>";
																}
																if($row['answer_5'] != ""){
																	echo "<div class='var_answer var_5'>
																			<input name='question_$i"."[]"."' type='radio' value='5'><div name='ans_question_$i' class='box_answer'>".$row['answer_5']."</div></input>
																		</div>";
																}
																if($row['answer_6'] != ""){
																	echo "<div class='var_answer var_6'>
																			<input name='question_$i"."[]"."' type='radio' value='6'><div name='ans_question_$i' class='box_answer'>".$row['answer_6']."</div></input>
																		</div>";
																}
																if($row['answer_7'] != ""){
																	echo "<div class='var_answer var_7'>
																			<input name='question_$i"."[]"."' type='radio' value='7'><div name='ans_question_$i' class='box_answer'>".$row['answer_7']."</div></input>
																		</div>";
																}
																if($row['answer_8'] != ""){
																	echo "<div class='var_answer var_8'>
																			<input name='question_$i"."[]"."' type='radio' value='8'><div name='ans_question_$i' class='box_answer'>".$row['answer_8']."</div></input>
																		</div>";
																}
															
															echo "</div>
															</div>
														</div>";
												$i++;
											}
										?>

									</div>
								</div>
								<div class="wrap_steps_line">
									<div class="but_next">
										<button name="exit_quest2" class="next_button next_b">Завершить<img class="next_pict" src="../img/but_next.png"/></button>
									</div>
								</div>
							<?php
							}
						}
						else if(isset($_GET['m']) && isset($_GET['p']))
						{
					?>

					<div class="content_menu">
						<div class="wrap_main_steps_menu">
							<div class="wrap_main_text">

								<div class="wrap_thanks">
									<div class="text_thanks">
										Поздравляем, Вы прошли тест!<br />
										Ваша оценка - <?php echo $_GET['m']." (".$_GET['p']."%)"; ?>
										<a href="kabinet.php"><div class="mini_text">Перейти в личный кабинет</div></a>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="wrap_steps_line">
						<div class="but_next">
							<a href="index.php"><button name="exit_quest" class="next_button">Готово<img class="next_pict" src="../img/but_next.png"/></button></a>
						</div>
					</div>

					<?php
						}
					}
				?>

			</div>
		</div>
		</form>
	</body>
</html>