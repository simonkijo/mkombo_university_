<?php 
	$query = "SELECT `reg_no`,`fname`,`mname`,`sname` FROM `mkombo_university`.`student`";
		$q_run = mysql_query($query);
		$num = mysql_num_rows($q_run);
		while($row = mysql_fetch_array($q_run)){
			$reg[] = $row['reg_no'];
			$fn[] = $row['fname'];
			$mn[] = $row['mname'];
			$sn[] = $row['sname'];
		}
	//submit info after edit
	if(isset($_POST['st_edit'])){
		$count = count($_POST['fname']);
		
		$fname = Array();
		$mname = Array();
		$sname = Array();
		
		foreach($_POST['fname'] as $fn){
			if($fn !=''){
				if(preg_match('/^[A-Za-z]+$/',$fn)){
					$fname[] = $fn;
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				$success[3] = 'empty';
				return  $success;
			}
		}
		foreach($_POST['mname'] as $mn){
			if($mn !=''){
				if(preg_match('/^[A-Za-z]+$/',$mn)){
					$mname[] = $mn;
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				$success[3] = 'empty';
				return  $success;
			}
		}
		foreach($_POST['sname'] as $sn){
			if($sn !=''){
				if(preg_match('/^[A-Za-z]+$/',$sn)){
					$sname[] = $sn;
				}else{
					$success[4] = 'invalid';
					return  $success;
				}
			}else{
				$success[3] = 'empty';
				return  $success;
			}
		}
		
		for($i=0;$i<$count;$i++){
			$qr = "SELECT `reg_no` FROM `mkombo_university`.`student` WHERE `fname`='".$fname[$i]."' OR `mname`='".$mname[$i]."' OR `sname`='".$sname[$i]."'";
			$run = mysql_query($qr);
			$results[] = mysql_result($run,$i,'reg_no');
		}
		for($j=0;$j<$count;$j++){
			$qry = "UPDATE `mkombo_university`.`student` SET `fname`='".$fname[$j]."', `mname`='".$mname[$j]."', `sname`='".$sname[$j]."' WHERE `reg_no`='".$results[$j]."'";
			$suc_qr = mysql_query($qry);
			$c_s[] = $j;
		}
		
		if($suc_qr){
			$success[0] = count($c_s);
			$success[1] = 'success';
			return  $success;
		}else{
			$success[0] = $count;
			$success[2] = 'fail';
			return  $success;
		}
	}
?>