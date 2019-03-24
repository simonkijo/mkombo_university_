<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//student personal info
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$sname = $_POST['sname'];
		$gender = $_POST['gender'];
		$marital_status = $_POST['marital_status'];
		$phone_no = $_POST['phone_no'];
		$email_address = $_POST['email_address'];
		$nationality = $_POST['nationality'];
		$birth_date = $_POST['birth_date'];
		$birth_country = $_POST['birth_country'];
		$home_place = $_POST['home_place'];
		$password = $_POST['password'];
		
		//student parent info
		$fullname = $_POST['fullname'];
		$phone_no_p = $_POST['phone_no_p'];
		$email_p = $_POST['email_p'];
		$physical_location = $_POST['physical_location'];
		//student bank info
		$bank_name = $_POST['bank_name'];
		$bank_branch = $_POST['bank_branch'];
		$account_no = $_POST['account_no'];
		//student olevel
		$index_no_olevel = $_POST['index_no_olevel'];
		$index_no_alevel = $_POST['index_no_alevel'];
		$school_name_olevel = $_POST['school_name_olevel'];
		$school_name_alevel = $_POST['school_name_alevel'];
		$sc_location_olevel = $_POST['sc_location_olevel'];
		$sc_location_alevel = $_POST['sc_location_alevel'];
		$cert_olevel = $_POST['cert_olevel'];
		$cert_alevel = $_POST['cert_alevel'];
		$completion_yr_olevel = $_POST['completion_yr_olevel'];
		$completion_yr_alevel = $_POST['completion_yr_alevel'];
		$subject_taken[] = $_POST['subject_taken'];
		$subjects = loopElements($subject_taken);
		$subject_combination = $_POST['subject_combination'];
		//student insurance info
		$membership_no = $_POST['membership_no'];
		$vote = $_POST['vote'];
		$address = $_POST['address'];
		$issue_date = $_POST['issue_date'];
		//sponsor info
		$sponsor_name = $_POST['sponsor_name'];
		$sponsor_phone = $_POST['sponsor_phone'];
		$sponsor_email = $_POST['sponsor_email'];
		
		//$st_regno = regGenerator();
		//check in db if admitted
		$fn_lower = strtolower($fname);
		$mn_lower = strtolower($mname);
		$sn_lower = strtolower($sname);
		
		$query = "SELECT `reg_no`,`fname`,`mname`,`sname`,`gender`,`marital_status`,`nationality`,`birth_country`,`birth_date`,`password`,`phone_no`,`email_address`,`home_place` FROM `mkombo_university`.`student` WHERE `fname`='".$fn_lower."' AND `mname`='".$mn_lower."' AND `sname`='".$sn_lower."'";
		$q_run = mysql_query($query);
		while($row = mysql_fetch_array($q_run)){
			$reg[] = $row['reg_no'];
			$fn[] = strtolower($row['fname']);
			$mn[] = strtolower($row['mname']);
			$sn[] = strtolower($row['sname']);
			$gnd[] = strtolower($row['gender']);
			$ms[] = strtolower($row['marital_status']);
			$nat[] = strtolower($row['nationality']);
			$bc[] = strtolower($row['birth_country']);
			$bd[] = strtolower($row['birth_date']);
			$pas[] = strtolower($row['password']);
			$pn[] = strtolower($row['phone_no']);
			$em[] = strtolower($row['email_address']);
			$hp[] = strtolower($row['home_place']);
		}
		
		if($gnd[0] != '' && $ms[0] != '' && $nat[0] != '' && $bc[0] != '' && $bd[0] != '' && $pas[0] != '' && $pn[0] != '' && $em[0] != '' && $hp[0] != ''){
			$registered = 'registered';
		}else{
			if($fn_lower == $fn[0] && $mn_lower == $mn[0] && $sn_lower == $sn[0]){
				$query_stp_info = "UPDATE `mkombo_university`.`student` SET `gender`='".$gender."', `marital_status`='".$marital_status."', `nationality`='".$nationality."', `birth_country`='".$birth_country."', `birth_date`='".$birth_date."', `password`='".hashPassword($password)."', `phone_no`='".$phone_no."', `email_address`='".$email_address."', `home_place`='".$home_place."' WHERE `reg_no`='".$reg[0]."'";
				$query_p_info = "INSERT INTO `mkombo_university`.`parent` VALUES('$fullname','$phone_no_p','$email_p','$physical_location','".$reg[0]."')";
				$query_bank_info = "INSERT INTO `mkombo_university`.`bank_account` VALUES('$bank_name','$bank_branch','$account_no','".$reg[0]."')";
				$query_ac_info = "INSERT INTO `mkombo_university`.`academic_info` VALUES('$index_no_olevel','$index_no_alevel','$school_name_olevel','$school_name_alevel','$sc_location_olevel','$sc_location_alevel','$cert_olevel','$cert_alevel','$completion_yr_olevel','$completion_yr_alevel','".$subjects."','$subject_combination','".$reg[0]."')";
				$query_ins_info = "INSERT INTO `mkombo_university`.`health_insurance` VALUES('$membership_no','$vote','$address','$issue_date','".$reg[0]."')";
				$query_sponsor = "INSERT INTO `mkombo_university`.`sponsor` VALUES('$sponsor_name','$sponsor_phone','$sponsor_email','".$reg[0]."')";
				
				if(mysql_query($query_stp_info) && mysql_query($query_p_info) && mysql_query($query_bank_info) && mysql_query($query_ac_info) && mysql_query($query_ins_info) && mysql_query($query_sponsor)){
					header('Location:studentLogin.php?response=success');
				}else{
					header('Location:studentRegistration.php?response=fail');
				}
				//echo 'names are in db'.$fn[0].' '.$mn[0].' '.$sn[0].' '.$reg[0];
			}else{
				$error = 'empty';
			}
		
		}
	}
?>