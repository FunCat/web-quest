<?php 
	include "../config.php";
	if(isset($_REQUEST['registrstion_button'])){
		$prov = '';
		$name = $_REQUEST['user_name'];
		$lastname = $_REQUEST['user_lastname'];
		$login = $_REQUEST['user_login'];
		$mail = $_REQUEST['user_mail'];
		$password = $_REQUEST['user_pass'];
		$password2 = $_REQUEST['user_sec_pass'];
		$type = $_REQUEST['type_function'];
		if($name == '' || $lastname == '' || $login == '' || $password == '' || $password2 == '' || $type == ''){
			$prov = "Вы не везде указали данные!";
		}
		else if ($password != $password2){
			$prov = "Пароли не совпадают!";
		}
		else{
			$prov_log_teach_prev = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.login = '$login'");
			$prov_log_teach = mysqli_num_rows($prov_log_teach_prev);
			$prov_log_stud_prev = mysqli_query($mysqli, "SELECT * FROM student WHERE student.login = '$login'");
			$prov_log_stud = mysqli_num_rows($prov_log_stud_prev);

			if($prov_log_teach != 0 || $prov_log_stud != 0){
				$prov = "Логин уже занят.";
			}
			else{
				mysqli_query($mysqli, "INSERT INTO info (sms_system, works_system) VALUES (0, 0)");
				$li = mysqli_query($mysqli, "SELECT max(id) AS m FROM info");
				$li_data = mysqli_fetch_assoc($li);
<<<<<<< HEAD
				$password = md5(md5(trim($password)));
=======
>>>>>>> 36280587c97de042c38fbc66d1f2f7c3d5dd39b0

				if($type == 0){
					$result = mysqli_query($mysqli, "INSERT INTO teacher (name, lastname, login, `password`, `mail`, info_id) VALUES ('$name','$lastname','$login', '$password', '$mail', '$li_data[m]')");
					$prov = mysqli_query($mysqli, "SELECT COUNT(teacher.login) AS num FROM teacher WHERE teacher.login =  '$login' AND teacher.password =  '$password'");
					$data = mysqli_fetch_assoc($prov);
				}
				else if($type == 1){
					$result = mysqli_query($mysqli, "INSERT INTO student (name, lastname, login, `password`, `mail`, teacher_id, font_size, info_id) VALUES ('$name','$lastname','$login', '$password', '$mail', '0', '0', '$li_data[m]')");
					$prov = mysqli_query($mysqli, "SELECT COUNT(student.login) AS num FROM student WHERE student.login =  '$login' AND student.password =  '$password'");
					$data = mysqli_fetch_assoc($prov);
				}

				if($data[num] == 1)
				{
					$prov = "Регистрация прошла успешно!";
				}
				else
				{
					$prov = "Попробуйте чуть позже.";
				}
			}
		}
		
	}

?>