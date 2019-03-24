<?php
	
	$department = getRoleField('department');
	$programme = getRoleField('programme');
	$module_title = $_POST['module_title'];
	
	if(isset($_POST['sv_choose'])){
		$qr = "SELECT `year`,`semister` FROM `mkombo_university`.`modules` WHERE `module_title`='".replaceSpaceWithUnderscore($module_title)."' AND `course`='".$department."' AND `programme`='".$programme."'";
		$qr_run = mysql_query($qr);
		while($row = mysql_fetch_array($qr_run)){
			$year = $row['year'];
			$semester = $row['semister'];
		}
		
	}else if(count(printJSONDATA($modules)) == 1){
		$mdl = printJSONDATA($modules);
		foreach(printJSONDATA($modules) as $md){
			$qr = "SELECT `year`,`semister` FROM `mkombo_university`.`modules` WHERE `module_title`='".replaceSpaceWithUnderscore($md)."' AND `course`='".$department."' AND `programme`='".$programme."'";
			$qr_run = mysql_query($qr);
			while($row = mysql_fetch_array($qr_run)){
				$year = $row['year'];
				$semester = $row['semister'];
			}
		}
	}
	//insert into approprite table for marks
	if(count($mdl) == 1){
		$w = "SELECT `access` FROM `mkombo_university`.`modules` WHERE `module_title`='".replaceSpaceWithUnderscore($mdl[0])."'";
		$r = mysql_query($w);
		$link_1 = mysql_result($r,0,'access');
		//check if not exists & then insert
		$check = "SELECT * FROM `mkombo_university`.`".replaceSpaceWithUnderscore($mdl[0])."`";
		$check_run = mysql_query($check);
		$num_ = mysql_num_rows($check_run);
		
		if($link_1 == 'NO'){
			if($num_ != 0){
				//$success[5] = 'inserted';
				//return $success;
			}else{
				//$success[8] = 'no_access';
				//return $success;
			}
		}else{
			if($num_ == 0){
				$query_st = "SELECT `reg_no`,`fname`,`mname`,`sname` FROM `mkombo_university`.`student` WHERE `course`='".$department."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semester`='".$semester."'";
				$run_st = mysql_query($query_st);
				while($row = mysql_fetch_array($run_st)){
					$reg_no[] = $row['reg_no'];
					$fname[] = $row['fname'];
					$mname[] = $row['mname'];
					$sname[] = $row['sname'];
				}
				
				for($i=0;$i<count($reg_no);$i++){
					$q = "INSERT INTO `mkombo_university`.`".replaceSpaceWithUnderscore($mdl[0])."` VALUES('".$reg_no[$i]."','','','','','')";
					$r = mysql_query($q);
				}
			}else{
				if(isset($link_1)){
					if($link_1 == 'YES'){
						$query_st = "SELECT `reg_no`,`fname`,`mname`,`sname` FROM `mkombo_university`.`student` WHERE `course`='".$department."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semester`='".$semester."'";
						$run_st = mysql_query($query_st);
						while($row = mysql_fetch_array($run_st)){
							$reg_no[] = $row['reg_no'];
							$fname[] = $row['fname'];
							$mname[] = $row['mname'];
							$sname[] = $row['sname'];
						}
					}
				}
			}
		}
	}else{
		//check access
		$w = "SELECT `access` FROM `mkombo_university`.`modules` WHERE `module_title`='".replaceSpaceWithUnderscore($module_title)."'";
		$r = mysql_query($w);
		$link_1 = mysql_result($r,0,'access');
		//check if not exists & then insert
		$check = "SELECT * FROM `mkombo_university`.`".replaceSpaceWithUnderscore($module_title)."`";
		$check_run = mysql_query($check);
		$num_ = mysql_num_rows($check_run);
		
		if($link_1 == 'NO'){
			if($num_ !=0){
				//$success[5] = 'inserted';
				//return $success;
			}else{
				//$success[8] = 'no_access';
				//return $success;
			}
		}else{
			if($num_ == 0){
				$query_st = "SELECT `reg_no`,`fname`,`mname`,`sname` FROM `mkombo_university`.`student` WHERE `course`='".$department."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semester`='".$semester."'";
				$run_st = mysql_query($query_st);
				while($row = mysql_fetch_array($run_st)){
					$reg_no[] = $row['reg_no'];
					$fname[] = $row['fname'];
					$mname[] = $row['mname'];
					$sname[] = $row['sname'];
				}
				
				for($i=0;$i<count($reg_no);$i++){
					$q = "INSERT INTO `mkombo_university`.`".replaceSpaceWithUnderscore($module_title)."` VALUES('".$reg_no[$i]."','','','','','')";
					$r = mysql_query($q);
				}
				if($module_title != ''){
					mysql_query("INSERT INTO `mkombo_university`.`check_module` VALUES('','".getRoleField('lec_no')."','".$module_title."')");
				}
			}else{
				if(isset($link_1)){
					if($link_1 == 'YES'){
						$query_st = "SELECT `reg_no`,`fname`,`mname`,`sname` FROM `mkombo_university`.`student` WHERE `course`='".$department."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semester`='".$semester."'";
						$run_st = mysql_query($query_st);
						while($row = mysql_fetch_array($run_st)){
							$reg_no[] = $row['reg_no'];
							$fname[] = $row['fname'];
							$mname[] = $row['mname'];
							$sname[] = $row['sname'];
						}
						if($module_title != ''){
							mysql_query("INSERT INTO `mkombo_university`.`check_module` VALUES('','".getRoleField('lec_no')."','".$module_title."')");
						}
					}
				}
			}
			
		}
	}
?>