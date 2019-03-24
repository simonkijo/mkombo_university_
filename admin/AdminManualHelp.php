<?php
	include('../config/config.php');
	include('../config/functions.php');
	include('header/head.php');
	include('header/asideMenuAdmin.php');
	
	if(logged_in()){
		
	}else{
		header('Location: adminLogin.php');
	}
	
?>
<aside class="main-sidebar">

    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">USER MANAGEMENT</li>
		<li class="treeview">
			<a href="#"><i class="fa fa-book"></i> <span>Student Management</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="admin.php"><i class="fa fa-file-o"></i> <span>Bachelor Degree</span></a></li>
				<li><a href="adminStudentDiploma.php"><i class="fa fa-file-o"></i> <span>Ordinary Diploma</span></a></li>
			</ul>
		</li>
		<li><a href="adminLecturer.php"><i class="fa fa-book"></i> <span>Lecturer Management</span></a></li>
		<li><a href="adminStaff.php"><i class="fa fa-book"></i> <span>Staff Management</span></a></li>
		<li class="treeview"><a href="#"><i class="fa fa-book"></i> <span>Add Module</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="adminAddModuleBachelor.php"><i class="fa fa-circle-o"></i> <span>Bachelor Degree</span></a></li>
				<li><a href="adminAddModuleDiploma.php"><i class="fa fa-circle-o"></i> <span>Ordinary Diploma</span></a></li>
			</ul>
		</li>
		<li><a href="adminAddCourse.php"><i class="fa fa-book"></i> <span>Add Course</span></a></li>
		<li><a href="uploadImages.php"><i class="fa fa-circle-o"></i> <span>Upload Images</span></a></li>
		<li><a href="adminProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
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
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">User Manual Help</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Left Side Navigation Menu</h4>
					<img src="../manual_images/admin_nav_menu.JPG">
					<p>This is where you navigate from one menu to another. By clicking the menu item opens its page.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary">Help Menu Icon</h4>
					<img src="../manual_images/help.JPG">
					<p>This is where you get user manual and help. By clicking the help menu icon opens its page. Below its help menu after clicking.</p>
					<img src="../manual_images/help_menu.JPG">
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<h4 class="text-primary">Selection Option</h4>
					<img src="../manual_images/year.JPG">
					<p>This is where you select a year.</p>
				</div>
				<div class="col-md-3">
					<h4 class="text-primary">Selection Option</h4>
					<img src="../manual_images/semester.JPG">
					<p>This is where you select a semester.</p>
				</div>
				<div class="col-md-3">
					<h4 class="text-primary">Selection Option</h4>
					<img src="../manual_images/exam_course.JPG">
					<p>This is where you select a course.</p>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<h4 class="text-primary">Save Button</h4>
					<img src="../manual_images/lec_sv_btn.JPG">
					<p>After filling the input fields. This saves to the database.</p>
				</div>
				<div class="col-md-3">
					<h4 class="text-primary">Upload Button</h4>
					<img src="../manual_images/admin_upload_btn.JPG">
					<p>After selecting all profile photo from the computer. This uploads to the database.</p>
				</div>
				<div class="col-md-3">
					<h4 class="text-primary">Add Another Button</h4>
					<img src="../manual_images/tt_add_f.JPG">
					<p>This add more field for input data.</p>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<h4 class="text-primary" style="margin-left:3%;">Notification message</h4>
				<div class="col-md-6">
					<h4 class="text-primary">Success message</h4>
					<img src="../manual_images/sms_success.JPG">
					<p>This displays success message for the process.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary">Fail message</h4>
					<img src="../manual_images/sms_error.JPG">
					<p>This displays error message for the process.</p>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Information message.</h4>
					<img src="../manual_images/sms_info.JPG">
					<p>This displays information message.</p>
				</div>
			</div>
		</div>

    </section>
  </div>

<?php 
	include('footer/footer.php');
	include('footer/helpAdmin.php');
	include('footer/js.php');
?>