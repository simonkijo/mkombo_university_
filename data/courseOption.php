<?php 
	
	$programme = 'Bachelor Degree';
	$query = "SELECT `course` FROM `mkombo_university`.`course` WHERE `programme`='".$programme."'";
	$run = mysql_query($query);
	while($row = mysql_fetch_array($run)){
		$course1[] = $row['course'];
	}
	
?>