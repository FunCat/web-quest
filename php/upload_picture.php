<?php
	include "../config.php";
	include "cookie.php";

	if(isset($_POST['file'])){
		$d = $_POST['d'];
		$file = $_POST['file'];
		mysqli_query($mysqli, "UPDATE test SET img = '$file' WHERE id = '$d'");
	}


?>