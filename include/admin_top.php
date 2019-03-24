<!DOCTYPE html>
<html>
<head>
<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['Amin_time'])){ header("location:login_all.php");}
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MU | MKOMBO UNIVERSITY</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/mkombo.min.css">
   <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">  
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="starter.html" class="logo">
      <span class="logo-mini"><b>M</b>U</span>
      <span class="logo-lg"><b>Mkombo</b> University</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user_julius.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">MUNGAYA JULIUS</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user_julius.jpg" class="img-circle" alt="User Image">

                <p>
                  JULIUS MUNGAYA - Web Developer
                  <small>Member since Nov. 2016</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile_admin.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
               
                  <form method="post">
                  <input type="submit" class="btn btn-default btn-flat" value="Sign out" name="out">
				  </form>
				 <?php 
				  $today = date("H:i:s");
				  $session= $_SESSION["Amin_time"];
				 if(isset($_POST['out']))
				    { $conn=mysql_connect("localhost","root","") or die("not connected");
	           $select_db=mysql_select_db('mkombo_university',$conn);
			     mysql_query("INSERT INTO logs(logout) value('$today') WHERE login='$session' ");
      		    // remove all session variables
			         session_unset(); 
                  // destroy the session 
                     session_destroy(); 
					 header("location:login_all.php"); 
					 
				    }
				   ?> 
			   </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>more</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="profile_admin.php">profile</a></li>
            <li><a href="#">sign out</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
 