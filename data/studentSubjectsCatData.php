<?php 
	if(isset($_POST['show_subjects'])){
		$year = $_POST['year'];
		$semister = $_POST['semester'];
		$course = getInfo('course','student');
		$programme = getInfo('programme','student');
		
		if($year != '' && $semister != ''){
			$query = "SELECT `code`,`module_title`,`credit` FROM `mkombo_university`.`modules` WHERE `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semister."' AND `programme`='".$programme."'";
			$run = mysql_query($query);
			$count = mysql_num_rows($run);
			while($row = mysql_fetch_array($run)){
				$code[] = $row['code'];
				$module[] = $row['module_title'];
				$credit[] = $row['credit'];
			}
			if(count($code) == 0 && count($module) == 0 && count($credit) == 0){
				$error_sms = 'no_data';
			}
		}else{
			$error_sms = 'empty';
		}
	}
?>