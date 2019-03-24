<?php
	include('../config/config.php');
	include('../config/functions.php');
	include('header/head.php');
	include('header/asideMenuAdmin.php');
	include('data/imageData.php');
	
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
		<li class="active"><a href="uploadImages.php"><i class="fa fa-circle-o"></i> <span>Upload Images</span></a></li>
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
      <h1>Images Management<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Upload Images</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<?php 
					if(isset($message)){
						if($message[0] == 'large'){
							echo "<div class='callout callout-danger displaySms'>
									<h4>ERROR !</h4>
									<p>Image is too large</p>
								</div>";
						}
						if($message[1] == 'invalid'){
							echo "<div class='callout callout-danger displaySms'>
									<h4>ERROR !</h4>
									<p>Image is not a valid format</p>
								</div>";
						}
						if($message[2] == 'success'){
							echo "<div class='callout callout-success displaySms'>
									<h4>SUCCESSFULLY !</h4>
									<p>Successfully, ".$count." uploaded</p>
								</div>";
						}
						if($message[3] == 'empty'){
							echo "<div class='callout callout-danger displaySms'>
									<h4>ERROR !</h4>
									<p>Please choose file(s) to upload.</p>
								</div>";
						}
					}
					?>
				</div>
				<div class="col-md-3"></div>
			</div>
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#p_info" data-toggle="tab">Entries</a></li>
						</ul>
					<div class="tab-content box-height-tab">
						 <div class="active tab-pane" id="p_info">
							<form method="post" enctype="multipart/form-data">

								<div class="row" style="margin:2% auto;">
									<div class="col-md-6">
										<div class="form-group">
											<!--<label>First Name:</label>-->
											  <input type="file" class="form-control" name="files[]" multiple="multiple">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-3">
										<div class="form-group">
											<label></label><br>
											<button type="submit" name="sv_upload" class="btn btn-primary">Upload</button>
										</div>
									</div>
								</div>
							</form>
						  </div>
						   
					</div>
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