
<?php
 require('mpdf/mpdf.php');
$mpdf=new mPDF();
$mpdf->writeHTML(
	//file_get_contents("http://localhost/manage/user/recept_accountant.php?id=$_SESSION['ID']&course=$_SESSION['course']&amount=$_SESSION['amount']"));
//file_get_contents("http://localhost/manage/user/recept_accountant.php?amount=$amount&id=$id&&course=$course "));//
file_get_contents("http://localhost/projects/mkombo_university/store_report.php"));//
$mpdf->output();
 //header("location:Admin.php");

?>