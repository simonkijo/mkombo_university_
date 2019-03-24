<?php 
	error_reporting('E_NOTICE');
	ob_start();
	session_start();
	//get any field from logged in user.
	function getField($field){
		$query = "SELECT `$field` FROM `mkombo_university`.`staff` WHERE `username`='".$_SESSION['username']."'";
		if($query_run = @mysql_query($query)){
			if($query_result = @mysql_result($query_run,0, $field)){
				return $query_result;
			}
		}		
	}
	//get field from lecturer role table
	function getRoleField($field){
		$query = "SELECT `lec_no` FROM `mkombo_university`.`staff` WHERE `username`='".$_SESSION['username']."'";
		$query_run = mysql_query($query);
		$query_result = mysql_result($query_run,0,'lec_no');
		
		$qr = "SELECT `$field` FROM `mkombo_university`.`lecturer_role` WHERE `lec_no`='".$query_result."'";
		if($run = mysql_query($qr)){
			if($result = mysql_result($run,0, $field)){
				return $result;
			}
		}
	}
	//get lecturer names according to department, programme
	function lecturerNames($lec_no,$field){
		for($i=0;$i<count($lec_no);$i++){
			$q_2 = "SELECT `$field` FROM `mkombo_university`.`staff` WHERE `lec_no`='".$lec_no[$i]."'";
			$run_2 = mysql_query($q_2);
			while($row = mysql_fetch_array($run_2)){
				$result[] = $row[$field];
			}
		}
		return $result;
	}
	//student info
	function getInfo($field,$table){
		$query = "SELECT `$field` FROM `mkombo_university`.`$table` WHERE `reg_no`='".$_SESSION['user_id']."'";
		if($query_run = @mysql_query($query)){
			if($query_result = @mysql_result($query_run,0, $field)){
				return $query_result;
			}
		}
	}
	//admin any field
	function getFieldAdmin($field,$admin){
		$query = "SELECT `$field` FROM `mkombo_university`.`$admin` WHERE `username`='".$_SESSION['username']."'";
		if($query_run = @mysql_query($query)){
			if($query_result = @mysql_result($query_run,0, $field)){
				return $query_result;
			}
		}		
	}
	//first letter capital
	function firstCapitalLetter($field){
		$c = strtoupper(substr($field,0,1));
		$len = strlen($field);
		for($i=1;$i<$len;$i++){
			$c .= substr($field,$i,1);
		}
		return $c;
	}
	function capitalLetterFirstLetter($string){
		$c = strtoupper(substr($string,0,1));
		$len = strlen($string);
		for($i=1;$i<$len;$i++){
			$c .= substr($string,$i,1);
		}
		return $c;
	}
	function firstLetter($string){
		$c = strtoupper(substr($string,0,1));
		return $c;
	}
	//reg id generator
	function regGenerator(){
		$year = date('Y');
		$f_c = substr($year,0,1);
		$f_sc = substr($year,1,1);
		$l_2 = substr($year,2,3);
		$n = substr(mt_rand(),0,8);
		
		if(strlen($n) == '7'){
			$v = $n.substr(mt_rand(),0,1);
			return $l_2.$f_sc.$f_c.$v;
		}else{
			return $l_2.$f_sc.$f_c.$n;
		}
	}
	//check empty in post.
	function checkEmpty(){
		if(!empty($_POST)){
			return true;
		}else{
			return false;
		}
	}
	//password encypt
	function hashPassword($pass){
		$hash = md5($pass);
		return $hash;
	}
	//loop value of subjects taken and adding comma.
	function loopElements($parameter){
		foreach($parameter as $r){
			$c = count($r);
			for($i=0;$i<$c;$i++){
				if($i<($c-1)){
					$v = ',';
				}else{
					$v = '';
				}
				$result[] = $r[$i].$v;
			}
		}
		$bn = json_encode($result);
		return $bn;
	}
	//loop days lecturer available
	function daysToJson($parameter){
		$days = json_encode($parameter);
		return $days;
	}
	//for printing subject taken
	function printSubjects($para){
		$th = json_decode($para);
		foreach($th as $t){
			echo $t;
		}
	}
	//decode json array
	function printJSONDATA($para){
		$th = json_decode($para);
		foreach($th as $t){
			$json_data[] = $t;
		}
		return $json_data;
	}
	//for checking if user is logged in
	function logged_in(){
		if((isset($_SESSION['user_id']) || isset($_SESSION['username'])) && (!empty($_SESSION['user_id']) || !empty($_SESSION['username']))){
			return true;
		}else{
			return false;
		}
	}
	//for looping data
	function looping($m){
		foreach($m as $mod){
			return $mod;
		}
	}
	function replaceSpaceWithUnderscore($parameter){
		return strtolower(str_replace(' ','_',$parameter));
	}
	function replaceUnderscoreWithSpace($parameter){
		return strtolower(str_replace('_',' ',$parameter));
	}
	
function addComma($parameter){
	$tables_ = '';
	$c = count($parameter);
	for($i=0;$i<$c;$i++){
		if($i<($c-1)){
			$comma = ',';
		}else{
			$comma = '';
		}
		$tables_ .= $parameter[$i].$comma;
	}
	return $tables_;
}

function addPlus($parameter){
	$field_ = '';
	$c = count($parameter);
	for($i=0;$i<$c;$i++){
		if($i<($c-1)){
			$plus = '+';
		}else{
			$plus = '';
		}
		$field_ .= $parameter[$i].'.'.$parameter[$i].'_grade_point_x_credit'.$plus;
	}
	return $field_;
}

function addAnd($parameter,$index){
	$field_ = '';
	$c = count($parameter);
	for($i=0;$i<$c;$i++){
		if($i<($c-1)){
			$and = $index.' AND ';
		}else{
			$and = $index.'';
		}
		$field_ .= $parameter[$i].'.'.$parameter[$i].'_reg_no='.$and;
	}
	return $field_;
}

function addCommaForReport($parameter){
	$field_ = '';
	$c = count($parameter);
	$fields = array('reg_no','ca','fe','total','grade');
	$c_f = count($fields);
	for($i=0;$i<$c;$i++){
		for($j=0;$j<$c_f;$j++){
			if($j<($c_f-1)){
				$comma = ',';
			}else{
				if($i<($c-1)){
					$comma = ',';
				}else{
					$comma = '';
				}
			}
			$field_ .= $parameter[$i].'.'.$parameter[$i].'_'.$fields[$j].$comma;
		}
	}
	return $field_;
}
//generate new pass and send to email
function changePasswordStudent($id,$mail){
	$generated_password = substr(md5(rand(999,99999)),0,9);
	$hash_password = hashPassword($generated_password);
	
	mail(''.$mail.'','Password Recovery','You are new Password is '.$generated_password.'','From: noreply@mkombo-university.com');
	
	$query = "UPDATE `mkombo_university`.`student` SET `password`='".$hash_password."' WHERE `reg_no`='".$id."'";
	$query_run = @mysql_query($query);
	
	if($query_run){
		echo "<div class='row'>
				<div class='col-md-3'></div>
				<div class='col-md-6'>
					<div class='callout callout-success displaySms'>
						<h4>INFORMATION !</h4>
						<p>Successfully, Password has been sent to your email. You can login now.</p>
					</div>
				</div>
				<div class='col-md-3'></div>
			</div>";
	}else{
		echo "<div class='row'>
				<div class='col-md-3'></div>
				<div class='col-md-6'>
					<div class='callout callout-danger errSms'>
						<h4>ERROR !</h4>
						<p>Failed, Please try again.</p>
					</div>
				</div>
				<div class='col-md-3'></div>
			</div>";
	}
}
function changePasswordStaff($user,$mail,$table){
	$generated_password = substr(md5(rand(999,99999)),0,9);
	$hash_password = hashPassword($generated_password);
	
	mail(''.$mail.'','Password Recovery','You are new Password is '.$generated_password.'','From: noreply@mkombo-university.com');
	
	$query = "UPDATE `mkombo_university`.`".$table."` SET `password`='".$hash_password."' WHERE `username`='".$user."'";
	$query_run = @mysql_query($query);
	
	if($query_run){
		echo "<div class='row'>
				<div class='col-md-3'></div>
				<div class='col-md-6'>
					<div class='callout callout-success displaySms'>
						<h4>INFORMATION !</h4>
						<p>Successfully, Password has been sent to your email.  You can login now.</p>
					</div>
				</div>
				<div class='col-md-3'></div>
			</div>";
	}else{
		echo "<div class='row'>
				<div class='col-md-3'></div>
				<div class='col-md-6'>
					<div class='callout callout-danger errSms'>
						<h4>ERROR !</h4>
						<p>Failed, Please try again.</p>
					</div>
				</div>
				<div class='col-md-3'></div>
			</div>";
	}
}
//for profile photo
function photoProfile($image_name){
	$dir = "..\\mkombo_university\\dist\\img";
	// Open a directory, and read its contents
	if (is_dir($dir)){
	  if ($dh = opendir($dir)){
		while (($file = readdir($dh)) !== false){
			$files[] = $file;
		}
		closedir($dh);
	  }
	}
	if(in_array($image_name,$files)){
		//echo pathinfo($image_name, PATHINFO_EXTENSION);
		$path = 'dist/img/'.$image_name;
	}else{
		$path = 'dist/img/empty_photo.png';
	}
	return $path;
}
//for profile photo admin
function photoProfileAdmin($image_name){
	$dir = "../dist/img/";
	// Open a directory, and read its contents
	if (is_dir($dir)){
	  if ($dh = opendir($dir)){
		while (($file = readdir($dh)) !== false){
			$files[] = $file;
		}
		closedir($dh);
	  }
	}
	
	if(in_array($image_name,$files)){
		//echo pathinfo($image_name, PATHINFO_EXTENSION);
		$path = '../dist/img/'.$image_name;
	}else{
		$path = '../dist/img/empty_photo.png';
	}
	return $path;
}

?>