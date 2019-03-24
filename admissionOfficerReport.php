<?php
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuAdmissionOfficer.php');
	include('data/courseOption.php');
	
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
		<li class="active treeview">
          <a href="#"><i class="fa fa-pie-chart"></i> <span>Admission Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li class="active"><a href="admissionOfficerReport.php"><i class="fa fa-file-o"></i> <span>Bachelor Degree</span></a></li>
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
      <h1>Admission Reports<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="admissionOfficer.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Admission Reports</li>
        <li class="active">Bachelor Degree</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-primary box-height" style="margin-bottom:0;">
<?php 
	include('data/admissionOfficerReportData.php');
?>
			<form method="post" enctype="multipart/form-data">
				<div class="row" style="margin:2% auto;">
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
					<div class="col-md-3">
						<div class="form-group">
							<label></label><br>
							<button type="submit" name="adm_print" class="btn btn-primary">Print</button>
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
								<p>Please select a course</p>
							</div>";
						}
						if($success[0] == 'no_data'){
							echo "<div class='callout callout-danger displaySms'>
								<h4>ERROR !</h4>
								<p>Sorry, It seems no students registered in this course</p>
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
  </div>

<?php 
	include('footer/footer.php');
	include('footer/helpAdmissionOfficer.php');
	include('footer/js.php');
?>