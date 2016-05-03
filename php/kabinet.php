<?php
	include "../config.php";
	include "cookie.php";
	include "guest_script.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_kabinet.css" />
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
								<input type="submit" class="transition" id="but_ent" name = "but_ent" value="Войти"/><br/>
								<input type="submit" class="guest" name="guest_mode" value="Гостевой режим" />
							</td>
						</tr>
					</table>
				</div>
			</form>
		</div>
		<?php } ?>


		<div class="wrap_center_menu">
			<div class="center_menu" style="height: initial;">
				<div class="menu_line">
					<a href="index.php"><div class="noactive_menu">Главная</div></a>
					<a href="quests.php"><div class="noactive_menu">Квесты</div></a>
					<div class="noactive_menu">Контакты</div>
				</div>


				<div class="content_menu">
					<?php 
						if(isset($_COOKIE["name"])){
							$logres = $_COOKIE["log"];

							$result_stud = mysqli_query($mysqli, "SELECT * FROM student WHERE login =  '$logres'");
							$bol_enter_stud = mysqli_num_rows($result_stud);

							$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE login =  '$logres'");
							$bol_enter_teach = mysqli_num_rows($result_teach);


							if($bol_enter_teach == 1){
								$resul = mysqli_query($mysqli, "SELECT id, name, lastname, mail FROM teacher WHERE login =  '$logres'");	
								
							}
							else if($bol_enter_stud == 1){
								$resul = mysqli_query($mysqli, "SELECT name, lastname, mail FROM student WHERE login =  '$logres'");
							}
								
							$infok = mysqli_fetch_assoc($resul);
							$namekab = $infok["name"];
							$lastnamekab = $infok["lastname"];
							$mailkab = $infok["mail"];

					?>
					<div class="left_colum">
						<?php 
							if($bol_enter_teach == 1){
						?>
						<div class="block_menu_kab_act">Личный кабинет</div>
						<div class="block_menu_kab">Сообщения</div>
						<a href="kab_students.php"><div class="block_menu_kab">Список обучающихся</div></a>
						<a href="kab_quests.php"><div class="block_menu_kab">Список квестов</div></a>
						<div class="block_menu_kab">Работы обучающихся</div>
						<div class="block_menu_kab">Настройки</div>
						<?php 
							}
							if($bol_enter_stud == 1){
						?>
						<div class="block_menu_kab_act">Личный кабинет</div>
						<div class="block_menu_kab">Сообщения</div>
						<a href="kab_teacher.php"><div class="block_menu_kab">Преподаватель</div></a>
						<a href="kab_quests.php"><div class="block_menu_kab">Список квестов</div></a>
						<a href="kab_result.php"><div class="block_menu_kab">Результаты</div></a>
						<div class="block_menu_kab">Настройки</div>
						<?php 
							}
						?>
					</div>
					<div class="right_colum">
						<div class="title_content_menu">
							Личный кабинет
						</div>
						<div class="wrap_text_kab">
							<div class="text_kab">
								<table>
									<?php if($bol_enter_teach == 1){ ?>
									<tr>
										<td class="r">Ваш ID:</td>
										<td class="tab"><?php echo $infok['id']; ?></td>
									</tr>
									<?php } ?>
									<tr>
										<td class="r">Имя:</td>
										<td class="tab"><?php echo $namekab; ?></td>
									</tr>
									<tr>
										<td class="r">Фамилия:</td>
										<td class="tab"><?php echo $lastnamekab; ?></td>
									</tr>
									<tr>
										<td class="r">E-mail:</td>
										<td class="tab"><?php echo $mailkab; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<?php
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
			</div>
		</div>

		<div style="width: 100%; height: 100px; float: left;"></div>
	</body>
</html>
