<?php 
include('include/financial_top.php');
//include('config/config.php');
//include('config/functions.php');

	if(logged_in()){
			
	}else{
		header('Location: staffLogin.php');
	}
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Financial</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
				<li class="active"><a href="enter_financial_record.php"><i class="fa fa-circle-o"></i> <span>Enter Record</span></a></li>
				<li><a href="finacial_record_view.php"><i class="fa fa-circle-o"></i> <span>Detail</span></a></li>
				<li><a href="finacial_record_view.php"><i class="fa fa-circle-o"></i> <span>Update</span></a></li>
				<li><a href="finacial_report.php"><i class="fa fa-circle-o"></i> <span>Report</span></a></li>
				<li><a href="profile_busar.php"><i class="fa fa-circle-o"></i> <span>Profile</span></a></li>
			</ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
<?php	
$error="";	
if(isset($_POST['receive']))
{
 $id=$_POST['id'];
 $amount=$_POST['amount']; 
 $purpose=$_POST['purpose'];
 $receipt_code=$_POST['receipt_code'];
 //$level="degree";
 //$course="degree";
 $date=date("Y-m-d");
 //$conn=mysql_connect("localhost","root","") or die("not connected");
 //$select_db=mysql_select_db('mkombo_university',$conn); 
 $count=mysql_query("SELECT * FROM student WHERE reg_no='$id'");
   $num_rows = mysql_num_rows($count);
   if($num_rows!=Null)
   { 
   if($_POST['id'] != NULL && $_POST['amount'] !=NULL && $_POST['purpose'] !=NULL && $_POST['receipt_code'] !=NULL )
            {
		$countt=mysql_query("SELECT * FROM financial_record WHERE id='$id'");
		 $num_rowst = mysql_num_rows($countt);
         if($num_rowst==Null)
           {
		  $insert=mysql_query("INSERT INTO  financial_record(id,amount,purpose,date_financial,receipt_code) values('$id','$amount','$purpose','$date','$receipt_code')") or die(mysql_error());	            
          //mysql_query("INSERT INTO  receipt_code(reg_no,semister_one_code,amount_one) values('$id','$receipt_code','$amount')") or die(mysql_error());	            
          
		  if($insert)
			  { echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.
			       '<div class="callout callout-info"><h4>'.'successfull!'.'</h4>The student financial record entered</div>'.
			       '</div><div class="col-md-3"> </div></div>';
			  }
			 			  
		    }else if($num_rows!=Null)
                  { 
	$result_result=mysql_query("SELECT receipt_code from  financial_record WHERE id='$id' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
	  while($row=mysql_fetch_array($result_result))
	  { 
	   $receipt_code2=$row['receipt_code']; 
	   echo $receipt_code2.'</br>';
	   $all_receipt= $receipt_code2." , ".$receipt_code;
	   echo $all_receipt;
	   mysql_query("UPDATE financial_record SET amount=amount+$amount,receipt_code='$all_receipt' WHERE id='$id'");
				    // mysql_query("UPDATE receipt_code SET semister_two_code='$receipt_code',amount_two='$amount' WHERE reg_no='$id'");
	  }		 
	              }

      }
   }
	  
	   if($num_rows==Null)
           {
			  echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.
			       '<div class="callout callout-info"><h4>'.'Fail!'.'</h4>Student not registered</div>'.
			       '</div><div class="col-md-3"> </div></div>';  
		   }
		    mysql_close($conn);
        }
?>       
	<div class="row">
	  <div class="col-md-6" >
       	<div class="box box-primary col-md-12">	 
			<div class="box-header with-border">
				<h3 class="box-title" style="margin-left:40%; margin-bottom:4%;margin-top:3%;">Enter Financial Record</h3>
            </div>
         <form class="form-horizontal" role="form" method="post" style="margin:2%;" >
              	<div class="form-group has-feedback ">
                  <label class="control-label"> Student Id</label>
                      <div class="handle_error has-feedback ">
                        <input type="text" class="form-control ab student" name="id" autocomplete="off" placeholder="Enter ..." maxlength="15" minlength="12">
				           <span class="glyphicon glyphicon-user form-control-feedback " ></span>
				            <span class="help-block student_error"></span>
                   </div>
				      
                </div>
             
			    <div class="form-group has-feedback">
                  <label class="control-label">Amount</label>
                  <div class="handle_error_amount a has-feedback ctrl_error">
                  <input type="text" class="form-control ab amount" name="amount" id="book_field" autocomplete="off"  placeholder="Enter ...">
				   <span class="glyphicon glyphicon-credit-card b form-control-feedback " ></span>
                    <span class="help-block amount_error"></span>
					</div>				    
                </div>
				<div class="form-group has-feedback " >
                  <label class="control-label">Purpose</label>
                  <div class="handle_error_purpose a has-feedback ctrl_error">
                  <input type="text" class="form-control purpose ab" name="purpose" autocomplete="off"  id="book_field" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-education b form-control-feedback " ></span>
                    <span class="help-block  purpose_error"></span>
					</div>				    
                </div>
             			      
				<div class="form-group has-feedback ">
                  <label class="control-label">Recept Code </label>
                  <div class="handle_error_code a has-feedback ctrl_error">
                  <input type="text" class="form-control ab  code" name="receipt_code"  autocomplete="off" maxlength="6" minlength="6" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-qrcode b form-control-feedback " ></span>
                   <span class="help-block code_error"></span>
				   </div>				   
                  </div>
                       <div  class="form-group ">        
                      <div >
                   <input type="submit"  value="Enter" class="btn btn-primary enter_financial" name="receive" Width="30%" style="margin-bottom:3%;"><?php echo $error; ?>
                    </div>
                      </div>
                </form>
			</div> 
		</div> 
	 <div class="col-md-6">
		<div class="box box-primary" style="padding-bottom:0 width:40%;" >
			<div class="box-header with-border">
				<h3 class="box-title" style="margin-left:40%;">View payment record</h3>
            </div>
			  <form method="post"  autocomplete="off" >
			   <table id="example1" class="table table-bordered table-striped">
			   <tbody>	<?php //$error="fffffffffff"; ?>
			    <tr><td style="width:30%; padding-left:10%;">Detail</td><td><input type="text" name="code" placeholder="enter username"  maxlength="15" minlength="12"></td></tr>
				<?php 
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
				 $years=".............";
				if(isset($_POST['angalia']) && isset($_SESSION['username_busar']))
				{
			    if($_POST['code']!=NULL )
					{
				$username=$_POST['code'];		
             	//$conn=mysql_connect("localhost","root","") or die("not connected");
	            //$select_db=mysql_select_db('mkombo',$conn);
	            $result=mysql_query("
				                    SELECT financial_record.id,financial_record.amount,student.reg_no,
				                    student.fname,student.mname,student.sname,student.programme,student.course,
									student.starting_year FROM financial_record,student
				                    WHERE financial_record.id=student.reg_no AND student.reg_no='$username'
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
				$change=number_format(1200000-$amountx);
				 if($change>0){ $remain=$change;}
				 else if($change<=0){ 
				 $remain="000.00";
                 $real_integer = filter_var($change, FILTER_SANITIZE_NUMBER_INT);
                 $convert= -1*$real_integer;
				 $exeed=number_format($convert,2);
				 
				 }
			 	}
		
				 }
			
				}
				   mysql_close($conn);
				?>
			   <tr><td style="width:30%; padding-left:10%;"><label>Reg Id</label></td><td><?php echo $id_financial; ?></td></tr>
            <tr><td style="width:30%; padding-left:10%;"><label>Full Name</label></td><td><?php echo $fname.' '.$mname.' '.$sname; ?></td></tr>
				<tr><td style="width:30%; padding-left:10%;"><label>Level</label></td><td><?php echo $level; ?></td></tr>
			      <tr><td style="width:30%; padding-left:10%;"><label>Course</label></td><td><?php echo $course; ?></td></tr>
				     <tr><td style="width:30%; padding-left:10%;"><label>year</label></td><td><?php echo $years; ?></td></tr>
					    <tr><td style="width:30%; padding-left:10%;"><label>total</label></td><td><?php echo 'Tsh '.$total.'/='; ?></td></tr>
						   <tr><td style="width:30%; padding-left:10%;"><label>payed</label></td><td><?php echo 'Tsh '.$amount.'/=';?></td></tr>
						      <tr><td style="width:30%; padding-left:10%;"><label>Remain</label></td><td><?php echo 'Tsh '.$remain.'/='; ?><label style="margin-left:5%; margin-right:5%;"> Exceed </label><?php echo $exeed; ?></td></tr>
			    <tr><td colspan="2"><input type="submit" name="angalia" value="view" align="center" class="btn btn-primary"></td></tr>
               </tbody>
   			    </table>
				</form>
		</div>
	 </div>   				   
</div>
 
<?php 
include('include/financial_bottom.php');
?>
<script>

$(function() {
    $('input[name="daterange"]').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }});
         });

		 // popup  dialog
$('.popup').delay(4000).fadeOut();
</script>
