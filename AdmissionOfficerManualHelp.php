<?php
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuAdmissionOfficer.php');
	
	if(logged_in()){
		
	}else{
		header('Location: staffLogin.php');
	}
?>
<aside class="main-sidebar">

    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">USER MANAGEMENT</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i> <span>Registered Students</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="admissionOfficer.php"><i class="fa fa-file-o"></i> <span>Bachelor Degree</span></a></li>
			<li><a href="admissionOfficerDiploma.php"><i class="fa fa-file-o"></i> <span>Ordinary Diploma</span></a></li>
          </ul>
        </li>
		<!--end of students approval-->
		<li class="treeview">
          <a href="#"><i class="fa fa-pie-chart"></i> <span>Admission Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="admissionOfficerReport.php"><i class="fa fa-file-o"></i> <span>Bachelor Degree</span></a></li>
			<li><a href="admissionOfficerReportDiploma.php"><i class="fa fa-file-o"></i> <span>Ordinary Diploma</span></a></li>
          </ul>
        </li>
		<!--end of admission reports-->
		<li><a href="admissionProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
		<li><a href="logout.php"><i class="fa fa-user"></i> <span>Sign Out</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>User Manual Help<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="admissionOfficer.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Manual Help</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Left Side Navigation Menu</h4>
					<img src="manual_images/adm_nav_menu.JPG">
					<p>This is where you navigate from one menu to another. By clicking the menu item opens its page.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary">Help Menu Icon</h4>
					<img src="manual_images/help.JPG">
					<p>This is where you get user manual and help. By clicking the help menu icon opens its page. Below its help menu after clicking.</p>
					<img src="manual_images/help_menu.JPG">
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<h4 class="text-primary">Show Button</h4>
					<img src="manual_images/btn_show.JPG">
					<p>After selecting a course. This button shows a table with all registered students.</p>
				</div>
				<div class="col-md-3">
					<h4 class="text-primary">Print Button</h4>
					<img src="manual_images/exam_print.JPG">
					<p>After selecting a course. This button prints a report of all registered students.</p>
				</div>
				<div class="col-md-3">
					<h4 class="text-primary">Selection Option</h4>
					<img src="manual_images/exam_course.JPG">
					<p>This is where you select a course.</p>
				</div>
			</div>
		</div>
    </section>
  </div>

<?php 
	include('footer/footer.php');
	include('footer/helpAdmissionOfficer.php');
	include('footer/js.php');
?>