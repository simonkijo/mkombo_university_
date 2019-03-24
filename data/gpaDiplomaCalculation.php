<?php 
	if(isset($_POST['calculate'])){
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$course = $_POST['course'];
		$programme = 'Ordinary Diploma';
		
		if($year == '' || $semester == '' || $course == ''){
			$success[4] = 'no_selected';
			return $success;
		}
		// modules and their credit.
		$query = "SELECT `module_title` FROM `mkombo_university`.`modules` WHERE `year`='".$year."' AND `semister`='".$semester."' AND `course`='".$course."' AND `programme`='".$programme."'";
		$run = mysql_query($query);
		while($row = mysql_fetch_array($run)){
			$module_title[] = $row['module_title'];
		}
		//sum of credits of all modules
		$query = "SELECT SUM(`credit`) AS `scredit` FROM `mkombo_university`.`modules` WHERE `year`='".$year."' AND `semister`='".$semester."' AND `course`='".$course."' AND `programme`='".$programme."'";
		$run = mysql_query($query);
		$scredit = mysql_result($run,0,'scredit');
		//students reg no.
		$st_q = "SELECT `reg_no`,`year`,`semester`,`course`,`programme` FROM `mkombo_university`.`student` WHERE `course`='".$course."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semester`='".$semester."'";
		$st_r = mysql_query($st_q);
		while($row = mysql_fetch_array($st_r)){
			$reg_no[] = $row['reg_no'];
			$year_st[] = $row['year'];
			$semester_st[] = $row['semester'];
			$course_st[] = $row['course'];
			$programme_st[] = $row['programme'];
		}
		
		//insert data for generating report later.
		for($i=0;$i<count($reg_no);$i++){
			$report = "SELECT `reg_no` FROM `mkombo_university`.`for_report` WHERE `reg_no`='".$reg_no[$i]."' AND `course`='".$course_st[$i]."' AND `programme`='".$programme_st[$i]."' AND `year`='".$year_st[$i]."' AND `semester`='".$semester_st[$i]."'";
			$report_run = mysql_query($report);
			while($row = mysql_fetch_array($report_run)){
				$row_[] = $row['reg_no'];
			}
		}
		
		if(count($row_) == 0){
			for($i=0;$i<count($reg_no);$i++){
				$st_sql = "INSERT INTO `mkombo_university`.`for_report` VALUES('','".$reg_no[$i]."','".$course_st[$i]."','".$programme_st[$i]."','".$year_st[$i]."','".$semester_st[$i]."')";
				$st_run = mysql_query($st_sql);
			}
		}
		
		for($i=0;$i<count($reg_no);$i++){
			$query = 'SELECT ('.addPlus($module_title).') as total FROM '.addComma($module_title).' WHERE '.addAnd($module_title,$reg_no[$i]).'';
			$run = mysql_query($query);
			while($row = mysql_fetch_array($run)){
				$total[] = $row['total'];
			}
		}
		
		for($i=0;$i<count($reg_no);$i++){
			$gpa[] = round(($total[$i] / $scredit),4);
		}
		//for cgpa and gpa classification
		if($semester == 'second'){
			for($i=0;$i<count($reg_no);$i++){
				$qry = "SELECT `gpa` FROM `mkombo_university`.`gpa` WHERE `year`='".$year."' AND `semester`='first' AND `reg_no`='".$reg_no[$i]."'";
				$run = mysql_query($qry);
				while($row = mysql_fetch_array($run)){
					$gpa_1[] = $row['gpa'];
				}
			}
			for($i=0;$i<count($reg_no);$i++){
				$cgpa[] = round((($gpa[$i] + $gpa_1[$i])/2),1);
			}
			for($i=0;$i<count($reg_no);$i++){
				if($cgpa[$i] >= 4.4 && $cgpa[$i] <= 5.0){
					$gpa_class[] = 'First Class';
				}else if($cgpa[$i] >= 3.5 && $cgpa[$i] <= 4.3){ 
					$gpa_class[] = 'Upper Second Class';
				}else if($cgpa[$i] >= 2.7 && $cgpa[$i] <= 3.4){
					$gpa_class[] = 'Lower Second Class';
				}else if($cgpa[$i] >= 2.0 && $cgpa[$i] <= 2.6){
					$gpa_class[] = 'Pass';
				}
			}
			//check if there are data, to avoid duplicate in gpa_class table
			for($i=0;$i<count($reg_no);$i++){
				$qr1 = "SELECT `cgpa` FROM `mkombo_university`.`gpa_class` WHERE `reg_no`='".$reg_no[$i]."' AND `cgpa`='".$cgpa[$i]."' AND `cgpa_class`='".$gpa_class[$i]."' AND `year`='".$year."'";
				$rn = mysql_query($qr1);
				while($row = mysql_fetch_array($rn)){
					$check_cgpa[] = $row['cgpa'];
				}
			}
			
			if(count($check_cgpa) == 0){
				//insert if no duplicate
				for($i=0;$i<count($reg_no);$i++){
					$qr = "INSERT INTO `mkombo_university`.`gpa_class` VALUES('','".$reg_no[$i]."','".$cgpa[$i]."','".$gpa_class[$i]."','".$year."')";
					mysql_query($qr);
				}
			}
			
		}
		//check if there are data, to avoid duplicate in gpa table.
		for($i=0;$i<count($reg_no);$i++){
			$qry = "SELECT `gpa` FROM `mkombo_university`.`gpa` WHERE `year`='".$year."' AND `semester`='".$semester."' AND `reg_no`='".$reg_no[$i]."'";
			$run = mysql_query($qry);
			while($row = mysql_fetch_array($run)){
				$gpa_2[] = $row['gpa'];
			}
		}
		if(count($gpa_2) == 0){
			for($i=0;$i<count($reg_no);$i++){
				if($gpa[$i] != ''){
					$query_ = "INSERT INTO `mkombo_university`.`gpa` VALUES('','".$year."','".$semester."','".$gpa[$i]."','".$reg_no[$i]."')";
					$run_ = mysql_query($query_);
				}else{
					$success[3] = 'no_student';
					return $success;
				}
			}
			
			//set year or semester for next academic year of student 
			for($i=0;$i<count($reg_no);$i++){
				if($year_st[$i] == 'first' && $semester_st[$i] == 'first'){
					$semester_st_new = 'second';
					$qe = "UPDATE `mkombo_university`.`student` SET `semester`='".$semester_st_new."' WHERE `reg_no`='".$reg_no[$i]."'";
					$re = mysql_query($qe);
				}else if($year_st[$i] == 'first' && $semester_st[$i] == 'second'){
					$semester_st_new = 'first'; $year_st_new = 'second';
					$qe = "UPDATE `mkombo_university`.`student` SET `semester`='".$semester_st_new."', `year`='".$year_st_new."' WHERE `reg_no`='".$reg_no[$i]."'";
					$re = mysql_query($qe);
				}else if($year_st[$i] == 'second' && $semester_st[$i] == 'first'){
					$semester_st_new = 'second';
					$qe = "UPDATE `mkombo_university`.`student` SET `semester`='".$semester_st_new."' WHERE `reg_no`='".$reg_no[$i]."'";
					$re = mysql_query($qe);
				}else if($year_st[$i] == 'second' && $semester_st[$i] == 'second'){
					$semester_st_new = 'first'; $year_st_new = 'third';
					$qe = "UPDATE `mkombo_university`.`student` SET `semester`='".$semester_st_new."', `year`='".$year_st_new."' WHERE `reg_no`='".$reg_no[$i]."'";
					$re = mysql_query($qe);
				}else if($year_st[$i] == 'third' && $semester_st[$i] == 'first'){
					$semester_st_new = 'second';
					$qe = "UPDATE `mkombo_university`.`student` SET `semester`='".$semester_st_new."' WHERE `reg_no`='".$reg_no[$i]."'";
					$re = mysql_query($qe);
				}else if($year_st[$i] == 'third' && $semester_st[$i] == 'second'){
					$semester_st_new = 'first'; $year_st_new = 'forth';
					$qe = "UPDATE `mkombo_university`.`student` SET `semester`='".$semester_st_new."', `year`='".$year_st_new."' WHERE `reg_no`='".$reg_no[$i]."'";
					$re = mysql_query($qe);
				}else if($year_st[$i] == 'forth' && $semester_st[$i] == 'first'){
					$semester_st_new = 'second';
					$qe = "UPDATE `mkombo_university`.`student` SET `semester`='".$semester_st_new."' WHERE `reg_no`='".$reg_no[$i]."'";
					$re = mysql_query($qe);
				}
			}
			//message for success or fail in gpa calculation
			if($run_){
				$success[1] = 'success';
				return $success;
			}else{
				$success[2] = 'fail';
				return $success;
			}
		}
	}
?>