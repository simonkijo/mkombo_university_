<?php 
	include('config/config.php');
	include('config/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php
//error_reporting(0);
//session_start();
//if(!isset($_SESSION['user_id'])){ header("location:studentLogin.php");}
	if(logged_in()){
		
	}else{
		header('Location: studentLogin.php');
	}
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
               <!--<img src="dist/img/user_julius.jpg" class="user-image" alt="User Image">
              hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo firstCapitalLetter(getInfo('sname','student')).', '.firstCapitalLetter(getInfo('fname','student'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo photoProfile(getInfo('fname','student').'_'.getInfo('mname','student').'_'.getInfo('sname','student').'.jpg');?>" class="img-circle" alt="User Image">

                <p><?php echo firstCapitalLetter(getInfo('sname','student')).', '.firstCapitalLetter(getInfo('fname','student'));?><small><?php echo firstCapitalLetter(getInfo('course','student'));?></small></p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="studentProfile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
  
