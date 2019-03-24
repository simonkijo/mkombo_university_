<?php 
	require("../config/functions.php");
	$staff = $_SESSION['username'];
	
	if($staff != ""){
		session_destroy();
		header('Location: adminLogin.php');
	}
?>