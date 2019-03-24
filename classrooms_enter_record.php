<?php
//error_reporting(0);
include('include/classes_top.php');
?>
	<div class="row">
	  <div class="col-md-11">
	
   <div class="box box-primary " style="padding-bottom:0 width:40%;" >
   <div class="box-header with-border">          
		 <h3 class="box-title" style="margin-left:40%;">ADD CLASS ROOMS</h3>
            </div>
			
			<?php		
if(isset($_POST['enter']))
		{
		 $id=$_POST['id'];
		 //echo $id;
		 $name=$_POST['name']; 
		 $chairs=$_POST['chairs'];
		 $description=$_POST['description'];
		 $status=$_POST['status'];
if($_POST['id'] != NULL && $_POST['name'] !=NULL && $_POST['description'] !=NULL && $_POST['chairs'] !=NULL && $_POST['status'] !=NULL)
			{
			$conn=mysql_connect("localhost","root","") or die("not connected");
			$select_db=mysql_select_db('mkombo_university',$conn);
			mysql_query("INSERT INTO  classrooms values('$id','$name','$chairs','$description','$status')") or die(mysql_error());	            
			mysql_close($conn);
			}
}
?>

   <form class="form-horizontal" role="form" method="post" >
                
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Class id</label>
                  <div class="handle_error has-feedback ">
                  <input type="text" class="form-control class_id" name="id" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-info-sign form-control-feedback " ></span>
				   <span class="help-block class_error"></span>
                   </div>
				      
                </div>
             
			      
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Class Name</label>
                  <div class="handle_error_name has-feedback ">
                  <input type="text" class="form-control class_name" id="class_name" name="name" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-home b form-control-feedback " ></span>
                    <span class="help-block name_error"></span>
					</div>				    
                </div>
             			      
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">No:chairs </label>
                  <div class="handle_error_chair a has-feedback ctrl_error">
                  <input type="text" class="form-control chair" name="chairs" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-align-left b form-control-feedback " ></span>
                   <span class="help-block chair_error"></span>
				   </div>				   
                </div>
             
			     <div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Description</label>
                  <div class="handle_error_description a has-feedback ctrl_error">
                  <input type="textarea" class="form-control description" name="description" id="book_field" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-pencil b form-control-feedback " ></span>
                   <span class="help-block description_error"></span>
				   </div>
				    </div>
            
			<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">status</label>
                  <div class="handle_error_status a has-feedback ctrl_error">
                  <input type="text" class="form-control status" name="status" id="book_field" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-align-justify b form-control-feedback " ></span>
                    <span class="help-block status_error"></span>
					</div>				  
                </div>
             
			 
				      <div  class="form-group " style="padding-left:20%;padding-right:20%">        
                      <div >
                   <input type="submit"  class="btn btn-primary add_classrooms" Width="30%" style="margin-bottom:3%;" name="enter" value="ENTER">
                    </div>
                      </div>
					  
					  
                    </form>
				  </div>
				   </div> 
				   </div>  
			<?php
include('include/classes_bottom.php');
?>