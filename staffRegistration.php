<?php 
	include('config/config.php');
	include('config/functions.php');
	include('data/staffRegData.php');
	//error_reporting("E_NOTICE");
	if(isset($_GET['response'])){
		if($_GET['response'] == 'fail'){
			$response = "Sorry ,something went wrong. Please try again.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MU | Staff Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/mkombo.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<?php 
		if(isset($response)){
			echo "<div class='callout callout-danger errSms'>
					<h4>Error !</h4>
					<p>".$response."</p>
				</div>";
		}
		if(isset($err)){
			echo "<div class='callout callout-danger errSms'>
					<h4>Error !</h4>
					<p>".$err."</p>
				</div>";
		}
		if(isset($error)){
			if($error[0] == 'empty' && $error[1] == 'empty' && $error[2] == 'empty'){
				echo "<div class='callout callout-danger errSms'>
						<h4>Error !</h4>
						<p>Sorry, You are not admitted. Please see System Administrator</p>
					</div>";
			}	
		}
		?>
	</div>
	<div class="col-md-3"></div>
</div>

	<section class="content-header" style="margin-left:20%;">
	  <h1>
		Staff Registration
	  </h1>
	</section>
	<!-- Main content -->
    <section class="content">
		<div class="box box-primary" style="margin:0 auto; width:60%;">
		<div class="row" style="margin:1%;">
			<div class="col-md-2"></div>
			<div class="col-md-7">
				<div class="box-header with-border small-box bg-aqua">
				  <h3 class="box-title">Personal Information</h3>
				</div>
				
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>First Name</label>
						<div class="input-group fname-err">
						  <div class="input-group-addon">
							<i class="fa fa-user"></i>
						  </div>
						  <input type="text" name="fname" class="form-control fname">
						</div>
						<span class="help-block fname-err-sms err"></span>
					</div>
					<div class="form-group">
						<label>Middle Name</label>
						<div class="input-group mname-err">
						  <div class="input-group-addon">
							<i class="fa fa-user"></i>
						  </div>
						  <input type="text" name="mname" class="form-control mname">
						</div>
						<span class="help-block mname-err-sms err"></span>
					</div>
					<div class="form-group">
						<label>Surname</label>
						<div class="input-group sname-err">
						  <div class="input-group-addon">
							<i class="fa fa-user"></i>
						  </div>
						  <input type="text" name="sname" class="form-control sname">
						</div>
						<span class="help-block sname-err-sms err"></span>
					</div>
				  <div class="form-group">
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
					<label>Phone number</label>
					<div class="input-group phone-err">
					  <div class="input-group-addon">
						<i class="fa fa-phone"></i>
					  </div>
					  <input type="text" name="phone_no" class="form-control phone" data-inputmask="'mask': ['+255-999-999999']" data-mask>
					</div>
					<span class="help-block phone-err-sms err"></span>
				  </div>
				  <div class="form-group has-feedback">
					<label>E-mail</label>
					<div class="form-group has-feedback email-err"><!--for error-->
						<input type="email" class="form-control email" name="email_address">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						<span class="help-block email-err-sms"></span>
					</div>
				  </div>
				  <div class="form-group has-feedback">
					<label>Nationality</label>
					<div class="form-group has-feedback nationality-err"><!--for error-->
						<input type="text" class="form-control nationality" name="nationality">
						<span class="glyphicon glyphicon-flag form-control-feedback"></span>
						<span class="help-block nationality-err-sms"></span>
					</div>
				  </div>
				  <div class="form-group">
					<label>Marital Status</label><br>
					<select name="marital_status" class="form-control select2">
					  <option selected="selected">Single</option>
					  <option>Married</option>
					</select>
				  </div>
				 
					<div class="form-group">
						<label>Username</label>
						<div class="input-group username-err">
						  <div class="input-group-addon">
							<i class="fa fa-user"></i>
						  </div>
						  <input type="text" name="username" class="form-control username">
						</div>
						<span class="help-block username-err-sms err"></span>
					</div>
				  <div class="form-group has-feedback">
					<label>Password</label>
					<div class="form-group has-feedback password-err"><!--for error-->
						<input type="password" class="form-control password" name="password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<span class="help-block password-err-sms"></span>
					</div>
				  </div>
				  <div class="form-group has-feedback">
					<label>Retype password</label>
					<div class="form-group has-feedback repassword-err"><!--for error-->
						<input type="password" class="form-control repassword" name="repassword">
						<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
						<span class="help-block repassword-err-sms"></span>
					</div>
				  </div>
				  <div class="row" style="margin-bottom:1%;">
					<div class="col-xs-4">
					  <button type="submit" class="btn btn-primary reg_btn">Register</button>
					</div>
				  </div>
			  </form>
            
          </div>
		  <div class="col-md-2"></div>
        </div>
      </div>

    </section>
    <!-- /.content -->
	
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!--front-end validation -->
<script src="dist/js/staffValidation.js"></script>

<script>
  $(function () {
	//message
	$('.displaySms').delay(7000).fadeOut();
	$('input[type="text"],input[type="email"],input[type="password"]').keyup(function(){
		$('.errSms').fadeOut();
	});
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    
    //Money Euro
    $("[data-mask]").inputmask();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

  });
</script>
</body>
</html>
