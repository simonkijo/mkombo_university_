<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['venue_btn'])){
			$success = Array();
			
			foreach($_POST['venue'] as $val){
				if($val != ''){
					if(preg_match('/^[A-Z0-9]+$/',$val)){
						$v_san[] = $val;
					}else{
						$success[3] = 'invalid';
						return $success;
					}
				}else{
					$success[2] = 'empty';
					return $success;
				}
			}
			for($i=0;$i<count($v_san);$i++){
				$query = "INSERT INTO `mkombo_university`.`venue` VALUES(NULL,'".$v_san[$i]."')";
				$run_qr = mysql_query($query);
				$sc[] = $i;
			}
			
			if($run_qr){
				$success[0] = count($sc);
				$success[1] = 'true';
				return $success;
			}else{
				$success[1] = 'false';
				return $success;
			}
			
		}
	}
?>