<?php
	define('_MPDF_URI','pdf/');
	
if(isset($_POST['print_od'])){ 
	$year = $_POST['year'];
	$semester = $_POST['semester'];
	$course = $_POST['course'];
	$programme = 'Ordinary Diploma';

	if($course == '' || $year == '' || $semester == ''){
		$success[1] = 'no_selected';
		return $success;
	}
	$st_q = "SELECT `reg_no`,`semester` FROM `mkombo_university`.`for_report` WHERE `year`='".$year."' AND `semester`='".$semester."' AND `course`='".$course."' AND `programme`='".$programme."'";
	$st_r = mysql_query($st_q);
	while($row = mysql_fetch_array($st_r)){
		$reg_no[] = $row['reg_no'];
		$semester_st = $row['semester'];
	}

	if($semester_st == 'first'){
		$sem = 'I';
		$yr = date('Y').'-'.(date('Y') + 1);
	}else{
		$sem = 'II';
		$cgpa = 'CGPA';
		$yr = (date('Y') - 1).'-'.date('Y');
	}	
	$filename_ = 'exam_results_'.strtolower(replaceSpaceWithUnderscore($course)).'_sem_'.$sem.'_'.$yr.'_OD.pdf';
	
	for($i=0;$i<count($reg_no);$i++){
		$sql = "SELECT `gpa` FROM `mkombo_university`.`gpa` WHERE `year`='".$year."' AND `semester`='".$semester."' AND `reg_no`='".$reg_no[$i]."'";
		$sql_run = mysql_query($sql);
		while($row = mysql_fetch_array($sql_run)){
			$gpa[] = $row['gpa'];
		}
	}
	//for cummulative gpa
	for($i=0;$i<count($reg_no);$i++){
		$sql = "SELECT `cgpa` FROM `mkombo_university`.`gpa_class` WHERE `year`='".$year."' AND `reg_no`='".$reg_no[$i]."'";
		$sql_run = mysql_query($sql);
		while($row = mysql_fetch_array($sql_run)){
			$cgpa_[] = $row['cgpa'];
		}
	}
	
	$query = "SELECT `code`,`module_title` FROM `mkombo_university`.`modules` WHERE `year`='".$year."' AND `semister`='".$semester."' AND `course`='".$course."' AND `programme`='".$programme."'";
	$run = mysql_query($query);
	while($row = mysql_fetch_array($run)){
		$module_title[] = $row['module_title'];
		$code[] = $row['code'];
	}
	
	for($i=0;$i<count($code);$i++){
		$su = "SELECT `a`,`b_plus`,`b`,`c`,`d`,`f` FROM `mkombo_university`.`grade_summary` WHERE `code`='".$code[$i]."' AND `year`='".$yr."'";
		$su_r = mysql_query($su);
		while($row = mysql_fetch_array($su_r)){
			$a[] = $row['a'];
			$b_plus[] = $row['b_plus'];
			$b[] = $row['b'];
			$c[] = $row['c'];
			$d[] = $row['d'];
			$f[] = $row['f'];
		}
	}
	
	for($i=0;$i<count($reg_no);$i++){
		$qry = 'SELECT '.addCommaForReport($module_title).' FROM '.addComma($module_title).' WHERE '.addAnd($module_title,$reg_no[$i]).'';
		$rn_ = mysql_query($qry);
		while($row = mysql_fetch_array($rn_)){
			for($j=0;$j<count($module_title);$j++){
				$ca[$i][$j] = $row[''.$module_title[$j].'_ca'];
				$fe[$i][$j] = $row[''.$module_title[$j].'_fe'];
				$total[$i][$j] = $row[''.$module_title[$j].'_total'];
				$grade[$i][$j] = $row[''.$module_title[$j].'_grade'];
			}
		}
	}
	if(count($ca) == 0){
		$success[0] = 'no_data';
	}else{
	
	include("pdf/mpdf.php");

	$mpdf=new mPDF('utf-8','A4-L','','',20,5,10,10,5,10); //mPDF('utf-8','A4-L','font-size','font-family',margin-left,margin-right,margin-top,margin-bottom,margin-header,margin-footer) units are in millimeter
	$mpdf->progbar_altHTML = '
			<div style="margin-top: 25em; text-align: center; font-family: Verdana; font-size: 12px;">
				<img style="vertical-align: middle;" src="progressbar_img/loading.gif" /> Creating PDF file. Please wait...
			</div>';
	$mpdf->StartProgressBarOutput();

	$mpdf->mirrorMargins = 1;
	$mpdf->SetDisplayMode('fullpage','two');
	$mpdf->list_number_suffix = ')';

	$mpdf->debug  = true;

	$html = '
			<h2 style="margin-left:25%;">MKOMBO UNIVERSITY OF SCIENCE AND TECHNOLOGY</h2>
			<h4 style="margin-left:30%;">Overall Summary of Results - CA Weight 40%, FE Weight 60%</h4>
			<h4 style="margin-left:30%;">['.strtoupper($year).' YEAR] - '.$course.' - '.$yr.' - Semester '.$sem.'</h4>';
	$html .= '<table border="1">
		<tr><th></th><th></th>';
		for($i=0;$i<count($code);$i++){
			$html .= '<th colspan="4">'.$code[$i].'</th>';
		}
	$html .= '<th></th></tr>';
	$html .= '<tr><th>S/N</th><th>REG NO</th>';
		for($i=0;$i<count($code);$i++){	
			$html .= '<th>CA</th><th>FE</th><th>TOT</th><th>GR</th>';
		}
	$html .= '<th>GPA</th>';
	if($cgpa != ''){
		$html .= '<th>'.$cgpa.'</th>';
	}
	$html .= '</tr>';
	for($i=0;$i<count($reg_no);$i++){
		$html .= '<tr><td>'.($i+1).'</td><td>'.$reg_no[$i].'</td>';
		for($j=0;$j<count($module_title);$j++){
			$html .= '<td>'.$ca[$i][$j].'</td><td>'.$fe[$i][$j].'</td><td>'.$total[$i][$j].'</td><td>'.$grade[$i][$j].'</td>';
		}
		$html .= '<td>'.$gpa[$i].'</td>';
		if($cgpa != ''){
			$html .= '<td>'.$cgpa_[$i].'</td>';
		}
		$html .= '</tr>';
	}
	$html .= '</table>';

	$html2 = '<p></p>';
	$html2 .= '<h4 style="margin-left:10%;">GRADE SUMMARY</h4>';
	$html2 .= '<table border="1">';
	$html2 .= '<tr><th>GRADE</th>';
		for($i=0;$i<count($code);$i++){
			$html2 .=	'<th>'.$code[$i].'</th>';
		}	
	$html2	.=	'</tr>';
		$html2	.=	'<tr><td>A</td>';
		for($i=0;$i<count($a);$i++){
			$html2	.=	'<td>'.$a[$i].'</td>';
		}		
		$html2	.=	'</tr>';
		$html2	.=	'<tr><td>B+</td>';
		for($i=0;$i<count($b_plus);$i++){
			$html2	.=	'<td>'.$b_plus[$i].'</td>';
		}		
		$html2	.=	'</tr>';
		$html2	.=	'<tr><td>B</td>';
		for($i=0;$i<count($b);$i++){
			$html2	.=	'<td>'.$b[$i].'</td>';
		}		
		$html2	.=	'</tr>';
		$html2	.=	'<tr><td>C</td>';
		for($i=0;$i<count($c);$i++){
			$html2	.=	'<td>'.$c[$i].'</td>';
		}		
		$html2	.=	'</tr>';
		$html2	.=	'<tr><td>D</td>';
		for($i=0;$i<count($d);$i++){
			$html2	.=	'<td>'.$d[$i].'</td>';
		}		
		$html2	.=	'</tr>';
		$html2	.=	'<tr><td>F</td>';
		for($i=0;$i<count($f);$i++){
			$html2	.=	'<td>'.$f[$i].'</td>';
		}		
		$html2	.=	'</tr>';
	$html2	.= '</table>';

	// LOAD a stylesheet
	$stylesheet = file_get_contents('tablestyle.css');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($html,2);
	$mpdf->WriteHTML($html2,2);
	$mpdf->Output($filename_,'I');

	exit;
	}
}
?>