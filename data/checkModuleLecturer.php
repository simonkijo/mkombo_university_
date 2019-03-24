<?php 
	
	$query = "SELECT `module` FROM `mkombo_university`.`module_assignment` WHERE `lec_no`='".getField('lec_no')."'";
	$run = mysql_query($query);
	while($row = mysql_fetch_array($run)){
		$modules = $row['module'];
	}
	//check if module assigned to lecturer
	$hod = getRoleField('hod');
	if(count(printJSONDATA($modules)) == 0){
		if($hod == 'YES'){
			$success[7] = 'hod';
			return $success;
		}else{
			$success[6] = 'no_module';
			return $success;
		}
	}
?>