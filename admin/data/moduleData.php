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
		$i_count_co = 0; $i_count_md = 0; $i_count_cr = 0;
		$success = Array();
		$cd = Array();
		$md = Array();
		$cre = Array();
		//error sms for year, semester and course
		if($year == ''){
			$success[6] = 'no_year';
			return  $success;
		}else if($semester == ''){
			$success[7] = 'no_semester';
			return  $success;
		}else if($course == ''){
			$success[8] = 'no_course';
			return  $success;
		}
		//checking for duplicate
		$qr = "SELECT `code`,`module_title`,`credit` FROM `mkombo_university`.`modules` WHERE `programme`='".$programme."' AND `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."'";
		$run = mysql_query($qr);
		while($row = mysql_fetch_array($run)){
			$cda[] = strtolower($row['code']);
			$mda[] = strtolower($row['module_title']);
			$cra[] = strtolower($row['credit']);
		}
		
		//end of checking
		foreach($_POST['code'] as $code){ 
			if($code !=''){
				if(preg_match('/^[A-Za-z0-9 ]+$/',$code)){
					$i_count_co += count($code);
					$cd[] = replaceSpaceWithUnderscore($code);
				}else{
					$success[3] = 'invalid';
					return $success;
				}
			}else{
				//if all fields are empty, print error sms
				if($i_count_co == 0){
					$success[2] = 'empty';
					return  $success;
				}
			}
		}
		foreach($_POST['module_title'] as $module){ 
			if($module !=''){
				if(preg_match('/^[A-Za-z ]+$/',$module)){
					$i_count_md += count($module);
					$md[] = replaceSpaceWithUnderscore($module);
				}else{
					$success[3] = 'invalid';
					return $success;
				}
			}else{
				//if all fields are empty, print error sms
				if($i_count_md == 0){
					$success[2] = 'empty';
					return  $success;
				}
			}
		}
		foreach($_POST['credit'] as $credit){ 
			if($credit !=''){
				if(preg_match('/^[0-9]+$/',$credit)){
					if(strlen($credit) <= 2 && strlen($credit) >= 1){
						$i_count_cr += count($credit);
						$cre[] = $credit;
					}else{
						$success[4] = 'digit_error';
						return $success;
					}
				}else{
					$success[3] = 'invalid';
					return $success;
				}
			}else{
				//if all fields are empty, print error sms
				if($i_count_cr == 0){
					$success[2] = 'empty';
					return  $success;
				}
			}
		}
		if(count($cda) == 0){
			$add = '=';
		}else{
			$add = '';
		}
		
		//check if already uploaded.
		for($i=0;$i<$add.count($cda);$i++){
			if(in_array($cda[$i],$cd)){
				$success_f[] = $cda[$i];
			}
		}
		
		for($i=0;$i<$add.count($mda);$i++){
			if(in_array($mda[$i],$md)){
				$success_m[] = $mda[$i];
			}
		}
		for($i=0;$i<$add.count($cra);$i++){
			if(in_array($cra[$i],$cre)){
				$success_s[] = $cra[$i];
			}
		}
		if(count($success_f) != 0 && count($success_m) != 0 && count($success_s) != 0){
			$success[9] = 'duplicate';
			return $success;
		}
		//end of already uploaded
		for($i=0;$i<count($cd);$i++){
			$qr = "CREATE TABLE `".$md[$i]."` (`".$md[$i]."_reg_no` VARCHAR(12) NOT NULL PRIMARY KEY,
			`".$md[$i]."_ca` INT(2) NULL,
			`".$md[$i]."_fe` INT(2) NULL,
			`".$md[$i]."_total` INT(3) NULL,
			`".$md[$i]."_grade` VARCHAR(2) NULL,
			`".$md[$i]."_grade_point_x_credit` INT(4) NULL
			)";
			$rn = mysql_query($qr);
		}
		for($i=0;$i<count($cd);$i++){
			$query = "INSERT INTO `mkombo_university`.`modules` VALUES('','".$cd[$i]."','".$md[$i]."','".$course."','".$year."','".$semester."','".$cre[$i]."','".$programme."','NO')";
			$query_run = mysql_query($query);
			$success_ct[] = $i;
		}
		
		if($query_run){
			$success[0] = count($success_ct);
			$success[1] = 'success';
			return $success;
		}else{
			$success[0] = $count;
			$success[5] = 'fail';
			return $success;
		}	
	}
?>