<?php 
	//admin profile info
	if(isset($_POST['sv_aca'])){
		$aemail = $_POST['ainputEmail'];
		$aphone = $_POST['ainputPhone'];
		$ausername = $_POST['ainputUsername'];
		$apass = $_POST['ainputPassword'];
		$hash_apass = hashPassword($apass);
		//for resetting session
		$_SESSION['username'] = $ausername;
		
		$queryadm = "UPDATE `mkombo_university`.`admin` SET `email_address`='".$aemail."', `phone_no`='".$aphone."', `username`='".$ausername."', `password`='".$hash_apass."' WHERE `email_address`='".getFieldAdmin('email_address','admin')."'";
		if(mysql_query($queryadm)){
			header("Location:adminProfile.php?response=success");
		}else{
			header("Location:adminProfile.php?response=fail");
		}
	}
	//more info profile info
	if(isset($_POST['sv_ad_2'])){
		$fname = $_POST['inputFname'];
		$mname = $_POST['inputMname'];
		$sname = $_POST['inputSname'];
		$nationality = $_POST['inputNationality'];
		$gender = $_POST['gender'];
		
		$queryad = "UPDATE `mkombo_university`.`admin` SET `fname`='".$fname."', `mname`='".$mname."', `sname`='".$sname."', `nationality`='".$nationality."', `gender`='".$gender."' WHERE `email_address`='".getFieldAdmin('email_address','admin')."'";
		if(mysql_query($queryad)){
			header("Location:adminProfile.php?response=success");
		}else{
			header("Location:adminProfile.php?response=fail");
		}
	}
?>