<?php 
//session_start();
//$username=$_SESSION["user_id"];
	include('config/config.php');
	include('config/functions.php');
//$conn=mysql_connect("localhost","root","") or die("not connected");
//$select_db=mysql_select_db('mkombo_university',$conn);
$result=mysql_query("SELECT programme from  student WHERE reg_no='".getInfo('reg_no','student')."'") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
while($row=mysql_fetch_array($result))
{$level=$row['programme']; 
if($level=="Ordinary Diploma"){header("location:payment_description.php"); }
if($level=="Bachelor Degree"){header("location:payment_description_degree.php"); }   
	  }
?>