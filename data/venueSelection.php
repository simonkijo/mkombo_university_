<?php 
	$query = "SELECT `v_title` FROM `mkombo_university`.`venue`";
	$query_run = mysql_query($query);
	while($row = mysql_fetch_array($query_run)){
		$res[] = $row['v_title'];
	}
?>