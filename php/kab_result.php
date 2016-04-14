<?php
	include "../config.php";
	include "cookie.php";
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
			<div class="center_menu" style="height: initial;">
				<div class="menu_line">
					<a href="index.php"><div class="noactive_menu">Главная</div></a>
					<div class="noactive_menu">Шаблоны</div>
					<div class="noactive_menu">Контакты</div>
				</div>


				<div class="content_menu">
					<?php 
						if(isset($_COOKIE["name"])){
							$logres = $_COOKIE["log"];

							$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.login =  '$logres'");
							$bol_enter_teach = mysqli_num_rows($result_teach);

							$resul = mysqli_query($mysqli, "SELECT teacher.id, teacher.name, teacher.lastname FROM teacher WHERE teacher.login =  '$logres'");
								
							$infok = mysqli_fetch_assoc($resul);
							$teach_id = $infok['id'];
							$namekab = $infok["name"];
							$lastnamekab = $infok["lastname"];
					?>
					<div class="left_colum">
						<?php 
							if($bol_enter_teach == 1){
						?>
						<a href="kabinet.php"><div class="block_menu_kab">Личный кабинет</div></a>
						<div class="block_menu_kab">Сообщения</div>
						<a href="kab_students.php"><div class="block_menu_kab_act">Список обучающихся</div></a>
						<div class="block_menu_kab">Список квестов</div>
						<div class="block_menu_kab">Работы обучающихся</div>
						<div class="block_menu_kab">Настройки</div>
						<?php 
							}
						?>
					</div>
					<form method="post" action="kab_teacher.php">
						<div class="right_colum">
							<div class="title_content_menu">
								<?php 
									$stud_id = $_GET['id'];
									$info_student_arr = mysqli_query($mysqli, "SELECT * FROM student WHERE student.id =  '$stud_id'");
									$info_student = mysqli_fetch_assoc($info_student_arr);
									echo $info_student['name']." ".$info_student['lastname'];
								?>
							</div>
							<div class="wrap_text_kab">
								<div class="text_kab">
									<table style="margin: auto; width: 1200px; border: 1px solid white;">
										<tr style="background-color: #285879;">
											<td class="c">Название квеста</td>
											<td class="c">Оценка</td>
											<td class="c">Процент</td>
											<td class="c">Роль</td>
											<td class="c">Дата выполнения</td>
										</tr>
										<?php
											$spisok = mysqli_query($mysqli, "SELECT it.name, tp.mark, tp.procent, tp.role_id, tp.date FROM test_report AS tp JOIN info_test AS it ON tp.info_test_id = it.id WHERE tp.student_id =  '$stud_id'");
											while($row = mysqli_fetch_assoc($spisok))
											{
												echo "<tr><td class='c'>".$row['name']."</td><td class='c'>".$row['mark']."</td><td class='c'>".$row['procent']." %</td><td class='c'>".$row['role_id']."</td><td class='c'>".$row['date']."</td></tr>";
											}	
										?>
									</table>
								</div>
							</div>
						</div>
					</form>
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
