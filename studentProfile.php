<?php 
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuStudent.php');
	include('data/profileData.php');
	
	if(logged_in()){
		
	}else{
		header('Location: studentLogin.php');
	}
	
	if(isset($_GET['response'])){
		if($_GET['response'] == 'success'){
			$success = "The changes have been successful saved.";
		}else if($_GET['response'] == 'fail'){
			$fail = "Sorry something went wrong, try to save again.";
		}
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
		<li class="active"><a href="studentProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
		<li><a href="logout.php"><i class="fa fa-user"></i> <span>Sign Out</span></a></li>
      </ul>
    </section>
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>My Profile<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="student.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
					  <img class="profile-user-img img-responsive img-circle" src="<?php echo photoProfile(getInfo('fname','student').'_'.getInfo('mname','student').'_'.getInfo('sname','student').'.jpg');?>" alt="User profile picture">
						
					  <h3 class="profile-username text-center"><?php echo firstCapitalLetter(getInfo('fname','student'))." ".firstCapitalLetter(getInfo('sname','student'));?></h3>

					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Marital Status</b> <a class="pull-right"><?php echo getInfo('marital_status','student');?></a>
						</li>
						<li class="list-group-item">
						  <b>Phone Number</b> <a class="pull-right"><?php echo getInfo('phone_no','student');?></a>
						</li>
						<li class="list-group-item">
						  <b>E-mail</b> <a class="pull-right"><?php echo getInfo('email_address','student');?></a>
						</li>
						<li class="list-group-item">
						  <b>Nationality</b> <a class="pull-right"><?php echo getInfo('nationality','student');?></a>
						</li>
						<li class="list-group-item">
						  <b>Birth Date</b> <a class="pull-right"><?php echo getInfo('birth_date','student');?></a>
						</li>
					  </ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#p_info" data-toggle="tab">Personal Information</a></li>
						  <li><a href="#bank_info" data-toggle="tab">Bank Information</a></li>
						  <li><a href="#sponsor_info" data-toggle="tab">Sponsor Information</a></li>
						</ul>
					<div class="tab-content box-height-tab">
						 <div class="active tab-pane" id="p_info">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
							  <div class="form-group">
								<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
								<div class="col-sm-10 email-err">
								  <input type="email" name="inputEmail" class="form-control inputEmail" value="<?php echo getInfo('email_address','student');?>">
								  <span class="help-block email-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputPhone" class="col-sm-2 control-label">Phone No</label>
								<div class="col-sm-10 phone-err">
								  <input type="text" name="inputPhone" class="form-control inputPhone" value="<?php echo getInfo('phone_no','student');?>">
								  <span class="help-block phone-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputMarital" class="col-sm-2 control-label">Marital Status</label>
								<div class="col-sm-10 marital-err">
								  <input type="text" name="inputMarital" class="form-control inputMarital" value="<?php echo getInfo('marital_status','student');?>">
								  <span class="help-block marital-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputHome" class="col-sm-2 control-label">Home Place</label>
								<div class="col-sm-10 home-err">
								  <input type="text" name="inputHome" class="form-control inputHome" value="<?php echo getInfo('home_place','student');?>">
								  <span class="help-block home-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10 pass-err">
								  <input type="password" name="inputPassword" class="form-control inputPassword">
								  <span class="help-block pass-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputRepassword" class="col-sm-2 control-label">Retype Password</label>
								<div class="col-sm-10 repass-err">
								  <input type="password" class="form-control inputRepassword">
								  <span class="help-block repass-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" name="sv_pinfo" class="btn btn-primary sv_pinfo">Save Changes</button>
								</div>
							  </div>
							</form>
						  </div>
						  <!-- /.tab-pane -->
						  <div class="tab-pane" id="bank_info">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
							  <div class="form-group">
								<label for="inputBankName" class="col-sm-2 control-label">Bank Name</label>
								<div class="col-sm-10 bname-err">
								  <input type="text" name="inputBankName" class="form-control inputBankName" value="<?php echo getInfo('bank_name','bank_account');?>">
								  <span class="help-block bname-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputBankBranch" class="col-sm-2 control-label">Bank Branch</label>
								<div class="col-sm-10 bbranch-err">
								  <input type="text" name="inputBankBranch" class="form-control inputBankBranch" value="<?php echo getInfo('bank_branch','bank_account');?>">
								  <span class="help-block bbranch-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputAccountNo" class="col-sm-2 control-label">Account No</label>
								<div class="col-sm-10 accountno-err">
								  <input type="text" name="inputAccountNo" class="form-control inputAccountNo" value="<?php echo getInfo('account_no','bank_account');?>">
								  <span class="help-block accountno-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" name="sv_binfo" class="btn btn-primary sv_binfo">Save Changes</button>
								</div>
							  </div>
							</form>
						  </div>
						  <!-- /.tab-pane -->
						  <div class="tab-pane" id="sponsor_info">
							<form class="form-horizontal" method="post" enctype="multipart/form-data">
							  <div class="form-group">
								<label for="inputSponsorName" class="col-sm-2 control-label">Sponsor Name</label>
								<div class="col-sm-10 sname-err">
								  <input type="text" name="inputSponsorName" class="form-control inputSponsorName" value="<?php echo getInfo('sponsor_name','sponsor');?>">
								  <span class="help-block sname-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputSponsorPhone" class="col-sm-2 control-label">Phone No</label>
								<div class="col-sm-10 sphone-err">
								  <input type="text" name="inputSponsorPhone" class="form-control inputSponsorPhone" value="<?php echo getInfo('sponsor_phone','sponsor');?>">
								  <span class="help-block sphone-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputSponsorEmail" class="col-sm-2 control-label">E-mail</label>
								<div class="col-sm-10 semail-err">
								  <input type="email" name="inputSponsorEmail" class="form-control inputSponsorEmail" value="<?php echo getInfo('sponsor_email','sponsor');?>">
								  <span class="help-block semail-err-sms"></span>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <button type="submit" name="sv_sponsor" class="btn btn-primary sv_sponsor">Save Changes</button>
								</div>
							  </div>
							</form>
						  </div>
						  <!-- /.tab-pane -->
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-body box-profile">
					  <h3 class="profile-username text-center">Parent Information</h3>

					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Name</b> <a class="pull-right"><?php echo getInfo('fullname','parent');?></a>
						</li>
						<li class="list-group-item">
						  <b>Phone Number</b> <a class="pull-right"><?php echo getInfo('phone_no_p','parent');?></a>
						</li>
						<li class="list-group-item">
						  <b>E-mail</b> <a class="pull-right"><?php echo getInfo('email_p','parent');?></a>
						</li>
						<li class="list-group-item">
						  <b>Home Place</b> <a class="pull-right"><?php echo getInfo('physical_location','parent');?></a>
						</li>
					  </ul>
					  
					  <h3 class="profile-username text-center">Bank Information</h3>

					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Bank Name</b> <a class="pull-right"><?php echo getInfo('bank_name','bank_account');?></a>
						</li>
						<li class="list-group-item">
						  <b>Bank Branch</b> <a class="pull-right"><?php echo getInfo('bank_branch','bank_account');?></a>
						</li>
						<li class="list-group-item">
						  <b>Account No</b> <a class="pull-right"><?php echo getInfo('account_no','bank_account');?></a>
						</li>
					  </ul>
					  
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="box box-primary">
					<div class="box-body box-profile">
					  <h3 class="profile-username text-center">Health Insurance Information</h3>

					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Membership No</b> <a class="pull-right"><?php echo getInfo('membership_no','health_insurance');?></a>
						</li>
						<li class="list-group-item">
						  <b>Vote</b> <a class="pull-right"><?php echo getInfo('vote','health_insurance');?></a>
						</li>
						<li class="list-group-item">
						  <b>P.O.Box</b> <p><a class="pull-right"><?php echo getInfo('address','health_insurance');?></a></p>
						</li>
						<li class="list-group-item">
						  <b>Issue Date</b> <a class="pull-right"><?php echo getInfo('issue_date','health_insurance');?></a>
						</li>
					  </ul>
					  
					  <h3 class="profile-username text-center">Sponsor Information</h3>

					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Name</b> <a class="pull-right"><?php echo getInfo('sponsor_name','sponsor');?></a>
						</li>
						<li class="list-group-item">
						  <b>Phone Number</b> <a class="pull-right"><?php echo getInfo('sponsor_phone','sponsor');?></a>
						</li>
						<li class="list-group-item">
						  <b>E-mail</b> <a class="pull-right"><?php echo getInfo('sponsor_email','sponsor');?></a>
						</li>
					  </ul>
					  
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-body box-profile">
					  <h3 class="profile-username text-center">Background Education Information</h3>
						<h5 class="profile-username text-center">Secondary Education</h5>
					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Index No</b> <a class="pull-right"><?php echo getInfo('index_no_olevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>School Name</b> <a class="pull-right"><?php echo getInfo('school_name_olevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>School Location</b> <a class="pull-right"><?php echo getInfo('sc_location_olevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>Certificate Award</b> <a class="pull-right"><?php echo getInfo('cert_olevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>Completion Year</b> <a class="pull-right"><?php echo getInfo('completion_yr_olevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>Subjects Taken</b> <p><a class="pull-right"><?php echo printSubjects(getInfo('subject_taken','academic_info'));?></a></p>
						</li>
					  </ul>
					  
					  <h5 class="profile-username text-center">Advance Secondary Education</h5>

					  <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
						  <b>Index No</b> <a class="pull-right"><?php echo getInfo('index_no_alevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>School Name</b> <a class="pull-right"><?php echo getInfo('school_name_alevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>School Location</b> <a class="pull-right"><?php echo getInfo('sc_location_alevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>Certificate Award</b> <a class="pull-right"><?php echo getInfo('cert_alevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>Completion Year</b> <a class="pull-right"><?php echo getInfo('completion_yr_alevel','academic_info');?></a>
						</li>
						<li class="list-group-item">
						  <b>Subjects Combination</b> <a class="pull-right"><?php echo getInfo('subject_combination','academic_info');?></a>
						</li>
					  </ul>
					  
					</div>
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