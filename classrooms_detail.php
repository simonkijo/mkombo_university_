<?php
include('include/classes_top_report.php');
?> <div class="box ">
  <div class="row">

    <div class="box-header ">
              <h3 class="box-title" style="margin-left:3%; margin-top:0%;"> VIEW STORE RECORD DETAIL</h3>
      
            </div>
            <!-- /.box-header -->
			<?php
			   $id =$_GET['id'];
		       $conn=mysql_connect("localhost","root","") or die("not connected");
	           $select_db=mysql_select_db('mkombo_university',$conn);
	            mysql_query("DELETE FROM classrooms WHERE id='$id' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
               mysql_close($conn);
                             
			 ?>
            <div class="box-body">
			<!--<div class="col-md-1">aaaaa</div>-->
					<div class="col-md-1"></div>
			<div class="col-md-10">
			<div class="row" style="margin:3%; margin-top:0%;">
              <table id="example1" class="table table-bordered table-striped">
               <thead><tr ><th>ID</th><th>NAME</th><th>NO:CHAIRS</th><th>DESCRIPTION</th><th>STATUS</th> <th>MODIFY</th></tr></thead>
			   <tbody>	
				<?php 
				
             	$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT * FROM classrooms") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                {   $id=$row['id'];
			        $name=$row['name'];
	 		        $no_chairs=$row['no_chairs'];
			        $description=$row['description'];
			        $status=$row['status'];
                     echo '<tr>';
			         echo '<td>' . $id.'</td><td>'.$name.'</td><td>'. $no_chairs.'</td><td>'.$description.'</td><td>'.$status.'</td>';
			         echo '<td align="center">';
			          ?>
			    <a href="classrooms_detail.php?id=<?php echo $id;?>"><font color="blue" size="3%">Delete</font></a> &nbsp;|&nbsp;
			    <a href="classrooms_update_auto_loaded.php?id=<?php echo $id;?>"><font color="blue" size="3%">Update</font></a>
			  <?php
			  
			   echo '</td>'; 
               echo '</tr>';
		      }
           mysql_close($conn);
             
				?>
          
                </tbody> </table>
			  </div>
                 </div>
				 
					<div class="col-md-1"></div>
            <!-- /.box-body -->
          </div>
          <!-- 	<div class="col-md-2"></div> -->
			</div>
	  </div>
 <?php
include('include/classes_bottom.php')
?>