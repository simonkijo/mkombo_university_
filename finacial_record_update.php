   <?php
include("include/financial_top.php")
//include("include/financial_bottom.php");
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
				<li><a href="finacial_record_view.php"><i class="fa fa-circle-o"></i> <span>Detail</span></a></li>
				<li class="active"><a href="finacial_record_view.php"><i class="fa fa-circle-o"></i> <span>Update</span></a></li>
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
<div class="box box-primary" >
<div class="row" style="margin-left:28%; margin-top:1%;"><label><h4> Updata financial record </h4></label></div>
			<div class="row" style="margin:3%; margin-top:1%;">
			  <div class="col-md-3"></div>
			   <div class="col-md-6">
		         		<?php 
			    $id =$_GET['id'];
				$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT id,amount,purpose,date_financial FROM financial_record where id=$id") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
	 		    $amount=$row['amount'];
			    $purpose=$row['purpose'];
			    $date_financial=$row['date_financial'];
				   }
           mysql_close($conn);
             
				?>
			<?php 
			if(isset($_POST['UPDATE']))
			{
			    $id=$_POST['id'];
	 		    $amount=$_POST['amount'];
			    $purpose=$_POST['purpose'];
			    $date_financial=$_POST['date_financial'];
				$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("update financial_record SET id='$id',amount='$amount',purpose='$purpose',date_financial='$date_financial' WHERE id='$id' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                 // header("location:financial_record_view.php");
				}
			?>
           <form class="form-horizontal" role="form" method="post" >
                
				<div class="form-group has-feedback " >
                  <label class="control-label"> student id</label>
                  <div class="handle_error has-feedback ">
                  <input type="text" class="form-control book_id" name="id" value="<?PHP ECHO $id; ?>">
				   <span class="glyphicon glyphicon-book form-control-feedback"></span>
				   <span class="help-block book_error"></span>
                   </div>
				      
              </div>
             
			            		      
				<div class="form-group has-feedback " >
                  <label class="control-label"> Amount </label>
                  <div class="handle_error_author a has-feedback ctrl_error">
                  <input type="text" class="form-control book_author"  name= "amount" value="<?PHP ECHO $amount; ?>">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block author_error"></span>
				   </div>				   
                </div>
           
			     <div class="form-group has-feedback">
                  <label class="control-label">Purposes</label>
                  <div class="handle_error_publisher a has-feedback ctrl_error">
                  <input type="text" class="form-control book_publisher"  name="purpose" id="book_field" value="<?PHP ECHO $purpose; ?>">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block publisher_error"></span>
				   </div>
				    </div>
           
			<div class="form-group has-feedback " >
                  <label class="control-label">Date</label>
                  <div class="handle_error_category a has-feedback ctrl_error">
                  <input type="text" class="form-control book_category" name="date_financial" id="book_field" value="<?PHP ECHO  $date_financial; ?>">
				   <span class="glyphicon glyphicon-book b form-control-feedback " ></span>
                    <span class="help-block category_error"></span>
					</div>				  
                </div>
			   <!---->
			<div  class="form-group " >        
                      <div >
                   <input type="submit"  name="UPDATE" class="btn btn-primary receive" value="Update">
                    </div>
                      </div>
                    </form>
					
 </div>
       
			  <div class="col-md-3"></div>
			  </div>
			  </div>
              <?php
//include("include/financial_top.php")
include("include/financial_bottom.php");
?>