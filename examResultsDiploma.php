<?php
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuExamOfficer.php');
	include('data/courseOptionDiploma.php');
	
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
        
		<!--end of subjects catalog-->
		<li class="treeview">
			<a href="#"><i class="fa fa-files-o"></i> <span>GPA Computation</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="examGpaBachelor.php"><i class="fa fa-circle-o"></i> <span>Bachelor Degree</span></a></li>
				<li><a href="examGpaDiploma.php"><i class="fa fa-circle-o"></i> <span>Ordinary Diploma</span></a></li>
			</ul>
		</li>
		<!--end of GPA computation-->
		<li class="treeview">
			<a href="#"><i class="fa fa-file-o"></i> <span>Grant Permission</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="examGrantPermission.php"><i class="fa fa-circle-o"></i> <span>Bachelor Degree</span></a></li>
				<li><a href="examGrantPermissionDiploma.php"><i class="fa fa-circle-o"></i> <span>Ordinary Diploma</span></a></li>
			</ul>
		</li>
		<li class="active treeview">
			<a href="#"><i class="fa fa-file-o"></i> <span>Examination Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="examResultsBachelor.php"><i class="fa fa-circle-o"></i> <span>Bachelor Degree</span></a></li>
				<li class="active"><a href="examResultsDiploma.php"><i class="fa fa-circle-o"></i> <span>Ordinary Diploma</span></a></li>
			</ul>
		</li>
		<li><a href="examOfficerProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
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
      <h1>Examination Reports<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="examinationOfficer.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Ordinary Diploma</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-primary box-height" style="margin-bottom:0;">
<?php 
	include('data/examResultsDiplomaData.php');
?>
			<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Year</label><br>
						<select name="year" class="form-control select2"> 
						  <option selected="selected" value="">Select a year</option>
						  <option value="first">First</option>
						  <option value="second">Second</option>
						  <option value="third">Third</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Semester</label><br>
						<select name="semester" class="form-control select2">
						  <option selected="selected" value="">Select a semester</option>
						  <option value="first">First</option>
						  <option value="second">Second</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Course</label><br>
						<select name="course" class="form-control select2">
						  <option selected="selected" value="">Select a Course</option>
<?php
		if(isset($course1)){
			foreach($course1 as $c){
					echo  '<option>'.$c.'</option>';
			}
		}
?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="print_od" class="btn btn-primary">Print</button>
					</div>
				</div>
			</div>
			</form>
			<!-- error sms for report-->
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<?php 
					if(isset($success)){
						if($success[1] == 'no_selected'){
							echo "<div class='callout callout-danger displaySms'>
								<h4>ERROR !</h4>
								<p>Please select a year, semester and course</p>
							</div>";
						}
						if($success[0] == 'no_data'){
							echo "<div class='callout callout-danger displaySms'>
								<h4>ERROR !</h4>
								<p>Sorry, no data for generating report. Please check if lecturers have entered student marks and you have calculated GPA.</p>
							</div>";
						}
					}
					?>
				</div>
				<div class="col-md-3"></div>
			</div>
			<!-- end -->
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
	include('footer/footer.php');
	include('footer/helpExamOfficer.php');
	include('footer/js.php');
?>