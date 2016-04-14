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

							$result_stud = mysqli_query($mysqli, "SELECT * FROM student WHERE student.login =  '$logres'");
							$bol_enter_stud = mysqli_num_rows($result_stud);

							$resul = mysqli_query($mysqli, "SELECT student.id, student.name, student.lastname, student.teacher_id FROM student WHERE student.login =  '$logres'");
								
							$infok = mysqli_fetch_assoc($resul);
							$stud_id = $infok['id'];
							$namekab = $infok["name"];
							$lastnamekab = $infok["lastname"];
							$teacher_id = $infok["teacher_id"];

							if(isset($_REQUEST['but_id_teacher'])){
								$id = $_POST['kab_id_teacher'];
								$result_stud = mysqli_query($mysqli, "UPDATE student SET teacher_id = '$id'WHERE student.id =  '$stud_id'");
								header('location:'.$_SERVER['HTTP_REFERER']);
							}
							if(isset($_REQUEST['but_del_id_teacher'])){
								$id = $_POST['kab_id_teacher'];
								$result_stud = mysqli_query($mysqli, "UPDATE student SET teacher_id = '0'WHERE student.id =  '$stud_id'");
								header('location:'.$_SERVER['HTTP_REFERER']);
							}
							

							$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.id =  '$teacher_id'");
							$bol_enter_teach = mysqli_num_rows($result_teach);

							if($bol_enter_teach == 1){
								$enter_teach = mysqli_fetch_assoc($result_teach);
								$teacher_name = $enter_teach['name'];
								$teacher_lastname = $enter_teach['lastname'];
							}



					?>
					<div class="left_colum">
						<?php 
							if($bol_enter_stud == 1){
						?>
						<a href="kabinet.php"><div class="block_menu_kab">Личный кабинет</div></a>
						<div class="block_menu_kab">Сообщения</div>
						<div class="block_menu_kab_act">Преподаватель</div>
						<div class="block_menu_kab">Список квестов</div>
						<div class="block_menu_kab">Настройки</div>
						<?php 
							}
						?>
					</div>
					<form method="post" action="kab_teacher.php">
						<div class="right_colum">
							<div class="title_content_menu">
								Преподаватель
							</div>
							<div class="wrap_text_kab">
								<div class="text_kab">
									<table>
										<tr>
											<td class="r">Установить преподавателя:</td>
											<td class="tab"><input type="text" class="kab_id_teacher" name="kab_id_teacher"/></td>
										</tr>
										<tr>
											<td class="r"></td>
											<td class="tab"><input class="but_id_teacher" name="but_id_teacher" type="submit" value="Обновить"/><input class="but_id_teacher" name="but_del_id_teacher" type="submit" value="Удалить"/></td>
										</tr>
										<?php
											if($bol_enter_teach == 1){
										?>
										<tr>
											<td class="r">Имя:</td>
											<td class="tab"><?php echo $teacher_name; ?></td>
										</tr>
										<tr>
											<td class="r">Фамилия:</td>
											<td class="tab"><?php echo $teacher_lastname; ?></td>
										</tr>
										<?php
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
