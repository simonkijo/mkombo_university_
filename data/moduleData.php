<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){	
		if(isset($_POST['sv_modules_b'])){
			$programme = "Bachelor Degree";
		}else if(isset($_POST['sv_modules_od'])){
			$programme = "Ordinary Diploma";
		}
			$course = $_POST['course'];
			$year = $_POST['year'];
			$semester = $_POST['semester'];
			
			//counting input field.
			$count = count($_POST['code']);
			$md_success = Array();
			$cd = Array();
			$md = Array();
			$cre = Array();
			
			foreach($_POST['code'] as $code){ 
				if($code !=''){
					if(preg_match('/^[A-Za-z0-9 ]+$/',$code)){
						$cd[] = $code;
					}else{
						$md_success[3] = 'invalid';
						return $md_success;
					}
				}else{
					$md_success[2] = 'empty';
					return $md_success;
				}
			}
			foreach($_POST['module_title'] as $module){ 
				if($module !=''){
					if(preg_match('/^[A-Za-z ]+$/',$module)){
						$md[] = $module;
					}else{
						$md_success[3] = 'invalid';
						return $md_success;
					}
				}else{
					$md_success[2] = 'empty';
					return $md_success;
				}
			}
			foreach($_POST['credit'] as $credit){ 
				if($credit !=''){
					if(preg_match('/^[0-9]+$/',$credit)){
						$cre[] = $credit;
					}else{
						$md_success[3] = 'invalid';
						return $md_success;
					}
				}else{
					$md_success[2] = 'empty';
					return $md_success;
				}
			}
			for($i=0;$i<$count;$i++){
				$query = "INSERT INTO `mkombo_university`.`modules` VALUES('','".$cd[$i]."','".$md[$i]."','".$course."','".$year."','".$semester."','".$cre[$i]."','".$programme."')";
				$query_run = mysql_query($query);
			}
			
			if($query_run){
				$md_success[0] = $count;
				$md_success[1] = 'success';
				return $md_success;
			}else{
				$md_success[0] = $count;
				$md_success[1] = 'fail';
				return $md_success;
			}	
	}
?>