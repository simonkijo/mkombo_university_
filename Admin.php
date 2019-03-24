 
<?php
include("include/adminprofile_top.php");
error_reporting(0);
//echo  $_SESSION["Amin_time"];
?>
<?php 
$generate="*********";
$error="";
$error1="";
if(isset($_POST['generate']))
{ 
$generate=rand(1118761119999,9999399999599);
}
if(isset($_POST['add']))
{
	
$username=$_POST['username'];
$password=$_POST['password'];
$newuser_position=$_POST['newuser_position'];
echo $newuser_position;
if($username!=NULL && $password!=NULL)
{
	
$conn=mysql_connect("localhost","root","") or die("not connected");
$select_db=mysql_select_db('mkombo',$conn);
$count=mysql_query("SELECT * from profile WHERE username='$username'");
 $num_rows = mysql_num_rows($count);
 if( $num_rows!=NULL)
 {$error= '<font color="red">'.'User alread exist'.'</font>';}
 elseif( $num_rows==NULL)
 { 
 mysql_query("INSERT INTO  profile(username,password,position) values('$username','$password','$newuser_position')") or die(mysql_error());
 }
 //else mysql_query("INSERT INTO  profile(username,password) values('$username','$password')") or die(mysql_error());	            
mysql_close($conn);
}
}
?>
<?php 
$status_block="";
$name_block="";
if(isset($_POST['user_block']))
{
$status_block=$_POST['status_block'];
$name_block=$_POST['name_block'];
if($name_block!=NULL && $status_block!=NULL)
{	
$conn=mysql_connect("localhost","root","") or die("not connected");
$select_db=mysql_select_db('mkombo',$conn);

mysql_query("UPDATE profile SET status='$status_block' WHERE username='$name_block' ") or die(mysql_error());
}
}
?>

<?php 
$user_status="";
$user_activate="";
if(isset($_POST['reload']))
{
$user_activate=$_POST['user_activate'];
$status_activate=$_POST['status_activate'];
if($user_activate!=NULL)
{	
//echo $user_activate;
$conn=mysql_connect("localhost","root","") or die("not connected");
$select_db=mysql_select_db('mkombo',$conn);
$status=mysql_query("SELECT status FROM profile WHERE username='$user_activate' ") or die(mysql_error());
while($row=mysql_fetch_array($status))
		{ 
		$user_status=$row['status'];
		//echo $user_status;
		}		
}
else { $error1='user not found';}
}
?>
<?php 
if(isset($_POST['activate']))
{
$user_activate=$_POST['user_activate'];
$status_activate=$_POST['status_activate'];
if($user_activate!=NULL  &&  $status_activate!=NULL)
{	

$conn=mysql_connect("localhost","root","") or die("not connected");
$select_db=mysql_select_db('mkombo',$conn);
$status=mysql_query("UPDATE profile SET status='$status_activate' WHERE username='$user_activate' ") or die(mysql_error());
}
if($user_activate==NULL && $status_activate==NULL)
{
	 $error1='fill all the field';
}
}
?>


<?php 
 $remove="";
if(isset($_POST['user_romove']))
{
$_remove=$_POST['remove'];
$_position=$_POST['position'];
if($_remove!=NULL  &&  $_position!=NULL)
{	
$conn=mysql_connect("localhost","root","") or die("not connected");
$select_db=mysql_select_db('mkombo',$conn);
//echo $_remove;
$select=mysql_query("SELECT * FROM profile WHERE username='$_remove' ") or die(mysql_error());
$_count_row=mysql_num_rows($select);
if($_count_row!=NULL)
{
$status=mysql_query("DELETE FROM profile WHERE username='$_remove'  AND position='$_position' ") or die(mysql_error());
$remove='<div class="row popup"><div class="col-md-12"> </div><div class="col-md-12">'.
			       '<div class="callout callout-info"><h4>'.'successfully '.'</h4>user have been removed</h4></div>'.
			       '</div><div class="col-md-3"> </div></div>';
}
if($_count_row==NULL)
{
	$remove='<div class="row popup"><div class="col-md-12"> </div><div class="col-md-12">'.
			       '<div class="callout callout-info"><h4>'.'Error!'.'</h4>user does not exist</h4></div>'.
			       '</div><div class="col-md-3"> </div></div>';
}
}
}
?>

<section class="content " style="background-color:#;">

<div class="row" > 
<div class="col-md-6">
<div class="box box-primary">
<div class="row">
<div class="col-md-6">
<!--  ///////////////////////////   ADD USER  ///////////////////////-->

    <div class="box-header with-border">
        <h3 class="box-title">ADD USER</h3>
            </div>
                <form role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
						<label for="">Username</label>
                            <div class="handle_error_usename has-feedback">
                                 <input type="text" class="form-control username" name="username" id="" placeholder="username">
				                 <span class="glyphicon glyphicon-user form-control-feedback " ></span>
                                 <span class="help-block username_error has-feedback"></span>
				             </div>
                         </div>
 <div class="form-group">
    <label for="exampleInputPassword1">User Password</label>
        <div class="handle_error_password  has-feedback ">
             <input type="text" class="form-control password" name="password" id="" placeholder="password">
			     <span class="glyphicon glyphicon-lock form-control-feedback " ></span>
                 <span class="help-block password_error"></span>
		  </div>
 </div>
 	
 </div>
      <div class="box-footer">
          <input type="submit" class="btn btn-primary adding" name="add" value="ADDING" style="margin-left:10%;"><?php  echo $error;?>
              </div>
                
			        </div>
                        <div class="col-md-6">
<!--  ///////////////////////////   GENERATE THE BUSAR PASSWORD  ///////////////////////-->
                        <div class="box-header with-border">
            </div>
       
     <div class="box-body">
  <div class="form-group">
    <label for="">Position</label>
        <div class="ctrl  has-feedback ">
             <input type="text" class="form-control nup" name="newuser_position" id="" placeholder="position">
			     <span class="glyphicon glyphicon-user form-control-feedback " ></span>
                 <span class="help-block nup_error"></span>
		  </div>
		   </div>
  <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" id="password"   value="<?php echo $generate ?>">
                </div>
                      </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="GENERATE" name="generate">
                               </div>
                         </form>
			         </div>
               </div>   
        </div> 
</div>   
<div class="col-md-6">    
<div class="box box-primary">
<div class="row">
<div class="col-md-6">
<!--  ///////////////////////////  BLOCK  ///////////////////////-->
    <div class="box-header with-border">
         <h3 class="box-title">BLOCK</h3>
          </div>
                   <form role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
						<label for="">Username</label>
                            <div class="handle_error_block has-feedback block">
                                 <input type="text" class="form-control block_namee" name="name_block" id="" placeholder="username">
				                 <span class="glyphicon glyphicon-user form-control-feedback " ></span>
                                 <span class="help-block block_error"></span>
				             </div>
                         </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
        <div class="handle_error_status  has-feedback ">
             <input type="text" class="form-control statusi" name="status_block" id="" placeholder="block">
			     <span class="glyphicon glyphicon-pencil form-control-feedback " ></span>
                 <span class="help-block statusi_error"></span>
		  </div>
 </div>
 </div>
      <div class="box-footer">
          <input type="submit" class="btn btn-primary  block" value='BLOCK' name="user_block">
              </div>
                 </form>
			 </div>
			 
			 
			 
<div class="col-md-6">
<!--  ///////////////////////////  ACTIVATE  ///////////////////////-->
            <div class="box-header with-border">
              <h3 class="box-title">ACTIVATE ACCOUNT</h3>
            </div>
                   <form role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
						<label for="">Username <?php echo '  '.$error1;?></label>
                            <div class="handle_error_reload  has-feedback activate">
                                 <input type="text" class="form-control reload relod" name="user_activate" id="" value="<?php echo $user_activate; ?>">
				                 <span class="glyphicon glyphicon-user form-control-feedback " ></span>
                                 <span class="help-block reload_error"></span>
				             </div>
                         </div>
 <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
        <div class="handle_error_stats has-feedback ">
             <input type="text" class="form-control stats" name="status_activate"  id="" value="<?php echo $user_status; ?>">
			     <span class="glyphicon glyphicon-pencil form-control-feedback " ></span>
                 <span class="help-block stats_error"></span>
		  </div>
 </div>
 </div>
      <div class="box-footer"> 
           <input  type="submit" class="btn btn-primary reload" name="reload" STYLE="margin-right:5%;" value='RELOAD'>
		   <input type="submit" class="btn btn-primary" name="activate" value='ACTIVATE'>
		   </div>
                 </form>
              
			 </div>
         </div>   
          </div>  
 </div>
 
  </div>
 <div class="row"> 
<div class="col-md-6">
<div class="box box-primary">
<div class="row">
<div class="col-md-6">
<!--  ///////////////////////////   REMOVE ///////////////////////-->
    <div class="box-header with-border">
         <h3 class="box-title">REMOVE USER</h3>
          </div>
            <form role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
						<label for="">Username</label>
                            <div class="handle_error_remove has-feedback block">
                                 <input type="text" class="form-control user_remove" name="remove" id="" placeholder="username">
				                 <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                 <span class="help-block remove_error"></span>
				             </div>
                         </div>
 <div class="form-group">
    <label for="">Position</label>
        <div class="handle_error_position  has-feedback ">
             <input type="text" class="form-control position" name="position" id="" placeholder="ie busar">                                                                                                                                                                   
			     <span class="glyphicon glyphicon-home form-control-feedback " ></span>
                 <span class="help-block position_error"></span>
		  </div>
 </div>
 </div>
      <div class="box-footer">
          <input type="submit" class="btn btn-primary get_out" value="REMOVE" name='user_romove'>
              </div>
                 </form>
			        </div>	
                       <div class="col-md-6">
                         <?php echo $remove; ?>
			         </div>
               </div>   
        </div> 
</div>   
<div class="col-md-6"> 

		 </div>
          </div> 
 <div class="row"style="margin-left:20%;margin-top:0%;color:#f00;">
<label><a href="http://localhost/phpmyadmin/#PMAURL-0:index.php?db=&table=&server=1&target=&token=2d0ae01f0344cfda1e8881ac6ba3a203"> <span style="color:;"><u>go to phpmyadmin </u></span></label>
</div>
</section>
   <?php
include("include/student_bottom.php")
?>
<script>

// validate the admin part
$('.adding').click(function(){
	var username = $('.username').val();
	var password1  = $('.password').val();
	var nupn  = $('.nup').val();	
if(username == ""){
$('.handle_error_usename').addClass('has-error');
$('.username_error').text("Enter username");
 return false;
}
else if(allLetterAndSpace(username)==false)
{
$('.handle_error_usename').addClass('has-error');
$('.username_error').text("letters");
return false;
}
if(password1 == ""){
$('.handle_error_password').addClass('has-error');
$('.password_error').text("Enter password");
 return false;
}
else if(lettersNumberNoSpace(password1)==false)
{
$('.handle_error_password').addClass('has-error');
$('.password_error').text("no space");
return false;
}

if(nupn == ""){
$('.ctrl').addClass('has-error');
$('.nup_error').text("Enter position");
alert('julius');
 return false;
}
else if(allLetter(nupn)==false)
{
$('.ctrl').addClass('has-error');
$('.nup_error').text("letters");
return false;
}

});
$('.username,.password,.nup').keyup(function(){
		$('.handle_error_usename,.handle_error_password,.ctrl').removeClass('has-error');
		$('.username_error,.password_error,.nup_error').text('');
	});
	
// validate the admin block part
$('.block').click(function(){
	var block_name = $('.block_namee').val();
	var statusi  = $('.statusi').val();
	//	alert('julius');
if(block_name == ""){
$('.handle_error_block').addClass('has-error');
$('.block_error').text("Enter username ");
 return false;
}
else if(allLetterAndSpace(block_name)==false)
{
$('.handle_error_block').addClass('has-error');
$('.block_error').text("letters");
return false;
}
if(statusi == ""){
$('.handle_error_status').addClass('has-error');
$('.statusi_error').text("Enter status");
 return false;
}
else if(allLetter(statusi)==false)
{
$('.handle_error_status').addClass('has-error');
$('.statusi_error').text("letters only");
return false;
}
});
$('.block_namee,.statusi').keyup(function(){
		$('.handle_error_block,.handle_error_status').removeClass('has-error');
		$('.block_error,.statusi_error').text('');
	});
	
	
	
	
	// validate the admin reload part
$('.reload').click(function(){
	var reload = $('.reload').val();
	//var statusi  = $('.statusi').val();
	//	alert('julius');
if(reload == ""){
$('.handle_error_reload').addClass('has-error');
$('.reload_error').text("Enter username ");
 return false;
}
else if(allLetterAndSpace(reload)==false)
{
$('.handle_error_reload').addClass('has-error');
$('.reload_error').text("letters");
return false;
}
});
$('.reload').keyup(function(){
		$('.handle_error_reload').removeClass('has-error');
		$('.reload_error').text('');
	});	
	
	
		// validate the admin reactivate  part
$('.active').click(function(){
	var reload = $('.reload').val();
	var stats  = $('.stats').val();
	//	alert('julius');
if(reload == ""){
$('.handle_error_reload').addClass('has-error');
$('.reload_error').text("Enter username ");
 return false;
}
else if(allLetter(reload)==false)
{
$('.handle_error_reload').addClass('has-error');
$('.reload_error').text("letters");
return false;
}

if(stats == ""){
$('.handle_error_stats').addClass('has-error');
$('.stats_error').text("status ");
 return false;
}
else if(allLetter(stats)==false)
{
$('.handle_error_stats').addClass('has-error');
$('.stats_error').text("letters");
return false;
}
});
$('.reload,.stats').keyup(function(){
		$('.handle_error_reload,.handle_error_stats').removeClass('has-error');
		$('.reload_error,.stats_error').text('');
	});	
	
	
	
	
	
	////////////////---------------------user remove---------------------////////////////////
 // validate the admin remove  part.
 
$('.get_out').click(function(){
	var user_remove = $('.user_remove').val();
	var position  = $('.position').val();
	//	alert('julius');
if(user_remove == ""){
$('.handle_error_remove').addClass('has-error');
$('.remove_error').text("Enter username ");
 return false;
}
else if(allLetterAndSpace(user_remove)==false)
{
$('.handle_error_remove').addClass('has-error');
$('.remove_error').text("letters");
return false;
}

if(position == ""){
$('.handle_error_position').addClass('has-error');
$('.position_error').text("position ");
 return false;
}
else if(allLetter(position)==false)
{
$('.handle_error_position').addClass('has-error');
$('.position_error').text("letters");
return false;
}
});
$('.user_remove,.position').keyup(function(){
		$('.handle_error_remove,.handle_error_position').removeClass('has-error');
		$('.remove_error,.position_error').text('');
	});	
// popup  dialog
$('.popup').delay(4000).fadeOut();

//for checking characters only in names.
function allLetter(parameter){    
	var letters = /^[A-Za-z]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}

	//for checking account number contains allnumeric.
	function bookValidation(parameter){    
		var numbers = /^[0-9]+$/.test(parameter);
		if(numbers == true){  
			return true;  
		}else{    
			return false;  
		}  
	}
	
		function allNumber(parameter){    
		var numbers = /^[0-9]+$/.test(parameter);
		if(numbers == true){  
			return true;  
		}else{    
			return false;  
		}
		}
		//for checking characters and space in names.
function allLetterAndSpace(parameter){    
	var letters = /^[A-Za-z ]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}

// for letter number no space
function lettersNumberNoSpace(parameter){    
	var letters = /^[A-Za-z0-9]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}


jQuery(function($){
   $(".date").mask("9999-99-99",{placeholder:"yyyy/mm/dd"});
   $("#phoneValidate").mask("+255-999-999999");
   $("#tin").mask("99-9999999");
   $("#ssn").mask("999-99-9999");
});


jQuery(function($){
   $(".date").mask("9999-99-99",{placeholder:"yyyy/mm/dd"});
   $("#phone").mask("(999) 999-9999");
   $("#tin").mask("99-9999999");
   $("#ssn").mask("999-99-9999");
});

// popup  dialog
$('.popup').delay(4000).fadeOut();
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>