<?php 


	if(isset($_REQUEST['n_but'])){
		$test_id = $_GET["number"];
		$role = $_GET["r"];
		$student = $_COOKIE["name"];

		$info_name = mysqli_query($mysqli, "SELECT id FROM student WHERE name = '$student'");
		$info = mysqli_fetch_assoc($info_name);
		$stud_id = $info["id"];

		$right = 0;
		$kol = 0;

		$result=mysqli_query($mysqli, "SELECT question, answer_1, answer_2, answer_3, answer_4, answer_5, answer_6, answer_7, answer_8, right_answer FROM test WHERE info_test_id = '$test_id' AND role_id = '$role'");
		while($row=mysqli_fetch_array($result))
		{
			$kol++;
			$right_answer[$kol] = $row['right_answer'];
			
		}

		for($i = 1; $i < $kol+1; $i++)
			if (isset($_POST["question_$i"]))
				foreach ($_POST["question_$i"] as $k=>$m)
					if (!empty($m)) $answers[$i] = $m-1; 

		for($i = 1; $i < count($answers)+1; $i++)
			if($answers[$i] == $right_answer[$i])
				$right++;

		$procent = $right/$kol*100;

		if($procent > 90) $mark = 5;
		else if($procent > 75) $mark = 4;
		else if($procent > 60) $mark = 3;
		else $mark = 2;

		mysqli_query($mysqli, "INSERT INTO test_report (student_id, info_test_id, `date`, mark, procent, role_id) VALUES ( '$stud_id', '$test_id', CURDATE(), '$mark', '$procent', '$role')");
		
		header('location: http://web-quest.hol.es/php/test.php?m='.$mark.'&p='.$procent);

	}



?>