
<?php
 require('pdf/mpdf.php');
$mpdf=new mPDF();
$mpdf->writeHTML(
	//file_get_contents("http://localhost/manage/user/recept_accountant.php?id=$_SESSION['ID']&course=$_SESSION['course']&amount=$_SESSION['amount']"));
//file_get_contents("http://localhost/manage/user/recept_accountant.php?amount=$amount&id=$id&&course=$course "));//
file_get_contents("http://localhost/mkombo_university_integration/finacial_report.php"));
//$css=get_file_content('dist/css/decorate.css');
//$mpdf=WriteHTML($css,1);
$mpdf->output();

?>