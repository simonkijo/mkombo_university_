<?php 
	if(isset($_POST['sv_time_b_md'])){
		$programme = 'Bachelor Degree';
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$course = $_POST['course'];
		$md = $_POST['module'];
		//check for any duplicate in venue, time and day
		for($i=0;$i<count($md);$i++){
			$c_day[] = $_POST['day_'.$i];
			$c_time[] = $_POST['time_'.$i];
			$c_venue[] = $_POST['venue_'.$i];
		}
		//get time table data
		$query = "SELECT `day`,`module`,`time`,`v_title` FROM `mkombo_university`.`time_table`";
		$run = mysql_query($query);
		while($row = mysql_fetch_array($run)){
			$day[] = $row['day'];
			$module[] = $row['module'];
			$time[] = $row['time'];
			$venue[] = $row['v_title'];
		}
		for($i=0;$i<count($day);$i++){
			$day_[] = printJSONDATA($day[$i]);
			$time_[] = printJSONDATA($time[$i]);
			$venue_[] = printJSONDATA($venue[$i]);
		}
		for($i=0;$i<count($day_);$i++){
			for($j=0;$j<count($day_[$i]);$j++){
				if($day_[$i][$j] == 'Monday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Monday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_m[] = 'On Monday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
					
				}else if($day_[$i][$j] == 'Tuesday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Tuesday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_t[] = 'On Tuesday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}else if($day_[$i][$j] == 'Wednesday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Wednesday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_w[] = 'On Wednesday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}else if($day_[$i][$j] == 'Thursday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Thursday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_th[] = 'On Thursday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}else if($day_[$i][$j] == 'Friday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Friday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_f[] = 'On Friday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}
			}
		}
		
		//end of check for any duplicate in venue, time and day
		if(count($error_sms_m) != 0 || count($error_sms_t) != 0 || count($error_sms_w) != 0 || count($error_sms_th) != 0 || count($error_sms_f) != 0){
			//displays error sms
		}else{
			//echo 'send to db';
			for($i=0;$i<count($md);$i++){
				$day_n[] = daysToJson($c_day[$i]);
				$time_n[] = daysToJson($c_time[$i]);
				$venue_n[] = daysToJson($c_venue[$i]);
			}
			
			for($i=0;$i<count($md);$i++){
				if($md[$i] != '' && $day_n[$i] != 'null' && $time_n[$i] != 'null' && $venue_n[$i] != 'null' ){
					$not_empty[] = $i;
				}else{
					$success[2] = 'empty';
					return $success;
				}
			}
			
			if(count($not_empty) == count($md)){
				
				if(isset($_GET['edit'])){
					if($_GET['edit'] == 'yes'){
						for($i=0;$i<count($md);$i++){
							$query = "UPDATE `mkombo_university`.`time_table` SET `day`='".$day_n[$i]."', `time`='".$time_n[$i]."', `v_title`='".$venue_n[$i]."' WHERE `module`='".$md[$i]."' AND `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."' AND `programme`='".$programme."'";
							$run = mysql_query($query);
						}
					}
				}else{
					for($i=0;$i<count($md);$i++){
						$query = "INSERT INTO `mkombo_university`.`time_table` VALUES('','".$day_n[$i]."','".$md[$i]."','".$time_n[$i]."','".$venue_n[$i]."','".$course."','".$year."','".$semester."','".$programme."')";
						$run = mysql_query($query);
					}
				}
				
				if($run){
					$success[1] = 'success';
					return $success;
				}else{
					$success[1] = 'fail';
					return $success;
				}
			}
		}
		
	}else if(isset($_POST['sv_time_od_md'])){
		$programme = 'Ordinary Diploma';
		$year = $_POST['year'];
		$semester = $_POST['semester'];
		$course = $_POST['course'];
		
		$md = $_POST['module'];
		//check for any duplicate in venue, time and day
		for($i=0;$i<count($md);$i++){
			$c_day[] = $_POST['day_'.$i];
			$c_time[] = $_POST['time_'.$i];
			$c_venue[] = $_POST['venue_'.$i];
		}
		//get time table data
		$query = "SELECT `day`,`module`,`time`,`v_title` FROM `mkombo_university`.`time_table`";
		$run = mysql_query($query);
		while($row = mysql_fetch_array($run)){
			$day[] = $row['day'];
			$module[] = $row['module'];
			$time[] = $row['time'];
			$venue[] = $row['v_title'];
		}
		for($i=0;$i<count($day);$i++){
			$day_[] = printJSONDATA($day[$i]);
			$time_[] = printJSONDATA($time[$i]);
			$venue_[] = printJSONDATA($venue[$i]);
		}
		for($i=0;$i<count($day_);$i++){
			for($j=0;$j<count($day_[$i]);$j++){
				if($day_[$i][$j] == 'Monday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Monday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_m[] = 'On Monday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
					
				}else if($day_[$i][$j] == 'Tuesday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Tuesday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_t[] = 'On Tuesday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}else if($day_[$i][$j] == 'Wednesday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Wednesday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_w[] = 'On Wednesday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}else if($day_[$i][$j] == 'Thursday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Thursday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_th[] = 'On Thursday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}else if($day_[$i][$j] == 'Friday'){
					for($k=0;$k<count($c_day);$k++){
						for($l=0;$l<count($c_day[$k]);$l++){
							if($c_day[$k][$l] == 'Friday'){
								if(($time_[$i][$j] == $c_time[$k][$l]) && ($venue_[$i][$j] == $c_venue[$k][$l])){
									$error_sms_f[] = 'On Friday, This '.$c_time[$k][$l].' time and '.$c_venue[$k][$l].' venue is used by another module. Please choose different time and venue.';
								}
							}
						}
					}
				}
			}
		}
		
		//end of check for any duplicate in venue, time and day
		if(count($error_sms_m) != 0 || count($error_sms_t) != 0 || count($error_sms_w) != 0 || count($error_sms_th) != 0 || count($error_sms_f) != 0){
			//displays error sms
		}else{
			//echo 'send to db';
			for($i=0;$i<count($md);$i++){
				$day_n[] = daysToJson($c_day[$i]);
				$time_n[] = daysToJson($c_time[$i]);
				$venue_n[] = daysToJson($c_venue[$i]);
			}
			
			for($i=0;$i<count($md);$i++){
				if($md[$i] != '' && $day_n[$i] != 'null' && $time_n[$i] != 'null' && $venue_n[$i] != 'null' ){
					$not_empty[] = $i;
				}else{
					$success[2] = 'empty';
					return $success;
				}
			}
			if(count($not_empty) == count($md)){
				
				if(isset($_GET['edit'])){
					if($_GET['edit'] == 'yes'){
						for($i=0;$i<count($md);$i++){
							$query = "UPDATE `mkombo_university`.`time_table` SET `day`='".$day_n[$i]."', `time`='".$time_n[$i]."', `v_title`='".$venue_n[$i]."' WHERE `module`='".$md[$i]."' AND `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."' AND `programme`='".$programme."'";
							$run = mysql_query($query);
						}
					}
				}else{
					for($i=0;$i<count($md);$i++){
						$query = "INSERT INTO `mkombo_university`.`time_table` VALUES('','".$day_n[$i]."','".$md[$i]."','".$time_n[$i]."','".$venue_n[$i]."','".$course."','".$year."','".$semester."','".$programme."')";
						$run = mysql_query($query);
					}
				}
				if($run){
					$success[1] = 'success';
					return $success;
				}else{
					$success[1] = 'fail';
					return $success;
				}
			}
		}
	}	
?>