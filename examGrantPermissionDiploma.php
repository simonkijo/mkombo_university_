<?php
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuExamOfficer.php');
	include('data/courseOptionDiploma.php');
	include('data/grantAllDiploma.php');
	
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
		<li class="active treeview">
			<a href="#"><i class="fa fa-file-o"></i> <span>Grant Permission</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="examGrantPermission.php"><i class="fa fa-circle-o"></i> <span>Bachelor Degree</span></a></li>
				<li class="active"><a href="examGrantPermissionDiploma.php"><i class="fa fa-circle-o"></i> <span>Ordinary Diploma</span></a></li>
			</ul>
		</li>
		<li class="treeview">
			<a href="#"><i class="fa fa-file-o"></i> <span>Examination Reports</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="examResultsBachelor.php"><i class="fa fa-circle-o"></i> <span>Bachelor Degree</span></a></li>
				<li><a href="examResultsDiploma.php"><i class="fa fa-circle-o"></i> <span>Ordinary Diploma</span></a></li>
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
      <h1>Grant Permission<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="examinationOfficer.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Ordinary Diploma</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<?php 
			if(isset($success)){
				if($success[0] == 'allow_all'){
					echo "<div class='callout callout-success displaySms'>
						<h4>Successfully !</h4>
						<p>All lecturers granted access to input student marks.</p>
					</div>";
				}
				if($success[6] == 'no_selected'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Please select a programme</p>
					</div>";
				}
				if($success[1] == 'empty'){
					echo "<div class='callout callout-danger displaySms'>
							<h4>ERROR !</h4>
							<p>Please fill the field.</p>
						</div>";
				}
				if($success[2] == 'fail'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Sorry something went wrong, try again.</p>
					</div>";
				}
				if($success[3] == 'invalid'){
					echo "<div class='callout callout-danger displaySms'>
							<h4>ERROR !</h4>
							<p>Letters Only.</p>
						</div>";
				}
				if($success[4] == 'allow'){
					echo "<div class='callout callout-success displaySms'>
						<h4>Successfully !</h4>
						<p>Access granted to ".$fname_." ".$mname_." ".$sname_." to input student marks.</p>
					</div>";
				}
				if($success[5] == 'check'){
					echo "<div class='callout callout-danger displaySms'>
							<h4>ERROR !</h4>
							<p>Sorry, He/She does not exist in the system.</p>
						</div>";
				}
			}
			?>
		</div>
		<div class="col-md-3"></div>
	</div>
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3">
						<div class="form-group">
							<label></label><br>
							<button type="submit" name="allow_all" class="btn btn-primary">Allow All</button>
						</div>
					</div>
				</div>
			</form>
			<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Department</label><br>
						<select name="department" class="form-control select2">
						  
<?php
		if(isset($_POST['department']) && !empty($_POST['department'])){
			echo '<option selected="selected">'.$_POST['department'].'</option>';
		}else{
			echo '<option selected="selected" value="">Select a Department</option>';
		}
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
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>First Name</label>
						  <input type="text" class="form-control" name="fname">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Middle Name</label>
						  <input type="text" class="form-control" name="mname">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Surname</label>
						  <input type="text" class="form-control" name="sname">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="gp_allow" class="btn btn-primary">Allow</button>
					</div>
				</div>
			</div>
			</form>
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