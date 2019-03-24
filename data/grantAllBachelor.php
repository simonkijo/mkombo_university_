<?php 
	if(isset($_POST['allow_all'])){
		$query = "SELECT `module_title` FROM `mkombo_university`.`modules`";
		$run = mysql_query($query);
		while($row = mysql_fetch_array($run)){
			$module_title[] = $row['module_title'];
		}
		
		for($i=0;$i<count($module_title);$i++){
			$q = "UPDATE `mkombo_university`.`modules` SET `access`='YES' WHERE `programme`='Bachelor Degree'";
			$r = mysql_query($q);
		}
		if($r){
			$success[0] = 'allow_all';
			return $success;
		}else{
			$success[2] = 'fail';
			return $success;
		}
	}
	if(isset($_POST['gp_allow'])){
		$programme = 'Bachelor Degree';
		$department = $_POST['department'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$sname = $_POST['sname'];
		
		if($department == ''){
			$success[6] = 'no_selected';
			return $success;
		}
		$q_l = "SELECT `lec_no` FROM `mkombo_university`.`lecturer_role` WHERE `programme`='".$programme."' AND `department`='".$department."'";
		$r_l = mysql_query($q_l);
		while($row = mysql_fetch_array($r_l)){
			$lec_no_[] = $row['lec_no'];
		}
		
		if($fname != '' && $mname != '' && $sname != ''){
			if(preg_match('/^[A-Za-z]+$/',$fname) && preg_match('/^[A-Za-z]+$/',$mname) && preg_match('/^[A-Za-z]+$/',$sname)){
				for($i=0;$i<count($lec_no_);$i++){
					$q_s = "SELECT `fname`,`mname`,`sname` FROM `mkombo_university`.`staff` WHERE `fname` LIKE'%".$fname."%' AND `mname` LIKE'%".$mname."%' AND `sname` LIKE'%".$sname."%' AND `lec_no`='".$lec_no_[$i]."'";
					$r_s = mysql_query($q_s);
					while($row = mysql_fetch_array($r_s)){
						$fname_ = $row['fname'];
						$mname_ = $row['mname'];
						$sname_ = $row['sname'];
						$lec_ = $lec_no_[$i];
					}
				}
			}else{
				$success[3] = 'invalid';
				return $success;
			}
		}else{
			$success[1] = 'empty';
			return $success;
		}
		
		if($fname_ != '' && $mname_ != '' && $sname_ != ''){
			$y = "SELECT `module` FROM `mkombo_university`.`module_assignment` WHERE `lec_no`='".$lec_."'";
			$ry = mysql_query($y);
			while($row = mysql_fetch_array($ry)){
				$module = $row['module'];
			}
			foreach(printJSONDATA($module) as $m){
				$q_a = "UPDATE `mkombo_university`.`modules` SET `access`='YES' WHERE `module_title`='".replaceSpaceWithUnderscore($m)."'";
				$r_a = mysql_query($q_a);
			}
			
			if($r_a){
				$success[4] = 'allow';
				return $success;
			}else{
				$success[2] = 'fail';
				return $success;
			}
		}else{
			$success[5] = 'check';
			return $success;
		}
		
	}
	
?>