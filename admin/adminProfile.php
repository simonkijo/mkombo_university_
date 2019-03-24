<?php
	include('../config/config.php');
	include('../config/functions.php');
	include('header/head.php');
	include('header/asideMenuAdmin.php');
	include('data/profileData.php');
	
	if(logged_in()){
		
	}else{
		header('Location: adminLogin.php');
	}
	
	if(isset($_GET['response'])){
		if($_GET['response'] == 'success'){
			$success = "The changes have been successful saved.";
		}else if($_GET['response'] == 'fail'){
			$fail = "Sorry something went wrong, try to save again.";
		}
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
		<li class="active"><a href="adminProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
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
      <h1>My Profile<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Profile Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<?php 
			if(isset($success)){
					echo "<div class='callout callout-success displaySms'>
							<h4>Successfully !</h4>
							<p>".$success."</p>
						</div>";
			}
			if(isset($fail)){
				echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>".$fail."</p>
					</div>";
			}
			?>
		</div>
		<div class="col-md-3"></div>
	</div>
		<div class="row">
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-body box-profile">
					  <img class="profile-user-img img-responsive img-circle" src="<?php echo photoProfileAdmin(strtolower(getFieldAdmin('fname','admin')).'_'.strtolower(getFieldAdmin('mname','admin')).'_'.strtolower(getFieldAdmin('sname','admin')).'.jpg');?>" alt="User profile picture">

					  <h3 class="profile-username text-center"><?php echo firstCapitalLetter(getFieldAdmin('fname','admin'))." ".firstCapitalLetter(getFieldAdmin('sname','admin'));?></h3>
					  <p class="text-muted text-center">System Administrator</p>

					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Phone Number</b> <a class="pull-right"><?php echo getFieldAdmin('phone_no','admin');?></a>
						</li>
						<li class="list-group-item">
						  <b>E-mail</b> <a class="pull-right"><?php echo getFieldAdmin('email_address','admin');?></a>
						</li>
						<li class="list-group-item">
						  <b>Nationality</b> <a class="pull-right"><?php echo getFieldAdmin('nationality','admin');?></a>
						</li>
						<li class="list-group-item">
						  <b>Username</b> <a class="pull-right"><?php echo getFieldAdmin('username','admin');?></a>
						</li>
					  </ul>
					</div>
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#p_info" data-toggle="tab">Personal Information</a></li>
						  <li><a href="#m_info" data-toggle="tab">More Information</a></li>
						</ul>
					<div class="tab-content box-height-tab">
						 <div class="active tab-pane" id="p_info">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
							  <div class="form-group">
								<label class="col-sm-2 control-label">E-mail</label>
								<div class="col-sm-10 aemail-err">
								  <input type="email" name="ainputEmail" class="form-control ainputEmail" value="<?php echo getFieldAdmin('email_address','admin');?>">
								  <span class="help-block aemail-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-2 control-label">Phone No</label>
								<div class="col-sm-10 aphone-err">
								  <input type="text" name="ainputPhone" class="form-control ainputPhone" value="<?php echo getFieldAdmin('phone_no','admin');?>">
								  <span class="help-block aphone-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10 ausername-err">
								  <input type="text" name="ainputUsername" class="form-control ainputUsername" value="<?php echo getFieldAdmin('username','admin');?>">
								  <span class="help-block ausername-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10 apass-err">
								  <input type="password" name="ainputPassword" class="form-control ainputPassword">
								  <span class="help-block apass-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-2 control-label">Retype Password</label>
								<div class="col-sm-10 arepass-err">
								  <input type="password" class="form-control ainputRepassword">
								  <span class="help-block arepass-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" name="sv_aca" class="btn btn-primary sv_adm">Save Changes</button>
								</div>
							  </div>
							</form>
						  </div>
						  <!-- /.tab-pane --> 
						  <div class="tab-pane" id="m_info">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
							  <div class="form-group">
								<label class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-10 pfname-err">
								  <input type="text" name="inputFname" class="form-control inputFname" value="<?php echo getFieldAdmin('fname','admin');?>">
								  <span class="help-block pfname-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-2 control-label">Middle Name</label>
								<div class="col-sm-10 pmname-err">
								  <input type="text" name="inputMname" class="form-control inputMname" value="<?php echo getFieldAdmin('mname','admin');?>">
								  <span class="help-block pmname-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-2 control-label">Surname</label>
								<div class="col-sm-10 psname-err">
								  <input type="text" name="inputSname" class="form-control inputSname" value="<?php echo getFieldAdmin('sname','admin');?>">
								  <span class="help-block psname-err-sms"></span>
								</div>
							  </div>
							  
							  <div class="form-group">
								<label class="col-sm-2 control-label">Nationality</label>
								<div class="col-sm-10 pnationality-err">
								  <input type="text" name="inputNationality" class="form-control inputNationality" value="<?php echo getFieldAdmin('nationality','admin');?>">
								  <span class="help-block pnationality-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group" style="margin-left:20%;">
								<label>
								  <input type="radio" name="gender" class="minimal" checked value="Male">
								  Male
								</label>
								<label>
								  <input type="radio" name="gender" class="minimal" value="Female">
								  Female
								</label>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" name="sv_ad_2" class="btn btn-primary sv_ad_2">Save Changes</button>
								</div>
							  </div>
							</form>
						  </div>
						  <!-- /.tab-pane --> 
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