<?php 
	include('config/config.php');
	include('config/functions.php');
	include('header/studentStaffLoginHeader.php');
	
	
	if(isset($_POST['username']) && isset($_POST['email'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		
		if(!empty($username) && !empty($email)){
			$query = "SELECT `username`,`email_address` FROM `mkombo_university`.`staff` WHERE `username`='".mysql_real_escape_string($username)."' AND `email_address`='".mysql_real_escape_string($email)."'";
			$query_run = mysql_query($query);
			$num_row = mysql_num_rows($query_run);
			if($num_row == 0){
				$err_sms = "Invalid Username or E-mail";
			}else if($num_row == 1){
				$user_name = mysql_result($query_run,0,'username');
				$email_ad = mysql_result($query_run,0,'email_address');
				changePasswordStaff($user_name,$email_ad,'staff');
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
			<input type="text" name="username" class="form-control username" placeholder="Username" value="<?php if(isset($username)){ echo $username;}?>">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="help-block username-err-sms"></span>
		</div>
      </div>
      <div class="form-group has-feedback">
		<div class="form-group has-feedback st-email-err"><!--for error-->
			<input type="email" class="form-control st-email" name="email" placeholder="E-mail" value="<?php if(isset($email)){ echo $email;}?>">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<span class="help-block st-email-err-sms"></span>
		</div>
	  </div>
	  
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block recover-staff">Recover</button>
        </div>
      </div>
    </form>
    <p><a href="staffLogin.php" class="text-center">Login</a></p>
  </div>
</div>

<?php 
	include('footer/studentStaffLoginFooter.php');
?>
