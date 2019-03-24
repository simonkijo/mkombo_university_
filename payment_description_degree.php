<?php
include("include/student_top.php");
//session_start();
//error_reporting(0);
//if(!isset($_SESSION['username'])){ header("location:staffLogin.php");}
//echo $username;
//$conn=mysql_connect("localhost","root","") or die("not connected");
//$select_db=mysql_select_db('mkombo_university',$conn);
/*$result=mysql_query("SELECT programme from  student WHERE reg_no='".getInfo('reg_no','student')."' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
while($row=mysql_fetch_array($result))
{$level=$row['programme']; 
if($level=="Ordinary Diploma"){header("location:payment_description.php"); }
if($level=="Bachelor Degree"){header("location:payment_description_degree.php"); }   
	  }*/
	  ?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">USER MANAGEMENT</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="student.php"><i class="fa fa-table"></i> <span>Class Time Table</span> </a></li>
        <li><a href="studentSubjectsCat.php"><i class="fa fa-th"></i> <span>Subjects Catalogue</span> </a></li>
		<!--end of subjects catalog-->
		<li><a href="studentAcademicReport.php"><i class="fa fa-files-o"></i> <span>Academic Reports</span> </a></li>
		<li class="active"><a href="diplomaOrbachelor.php"><i class="fa fa-files-o"></i> <span>Payments</span> </a></li>
		<li><a href="searchBook.php"><i class="fa fa-book"></i> <span>Books</span> </a></li>
		<!--end of academic report-->
		<li><a href="studentProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
		<li><a href="logout.php"><i class="fa fa-user"></i> <span>Sign Out</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
<div class="row">
 <div class="col-md-6">
<div class="box box-primary" style="padding-left:5%; padding-right:5%; padding-bottom:2%" >
 <div class="box-header with-border">
 <h3 class="box-title" style="margin-left:40%;">fees Bachelor</h3>
 </div>
   <table id="example1" class="table table-bordered table-striped"  style="padding-bottom:9%;">
      <thead><tr ><th>Description</th><th colspan="3">B.Eng Programmes</th></tr></thead>
		 <tbody> <tr><td> </td><td>Year 1</td><td>Year 2</td><td>Year 3</td></tr>	
				<?php 
             	//$conn=mysql_connect("localhost","root","") or die("not connected");
	            //$select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT * FROM degree_payment") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
				$description=$row['Description'];
			    $year_1=$row['year_1'];
	 		    $year_2=$row['year_2'];
			    $year_3=$row['year_3'];
			   echo '<tr><td>'.$description.'</td><td>'.$year_1.'</td><td>'.$year_2.'</td><td>'.$year_3.'</td></tr>';
				}
			
			  $add=mysql_query('SELECT SUM(year_1),SUM(year_2),SUM(year_3) from degree_payment');
               while($row1=mysql_fetch_array($add))
                  {
                  $year_11=$row1['SUM(year_1)'];
                  $year_22=$row1['SUM(year_2)']; 
				  $year_33=$row1['SUM(year_3)'];
					echo '<tr><td>'.'<label>Total</label>'.'</td><td><label>'.number_format($year_11,2).'</label></td><td><label>'.number_format($year_22,2).'</label></td><td><label>'.number_format($year_33,2).'</label></td></tr></label>';
				  }                                    
				mysql_close($conn);
				?>
                  </tbody>
			   </table>
				  </div>
				 <div style="margin-left:10%;"> <a href="searchBook.php" >back to book rearch</a></div>
				   </div> 
				 <div class="col-md-6">
	   <div class="box box-primary" style="padding-left:5%; padding-right:5%; padding-bottom:3%" >
   <div class="box-header with-border">
   
  <h3 class="box-title" style="margin-left:40%;">View payment record</h3>
            </div>
			  <form method="post"  autocomplete="off">
			   <table id="example1" class="table table-bordered table-striped">
			   <tbody>	<?php //$error="fffffffffff"; ?>
			    <tr><td style="width:30%; padding-left:10%;">Detail</td><td></td></tr>
				<?php 
				//$username=$_SESSION["username"];
             	//$conn=mysql_connect("localhost","root","") or die("not connected");
	            //$select_db=mysql_select_db('mkombo_university',$conn);
				$result5=mysql_query("SELECT * FROM  financial_record WHERE id='".getInfo('reg_no','student')."' ");
				$num_row=mysql_num_rows($result5);
				  if($num_row!=null)
				  {
	            $result=mysql_query("
				                    SELECT financial_record.id,financial_record.amount,student.reg_no,
				                    student.fname,student.mname,student.sname,student.programme,student.course,
									student.admission_year FROM financial_record,student
				                    WHERE financial_record.id=student.reg_no AND student.reg_no='".getInfo('reg_no','student')."'
									") or die(mysql_error());
                while($row=mysql_fetch_array($result))
                { 
			    $id_financial=$row['id'];
			    $amountx=$row['amount'];
				$fname=$row['fname'];
			    $mname=$row['mname'];
				$sname=$row['sname'];
				$course=$row['course'];
				//echo $error;
				$level=$row['programme'];
				$admission_year=$row['starting_year'];
			    $years=date('Y')-$admission_year.'<sup>th</sup>'.' '.'Year';
				$total=number_format(1200000);
				$amount=number_format($amountx);
				//$change=number_format(1200000-$amountx);
				$change=1200000-$amountx;
				 if($change>0){ $remain=number_format($change);}
				 else if($change<=0){ 
				 $remain="000.00";
				 $exeed=number_format(-1*$change);}
			 	}
				  }else if($num_row==null)
				  {
					$id_financial=".........................";
			    $amount=".......................";
				$fname="................";
			    $mname="................";
				$sname="......................";
				$course=".....................";
				$level="......................";
				$admission_year=".................";
				$remain="---------------------";
				$total="-----------------";
				$exeed="------------------";
				$years=".............";  
					  
				  }
				 mysql_close($conn);
				?>
			   <tr><td style="width:30%; padding-left:10%;"><label>Reg Id</label></td><td><?php echo $id_financial; ?></td></tr>
            <tr><td style="width:30%; padding-left:10%;"><label>Full Name</label></td><td><?php echo $fname.' '.$mname.' '.$sname; ?></td></tr>
				<tr><td style="width:30%; padding-left:10%;"><label>Level</label></td><td><?php echo $level; ?></td></tr>
			      <tr><td style="width:30%; padding-left:10%;"><label>Course</label></td><td><?php echo $course; ?></td></tr>
				     <tr><td style="width:30%; padding-left:10%;"><label>year</label></td><td><?php echo $years; ?></td></tr>
					    <tr><td style="width:30%; padding-left:10%;"><label>total</label></td><td><?php echo $total; ?></td></tr>
						   <tr><td style="width:30%; padding-left:10%;"><label>payed</label></td><td><?php echo $amount; ?></td></tr>
						<tr><td style="width:30%; padding-left:10%;"><label>Remain</label></td><td><?php echo $remain; ?></td></tr>
					 <tr><td style="width:30%; padding-left:10%;"><label>Eceed</label></td><td><?php echo $exeed; ?></td></tr>
						<tr><td colspan="2" align="center"> from the financial department</td></tr>
							  		  
							</tbody>
   			    </table>
				</form>
		         </div>
				 
				 
				 
				  </div>
				   </div>  
<?php
include("include/student_bottom.php")
?>