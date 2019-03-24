<?php 
	if(isset($_POST['sv_mAssign'])){
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		
		$department = getRoleField('department');
		$programme = getRoleField('programme');
		//module title
		$query = "SELECT `module_title` FROM `mkombo_university`.`modules` WHERE `course`='".$department."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semister`='".$semester."'";
		$run =mysql_query($query);
		while($row = mysql_fetch_array($run)){
			$module[] = $row['module_title'];
		}
		//lecturer identity
		$q = "SELECT `lec_no` FROM `mkombo_university`.`lecturer_role` WHERE `programme`='".$programme."' AND `department`='".$department."'";
		$run_1 = mysql_query($q);
		while($row_1 = mysql_fetch_array($run_1)){
			$lec_no[] = $row_1['lec_no'];
		}
		
		$fname[] = lecturerNames($lec_no,'fname');
		$mname[] = lecturerNames($lec_no,'mname');
		$sname[] = lecturerNames($lec_no,'sname');
		
		foreach($fname as $fn){
			foreach($fn as $f){
				$f_[] = $f;
			}
		}
		foreach($mname as $mn){
			foreach($mn as $m){
				$m_[] = $m;
			}
		}
		foreach($sname as $sn){
			foreach($sn as $s){
				$s_[] = $s;
			}
		}
		
	}
	if(isset($_POST['sv_assign'])){
		$department = getRoleField('department');
		$programme = getRoleField('programme');
		//lecturer identity
		$q = "SELECT `lec_no` FROM `mkombo_university`.`lecturer_role` WHERE `programme`='".$programme."' AND `department`='".$department."'";
		$run_1 = mysql_query($q);
		while($row_1 = mysql_fetch_array($run_1)){
			$lec_no[] = $row_1['lec_no'];
		}
		
		for($i=0;$i<count($lec_no);$i++){
			$c = count($_POST['module_title_'.($i+1).'']);
			if($c != 0){
				$modules[] = json_encode($_POST['module_title_'.($i+1).'']);
				$id[] = $lec_no[$i];
			}
		}
		
		for($i=0;$i<count($id);$i++){
			$qry = "INSERT INTO `mkombo_university`.`module_assignment` VALUES('".$id[$i]."','".$modules[$i]."')";
			$run_ = mysql_query($qry);
		}
		if($run_){
			$success[1] = 'success';
			return $success;
		}else{
			$success[2] = 'fail';
			return $success;
		}
	}
?>