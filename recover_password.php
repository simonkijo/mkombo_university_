<?php
error_reporting(0);
include('include/password_top.php');
?>
	<div class="row">
	 <div class="col-md-3"> </div>
	
	  <div class="col-md-6" style="padding-top:1%;">
	    <div class="box-header with-border">
        <h3 class="box-title" style="margin-left:30%;">CHANGE YOUR PASSWORD</h3>
            </div>
	   <div class="box box-primary " style="padding-bottom:0 width:40%;" >
  
			<?php	
if(isset($_POST['exit']))
		{
				 header("location:login_all.php");
		}			
if(isset($_POST['enter']))
		{
		$check=0;
		 $username=$_POST['username'];
		 $email=$_POST['email']; 
		  $password=$_POST['password'];
		// $password=md5($_POST['password']);
if($_POST['username'] != NULL && $_POST['email'] !=NULL && $_POST['password'] !=NULL && $_POST['repassword'] !=NULL)
			{
		 $conn=mysql_connect("localhost","root","") or die("not connected");
		 $select_db=mysql_select_db('mkombo',$conn);
		 $count1=mysql_query("SELECT * FROM student WHERE reg_no='$username' AND email='$email'");
		 $num_rows1 = mysql_num_rows($count1);
		 $count2=mysql_query("SELECT * FROM profile WHERE username='$username' AND email='$email' ");
		 $num_rows2 = mysql_num_rows($count2);
             if($num_rows1!=Null)
               {
			mysql_query("UPDATE student set code='$password' WHERE reg_no='$username'  AND email='$email'") or die(mysql_error());	            
            header("location:login_all.php");			  
			  } 
			 if($num_rows2!=Null)
               {
			mysql_query("UPDATE profile set password='$password' WHERE username='$username' AND email='$email' AND status='Active'") or die(mysql_error());	            
            header("location:login_all.php");			 
			   }
              else  echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6 ">'.
			       '<div class="callout callout-info  callout-danger"><h4>'.'Error!'.'</h4>unable to reset password</div>'.
			       '</div><div class="col-md-3"> </div></div>';
       		 
			  mysql_close($conn);
			}
		}
?>
   <form class="form-horizontal" role="form" method="post" >
                <div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Username</label>
                  <div class="handle_error_username has-feedback ">
                  <input type="text" class="form-control username" id="class_name" name="username" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-home b form-control-feedback " ></span>
                    <span class="help-block username_error"></span>
					</div>				    
                </div> 
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Email</label>
                  <div class="handle_error_email has-feedback ">
                  <input type="email" class="form-control email" name="email" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-info-sign form-control-feedback " ></span>
				   <span class="help-block email_error"></span>
                   </div>
				    </div>
				        
			     <div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Password</label>
                  <div class="handle_error_password a has-feedback ctrl_error">
                  <input type="textarea" class="form-control password" name="password" id="book_field" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-pencil b form-control-feedback " ></span>
                   <span class="help-block  password_error"></span>
				   </div>
				    </div>
            			<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Repassword</label>
                  <div class="handle_error_repassword a has-feedback ctrl_error">
                  <input type="text" class="form-control repassword" name="repassword" id="book_field" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-align-justify b form-control-feedback " ></span>
                    <span class="help-block repassword_error"></span>
					</div>				  
                </div>
				      <div  class="form-group " style="padding-left:20%;padding-right:20%">        
                      <div >
                   <input type="submit"  class="btn btn-primary recover" Width="30%" style="margin-bottom:3%;" name="enter" value="recover">
                   <span align="right">  <input type="submit"  class="btn btn-primary " style="margin-bottom:3%; width:20%;" name="exit" value="Exit" align="right">
                  	</span
					</div>
                      </div>
					 </form>
				  </div>
				   </div> 
				   	 <div class="col-md-3"> </div>
				   </div>  
			<?php
include('include/classes_bottom.php');
?>