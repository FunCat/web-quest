<?php


function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}


if (isset($_REQUEST["but_ent"]))
{
	//echo"YES!!!";
	$logres = $_REQUEST["log_ent"];
	$pasres = $_REQUEST["pass_ent"];
	$bul = strpbrk($logres, "'");
	$bul2 = strpbrk($pasres, "'");

	if($bul == FALSE && $bul2 == FALSE)
	{
		$pasres = md5(md5(trim($pasres)));

		$result_stud = mysqli_query($mysqli, "SELECT * FROM student WHERE student.login =  '$logres' AND student.password =  '$pasres'");
		$bol_enter_stud = mysqli_num_rows($result_stud);

		$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.login =  '$logres' AND teacher.password =  '$pasres'");
		$bol_enter_teach = mysqli_num_rows($result_teach);

		$hash = md5(generateCode(10));

		if($bol_enter_teach == 1){
			$resul = mysqli_query($mysqli, "SELECT name FROM teacher WHERE login =  '$logres'");	
			mysqli_query($mysqli, "UPDATE teacher SET hash = '$hash' WHERE login = '$logres'");
		}
		else if($bol_enter_stud == 1){
			$resul = mysqli_query($mysqli, "SELECT name FROM student WHERE login =  '$logres'");
			mysqli_query($mysqli, "UPDATE student SET hash ='$hash' WHERE login = '$logres'");
		}
		
		

		if($bol_enter_stud == 1 || $bol_enter_teach == 1)
		{
			$info = mysqli_fetch_assoc($resul);
			$nameres = $info["name"];
			SetCookie("name", "$nameres", time()+4800);
			SetCookie("log", "$logres", time()+4800);
			SetCookie("hash", "$hash", time()+4800);
			$prov_in = "Вы успешно вошли"; 
			header('location:'.$_SERVER['HTTP_REFERER']);
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

if(isset($_REQUEST["but_exit"]))
{
	$nameres = $_COOKIE['name'];
	$logres = $_COOKIE['log'];
	$hash = $_COOKIE['hash'];
	
	$result_stud = mysqli_query($mysqli, "SELECT * FROM student WHERE login =  '$logres'");
	$bol_enter_stud = mysqli_num_rows($result_stud);

	$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE login =  '$logres'");
	$bol_enter_teach = mysqli_num_rows($result_teach);

	if($bol_enter_teach == 1)
		mysqli_query($mysqli, "UPDATE teacher SET hash = '' WHERE login = '$logres'");
	else if($bol_enter_stud == 1)
		mysqli_query($mysqli, "UPDATE student SET hash ='' WHERE login = '$logres'");

	SetCookie("name","$nameres",time()-4800);
	SetCookie("log","$logres",time()-4800);
	SetCookie("hash","$hash",time()-4800);
	header('location:'.$_SERVER['HTTP_REFERER']);
}
?>