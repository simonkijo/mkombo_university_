<?php 
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuLecturer.php');
	
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
		<li><a href="lecturer.php"><i class="fa fa-files-o"></i> <span>Student Marks</span> </a></li>
<?php 
	$hod = getRoleField('hod');
	if(isset($hod) && !empty($hod)){
		if($hod == 'YES'){
			echo '<li><a href="moduleAssignment.php"><i class="fa fa-book"></i> <span>Module Assignment</span> </a></li>';
		}
	}
?>
		<li><a href="lecturerProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
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
      <h1>User Manual and Help<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="lecturer.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Manual and Help</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Left Side Navigation Menu</h4>
					<img src="manual_images/lec_nav_menu.JPG">
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
				<div class="col-md-6">
					<h4 class="text-primary">Selection Option</h4>
					<img src="manual_images/year.JPG">
					<p>This is where you select a year.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary">Selection Option</h4>
					<img src="manual_images/semester.JPG">
					<p>This is where you select a semester.</p>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Button</h4>
					<img src="manual_images/lec_sv_btn.JPG">
					<p>This button should be clicked after selecting a year and semester. On clicking , the continuous assessment and final examination marks will be saved if they are error free.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary">Toggle Button</h4>
					<img src="manual_images/toggle_icon.JPG">
					<p>If this is clicked , left side navigation menu collapse or expand according to previous state. It gives more space for the contents on page.</p>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Module Assignment Table</h4>
					<img src="manual_images/lec_md_selection.JPG">
					<p>After clicking menu item "module Assignment" , You select a year and semester. The above table is displayed. Click the input field besides lecturer name, to assign a module or modules, then save. You will be notified if the process is either success or fail.</p>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<h4 class="text-primary" style="margin-left:3%;">Notification message</h4>
				<div class="col-md-6">
					<h4 class="text-primary">Success message</h4>
					<img src="manual_images/sms_success.JPG">
					<p>This displays success message for the process.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary">Fail message</h4>
					<img src="manual_images/sms_error.JPG">
					<p>This displays error message for the process.</p>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Information message.</h4>
					<img src="manual_images/sms_info.JPG">
					<p>This displays information message.</p>
				</div>
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
	include('footer/footer.php');
	include('footer/helpLecturer.php');
	include('footer/js.php');
?>