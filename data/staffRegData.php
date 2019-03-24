<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$sname = $_POST['sname'];
		$gender = $_POST['gender'];
		$phone_no = $_POST['phone_no'];
		$email_address = $_POST['email_address'];
		$nationality = $_POST['nationality'];
		$marital_status = $_POST['marital_status'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hash_pass = hashPassword($password);
		
		//check in db if admitted
		$query = "SELECT `lec_no`,`fname`,`mname`,`sname` FROM `mkombo_university`.`staff`";
		$q_run = mysql_query($query);
		$num = mysql_num_rows($q_run);
		while($row = mysql_fetch_array($q_run)){
			$reg[] = $row['lec_no'];
			$fn[] = strtolower($row['fname']);
			$mn[] = strtolower($row['mname']);
			$sn[] = strtolower($row['sname']);
		}
		
		$fn_lower = strtolower($fname);
		$mn_lower = strtolower($mname);
		$sn_lower = strtolower($sname);
		
		/*if($fn[0] == '' && $mn[0] == '' && $sn[0] == ''){
			$empty = 'empty';
		}*/
		
		for($i=0;$i<count($fn);$i++){
			if($fn_lower == $fn[$i]){
				$id_1[] = $reg[$i];
			}else{
				$error[0] = 'empty';
			}
		}
		for($i=0;$i<count($mn);$i++){
			if($mn_lower == $mn[$i]){
				$id_2[] = $reg[$i];
			}else{
				$error[1] = 'empty';
			}
		}
		for($i=0;$i<count($sn);$i++){
			if($sn_lower == $sn[$i]){
				$id_3[] = $reg[$i];
			}else{
				$error[2] = 'empty';
			}
		}
		
		//check if username exists first.
		$query = "SELECT `username` FROM `mkombo_university`.`staff`";
		$run = mysql_query($query);
		$count = mysql_num_rows($run);
		for($i=0;$i<$count;$i++){
			$row_[] = mysql_result($run,$i,'username');
		}
					
		for($i=0;$i<count($id_1);$i++){
			if(in_array($id_1[$i],$id_2)){
				if(in_array($id_1[$i],$id_3)){
					//echo $id_1[$i];
					if(in_array($username,$row_)){
						$err = "Username exists, use another.";
					}else{
						$query_staff = "UPDATE `mkombo_university`.`staff` SET `username`='".$username."', `password`='".$hash_pass."', `gender`='".$gender."', `phone_no`='".$phone_no."', `email_address`='".$email_address."', `nationality`='".$nationality."', `marital_status`='".$marital_status."' WHERE `lec_no`='".$id_1[$i]."'";
						if(mysql_query($query_staff)){
							header('Location:staffLogin.php?response=success');
						}else{
							header('Location:staffRegistration.php?response=fail');
						}
					} 
				}
			}
		}
		
	}
?>