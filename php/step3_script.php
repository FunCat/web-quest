<?php
	include "../config.php";
	include "cookie.php";
	$q = 0;
	


	if(isset($_POST['num_answer']) && isset($_POST['questions']) && isset($_POST['answers'])){


		$id_test = $_COOKIE['num'];

		$string = $_POST["role"];
		$role = explode("|", $string);

		$string = $_POST["num_answer"];
		$num_answer = explode("|", $string);

		$string = $_POST["questions"];
		$questions = explode("|", $string);

		$string = $_POST["answers"];
		$right_answer = explode("|", $string);

		$string = $_POST["n"];
		$n = explode("|", $string);
		
		for($i = 1; $i < $num_answer[1]+1; $i++){
			$string = $_POST["ans$i"];
			$answer[$i] = explode("|", $string);
		}

		$active_role = $role[1];
		mysqli_query($mysqli, "DELETE FROM test WHERE info_test_id = '$id_test' AND role_id = '$active_role'");

		for($i = 1; $i < $num_answer[1] + 1; $i++){
			
			$right_ans = $right_answer[$i];
			$quest = $questions[$i];
			$ans0 = $answer[$i][1];
			$ans1 = $answer[$i][2];
			$ans2 = $answer[$i][3];
			$ans3 = $answer[$i][4];
			$ans4 = $answer[$i][5];
			$ans5 = $answer[$i][6];
			$ans6 = $answer[$i][7];
			$ans7 = $answer[$i][8];

			$add_info_test = mysqli_query($mysqli, "INSERT INTO test (info_test_id, question, answer_1, answer_2, answer_3, answer_4, answer_5, answer_6, answer_7, answer_8, right_answer, role_id) VALUES ('$id_test','$quest','$ans0', '$ans1', '$ans2', '$ans3', '$ans4', '$ans5', '$ans6', '$ans7', '$right_ans', '$active_role')");
			mysqli_query($mysqli, "UPDATE info_test SET type_test_id = '1' WHERE id = '$id_test'");
		}
	}

?>