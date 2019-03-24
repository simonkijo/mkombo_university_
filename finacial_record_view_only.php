   <?php
include("include/financial_top.php")
//include("include/financial_bottom.php");
?>
			<div class="row" style="margin:2%; margin-top:1%;">	
			<div class="col-md-12">
			<div class="box-header ">
              <h3 class="box-title">STUDENT FINANCIAL RECORD WIZARD</h3>
            </div>
			<?php
			    $id =$_GET['id'];
		        $conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            mysql_query("DELETE FROM financial_record WHERE id='$id' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                mysql_close($conn);
             
			 ?>
              <table id="example1" class="table table-bordered table-striped">
               <thead><tr ><th>ID</th><th>AMOUNT</th><th>PURPOSE</th><th>DATE</th><th>RECEIPT CODE</th></tr></thead>
			   <tbody>	
				<?php 
             	$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT id,amount,purpose,date_financial,receipt_code FROM financial_record") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
	 		    $amount=$row['amount'];
			    $purpose=$row['purpose'];
			    $date_financial=$row['date_financial'];
				$receipt_code=$row['receipt_code'];
			   echo '<tr>';
			   echo '<td>' .$id.'</td><td>'.$amount.'</td><td>'.$purpose.'</td><td>'.$date_financial.'</td><td>'.$receipt_code.'</td>';
			
               echo '</tr>';
		      }
           mysql_close($conn);
             ?>
             </tbody> </table>
			  </div>
                 </div>
   <?php
//include("include/financial_top.php")
include("include/financial_bottom.php");
?>
 