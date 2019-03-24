<?php 
	if(isset($_POST['s_time'])){
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$programme = getInfo('programme','student');
		$course = getInfo('course','student');
		
		if($year != '' && $semester != ''){
			//get time table data
			$query = "SELECT `day`,`module`,`time`,`v_title` FROM `mkombo_university`.`time_table` WHERE `year`='".$year."' AND `semister`='".$semester."' AND `course`='".$course."' AND `programme`='".$programme."'";
			$run = mysql_query($query);
			while($row = mysql_fetch_array($run)){
				$day[] = $row['day'];
				$module[] = $row['module'];
				$time[] = $row['time'];
				$venue[] = $row['v_title'];
			}
			
			if(count($day) != 0 && count($module) != 0 && count($time) != 0 && count($venue) != 0){
				for($i=0;$i<count($day);$i++){
					$day_[] = printJSONDATA($day[$i]);
					$time_[] = printJSONDATA($time[$i]);
					$venue_[] = printJSONDATA($venue[$i]);
				}
				//end of time table data
				//get lecturers who teach module
				/*$qr = "SELECT `lec_no` FROM `mkombo_university`.`lecturer_role` WHERE `programme`='".$programme."' AND `department`='".$course."'";
				$rn = mysql_query($qr);
				while($row = mysql_fetch_array($rn)){
					$lec_no[] = $row['lec_no'];
				}
				for($i=0;$i<count($lec_no);$i++){
					$qry = "SELECT `module` FROM `mkombo_university`.`module_assignment` WHERE `lec_no`='".$lec_no[$i]."'";
					$r = mysql_query($qry);
					while($row = mysql_fetch_array($r)){
						$assigned_module[] = $row['module'];
						$lec_id[] = $lec_no[$i];
					}
				}
				for($i=0;$i<count($lec_id);$i++){
					$assigned_module_[] = printJSONDATA($assigned_module[$i]);
				}
				
				for($i=0;$i<count($lec_id);$i++){
					for($j=0;$j<count($assigned_module_[$i]);$j++){
						if(in_array($assigned_module_[$i][$j],$module)){
							$matched_md[] = $assigned_module_[$i][$j];
							$id[] = $lec_id[$i];
						}
					}
				}
				for($i=0;$i<count($id);$i++){
					$q_n = "SELECT `fname`,`mname`,`sname` FROM `mkombo_university`.`staff` WHERE `lec_no`='".$id[$i]."'";
					$r_n = mysql_query($q_n);
					while($row = mysql_fetch_array($r_n)){
						$fname[] = $row['fname'];
						$mname[] = $row['mname'];
						$sname[] = $row['sname'];
					}
				}
				for($i=0;$i<count($id);$i++){
					$lec_names[] = firstLetter($fname[$i]).'.'.firstLetter($mname[$i]).' '.firstCapitalLetter($sname[$i]);
				}*/
				//end of lecturers who teach module
				
				for($i=0;$i<count($day_);$i++){
					for($j=0;$j<count($day_[$i]);$j++){
						if($day_[$i][$j] == 'Monday'){
							$day_m[] = $day_[$i][$j];
							$time_m[] = $time_[$i][$j];
							$venue_m[] = $venue_[$i][$j];
							$module_m[] = $module[$i];
						}else if($day_[$i][$j] == 'Tuesday'){
							$day_t[] = $day_[$i][$j];
							$time_t[] = $time_[$i][$j];
							$venue_t[] = $venue_[$i][$j];
							$module_t[] = $module[$i];
						}else if($day_[$i][$j] == 'Wednesday'){
							$day_w[] = $day_[$i][$j];
							$time_w[] = $time_[$i][$j];
							$venue_w[] = $venue_[$i][$j];
							$module_w[] = $module[$i];
						}else if($day_[$i][$j] == 'Thursday'){
							$day_th[] = $day_[$i][$j];
							$time_th[] = $time_[$i][$j];
							$venue_th[] = $venue_[$i][$j];
							$module_th[] = $module[$i];
						}else if($day_[$i][$j] == 'Friday'){
							$day_f[] = $day_[$i][$j];
							$time_f[] = $time_[$i][$j];
							$venue_f[] = $venue_[$i][$j];
							$module_f[] = $module[$i];
						}
					}
				}
				
				//determine which array is big
				$m = count($day_m);
				$t = count($day_t);
				$w = count($day_w);
				$th = count($day_th);
				$f = count($day_f);
				
				if($m >= $t){
					if($m >= $w){
						if($m >= $th){
							if($m >= $f){
								$ct = $m;
							}else{
								$ct = $f;
							}
						}else{
							if($th >= $f){
								$ct = $th;
							}else{
								$ct = $f;
							}
						}
					}else{
						if($w >= $th){
							if($w >= $f){
								$ct = $w;
							}else{
								$ct = $f;
							}
						}else{
							if($th >= $f){
								$ct = $th;
							}else{
								$ct = $f;
							}
						}
					}
				}else{
					if($t >= $w){
						if($t >= $th){
							if($t >= $f){
								$ct = $t;
							}else{
								$ct = $f;
							}
						}else{
							if($th >= $f){
								$ct = $th;
							}else{
								$ct = $f;
							}
						}
					}else{
						if($w >= $th){
							if($w >= $f){
								$ct = $w;
							}else{
								$ct = $f;
							}
						}else{
							if($th >= $f){
								$ct = $th;
							}else{
								$ct = $f;
							}
						}
					}
				}
				//end of determine which array is big
			}else{
				$error_sms = 'no_data';
			}
		}else{
			$error_sms = 'empty';
		}
		
	}
?>