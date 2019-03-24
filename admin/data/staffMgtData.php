<?php 
	if(isset($_POST['sv_staff'])){
		$staff = $_POST['staff'];
		$starting_yr = date('Y');
		
		$count = count($_POST['fname']);
		$i_count_fn = 0; $i_count_mn = 0; $i_count_sn = 0;
		$success = Array();
		$fname = Array();
		$mname = Array();
		$sname = Array();
		//error sms for staff.
		if($staff == ''){
			$success[6] = 'no_staff';
			return  $success;
		}
		
		$qr = "SELECT `fname`,`mname`,`sname` FROM `mkombo_university`.`staff` WHERE `role`='".$staff."'";
		$run = mysql_query($qr);
		while($row = mysql_fetch_array($run)){
			$fna[] = strtolower($row['fname']);
			$mna[] = strtolower($row['mname']);
			$sna[] = strtolower($row['sname']);
		}
		//for validation of fname,mname and sname.
		foreach($_POST['fname'] as $fn){
			if($fn !=''){
				if(preg_match('/^[A-Za-z]+$/',$fn)){
					$i_count_fn += count($fn);
					$fname[] = strtolower($fn);
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				//if all fields are empty, print error sms
				if($i_count_fn == 0){
					$success[3] = 'empty';
					return  $success;
				}
			}
		}
		foreach($_POST['mname'] as $mn){
			if($mn !=''){
				if(preg_match('/^[A-Za-z]+$/',$mn)){
					$i_count_mn += count($mn);
					$mname[] = strtolower($mn);
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				if($i_count_mn == 0){
					$success[3] = 'empty';
					return  $success;
				}
			}
		}
		foreach($_POST['sname'] as $sn){
			if($sn !=''){
				if(preg_match('/^[A-Za-z]+$/',$sn)){
					$i_count_sn += count($sn);
					$sname[] = strtolower($sn);
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				if($i_count_sn == 0){
					$success[3] = 'empty';
					return  $success;
				}
			}
		}
		//end of validation
		if(count($fna) == 0){
			$add = '=';
		}else{
			$add = '';
		}
		
		//check if already registered.
		for($i=0;$i<$add.count($fna);$i++){
			if(in_array($fna[$i],$fname)){
				$success_f[] = $fna[$i];
			}
		}
		
		for($i=0;$i<$add.count($mna);$i++){
			if(in_array($mna[$i],$mname)){
				$success_m[] = $mna[$i];
			}
		}
		for($i=0;$i<$add.count($sna);$i++){
			if(in_array($sna[$i],$sname)){
				$success_s[] = $sna[$i];
			}
		}
		if(count($success_f) != 0 && count($success_m) != 0 && count($success_s) != 0){
			$success[5] = 'duplicate';
			return $success;
		}
		//end of already registered
		
		for($i=0;$i<count($fname);$i++){
			$query = "INSERT INTO `mkombo_university`.`staff` VALUES('".regGenerator()."','".$fname[$i]."','".$mname[$i]."','".$sname[$i]."','','','','','','','','".$starting_yr."','".$staff."')";
			$query_run = mysql_query($query);
			$success_ct[] = $i;
		}
		if($query_run){
			$success[0] = count($success_ct);
			$success[1] = 'success';
			return  $success;
		}else{
			$success[0] = $count;
			$success[2] = 'fail';
			return  $success;
		}
	}
?>