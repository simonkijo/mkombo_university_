<?php 
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuStudent.php');
	
	if(logged_in()){
		
	}else{
		header('Location: studentLogin.php');
	}
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">USER MANAGEMENT</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="student.php"><i class="fa fa-table"></i> <span>Class Time Table</span> </a></li>
        <li><a href="studentSubjectsCat.php"><i class="fa fa-th"></i> <span>Subjects Catalogue</span> </a></li>
		<!--end of subjects catalog-->
		<li><a href="studentAcademicReport.php"><i class="fa fa-files-o"></i> <span>Academic Reports</span> </a></li>
		<li><a href="diplomaOrbachelor.php"><i class="fa fa-files-o"></i> <span>Payments</span> </a></li>
		<li><a href="searchBook.php"><i class="fa fa-book"></i> <span>Books</span> </a></li>
		<!--end of academic report-->
		<li><a href="studentProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
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
        <li><a href="student.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Manual and Help</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-6">
					<h4 class="text-primary">Left Side Navigation Menu</h4>
					<img src="manual_images/st_nav_menu.JPG">
					<p>This is where you navigate from one menu to another. By clicking the menu opens its page.</p>
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
					<img src="manual_images/btn_show.JPG">
					<p>This button should be clicked after selecting a year and semester. The appropriate contents will be displayed.</p>
				</div>
				<div class="col-md-6">
					<h4 class="text-primary">Toggle Button</h4>
					<img src="manual_images/toggle_icon.JPG">
					<p>If this is clicked , left side navigation menu collapse or expand according to previous state. It gives more space for the contents on page.</p>
				</div>
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
	include('footer/footer.php');
	include('footer/helpStudent.php');
	include('footer/js.php');
?>