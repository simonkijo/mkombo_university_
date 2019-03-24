<?php 
	include('config/config.php');
	include('config/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php
error_reporting(0);
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
	$result=mysql_query("SELECT username,email_address,phone_no,role from staff where role='Admin' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
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
	 
	 $countt=mysql_query("SELECT * FROM staff WHERE  email_address='$email' AND  role='Admin'");
		 $num_rows = mysql_num_rows($countt);
         if($num_rows!=Null)
        {
	if($_POST['fname'] != NULL && $_POST['email'] !=NULL && $_POST['phone'] !=NULL && $_POST['password'] !=NULL && $_POST['repassword'] !=NULL)
	{
mysql_query("UPDATE staff SET username='$fname' , email_address='$email' , phone_no='$phone' , role='Admin' , password='$password' WHERE role='Admin' ") or die(mysql_error());	            
$result=mysql_query("SELECT username,email,phone,position from profile where role='Admin' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
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
    <a href="starter.html" class="logo">
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
              <span class="hidden-xs"><?php echo $full_name; ?></span>
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
                  <a href="profile_admin.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
				<form method="post">
                  <input type="submit" class="btn btn-default btn-flat" value="Sign Out" name="out">
				  </form>
				
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
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
        <li><a href="#"><i class="fa fa-link"></i> <span>Help</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
		<li><a href="admin.php">
		<i class="fa fa-circle-o text-red"></i> <span>manage</span></a></li>
		<li><a href="profile_admin.php">
		<i class="fa fa-circle-o text-red"></i> <span>Profile</span></a></li>
		<!--<li><a href="login_admin.php">
		<i class="fa fa-circle-o text-red"></i> <span>sign out</span></a></li>-->
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
