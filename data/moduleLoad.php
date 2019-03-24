<?php 

	if(isset($_POST['sv_time_b'])){
		$programme = 'Bachelor Degree';
		$course = $_POST['course'];
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		
		if($course != '' && $year != '' && $semester != ''){
			$query = "SELECT `module` FROM `mkombo_university`.`time_table` WHERE `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."' AND `programme`='".$programme."'";
			$run = mysql_query($query);
			while($row = mysql_fetch_array($run)){
				$module1[] = $row['module'];
			}
			$query_ = "SELECT `module_title` FROM `mkombo_university`.`modules` WHERE `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."' AND `programme`='".$programme."'";
			$query_run = mysql_query($query_);
			while($row = mysql_fetch_array($query_run)){
				$data_[] = $row['module_title'];
			}
			for($i=0;$i<count($data_);$i++){
				if(in_array(replaceUnderscoreWithSpace($data_[$i]),$module1)){
					$similar[] = $i;
				}
			}
			if(count($similar) == count($data_)){
				if(isset($_GET['edit'])){
					if($_GET['edit'] == 'yes'){
						for($i=0;$i<count($data_);$i++){$data[] = $data_[$i];}
					}
				}else{
					$success[4] = 'time_table_created';
					return $success;
				}
			}else{
				for($i=0;$i<count($data_);$i++){$data[] = $data_[$i];}
			}
			
		}else{
			$success[3] = 'no_selected';
			return $success;
		}
	}else if(isset($_POST['sv_time_od'])){
		$programme = 'Ordinary Diploma';
		$course = $_POST['course'];
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		
		if($course != '' && $year != '' && $semester != ''){
			$query = "SELECT `module` FROM `mkombo_university`.`time_table` WHERE `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."' AND `programme`='".$programme."'";
			$run = mysql_query($query);
			while($row = mysql_fetch_array($run)){
				$module1[] = $row['module'];
			}
			$query_ = "SELECT `module_title` FROM `mkombo_university`.`modules` WHERE `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."' AND `programme`='".$programme."'";
			$query_run = mysql_query($query_);
			while($row = mysql_fetch_array($query_run)){
				$data_[] = $row['module_title'];
			}
			for($i=0;$i<count($data_);$i++){
				if(in_array(replaceUnderscoreWithSpace($data_[$i]),$module1)){
					$similar[] = $i;
				}
			}
			if(count($similar) == count($data_)){
				if(isset($_GET['edit'])){
					if($_GET['edit'] == 'yes'){
						for($i=0;$i<count($data_);$i++){$data[] = $data_[$i];}
					}
				}else{
					$success[4] = 'time_table_created';
					return $success;
				}
			}else{
				for($i=0;$i<count($data_);$i++){$data[] = $data_[$i];}
			}
		}else{
			$success[3] = 'no_selected';
			return $success;
		}
	}
	
?>