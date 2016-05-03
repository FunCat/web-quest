<?php 


	if(isset($_REQUEST['n_but'])){
		$test_id = $_GET["number"];
		$role = $_GET["r"];
		$student = $_COOKIE["name"];
		$student_log = $_COOKIE["log"];

		$now_quest = $_SESSION['now_quest'];
		$right = $_SESSION['right'];

		$info_name = mysqli_query($mysqli, "SELECT id FROM student WHERE login = '$student_log'");
		$info = mysqli_fetch_assoc($info_name);
		$stud_id = $info["id"];

		$kol = 0;

		$result=mysqli_query($mysqli, "SELECT question, answer_1, answer_2, answer_3, answer_4, answer_5, answer_6, answer_7, answer_8, right_answer FROM test WHERE info_test_id = '$test_id' AND role_id = '$role'");
		while($row=mysqli_fetch_array($result))
		{
			$kol++;
			$right_answer[$kol] = $row['right_answer'];
			
		}

		for($i = 1; $i < $kol + 1; $i++)
			if (isset($_POST["question_$i"]))
				foreach ($_POST["question_$i"] as $k=>$m)
					if (!empty($m)) $answers[$i] = $m-1; 

		for($i = 1; $i < $kol + 1; $i++)
			if($i == $now_quest){
				if($answers[$i] == $right_answer[$i])
					{$right++; $_SESSION['right'] = $right;}
			}


		if($kol == $now_quest){
			$procent = $right/$kol*100;

			if($procent > 90) $mark = 5;
			else if($procent > 75) $mark = 4;
			else if($procent > 60) $mark = 3;
			else $mark = 2;

			$procent = round($procent);

			mysqli_query($mysqli, "INSERT INTO test_report (student_id, info_test_id, `date`, mark, procent, role_id) VALUES ( '$stud_id', '$test_id', CURDATE(), '$mark', '$procent', '$role')");
		
			unset($_SESSION['now_quest']);
			unset($_SESSION['right']);
			
			header('location: http://web-quest.hol.es/php/test.php?m='.$mark.'&p='.$procent);
		}
		else
		{
			$now_quest++;
			$_SESSION['now_quest'] = $now_quest;
			header('location: http://web-quest.hol.es/php/test.php?number='.$test_id.'&r='.$role);
		}
	}

	if(isset($_REQUEST['exit_quest'])){
		$test_id = $_GET["number"];
		$role = $_GET["r"];
		$student = $_COOKIE["name"];
		$student_log = $_COOKIE["log"];

		$now_quest = $_SESSION['now_quest'];
		$right = $_SESSION['right'];

		$info_name = mysqli_query($mysqli, "SELECT id FROM student WHERE login = '$student_log'");
		$info = mysqli_fetch_assoc($info_name);
		$stud_id = $info["id"];

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
			if($i == $now_quest)
				if($answers[$i] == $right_answer[$i])
					{$right++; $_SESSION['right'] = $right;}
				
		$procent = $right/$kol*100;

		if($procent > 90) $mark = 5;
		else if($procent > 75) $mark = 4;
		else if($procent > 60) $mark = 3;
		else $mark = 2;

		$procent = round($procent);

		mysqli_query($mysqli, "INSERT INTO test_report (student_id, info_test_id, `date`, mark, procent, role_id) VALUES ( '$stud_id', '$test_id', CURDATE(), '$mark', '$procent', '$role')");
	
		unset($_SESSION['now_quest']);
		unset($_SESSION['right']);
		
		header('location: http://web-quest.hol.es/php/test.php?m='.$mark.'&p='.$procent);
	}


	if(isset($_REQUEST['exit_quest2'])){
		$test_id = $_GET["number"];
		$role = $_GET["r"];
		$student = $_COOKIE["name"];
		$student_log = $_COOKIE["log"];

		$info_name = mysqli_query($mysqli, "SELECT id FROM student WHERE login = '$student_log'");
		$info = mysqli_fetch_assoc($info_name);
		$stud_id = $info["id"];

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

		$procent = round($procent);

		mysqli_query($mysqli, "INSERT INTO test_report (student_id, info_test_id, `date`, mark, procent, role_id) VALUES ( '$stud_id', '$test_id', CURDATE(), '$mark', '$procent', '$role')");
		
		unset($_SESSION['now_quest']);
		unset($_SESSION['right']);
		
		header('location: http://web-quest.hol.es/php/test.php?m='.$mark.'&p='.$procent);
	}



?>