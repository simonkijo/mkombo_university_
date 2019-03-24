<?php
	include('../config/config.php');
	include('../config/functions.php');
	include('header/head.php');
	include('header/asideMenuAdmin.php');
	include('data/addCourseData.php');
	
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
		<li class="active"><a href="adminAddCourse.php"><i class="fa fa-book"></i> <span>Add Course</span></a></li>
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
      <h1>Course Management<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Add Course</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<?php 
			if(isset($md_success)){
				if($md_success[1] == 'success'){
					if($md_success[0] > 1){
						$s = 's'; $are = 'are'; $the = '';
					}else{
						$s = ''; $are = 'is'; $the = 'A';
					}
					echo "<div class='callout callout-success displaySms'>
							<h4>Successfully !</h4>
							<p>".$the." course".$s." ".$are." successful added</p>
						</div>";
				}else if($md_success[1] == 'fail'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Sorry something went wrong, try again.</p>
					</div>";
				}else if($md_success[4] == 'no_programme'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Please select a programme</p>
					</div>";
				}else if($md_success[2] == 'empty'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Please Fill the field.</p>
					</div>";
				}else if($md_success[3] == 'invalid'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Letters Only</p>
					</div>";
				}	
			}
			?>
		</div>
		<div class="col-md-3"></div>
	</div>
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Programme</label><br>
						<select name="programme" class="form-control select2">
						  
						  <?php
								if(isset($_POST['programme']) && !empty($_POST['programme'])){
									echo '<option selected="selected">'.$_POST['programme'].'</option>';
								}else{
									echo '<option selected="selected" value="">Select a Programme</option>';
								}	
							?>
						  <option>Bachelor Degree</option>
						  <option>Ordinary Diploma</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Course</label>
						<div class="form-group course">
						  <input type="text" class="form-control" name="course[]"><br>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<a class="btn btn-primary addBtnCourse">Add another</a>
					</div>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="sv_addCourse" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
			</form>
		</div>

    </section>
  </div>

<?php 
	include('footer/footer.php');
	include('footer/helpAdmin.php');
	include('footer/js.php');
?>