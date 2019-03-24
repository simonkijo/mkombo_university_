<?php 
	if(isset($_POST['sv_addCourse'])){
		$programme = $_POST['programme'];
		//counting input field.
		$count = count($_POST['course']);
		$md_success = Array();
		$cd = Array();
		
		foreach($_POST['course'] as $course){ 
			if($course !=''){
				if(preg_match('/^[A-Za-z ]+$/',$course)){
					$cd[] = $course;
				}else{
					$md_success[3] = 'invalid';
					return $md_success;
				}
			}else{
				$md_success[2] = 'empty';
				return $md_success;
			}
		}
		
		for($i=0;$i<$count;$i++){
			$query = "INSERT INTO `mkombo_university`.`course` VALUES('','".$cd[$i]."','".$programme."')";
			$query_run = mysql_query($query);
		}
		
		if($query_run){
			$md_success[0] = $count;
			$md_success[1] = 'success';
			return $md_success;
		}else{
			$md_success[0] = $count;
			$md_success[1] = 'fail';
			return $md_success;
		}	
	}
?>