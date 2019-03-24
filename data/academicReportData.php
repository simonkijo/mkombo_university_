<?php
	if(isset($_POST['st_academics'])){
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$reg_id = getInfo('reg_no','student');
		$course = getInfo('course','student');
		$programme = getInfo('programme','student');
		
		if($year != '' && $semester != ''){
			$qu = "SELECT `module_title` FROM `mkombo_university`.`modules` WHERE `course`='".$course."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semister`='".$semester."'";
			$ru = mysql_query($qu);
			while($row = mysql_fetch_array($ru)){
				$module_title[] = $row['module_title'];
			}
			
			$qry = 'SELECT '.addCommaForReport($module_title).' FROM '.addComma($module_title).' WHERE '.addAnd($module_title,$reg_id).'';
			$rn_ = mysql_query($qry);
			while($row = mysql_fetch_array($rn_)){
				for($j=0;$j<count($module_title);$j++){
					$ca[$j] = $row[''.$module_title[$j].'_ca'];
					$fe[$j] = $row[''.$module_title[$j].'_fe'];
					$total[$j] = $row[''.$module_title[$j].'_total'];
					$grade[$j] = $row[''.$module_title[$j].'_grade'];
				}
			}
			
			for($i=0;$i<count($module_title);$i++){
				$qu = "SELECT `code` FROM `mkombo_university`.`modules` WHERE `module_title`='".$module_title[$i]."' AND `course`='".$course."' AND `programme`='".$programme."' AND `year`='".$year."' AND `semister`='".$semester."'";
				$ru = mysql_query($qu);
				while($row = mysql_fetch_array($ru)){
					$code[] = $row['code'];
				}
			}
			//get gpa
			$qr = "SELECT `gpa` FROM `mkombo_university`.`gpa` WHERE `year`='".$year."' AND `semester`='".$semester."' AND `reg_no`='".$reg_id."'";
			$rn = mysql_query($qr);
			$gpa = mysql_result($rn,0,'gpa');
			//get cgpa and classification
			if($semester == 'second'){
				$qr1 = "SELECT `cgpa`,`cgpa_class` FROM `mkombo_university`.`gpa_class` WHERE `year`='".$year."' AND `reg_no`='".$reg_id."'";
				$rn1 = mysql_query($qr1);
				$cgpa = mysql_result($rn1,0,'cgpa');
				$cgpa_class = mysql_result($rn1,0,'cgpa_class');
			}
			if(count($ca) == 0 && count($fe) == 0 && count($total) == 0 && count($grade) == 0){
				$error_sms = 'no_data';
			}
		}else{
			$error_sms = 'empty';
		}
	}
?>