<?php 
	if(isset($_POST['sv_marks'])){
		$department = getRoleField('department');
		$programme = getRoleField('programme');
		
		$query = "SELECT `module` FROM `mkombo_university`.`module_assignment` WHERE `lec_no`='".getField('lec_no')."'";
		$run = mysql_query($query);
		while($row = mysql_fetch_array($run)){
			$modules = $row['module'];
		}
		
		if(count(printJSONDATA($modules)) > 1){
			$mod = printJSONDATA($modules);
			$q_marks = "SELECT `module` FROM `mkombo_university`.`check_module` WHERE `lec_no`='".getRoleField('lec_no')."'";
			$q_run = mysql_query($q_marks);
			while($row = mysql_fetch_array($q_run)){
				$m[] = $row['module'];
			}
			for($i=0;$i<count($m);$i++){
				if(in_array($m[$i],$mod)){
					$module = $m[$i];
				}
			}
			//delete inserted module from check_module
			mysql_query("DELETE FROM `mkombo_university`.`check_module` WHERE `lec_no`='".getRoleField('lec_no')."'");
			
			$qr = "SELECT `year`,`semister`,`credit`,`code` FROM `mkombo_university`.`modules` WHERE `module_title`='".replaceSpaceWithUnderscore($module)."' AND `course`='".$department."' AND `programme`='".$programme."'";
			$qr_run = mysql_query($qr);
			while($row = mysql_fetch_array($qr_run)){
				$year = $row['year'];
				$semester = $row['semister'];
				$credit = $row['credit'];
				$code = $row['code'];
			}
		}else if(count(printJSONDATA($modules)) == 1){
			$one_m = printJSONDATA($modules);
			foreach(printJSONDATA($modules) as $md){
				$qr = "SELECT `year`,`semister`,`credit`,`code` FROM `mkombo_university`.`modules` WHERE `module_title`='".replaceSpaceWithUnderscore($md)."' AND `course`='".$department."' AND `programme`='".$programme."'";
				$qr_run = mysql_query($qr);
				while($row = mysql_fetch_array($qr_run)){
					$year = $row['year'];
					$semester = $row['semister'];
					$credit = $row['credit'];
					$code = $row['code'];
				}
			}
		}
		
		$query_st = "SELECT `reg_no`,`fname`,`mname`,`sname` FROM `mkombo_university`.`student` WHERE `course`='".$department."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semester`='".$semester."'";
		$run_st = mysql_query($query_st);
		while($row = mysql_fetch_array($run_st)){
			$reg_no_[] = $row['reg_no'];
		}
		
		if($module != ''){
			$g = replaceSpaceWithUnderscore($module);
		}else{
			$g = replaceSpaceWithUnderscore($one_m[0]);
		}
		
		$cat = $_POST['ca'];
		$fet = $_POST['fe'];
		//validating ca and fe
		for($i=0;$i<count($cat);$i++){
			if($cat[$i] != ''){
				if(preg_match('/^[0-9]+$/',$cat[$i])){
					if(strlen($cat[$i]) == 2){
						if($cat[$i] >= 0 && $cat[$i] <= 40){
							$reg[] = $reg_no_[$i];
							$cat_[] = $cat[$i];
						}else{
							$success[10] = 'ca_error';
							return  $success;
						}
					}else{
						$success[9] = 'two_digit_error';
						return  $success;
					}
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				$success[3] = 'empty';
				return  $success;
			}
		}
		for($i=0;$i<count($fet);$i++){
			if($fet[$i] != ''){
				if(preg_match('/^[0-9]+$/',$fet[$i])){
					if(strlen($fet[$i]) == 2){
						if($fet[$i] >= 0 && $fet[$i] <=60){
							$fet_[] = $fet[$i];
						}else{
							$success[11] = 'fe_error';
							return  $success;
						}
					}else{
						$success[9] = 'two_digit_error';
						return  $success;
					}
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				$success[3] = 'empty';
				return  $success;
			}
		}
		//end of validating
		
		for($i=0;$i<count($cat_);$i++){
			$total[] = $cat_[$i] + $fet_[$i];
		}
		if($programme == 'Bachelor Degree'){
			for($i=0;$i<count($cat_);$i++){
				if($total[$i] >= 70 && $total[$i] <= 100){
					$grade[] = 'A';
					$grade_point[] = '5';
				}else if($total[$i] >= 60 && $total[$i] <= 69){
					$grade[] = 'B+';
					$grade_point[] = '4';
				}else if($total[$i] >= 50 && $total[$i] <= 59){
					$grade[] = 'B';
					$grade_point[] = '3';
				}else if($total[$i] >= 40 && $total[$i] <= 49){
					$grade[] = 'C';
					$grade_point[] = '2';
				}else if($total[$i] >= 35 && $total[$i] <= 39){
					$grade[] = 'D';
					$grade_point[] = '1';
				}else if($total[$i] >= 0 && $total[$i] <= 34){
					$grade[] = 'F';
					$grade_point[] = '0';
				}
			}
		}else if($programme == 'Ordinary Diploma'){
			for($i=0;$i<count($cat_);$i++){
				if($total[$i] >= 75 && $total[$i] <= 100){
					$grade[] = 'A';
					$grade_point[] = '5';
				}else if($total[$i] >= 65 && $total[$i] <= 74){
					$grade[] = 'B+';
					$grade_point[] = '4';
				}else if($total[$i] >= 55 && $total[$i] <= 64){
					$grade[] = 'B';
					$grade_point[] = '3';
				}else if($total[$i] >= 45 && $total[$i] <= 54){
					$grade[] = 'C';
					$grade_point[] = '2';
				}else if($total[$i] >= 35 && $total[$i] <= 44){
					$grade[] = 'D';
					$grade_point[] = '1';
				}else if($total[$i] >= 0 && $total[$i] <= 34){
					$grade[] = 'F';
					$grade_point[] = '0';
				}
			}
		}
		//for grade summary
		$a = 0; $b_plus = 0; $b =0; $c=0; $d=0; $f=0;
		for($i=0;$i<count($grade);$i++){
			//echo $grade[$i].'<br>';
			if($grade[$i] == 'A'){
				$a += 1;
			}else if($grade[$i] == 'B+'){
				$b_plus += 1;
			}else if($grade[$i] == 'B'){
				$b += 1;
			}else if($grade[$i] == 'C'){
				$c += 1;
			}else if($grade[$i] == 'D'){
				$d += 1;
			}else if($grade[$i] == 'F'){
				$f += 1;
			}
		}
		if($semester == 'first'){
			$yr = date('Y').'-'.(date('Y') + 1);
		}else{
			$yr = (date('Y') - 1).'-'.date('Y');
		}
		$c_up = "SELECT `a`,`b_plus`,`b`,`c`,`d`,`f` FROM `mkombo_university`.`grade_summary` WHERE `code`='".$code."' AND `year`='".$yr."'";
		$c_run = mysql_query($c_up);
		$c_num = mysql_num_rows($c_run);
		while($row = mysql_fetch_array($c_run)){
			$a_ = $row['a'];
			$b_plus_ = $row['b_plus'];
			$b_ = $row['b'];
			$c_ = $row['c'];
			$d_ = $row['d'];
			$f_ = $row['f'];
		}
		//check grade of previous before updating
		for($i=0;$i<count($reg);$i++){
			$prev = "SELECT `".$g."_grade` FROM `mkombo_university`.`".$g."` WHERE `".$g."_reg_no`='".$reg[$i]."'";
			$prev_r = mysql_query($prev);
			while($row = mysql_fetch_array($prev_r)){
				$grade_[] = $row[''.$g.'_grade']; 
			}
		}
		
		for($i=0;$i<count($grade_);$i++){
			if($grade_[$i] == 'A'){
				$a_ -= 1;
			}else if($grade_[$i] == 'B+'){
				$b_plus_ -= 1;
			}else if($grade_[$i] == 'B'){
				$b_ -= 1;
			}else if($grade_[$i] == 'C'){
				$c_ -= 1;
			}else if($grade_[$i] == 'D'){
				$d_ -= 1;
			}else if($grade_[$i] == 'F'){
				$f_ -= 1;
			}
		}
		if($c_num == 0){
			$g_s = "INSERT INTO `mkombo_university`.`grade_summary` VALUES('','".$code."','".$yr."','".$a."','".$b_plus."','".$b."','".$c."','".$d."','".$f."')";
			mysql_query($g_s);
		}else{
			$g_su = "UPDATE `mkombo_university`.`grade_summary` SET `a`='".($a_+$a)."', `b_plus`='".($b_plus_+$b_plus)."', `b`='".($b_+$b)."', `c`='".($c_+$c)."', `d`='".($d_+$d)."', `f`='".($f_+$f)."' WHERE `code`='".$code."' AND `year`='".$yr."'";
			mysql_query($g_su);
		}
		//end of grade summary
		for($i=0;$i<count($cat_);$i++){
			$grade_p_credit[] = $grade_point[$i] * $credit;
		}
		
		for($i=0;$i<count($cat_);$i++){
			$insert_marks = "UPDATE `mkombo_university`.`".$g."` SET `".$g."_ca`='".$cat_[$i]."', `".$g."_fe`='".$fet_[$i]."', `".$g."_total`='".$total[$i]."', `".$g."_grade`='".$grade[$i]."', `".$g."_grade_point_x_credit`='".$grade_p_credit[$i]."' WHERE `".$g."_reg_no`='".$reg[$i]."'";
			$run_suc = mysql_query($insert_marks);
		}
		//set no access
		$s = "UPDATE `mkombo_university`.`modules` SET `access`='NO' WHERE `module_title`='".$g."'";
		$t = mysql_query($s);
		
		if($run_suc){
			$success[1] = 'success';
			return $success;
		}else{
			$success[2] = 'fail';
			return $success;
		}
	}
?>