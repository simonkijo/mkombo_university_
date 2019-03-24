<?php
include('include/classes_top.php');
?>			
<?php		
if(isset($_POST['update_classrooms']))
        {
         $class_id=$_POST['class_id'];
		 $name=$_POST['name']; 
		 $chairs=$_POST['chairs']; 	 
		 $description=$_POST['description'];
		 $status=$_POST['status'];
		 
		$conn=mysql_connect("localhost","root","") or die("not connected");
		$select_db=mysql_select_db('mkombo_university',$conn);
		mysql_query("DELETE FROM  classrooms WHERE id='$class_id'");	 
	     mysql_query("INSERT INTO  classrooms values('$class_id','$name','$chairs','$description','$status')") or die(mysql_error());	            
         // header("Location:classrooms_detail.php");
		// exit();
		
		 mysql_close($conn);
        
        }
          ?>
			<div class="row" style="margin:3%; margin-top:0%;">
		
         			<div class="box box-primary col-md-6">
					<div class="col-md-3"></div>
			<div class="col-md-6">
				   <div class="box-header with-border">
              <h3 class="box-title">UPDATE CLASSROOMS DETAIL RECORE</h3>
            </div>  
					<?php 
			    $id =$_GET['id'];
				$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT * FROM classrooms where id='$id'") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
			    $name=$row['name'];
	 		    $no_chairs=$row['no_chairs'];
			    $description=$row['description'];
			    $status=$row['status'];
				   }
           mysql_close($conn);
             
				?>
			
           <form class="form-horizontal" role="form" method="post" >
                
				<div class="form-group has-feedback " >
                  <label class="control-label"> Class id</label>
                  <div class="handle_error has-feedback ">
                  <input type="text" class="form-control book_id" name="class_id" value="<?PHP ECHO $id; ?>">
				   <span class="glyphicon glyphicon-book form-control-feedback"></span>
				   <span class="help-block book_error"></span>
                   </div>
				      
              </div>
             
			       
				<div class="form-group has-feedback " >
                  <label class="control-label"> Name</label>
                  <div class="handle_error_title a has-feedback ctrl_error">
                  <input type="text" class="form-control book_title" name="name" id="book_field" value="<?PHP ECHO $name; ?>">
				   <span class="glyphicon glyphicon-book b form-control-feedback " ></span>
                    <span class="help-block title_error"></span>
					</div>				    
                </div>
             		      
				<div class="form-group has-feedback " >
                  <label class="control-label"> No:chairs </label>
                  <div class="handle_error_author a has-feedback ctrl_error">
                  <input type="text" class="form-control book_author"  name= "chairs" value="<?PHP ECHO $no_chairs; ?>">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block author_error"></span>
				   </div>				   
                </div>
           
			     <div class="form-group has-feedback">
                  <label class="control-label">Description</label>
                  <div class="handle_error_publisher a has-feedback ctrl_error">
                  <input type="text" class="form-control book_publisher"  name="description" id="book_field" value="<?PHP ECHO $description; ?>">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block publisher_error"></span>
				   </div>
				    </div>
           
			<div class="form-group has-feedback " >
                  <label class="control-label">Status</label>
                  <div class="handle_error_category a has-feedback ctrl_error">
                  <input type="text" class="form-control book_category" name="status" id="book_field" value="<?PHP ECHO  $status; ?>">
				   <span class="glyphicon glyphicon-book b form-control-feedback " ></span>
                    <span class="help-block category_error"></span>
					</div>				  
                </div>
			   <!---->
			<div  class="form-group " >        
                      <div >
                   <input type="submit"  name="update_classrooms" class="btn btn-primary receive" value="Update">
                    </div>
                      </div>
                    </form>
					
                </div>
                 <div class="col-md-3"></div>
         </div>
		
          		<?php
include('include/classes_bottom.php');
?>