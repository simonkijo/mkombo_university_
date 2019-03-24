<?php 
	if(isset($_POST['sv_time_b_md'])){
		$programme = 'Bachelor Degree';
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$course = $_POST['course'];
		
		//lec_no , modules
		/*$qr = "SELECT `lec_no`,`module` FROM `mkombo_university`.`module_assignment`";
		$rn = mysql_query($qr);
		while($row = mysql_fetch_array($rn)){
			$lec_no[] = $row['lec_no'];
			$module[] = $row['module'];
		}
		for($i=0;$i<count($lec_no);$i++){
			$assigned[] = printJSONDATA($module[$i]);
			$l_id[] = $lec_no[$i];
			
		}
		for($i=0;$i<count($l_id);$i++){
			$qr_ = "SELECT `programme`,`department` FROM `mkombo_university`.`lecturer_role` WHERE `lec_no`='".$l_id[$i]."'";
			$rn_ = mysql_query($qr_);
			while($row = mysql_fetch_array($rn_)){
				$prog[] = $row['programme'];
				$depart[] = $row['department'];
			}
		}
		for($i=0;$i<count($prog);$i++){
			if($prog[$i] == $programme && $depart[$i] == $course){
				$l_id_[] = $l_id[$i];
				$assigned_[] = $assigned[$i];
			}
		}
		//lec names
		for($i=0;$i<count($l_id_);$i++){
			$q_n = "SELECT `fname`,`mname`,`sname` FROM `mkombo_university`.`staff` WHERE `lec_no`='".$l_id_[$i]."'";
			$r_n = mysql_query($q_n);
			while($row = mysql_fetch_array($r_n)){
				$name[] = firstLetter($row['fname']).'.'.firstLetter($row['mname']).' '.firstCapitalLetter($row['sname']);
			}
		}
		
		foreach($assigned_ as $ass){
			foreach($ass as $as){
				$query = "SELECT `code`,`credit` FROM `mkombo_university`.`modules` WHERE `module_title`='".replaceSpaceWithUnderscore($as)."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semister`='".$semester."' AND `course`='".$course."'";
				$run = mysql_query($query);
				while($row = mysql_fetch_array($run)){
					$code[] = $row['code'];
					$credit[] = $row['credit'];
				}
			}
		}
		for($i=0;$i<count($credit);$i++){
			if($credit[$i] >= 1 && $credit[$i] <= 6){
				$code_1[] = $code[$i];
				$time = '150min';
			}else if($credit[$i] >= 7 && $credit[$i] <= 11){
				$code_2[] = $code[$i];
				$time = '100min';
			}else if($credit[$i] >= 12){
				$code_3[] = $code[$i];
				$time = '100min';
			}
		}
		//print_r($name).'<br>';
		//print_r($assigned_).'<br>';
		//printJSONDATA($para);
		//print_r($lec_no).'<br>';
		//print_r($code).'<br>';
		print_r($code_2).'<br>';
		print_r($code_3).'<br>';
		print_r($credit).'<br>';*/
	}
?>