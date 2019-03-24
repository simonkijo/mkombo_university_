<?php
	include('config/config.php');
	include('config/functions.php');
	include('header/studentStaffLoginHeader.php');
	
	if(isset($_POST['reg_no']) && isset($_POST['email'])){
		$reg_no = $_POST['reg_no'];
		$email = $_POST['email'];
		
		if(!empty($reg_no) && !empty($email)){
			$query = "SELECT `reg_no`,`email_address` FROM `mkombo_university`.`student` WHERE `reg_no`='".mysql_real_escape_string($reg_no)."' AND `email_address`='".mysql_real_escape_string($email)."'";
			$query_run = mysql_query($query);
			$num_row = mysql_num_rows($query_run);
			if($num_row == 0){
				$err_sms = "Invalid Registration ID or E-mail";
			}else if($num_row == 1){
				$user_id = mysql_result($query_run,0,'reg_no');
				$email_ad = mysql_result($query_run,0,'email_address');
				//generate new pass and send to email.
				changePasswordStudent($user_id,$email_ad);
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
			<input type="text" name="reg_no" class="form-control reg-id" placeholder="Registration ID" value="<?php if(isset($reg_no)){ echo $reg_no;}?>">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="help-block id-err-sms"></span>
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
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block recover-st">Recover</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
	<p><a href="studentLogin.php" class="text-center">Login</a></p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php 
	include('footer/studentStaffLoginFooter.php');
?>