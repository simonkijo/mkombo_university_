<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//student personal info
		if(isset($_POST['sv_pinfo'])){
			$email = $_POST['inputEmail'];
			$phone = $_POST['inputPhone'];
			$marital = $_POST['inputMarital'];
			$home = $_POST['inputHome'];
			$pass = $_POST['inputPassword'];
			//$hash_pass = hashPassword($pass);
			
			$query = "UPDATE `mkombo_university`.`student` SET `email_address`='".$email."', `phone_no`='".$phone."', `marital_status`='".$marital."', `home_place`='".$home."', `password`='".hashPassword($pass)."' WHERE `reg_no`='".getInfo('reg_no','student')."'";
			if(mysql_query($query)){
				header("Location:studentProfile.php?response=success");
			}else{
				header("Location:studentProfile.php?response=fail");
			}
		}
		//student bank info
		if(isset($_POST['sv_binfo'])){
			$bname = $_POST['inputBankName'];
			$bbranch = $_POST['inputBankBranch'];
			$accountno = $_POST['inputAccountNo'];
			
			$queryb = "UPDATE `mkombo_university`.`bank_account` SET `bank_name`='".$bname."', `bank_branch`='".$bbranch."', `account_no`='".$accountno."' WHERE `reg_no`='".getInfo('reg_no','student')."'";
			if(mysql_query($queryb)){
				header("Location:studentProfile.php?response=success");
			}else{
				$fail = "fail";
				header("Location:studentProfile.php?response=fail");
			}
		}
		//student sponsor info
		if(isset($_POST['sv_sponsor'])){
			$sname = $_POST['inputSponsorName'];
			$sphone = $_POST['inputSponsorPhone'];
			$semail = $_POST['inputSponsorEmail'];
			
			$querys = "UPDATE `mkombo_university`.`sponsor` SET `sponsor_name`='".$sname."', `sponsor_phone`='".$sphone."', `sponsor_email`='".$semail."' WHERE `reg_no`='".getInfo('reg_no','student')."'";
			if(mysql_query($querys)){
				header("Location:studentProfile.php?response=success");
			}else{
				header("Location:studentProfile.php?response=fail");
			}
		}
		//time table master profile info
		if(isset($_POST['sv_ttmaster'])){
			$temail = $_POST['tinputEmail'];
			$tphone = $_POST['tinputPhone'];
			$tusername = $_POST['tinputUsername'];
			$tpass = $_POST['tinputPassword'];
			$hash_tpass = hashPassword($tpass);
			//for resetting session
			$_SESSION['username'] = $tusername;
			
			$querytt = "UPDATE `mkombo_university`.`staff` SET `email_address`='".$temail."', `phone_no`='".$tphone."', `username`='".$tusername."', `password`='".$hash_tpass."' WHERE `email_address`='".getField('email_address')."'";
			if(mysql_query($querytt)){
				header("Location:timeMasterProfile.php?response=success");
			}else{
				header("Location:timeMasterProfile.php?response=fail");
			}
		}
		//exam officer profile info
		if(isset($_POST['sv_examMaster'])){
			$eemail = $_POST['einputEmail'];
			$ephone = $_POST['einputPhone'];
			$eusername = $_POST['einputUsername'];
			$epass = $_POST['einputPassword'];
			$hash_epass = hashPassword($epass);
			//for resetting session
			$_SESSION['username'] = $eusername;
			
			$queryeo = "UPDATE `mkombo_university`.`staff` SET `email_address`='".$eemail."', `phone_no`='".$ephone."', `username`='".$eusername."', `password`='".$hash_epass."' WHERE `email_address`='".getField('email_address')."'";
			if(mysql_query($queryeo)){
				$success = "success";
				header("Location:examOfficerProfile.php?user=examination_officer&response=".$success);
			}else{
				$fail = "fail";
				header("Location:examOfficerProfile.php?user=examination_officer&response=".$fail);
			}
		}
		//lecturer profile info
		if(isset($_POST['sv_lec'])){
			$lemail = $_POST['linputEmail'];
			$lphone = $_POST['linputPhone'];
			$lusername = $_POST['linputUsername'];
			$lpass = $_POST['linputPassword'];
			$hash_lpass = hashPassword($lpass);
			//for resetting session
			$_SESSION['username'] = $lusername;
			
			$querylec = "UPDATE `mkombo_university`.`staff` SET `email_address`='".$lemail."', `phone_no`='".$lphone."', `username`='".$lusername."', `password`='".$hash_lpass."' WHERE `email_address`='".getField('email_address')."'";
			if(mysql_query($querylec)){
				header("Location:lecturerProfile.php?response=success");
			}else{
				header("Location:lecturerProfile.php?response=fail");
			}
		}
		//admission officer profile info
		if(isset($_POST['sv_adm'])){
			$aemail = $_POST['ainputEmail'];
			$aphone = $_POST['ainputPhone'];
			$ausername = $_POST['ainputUsername'];
			$apass = $_POST['ainputPassword'];
			$hash_apass = hashPassword($apass);
			//for resetting session
			$_SESSION['username'] = $ausername;
			
			$queryadm = "UPDATE `mkombo_university`.`staff` SET `email_address`='".$aemail."', `phone_no`='".$aphone."', `username`='".$ausername."', `password`='".$hash_apass."' WHERE `email_address`='".getField('email_address')."'";
			if(mysql_query($queryadm)){
				header("Location:admissionProfile.php?response=success");
			}else{
				header("Location:admissionProfile.php?response=fail");
			}
		}
		//academic officer profile info
		if(isset($_POST['sv_aca'])){
			$aemail = $_POST['ainputEmail'];
			$aphone = $_POST['ainputPhone'];
			$ausername = $_POST['ainputUsername'];
			$apass = $_POST['ainputPassword'];
			$hash_apass = hashPassword($apass);
			//for resetting session
			$_SESSION['username'] = $ausername;
			
			$queryadm = "UPDATE `mkombo_university`.`staff` SET `email_address`='".$aemail."', `phone_no`='".$aphone."', `username`='".$ausername."', `password`='".$hash_apass."' WHERE `email_address`='".getField('email_address')."'";
			if(mysql_query($queryadm)){
				header("Location:academicProfile.php?response=success");
			}else{
				header("Location:academicProfile.php?response=fail");
			}
		}
	}
?>