<?php
include("include/books_top.php");
session_start();
error_reporting(0);
//echo $_SESSION['busar'];
?>
				<?php
		       $id =$_GET['id'];
		       $conn=mysql_connect("localhost","root","") or die("not connected");
	           $select_db=mysql_select_db('mkombo_university',$conn);
	           mysql_query("DELETE FROM books WHERE id='$id' ") or die(mysql_error());
			   mysql_close($conn);
            ?>
				 <div class="box box-primary" style="padding-left:5%; padding-right:5%;">
				 	<span style="margin-left:0%"><b>VIEW BOOK DETAIL </b></span>
			<div class="row">
					<div class="col-md-12">
		              <table id="example1" class="table table-bordered table-striped">
               <thead><tr ><th>BOOK ID</th><th>BOOK TITLE</th><th>AUTHOR</th><th>PUBLISHER</th><th>DATE</th><th>CATEGORY</th> <th>TOTAL</th> <th>MODIFY</th></tr></thead>
			   <tbody>	
				<?php 
             	$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT id,title,author,publisher,date,category,total FROM books") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
			    $title=$row['title'];
	 		    $author=$row['author'];
			    $publisher=$row['publisher'];
			    $date=$row['date'];
				$category=$row['category'];
				$total=$row['total'];
			   echo '<tr>';
			   echo '<td>' .$id.'</td><td>'.$title.'</td><td>'.$author.'</td><td>'.$publisher.'</td><td>'.$date.'</td>'.'</td><td>'.$category.'</td><td>'.$total.'</td>';
			   echo '<td align="" style="width:;">';
			   ?>
			    <a href="book_detail.php?id=<?php echo $id;?>"><font color="blue" ">Delete</font></a> &nbsp;|&nbsp;
			     <a href="books_record_updatex.php?id=<?php echo $id;?>"><font color="blue">update</font></a>
			   <?php
			  
			   echo '</td>'; 
               echo '</tr>';
		//$photo="../img/userIconi.png";
		      }
           mysql_close($conn);
             
				?>
               </tbody> </table>
			  </div>
			                 </div>
            <!-- /.box-body -->
          </div>
            <?php
include("include/books_bottom.php")
?>