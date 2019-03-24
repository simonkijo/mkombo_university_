<?php
	define('_MPDF_URI','pdf/');
	
if(isset($_POST['adm_print'])){ 
	
	$course = $_POST['course'];
	$programme = 'Bachelor Degree';

	if($course == ''){
		$success[1] = 'no_selected';
		return $success;
	}
	$sql = "SELECT `reg_no`,`fname`,`mname`,`sname`,`gender`,`nationality`,`year`,`semester` FROM `mkombo_university`.`student` WHERE `programme`='".$programme."' AND `course`='".$course."'";
	$sql_run = mysql_query($sql);
	while($row = mysql_fetch_array($sql_run)){
		$reg_no_3[] = $row['reg_no'];
		$fname_3[] = $row['fname'];
		$mname_3[] = $row['mname'];
		$sname_3[] = $row['sname'];
		$gender_3[] = $row['gender'];
		$nationality_3[] = $row['nationality'];
		$year_3[] = $row['year'];
		$semester_3[] = $row['semester'];
	}
	
	if(count($reg_no_3)==0 && count($fname_3)==0 && count($mname_3)==0 && count($sname_3)==0 && count($gender_3)==0 && count($nationality_3)==0 && count($year_3)==0 && count($semester_3)==0){
		$success[0] = 'no_data';
		return $success;
	}else{
		include("pdf/mpdf.php");

		$mpdf=new mPDF('utf-8','A4',15,'Times New Roman',20,5,10,10,5,10);  //mPDF('utf-8','A4-L','font-size','font-family',margin-left,margin-right,margin-top,margin-bottom,margin-header,margin-footer) units are in millimeter
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
				<h2 style="margin-left:10%;">MKOMBO UNIVERSITY OF SCIENCE AND TECHNOLOGY</h2>
				<h4 style="margin-left:20%;">STUDENTS REGISTERED BACHELOR DEGREE</h4>
				<h4 style="margin-left:30%;"> '.$course.'</h4>';
		if(isset($reg_no_3) && isset($fname_3) && isset($mname_3) && isset($sname_3) && isset($gender_3) && isset($nationality_3) && isset($year_3) && isset($semester_3)){
			if(!empty($reg_no_3) && !empty($fname_3) && !empty($mname_3) && !empty($sname_3) && !empty($gender_3) && !empty($nationality_3) && !empty($year_3) && !empty($semester_3)){
		$html .=	'<table border="1">
							<thead>
								<tr>
								  <th>S/NO</th>
								  <th>Reg No</th>
								  <th>Name</th>
								  <th>Gender</th>
								  <th>Nationality</th>
								  <th>Year</th>
								  <th>Semester</th>
								</tr>
							</thead>
							<tbody>';

				for($i=0;$i<count($reg_no_3);$i++){
							$html .='<tr>
										<td>'.($i+1).'</td>
										<td>'.$reg_no_3[$i].'</td>
										<td>'.firstCapitalLetter($fname_3[$i]).' '.firstCapitalLetter($mname_3[$i]).' '.firstCapitalLetter($sname_3[$i]).'</td>
										<td>'.firstCapitalLetter($gender_3[$i]).'</td>
										<td>'.firstCapitalLetter($nationality_3[$i]).'</td>
										<td>'.firstCapitalLetter($year_3[$i]).'</td>
										<td>'.firstCapitalLetter($semester_3[$i]).'</td>
									</tr>';
				}
									
					$html .=		'</tbody>
							</table>';
			}
		}

		// LOAD a stylesheet
		$stylesheet = file_get_contents('tablestyle.css');
		$mpdf->WriteHTML($stylesheet,1);
		$mpdf->WriteHTML($html,2);
		$mpdf->Output('registered_student_bachelor.pdf','I');

		exit;
	}
}
?>