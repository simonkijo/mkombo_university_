<?php 
	require("config/functions.php");
	$st_id = $_SESSION['user_id'];
	$staff = $_SESSION['username'];
	
	if($st_id !=""){
		session_destroy();
		header('Location: studentLogin.php');
	}else if($staff != ""){
		session_destroy();
		header('Location: staffLogin.php');
	}
?>