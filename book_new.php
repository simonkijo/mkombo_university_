<?php
include("include/books_top.php")
?>
	<div class="row">
	
	  <div class="col-md-6">
	
   <div class="box box-primary " style="padding-left:8%; padding-right:8%;">
   <div class="box-header with-border">
             

			 <h3 class="box-title" style="margin-left:40%;">ADD BOOKS</h3>
            </div>
			
			<?php		
if(isset($_POST['add_book']))
{
 $id=$_POST['book_id'];
 $book_title=$_POST['book_title']; 
 $author=$_POST['author'];
  $total=$_POST['total'];

 $publisher=$_POST['publisher'];
  $category=$_POST['category'];
 // $total=$_POST['total'];
  $date=DATE('Y/d/m');
  //$number=1;
if($_POST['book_id'] != NULL && $_POST['book_title'] !=NULL && $_POST['author'] !=NULL && $_POST['publisher'] !=NULL && $_POST['category'] !=NULL &&   $total!=NULL )
{
$conn=mysql_connect("localhost","root","") or die("not connected");
$select_db=mysql_select_db('mkombo',$conn);
$result=mysql_query("SELECT * from books WHERE category='$category' ") or die(mysql_error());
$num_row=mysql_num_rows($result);
 if($num_row==NULL)
	{
      mysql_query("INSERT INTO  books values('$id','$book_title','$author','$publisher','$date','$category','$total')") or die(mysql_error());	            
    
	}
   else if($num_row!=NULL)
   {
	   mysql_query("update books SET total=total+$total WHERE category='$category' ") or die(mysql_error());	            
      
   }
}else echo "fill all field";

  mysql_close($conn);
}
?>

   <form class="form-horizontal" role="form" method="post" >
                  <div class="form-group has-feedback ">
                  <label class="control-label"> Book Id</label>
                  <div class="handle_error has-feedback ">
                  <input type="number" class="form-control book_id" name="book_id" maxLength="4" minLength="4" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-book form-control-feedback " ></span>
				   <span class="help-block book_error"></span>
                   </div>
				      
                </div>
             
			      
				<div class="form-group has-feedback " >
                  <label class="control-label"> Book Title</label>
                  <div class="handle_error_title a has-feedback ctrl_error">
                  <input type="text" class="form-control book_title" id="book_field"   name="book_title" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-book b form-control-feedback " ></span>
                    <span class="help-block title_error"></span>
					</div>				    
                </div>
             			      
				<div class="form-group has-feedback ">
                  <label class="control-label"> Author </label>
                  <div class="handle_error_author a has-feedback ctrl_error">
                  <input type="text" class="form-control book_author" name="author" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block author_error"></span>
				   </div>				   
                </div>
             
			     <div class="form-group has-feedback ">
                  <label class="control-label">Publisher</label>
                  <div class="handle_error_publisher a has-feedback ctrl_error">
                  <input type="text" class="form-control book_publisher" name="publisher" id="book_field" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                   <span class="help-block publisher_error"></span>
				   </div>
				    </div>
            
			<div class="form-group has-feedback ">
                  <label class="control-label">category</label>
                  <div class="handle_error_category a has-feedback ctrl_error">
                  <input type="text" class=" book_category" name="category" id="book_field" placeholder="Enter ..." style="width:50%;">
				   <label>Number </label>  
				   <input type="number" class=" book_category" name="total" id="book_field" minLength="1" placeholder="Total" style="width:30%;">
                    <span class="help-block category_error"></span>
					</div>	
      					
                </div>
             
			 
				      <div  class="form-group ">        
                      <div >
                   <input type="submit"  value="Add book"  name="add_book" class="btn btn-primary new_book" Width="30%" style="margin-bottom:3%;">
                    </div>
                      </div>
					  
					  
                    </form>
				  </div>
				   </div> 
						   	  <div class="col-md-6">
	
   <div class="box box-primary" style="padding-left:3%; padding-right:3%;  padding-bottom:6%;">
   <div class="box-header with-border">

  <h3 class="box-title">Summary of Available books</h3>
            </div>
			  <form method="post"  autocomplete="off" >
			   <table id="example2" class="table table-bordered table-striped" >
			   <tbody>	
	<?php 
             	$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo',$conn);
	            $result=mysql_query("SELECT * FROM books") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
				$category=$row['category'];
				$total=$row['total'];
			   echo '<tr>';
			   echo '<td width="50%">'.$category.'</td><td>'.$total.'&nbsp;&nbsp;&nbsp;Books</td>';
			   echo '</tr>';
		      }
           mysql_close($conn);
             
				?>			 

			 </tbody>
   			    </table>
				</form>
		         </div>
				 
				 
				 
				  </div>
				   </div>  
				    <?php
include("include/books_bottom.php")
?>