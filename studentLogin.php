<?php
	include('config/config.php');
	include('config/functions.php');
	include('header/studentStaffLoginHeader.php');
	error_reporting("E_NOTICE");
	if($_GET['response'] == 'success'){
		$response = "The Information is successful submitted. You can Login now.";
	}
	
	if(isset($_POST['reg_no']) && isset($_POST['pass'])){
		$reg_no = $_POST['reg_no'];
		$pass = $_POST['pass'];
		$hash_pass = hashPassword($pass);
		
		if(!empty($reg_no) && !empty($pass)){
			$query = "SELECT `reg_no` FROM `mkombo_university`.`student` WHERE `reg_no`='".mysql_real_escape_string($reg_no)."' AND `password`='".mysql_real_escape_string($hash_pass)."'";
			$query_run = mysql_query($query);
			$num_row = mysql_num_rows($query_run);
			if($num_row == 0){
				$err_sms = "Invalid Registration NO or Password";
			}else if($num_row == 1){
				$user_id = mysql_result($query_run,0,'reg_no');
				$_SESSION['user_id'] = $user_id;
				
				header('Location:student.php');
			}
		}
	}
?>
<body class="hold-transition login-page">
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<?php 
		if(!isset($err_sms)){
			if(isset($response)){
				echo "<div class='callout callout-success displaySms'>
						<h4>Successfully !</h4>
						<p>".$response."</p>
					</div>";
			}
		}
		if(isset($err_sms)){
			echo "<div class='callout callout-danger errSms'>
					<h4>ERROR !</h4>
					<p>".$err_sms."</p>
				</div>";
		}
		?>
	</div>
	<div class="col-md-3"></div>
</div>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Mkombo</b> University</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
		<div class="form-group has-feedback id-err"><!--for error-->
			<input type="text" name="reg_no" class="form-control reg-id" placeholder="Registration ID">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="help-block id-err-sms"></span>
		</div>
      </div>
      <div class="form-group has-feedback">
		<div class="form-group has-feedback password-err"><!--for error-->
			<input type="password" name="pass" class="form-control password" placeholder="Password">
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			<span class="help-block password-err-sms"></span>
		</div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block log-in-student">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
	<p><a href="staffLogin.php" class="text-center">Staff Login</a></p>
    <a href="stRecoverPassword.php">I forgot my password</a><br>
    <a href="studentRegistration.php" class="text-center">New Student</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php 
	include('footer/studentStaffLoginFooter.php');
?>