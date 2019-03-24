<?php 
	include('../config/config.php');
	include('../config/functions.php');
	include('header/studentStaffLoginHeader.php');
	error_reporting("E_NOTICE");
	
	if(isset($_POST['username']) && isset($_POST['pass'])){
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$hash_pass = hashPassword($pass);
		
		if(!empty($username) && !empty($pass)){
			$query = "SELECT `username` FROM `mkombo_university`.`admin` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($hash_pass)."'";
			$query_run = mysql_query($query);
			$num_row = mysql_num_rows($query_run);
			if($num_row == 0){
				$err_sms = "Invalid Username or Password";
			}else if($num_row == 1){
				$usern = mysql_result($query_run,0,'username');
				$_SESSION['username'] = $usern;
				
				header('Location:admin.php');
			}
		}
	}
?>
<body class="hold-transition login-page">
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<?php 
		if(isset($err_sms)){
			echo "<div class='callout callout-danger errSms'>
					<h4>ERROR !</h4>
					<p>".$err_sms."</p>
				</div>";
		}?>
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
		<div class="form-group has-feedback username-err"><!--for error-->
			<input type="text" name="username" class="form-control username" placeholder="Username">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="help-block username-err-sms"></span>
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
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block log-in-staff">Sign In</button>
        </div>
      </div>
    </form>

    <a href="adminRecoverPassword.php">I forgot my password</a>

  </div>
</div>

<?php 
	include('footer/studentStaffLoginFooter.php');
?>
