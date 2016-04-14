<?php
	$but_buf = -1;
	if(isset($_COOKIE['name'])){
		$but_buf = 0;
	}



	if($but_buf == 0){

		header('location: http://web-quest.hol.es/php/step2.php');

	}else if(isset($_REQUEST['n_but']) && $_POST['user_name'] != '' && $_POST['user_lastname'] != '' && $_POST['user_login'] != "" && $_POST['user_mail'] != "" && $_POST['user_pass'] != "" && $_POST['user_sec_pass'] != ""){

		$prov = '';
		$name = $_REQUEST['user_name'];
		$lastname = $_REQUEST['user_lastname'];
		$login = $_REQUEST['user_login'];
		$mail = $_REQUEST['user_mail'];
		$password = $_REQUEST['user_pass'];
		$password2 = $_REQUEST['user_sec_pass'];
		if($name == '' || $lastname == '' || $login == '' || $password == '' || $password2 == ''){
			$prov = "Вы не везде указали данные!";
		}
		else if ($password != $password2){
			$prov = "Пароли не совпадают!";
		}
		else{
			$prov_log_teach_prev = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.login = '$login'");
			$prov_log_teach = mysqli_num_rows($prov_log_teach_prev);

			if($prov_log_teach != 0){
				$prov = "Логин уже занят.";
			}
			else{
				mysqli_query($mysqli, "INSERT INTO info (sms_system, works_system) VALUES (0, 0)");
				$li = mysqli_query($mysqli, "SELECT max(id) AS m FROM info");
				$li_data = mysqli_fetch_assoc($li);
				mysqli_query($mysqli, "INSERT INTO teacher (name, lastname, login, `password`, `mail`, info_id) VALUES ('$name','$lastname','$login', '$password', '$mail', '$li_data[m]')");
				$prov = mysqli_query($mysqli, "SELECT COUNT(teacher.login) AS num FROM teacher WHERE teacher.login =  '$login' AND teacher.password =  '$password'");
				$data = mysqli_fetch_assoc($prov);

				if($data[num] == 1)
				{
					$prov = "Регистрация прошла успешно!";
					SetCookie("name", "$name", time()+4800);
					SetCookie("log", "$login", time()+4800);
					SetCookie("pass", "$password", time()+4800);
					header('location: http://web-quest.hol.es/php/step2.php');
				}
				else
				{
					$prov = "Попробуйте чуть позже.";
				}
			}
		}

	}else if(isset($_REQUEST['n_but']) && $_POST['log_ent'] != "" && $_POST['pass_ent'] != ""){

		$logres = $_REQUEST["log_ent"];
		$pasres = $_REQUEST["pass_ent"];
		$bul = strpbrk($logres, "'");
		$bul2 = strpbrk($pasres, "'");
		if($bul == FALSE && $bul2 == FALSE)
		{
			$result_stud = mysqli_query($mysqli, "SELECT * FROM student WHERE student.login =  '$logres' AND student.password =  '$pasres'");
			$bol_enter_stud = mysqli_num_rows($result_stud);

			$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.login =  '$logres' AND teacher.password =  '$pasres'");
			$bol_enter_teach = mysqli_num_rows($result_teach);


			if($bol_enter_teach == 1){
				$resul = mysqli_query($mysqli, "SELECT teacher.name FROM teacher WHERE teacher.login =  '$logres'");	
			}
			else if($bol_enter_stud == 1){
				$resul = mysqli_query($mysqli, "SELECT student.name FROM student WHERE student.login =  '$logres'");
			}
			
			$info = mysqli_fetch_assoc($resul);
			$nameres = $info["name"];

			if($bol_enter_stud == 1 || $bol_enter_teach == 1)
			{
				SetCookie("name", "$nameres", time()+4800);
				SetCookie("log", "$logres", time()+4800);
				SetCookie("pass", "$pasres", time()+4800);
				$prov_in = "Вы успешно вошли"; 
				header('location: http://web-quest.hol.es/php/step2.php');
			} 
			else
			{
				$prov_in = "Вы неправильно ввели данные";
			}
		}
		else
		{
			$prov_in = "Вы неправильно ввели данные"; 
		}

	}

?>