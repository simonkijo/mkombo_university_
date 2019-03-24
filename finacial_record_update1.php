<?php 
session_start();
if(!isset($_SESSION['username'])){ header("location:staffLogin.php");}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MU | MKOMBO UNIVERSITY</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/mkombo.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
</head>
					<?php		
if(isset($_POST['update_financial']))
        {
         $student_id=$_POST['student_id'];
		// echo $student_id."__julius"."  "."<br>";
		// $course=$_POST['course']; 
		// echo $course."__mungaya"."   "."<br>";
		 $amount=$_POST['amount']; 
        // echo $amount."__dit"."   "."<br>";		 
		 $purpose=$_POST['purposes'];
		// echo $purpose."__mungaya";
		 $level="degree";
		 $date_financial=$_POST['date_financial'];
		//  echo $date_financial."__mungaya";
		  $receipt_code="XXXXXXXX";
		  $year="final year";
		  $conn=mysql_connect("localhost","root","") or die("not connected");
		  $select_db=mysql_select_db('mkombo_university',$conn);
		  mysql_query("DELETE FROM  financial_record WHERE id='$student_id'");	            
       	  ECHO $student_id;
	      mysql_query("INSERT INTO  financial_record(id,amount,purpose,date_financial,receipt_code,level,year) values('$student_id','$amount','$purpose','$date_financial','$receipt_code','$level','year')") or die(mysql_error());	            
          header("location:finacial_record_view.php");
          mysql_close($conn);
        }
          ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="starter.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>U</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mkombo</b> University</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user_julius.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Jilius Mungaya</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user_julius.jpg" class="img-circle" alt="User Image">

                <p>
                  Mungaya Julius - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile_busar.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="login_all.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
           <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
  <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
          <li class="header">HEADER</li>
             <!-- Optionally, you can add icons to the links -->
              <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Home</a></li>
                     <li class="treeview">
                     <li class="treeview">
             <a href="#"><i class="fa fa-link"></i> <span>Financial</span> <i class="fa fa-angle-left pull-right"></i></a>
             <ul class="treeview-menu">
			 <li><a href="enter_financial_record.php">Enter Record</a></li>
			<li><a href="finacial_record_view.php">Detail</a></li>
			<li><a href="finacial_record_view.php">Update</a></li>
			<li><a href="profile_busar.php">profile</a></li>
			
    </ul>
	</li>
	</li>
    </ul>
    </section>
   
    <!-- /.sidebar -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 <div class="box">
            <div class="box-body">
			<!--<div class="col-md-1">aaaaa</div>-->
			<div class="row" style="margin:3%; margin-top:0%;">
			<div class="col-md-3"></div>
			<div class="col-md-6" >
         		
				   <div class="box-header with-border">
              <h3 class="box-title">UPDATE STUDENT FINANCIAL RECORE</h3>
            </div>  
					<?php 
			    $id =$_GET['id'];
				$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT id,course,amount,purpose,date_financial FROM financial_record where id=$id") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
			    $course=$row['course'];
	 		    $amount=$row['amount'];
			    $purpose=$row['purpose'];
			    $date_financial=$row['date_financial'];
				   }
           mysql_close($conn);
             
				?>
			
           <form class="form-horizontal" role="form" method="post" >
                
				<div class="form-group has-feedback " >
                  <label class="control-label"> student id</label>
                  <div class="handle_error has-feedback ">
                  <input type="text" class="form-control book_id" name="student_id" value="<?PHP ECHO $id; ?>">
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
                  <input type="text" class="form-control book_publisher"  name="purposes" id="book_field" value="<?PHP ECHO $purpose; ?>">
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
                   <input type="submit"  name="update_financial" class="btn btn-primary receive" value="Update">
                    </div>
                      </div>
                    </form>
					

         </div>
			  <div class="col-md-3"></div>
                 </div>
            <!-- /.box-body -->
          </div>
          <!-- 	<div class="col-md-2"></div> -->
			</div>
	  </div>
  <!-- /.content-wrapper -->

   
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Simon Kijo and Julius Mungaya</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="dist/js/validate.js"></script>
</body>
</html>
