<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'mkombo_university';
	
	$error_sms = 'Sorry something went wrong, Can not connect to server';
	
	if(!mysql_connect($host,$user,$pass) || !mysql_select_db($db)){
		die($error_sms);
	}
?>