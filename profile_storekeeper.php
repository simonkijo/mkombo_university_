<?php 
	include('config/config.php');
	include('config/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php
//error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){ header("location:staffLogin.php");}
 $display="";
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MU | MKOMBO UNIVERSITY</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/mkombo.min.css">
   <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php	
  
	$conn=mysql_connect("localhost","root","") or die("not connected");
	$select_db=mysql_select_db('mkombo_university',$conn);
	$result=mysql_query("SELECT username,email_address,phone_no,role from staff where role='Storekeeper' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
while($row=mysql_fetch_array($result))
	{ 
	$full_name=$row['username'];
	$the_email=$row['email_address'];
	$the_phone=$row['phone_no'];
	$the_position=$row['role'];
	}
if(isset($_POST['setting']))
	{
	 $fname=$_POST['fname'];
	 $email=$_POST['email']; 
	 $phone=$_POST['phone'];
	 $position=$_POST['position'];
	 $password=$_POST['password']; 
	 $repassword=$_POST['repassword'];
	 $date=DATE('Y/d/m');
	 
	 $countt=mysql_query("SELECT * FROM staff WHERE  email_address='$email' AND  role='Storekeeper'");
		 $num_rows = mysql_num_rows($countt);
         if($num_rows!=Null)
        {
	if($_POST['fname'] != NULL && $_POST['email'] !=NULL && $_POST['phone'] !=NULL && $_POST['password'] !=NULL && $_POST['repassword'] !=NULL)
	{
mysql_query("UPDATE staff SET username='$fname' , email_address='$email' , phone_no='$phone' , role='Storekeeper' , password='$password' WHERE role='Storekeeper' ") or die(mysql_error());	            
$result=mysql_query("SELECT username,email,phone,position from profile where role='Storekeeper' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
	while($row=mysql_fetch_array($result))
	{ 
	$full_name=$row['username'];
	$the_email=$row['email_address'];
	$the_phone=$row['phone_no'];
	$the_position=$row['role'];
	}
	
	} 
	}
	
	else $display='<div class="row popup"><div class="col-md-3"></div><div class="col-md-6">'.'<div class="callout callout-info"><h4>'.'Fail!'.'</h4>Access denied</div>'.'</div><div class="col-md-3"></div></div>'; 
	
	mysql_close($conn);
	}
?>
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>U</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mkombo</b> University</span>
    </a>
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
              <span class="hidden-xs">Julius Mungaya</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                   <img src="<?php echo photoProfile(getField('fname').'_'.getField('mname').'_'.getField('sname').'.jpg');?>" class="img-circle" alt="User Image">

                <p><?php echo firstCapitalLetter(getField('sname')).', '.firstCapitalLetter(getField('fname'));?><small><?php echo firstCapitalLetter(getField('role'));?></small></p>
                           </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile_storekeeper.php" class="btn btn-default btn-flat">Profile</a>
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>help</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>rooms</span> <i class="fa fa-angle-left pull-right"></i></a>
           <ul class="treeview-menu">
		<li><a href="classrooms_enter_record.php">
		<i class="fa fa-circle-o text-red"></i> <span>Enter record</span></a></li>
		<li><a href="classrooms_detail_only.php">
		<i class="fa fa-circle-o text-red"></i> <span>Detail</span></a></li>
		<li><a href="classrooms_detail.php">
		<i class="fa fa-circle-o text-red"></i> <span>Update</span></a></li>
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

  <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user_julius.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $full_name; ?></h3>

              <p class="text-muted text-center">Storekeeper</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Full name</b> <a class="pull-right"><?php echo $full_name; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email address</b> <a class="pull-right"><?php echo $the_email; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><?php echo $the_phone; ?></a>
                </li>
				
				<li class="list-group-item">
                  <b>Position</b> <a class="pull-right"><?php echo $the_position; ?></a>
                </li>
				<li class="list-group-item">
                  <b>index</b> <a class="pull-right">120120</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  </div>  
  <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab"></a></li>
             <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
			 <div class="tab-pane" id="settings">
			 <div> <?php echo  $display; ?> </div>
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>
                   
				   <div class="col-sm-10 error_fname  has-feedback">
                      <input type="text" class="form-control fname" name="fname" placeholder="Name">
					  	   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                      <span class="help-block fname_error"></span>
					</div>
                  </div>
               
                  <div class="form-group ">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 has-feedback error_email">
                      <input type="email" class="form-control email" name="email" placeholder="email">
					   <span class="glyphicon glyphicon-envelope b form-control-feedback " ></span>
                      <span class="help-block email_error"></span>
					</div>
                  </div>
				    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10 error_phone  has-feedback">
                      <input type="text" class="form-control phone" name="phone" id="phoneValidate" placeholder="phone">
                      <span class="glyphicon glyphicon-phone b form-control-feedback " ></span>
					 <span class="help-block phone_error"></span>
					</div>
                  </div>
             	   
			      <div class="form-group ">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10 has-feedback error_password">
                      <input type="password" class="form-control password" name="password" placeholder="password" maxlength="16" minlength="8">
                       <span class="glyphicon glyphicon-lock b form-control-feedback " ></span>
					  <span class="help-block  password_error"></span>
					</div>
                  </div>
				  
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Confirm </label>

                    <div class="col-sm-10 has-feedback error_repassword">
                      <input type="password" class="form-control repassword" name="repassword" placeholder="repassword" maxlength="16" minlength="8">
                       <span class="glyphicon glyphicon-lock b form-control-feedback " ></span>
					  <span class="help-block repassword_error"></span>
					</div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                     <input type="submit" name="setting" class="btn btn-primary change" value="Submit" >
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
	<?php 
include('include/financial_bottom.php');
?>
