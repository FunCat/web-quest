<?php 
	if(isset($_REQUEST['n_but'])){

		$a = $_COOKIE['num'];
		SetCookie("num", "$a", time()-4800);

		$r = mysqli_query($mysqli, "SELECT MAX(info_test.id) as kol FROM info_test");
		$i= mysqli_fetch_assoc($r);
		$a = $i["kol"] + 1;
		
		SetCookie("num", "$a", time()+4800);

		$name = $_REQUEST['test_name'];
		$topic = $_REQUEST['val_top'];
		$id_dostyp = $_REQUEST['type_test'];
		if(isset($_REQUEST['add_rol']))
			$rols = 1;
		else
			$rols = 0;

		if (isset($_POST['role'])) { 
			foreach ( $_POST['role'] as $k=>$m) { 
				if (!empty($m)) { $role[$k] = $m; } 
			}
		}
		$role1 = 0; $role2 = 0; $role3 = 0; $role4 = 0; $role5 = 0; $kol_roles = 0;
		if($role[0] != ''){$role1 = $role[0]; $kol_roles++;}
		if($role[1] != ''){$role2 = $role[1]; $kol_roles++;}
		if($role[2] != ''){$role3 = $role[2]; $kol_roles++;}
		if($role[3] != ''){$role4 = $role[3]; $kol_roles++;}
		if($role[4] != ''){$role5 = $role[4]; $kol_roles++;}


		$logres = $_COOKIE['log'];
		$result_teach = mysqli_query($mysqli, "SELECT * FROM teacher WHERE teacher.login =  '$logres'");
		$info_teach= mysqli_fetch_assoc($result_teach);
		$teach_id = $info_teach['id'];


		if($rols == 1){
			echo '+';
			$result_teach = mysqli_query($mysqli, "INSERT INTO info_test (id, name, type_test_id, topic_id, creator_id, create_date, doctyp_id, roles, role1, role2, role3, role4, role5) VALUES ('$a', '$name', 0, $topic, $teach_id, CURDATE(), $id_dostyp, $rols, '$role1', '$role2', '$role3', '$role4', '$role5')");
		}
		else if($rols == 0){
			$result_teach = mysqli_query($mysqli, "INSERT INTO info_test (id, name, type_test_id, topic_id, creator_id, create_date, doctyp_id, roles, role1, role2, role3, role4, role5) VALUES ('$a', '$name', 0, $topic, $teach_id, CURDATE(), $id_dostyp, $rols, 0, 0, 0, 0, 0)");
		}

		$active = 0;
		if($kol_roles != 0) $active = 1;
		header('location: http://web-quest.hol.es/php/step3.php?active='.$active.'&kol='.$kol_roles);

		

	}
?>