<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MU | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/mkombo.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <b>Mkombo</b> University
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <p class="login-box-msg">Login Form</p>
     <?php 
    //echo date("H:i:s");
     $eras="";
 if(isset($_POST['log_in']))
	{
    // $loginAs=$_POST['select'];
	 $username1=$_POST['username1'];
	 $password1 =$_POST['password1'];
	 $today = (string)date("H:i:s");
	 
	 //echo $username1."and".$password1."<br>";
	 
	  $conn=mysql_connect("localhost","root","") or die("Error in database connection"); //Opening Database connection
	  $select_db=mysql_select_db('mkombo',$conn); //Selecting database 
	  $result=mysql_query("SELECT profile.username,profile.position,profile.password,student.reg_no,student.code,profile.status from profile,student") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
	  while($row=mysql_fetch_array($result))
	  { 
	   $username=$row['username']; 
	   $position=$row['position'];
	   $password=$row['password'];
	   $studentUsername=$row['reg_no'];
	   $studentcode=$row['code'];
	   $status=$row['status'];
	  // echo $status;
	   // echo $username.$password."<br>".$position;
	   if( $username1==$username &&  $password1==$password ){
		   //echo $username.$password."<br>".$position;
		     if( $position=="Admin" && $status=="Active")
			 {	
		 session_start();
		 $_SESSION["Amin_time"] = $today; 
		 //mysql_query("INSERT INTO logs(user,login) value('Admin',' $today ')");
		 header("location:Admin.php");
		  }
		  
		  ELSE  if( $position=="Busar" && $status=="Active")
			 {	
		 session_start();
		 $_SESSION["Busar_time"] = $today; 
		 $_SESSION["username_busar"] = $username1; 
		//mysql_query("INSERT INTO logs(user,login) value('Busar',' $today ')");
		 header("location:enter_financial_record.php");
		  }
		  
		    ELSE  if( $position=="Librarian" && $status=="Active")
			 {	
		 session_start();
		 $_SESSION["librarian_time"] = $today; 
		 //mysql_query("INSERT INTO logs(user,login) value('librarian',' $today ')");
		 header("location:book_borrow.php");
		  }
		  
		ELSE    if( $position=="Storekeeper" && $status=="Active")
		  {	
		 session_start();
		 $_SESSION["Storekeeper_time"] = $today; 
		 //mysql_query("INSERT INTO logs(user,login) value('Storekeeper',' $today ')");
		 header("location:Classrooms_enter_record.php");
		  }
	 	 } else if( $username1==$studentUsername &&  $password1==$studentcode)
	     {
		 session_start();
		 $_SESSION["student_time"] = $today; 
		 $_SESSION["username"] = $username1; 
		//mysql_query("INSERT INTO logs(user,login) value('$username1',' $today ')");
		 header("location:student.php");   
	   }
	}
	echo '<div class="row popup"><div class="col-md-12">'.
		 '<div class="callout callout-info"><h4>'.'Access denied!'.'</h4>incorrect username/password/Blocked Account</div>'.
		'</div></div>'; 
	}

	?>
    <form action="" method="post">
      <div class="form-group has-feedback control_error_username">
        <input type="text" class="form-control  username" name="username1" autocomplete="off" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		   <span class="help-block username_error"></span>
      </div>
      <div class="form-group has-feedback control_error_password">
        <input type="password" class="form-control password" name="password1" autocomplete="off" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		   <span class="help-block password_error"></span>
      </div>
 
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
     <label><a href="recover_password.php">password recover</a></label>
          </div>
        </div>
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat bursar_in" value="Log in" name="log_in">
        </div>
      </div>
    </form> </div> 
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/validate.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
