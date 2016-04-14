<?php
	include "../config.php";
	include "cookie.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_step_line.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_start_test.css" />
		<link rel="stylesheet" type="text/css" href="../css/style_correct.css" />
		<link rel="stylesheet" type="text/css" href="../fonts.css" />
		<link href='https://fonts.googleapis.com/css?family=Jura&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/index_script.js" type="text/javascript"></script>
		<script src="../js/page_smothing.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.but_start_test').click(function(){
					var id = "<?php echo $_GET['number']; ?>";
					var r = 0;

					for(now = 0; now < 5; now++){
				 		buf = document.getElementsByName("role_block");
				 		for (i = 0; i < buf.length; i++)
				 		{
							if(buf[i].checked) {r = i + 1;}
						}
					}

					window.location.href = "http://web-quest.hol.es/php/test.php?number="+id+"&r="+r;
				});
			});
		</script>
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

				<?php
					if(isset($_GET['number'])){
						$test_id = $_GET['number'];
						$r = mysqli_query($mysqli, "SELECT name, role1, role2, role3, role4, role5, first_text FROM info_test WHERE id = '$test_id'");
						$i= mysqli_fetch_assoc($r);

						$test_name = $i['name'];
						$test_role1 = $i['role1'];
						$test_role2 = $i['role2'];
						$test_role3 = $i['role3'];
						$test_role4 = $i['role4'];
						$test_role5 = $i['role5'];
						$first_text = $i['first_text'];

				?>
				<div class="content_menu" style="overflow: hidden;">

					<?php 
						if(isset($_COOKIE["name"])){
					?>

					<div class="name_test">
						<?php echo $test_name; ?>
					</div>
					<div class="wrap_inner_text">
						<div class="inner_text">
							<?php echo $first_text; ?>
						</div>
					</div>

					<?php

						if($test_role1 != '0' || $test_role2 != '0' || $test_role3 != '0'|| $test_role4 != '0' || $test_role5 != '0'){
							echo "<div class='rols'>Выберите роль";
							if($test_role1 != "0"){
								echo "<div class='role_block'><input type='radio' value='1' name='role_block' />$test_role1</div>";
							}
							if($test_role2 != "0"){
								echo "<div class='role_block'><input type='radio' value='2' name='role_block'/>$test_role2</div>";
							}
							if($test_role3 != "0"){
								echo "<div class='role_block'><input type='radio' value='3' name='role_block'/>$test_role3</div>";
							}
							if($test_role4 != "0"){
								echo "<div class='role_block'><input type='radio' value='4' name='role_block'/>$test_role4</div>";
							}
							if($test_role5 != "0"){
								echo "<div class='role_block'><input type='radio' value='5' name='role_block'/>$test_role5</div>";
							}	
							echo "</div>";						
						}

					?>

					<?php

						$result=mysqli_query($mysqli, "SELECT name, adres FROM books WHERE info_test_id = '$test_id'"); 
						if(mysqli_num_rows($result) != 0){
							echo "<div class='advice_book'>Полезные источники";
							while($row=mysqli_fetch_array($result))
							{
								echo "<div class='book_block'>".$row['name']." - <a href='".$row['adres']."' target='_blank'>".$row['adres']."</a></div>";
							}
							echo "</div>";
						}

					?>

					<div class="but_start_test">
						Начать тест
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
				<?php
					}
				?>
			</div>
		</div>
		</form>
	</body>
</html>
