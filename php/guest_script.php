<?php


	if(isset($_REQUEST['guest_mode'])){
		$logres = "Гость";
		$pasres = "12345";
		$pasres = md5(md5(trim($pasres)));

		$result_stud = mysqli_query($mysqli, "SELECT * FROM student WHERE login =  '$logres' AND password =  '$pasres'");
		$bol_enter_stud = mysqli_num_rows($result_stud);

		$hash = md5(generateCode(10));
		$resul = mysqli_query($mysqli, "SELECT name FROM student WHERE login =  '$logres'");
		mysqli_query($mysqli, "UPDATE student SET hash ='$hash' WHERE login = '$logres'");

		$info = mysqli_fetch_assoc($resul);
		$nameres = $info["name"];
		SetCookie("name", "$nameres", time()+4800);
		SetCookie("log", "$logres", time()+4800);
		SetCookie("hash", "$hash", time()+4800);
		$prov_in = "Вы успешно вошли"; 
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

?>