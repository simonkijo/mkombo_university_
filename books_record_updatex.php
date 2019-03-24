<?php
include("include/books_top.php");
?>    		<div class="row" style="margin:3%; margin-top:0%;">
			<div class="box box-primary col-md-8">
			<div class="col-md-2"></div>
			<div class="col-md-8">
            <div class="box-header with-border">
              <h3 class="box-title">UPDATE BOOKS RECORD</h3>
            </div>  
					<?php 
			    $id =$_GET['id'];
				$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT * FROM books where id=$id ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
			    $title=$row['title'];
	 		    $author=$row['author'];
			    $publisher=$row['publisher'];
				$date=$row['date'];
			    $category=$row['category'];
				   }
				   
if(isset($_POST['update']))
{
 $id2=$_POST['id'];
 $book_title=$_POST['title']; 
 $author2=$_POST['author'];
 $publisher2=$_POST['publisher'];
 $category2=$_POST['category'];
 $date2=DATE('Y/d/m');
if($id2 != NULL &&  $book_title !=NULL && $author2 !=NULL && $publisher2 !=NULL && $category2 !=NULL )
{
$conn=mysql_connect("localhost","root","") or die("not connected");
$select_db=mysql_select_db('mkombo',$conn);
mysql_query("UPDATE books SET title='$book_title',author='$author2',publisher='$publisher2',date='$date2',category='$category2' WHERE id='$id2'") or die(mysql_error());	            
 header("location:book_detail.php");
mysql_close($conn);
}
}
?>
  <form class="form-horizontal" role="form" method="post" >
				<div class="form-group has-feedback " >
                  <label class="control-label"> Book id</label>
                  <div class="handle_error has-feedback ">
                  <input type="text" class="form-control book_id" name="id" value="<?PHP ECHO $id; ?>">
				   <span class="glyphicon glyphicon-book form-control-feedback"></span>
				   <span class="help-block book_error"></span>
                   </div>
              </div>
				<div class="form-group has-feedback">
                  <label class="control-label"> Title</label>
                  <div class="handle_error_title a has-feedback ctrl_error">
                  <input type="text" class="form-control book_title" name="title" id="book_field" value="<?PHP ECHO $title; ?>">
				   <span class="glyphicon glyphicon-book b form-control-feedback " ></span>
                    <span class="help-block title_error"></span>
					</div>				    
                </div>
             		      
				<div class="form-group has-feedback " >
                  <label class="control-label"> Author </label>
                  <div class="handle_error_author a has-feedback ctrl_error">
                  <input type="text" class="form-control book_author"  name= "author" value="<?PHP ECHO $author; ?>">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block author_error"></span>
				   </div>				   
                </div>
           
			     <div class="form-group has-feedback">
                  <label class="control-label">Publisher</label>
                  <div class="handle_error_publisher a has-feedback ctrl_error">
                  <input type="text" class="form-control book_publisher"  name="publisher" id="book_field" value="<?PHP ECHO $publisher; ?>">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block publisher_error"></span>
				   </div>
				    </div>
           
		     <div class="form-group has-feedback">
                  <label class="control-label">Date</label>
                  <div class="handle_error_publisher a has-feedback ctrl_error">
                  <input type="text" class="form-control book_publisher"  name="date" id="book_field" value="<?PHP ECHO $date; ?>">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block publisher_error"></span>
				   </div>
				    </div>
					
			<div class="form-group has-feedback " >
                  <label class="control-label">Category</label>
                  <div class="handle_error_category a has-feedback ctrl_error">
                  <input type="text" class="form-control book_category" name="category" id="book_field" value="<?PHP ECHO  $category; ?>">
				   <span class="glyphicon glyphicon-book b form-control-feedback " ></span>
                    <span class="help-block category_error"></span>
					</div>				  
                </div>
			   <!---->
			<div  class="form-group " >        
                      <div >
                   <input type="submit"  name="update" class="btn btn-primary new_book" value="Update">
                    </div>
                      </div>
                    </form>
					

         </div>
			  <div class="col-md-2"></div>
			  </div>
                 </div>
       
   <?php
include("include/books_bottom.php");
?>