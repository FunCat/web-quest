<?php

	if(isset($_REQUEST['n_but'])){

		$id_test = $_COOKIE['num'];
	
		$vvod_text = $_POST['vvod_text'];

		if (isset($_POST['book'])) { 
			foreach ( $_POST['book'] as $k=>$m) { 
				if (!empty($m)) { 
					$book[$k] = $m; 
				} 
			}
		}

		if (isset($_POST["adres"])) { 
			foreach ( $_POST["adres"] as $k=>$m) {
				if (!empty($m)) { 
					$adres[$k] = $m;
				} 	
			}
		}

		mysqli_query($mysqli, "UPDATE info_test SET first_text = '$vvod_text' WHERE info_test.id = $id_test");

		for($i = 0; $i < count($book); $i++){
			mysqli_query($mysqli, "INSERT INTO books (info_test_id, name, adres) VALUES ('$id_test','$book[$i]','$adres[$i]')");
		}

		header('location: http://web-quest.hol.es/php/step5.php');

	}
?>