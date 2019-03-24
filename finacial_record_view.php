   <?php
include("include/financial_top.php");
//error_reporting(0);

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
				<li><a href="enter_financial_record.php"><i class="fa fa-circle-o"></i> <span>Enter Record</span></a></li>
				<li class="active"><a href="finacial_record_view.php"><i class="fa fa-circle-o"></i> <span>Detail</span></a></li>
				<li><a href="finacial_record_view.php"><i class="fa fa-circle-o"></i> <span>Update</span></a></li>
				<li><a href="pdf_page_finacial.php"><i class="fa fa-circle-o"></i> <span>Report</span></a></li>
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
  <!--  <div class="callout callout-info"><h4>View Financial Record</h4><p>Financial record keeping .</p></div>-->
 			<?php
			    $id =$_GET['id'];
		        $conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            mysql_query("DELETE FROM financial_record WHERE id='$id' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                mysql_close($conn);
			 ?>
			 <div class="row" style="margin:3%; margin-top:1%;">
			   <div class="box box-primary >
			   <div class="col-md-12">
			  
               <table id="example1" class="table table-bordered table-striped">
               <thead><tr ><th>ID</th><th>AMOUNT</th><th>PURPOSE</th><th>DATE</th><th>RECEIPT CODE</th><th>MODIFY</th></tr></thead>
			   <tbody>	
				<?php 
             	$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT id,amount,purpose,date_financial,receipt_code FROM financial_record") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
	 		    $amount=$row['amount'];
			    $purpose=$row['purpose'];
			    $date_financial=$row['date_financial'];
				$receipt_code=$row['receipt_code'];
			   echo '<tr>';
			   echo '<td>' .$id.'</td><td>'.$amount.'</td><td>'.$purpose.'</td><td>'.$date_financial.'</td><td>'.$receipt_code.'</td>';
			   echo '<td align="center">';
			   ?>
			    <a href="finacial_record_view.php?id=<?php echo $id;?>"><font color="blue" size="3%">Delete</font></a> &nbsp;|&nbsp;</a>
				<a href="finacial_record_update.php?id=<?php echo $id;?>"><font color="blue" size="3%">Update</font></a>				
				
				
			  <?php
			   echo '</td>'; 
               echo '</tr>';
		      }
           mysql_close($conn);
				?>
                </tbody>
				</table>
			  </div>
			   </div>
    <?php
include("include/financial_bottom.php");
?>