<?php 
	if(isset($_POST['adm_show'])){
		
		$programme = "Bachelor Degree";
		$course = $_POST['course'];
		
		if($course == ''){
			$success[1] = 'no_selected';
			return $success;
		}
		$sql = "SELECT `reg_no`,`fname`,`mname`,`sname`,`gender`,`nationality`,`year`,`semester` FROM `mkombo_university`.`student` WHERE `programme`='".$programme."' AND `course`='".$course."'";
		$sql_run = mysql_query($sql);
		while($row = mysql_fetch_array($sql_run)){
			$reg_no[] = $row['reg_no'];
			$fname[] = $row['fname'];
			$mname[] = $row['mname'];
			$sname[] = $row['sname'];
			$gender[] = $row['gender'];
			$nationality[] = $row['nationality'];
			$year[] = $row['year'];
			$semester[] = $row['semester'];
		}
		if(count($reg_no)==0 && count($fname)==0 && count($mname)==0 && count($sname)==0 && count($gender)==0 && count($nationality)==0 && count($year)==0 && count($semester)==0){
			$success[0] = 'no_data';
			return $success;
		}
	}else if(isset($_POST['adm_od_show'])){
		$programme = "Ordinary Diploma";
		$course = $_POST['course'];
		
		if($course == ''){
			$success[1] = 'no_selected';
			return $success;
		}
		$sql = "SELECT `reg_no`,`fname`,`mname`,`sname`,`gender`,`nationality`,`year`,`semester` FROM `mkombo_university`.`student` WHERE `programme`='".$programme."' AND `course`='".$course."'";
		$sql_run = mysql_query($sql);
		while($row = mysql_fetch_array($sql_run)){
			$reg_no[] = $row['reg_no'];
			$fname[] = $row['fname'];
			$mname[] = $row['mname'];
			$sname[] = $row['sname'];
			$gender[] = $row['gender'];
			$nationality[] = $row['nationality'];
			$year[] = $row['year'];
			$semester[] = $row['semester'];
		}
		if(count($reg_no)==0 && count($fname)==0 && count($mname)==0 && count($sname)==0 && count($gender)==0 && count($nationality)==0 && count($year)==0 && count($semester)==0){
			$success[0] = 'no_data';
			return $success;
		}
	}
?>