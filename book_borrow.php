<?php 
include('include/books_top.php')
?>
   
<?php
 if(isset($_POST['borrow']))
{ 
 $student_id = $_POST['student_id'];
 $book_id = $_POST['book_id']; 
 $issue_date =$_POST['issue_date'];
 $due_date = $_POST['due_date'];
//echo  date('Y-m-d');
 //$days_exceed=dateDiff( date('Y-m-d'), $due_date);
 //echo  $issue_date.' '.$due_date;
 if($due_date >= date('Y-m-d'))
 {
  $days=dateDiff( date('Y-m-d'), $due_date);
  //echo $days;
  if( $days>7)
  { 
 echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.
		   '<div class="callout callout-info"><h4>'.'Fail!'.'</h4>Maximum days not exceed 7</div>'.
		   '</div><div class="col-md-3"> </div></div>'; 
   }else if( $days<7)
  { 
 /////
  
 $conn=mysql_connect("localhost","root","") or die("not connected");
 $select_db=mysql_select_db('mkombo_university',$conn);
 //echo $student_id." ".$book_id." ".$issue_date." ". $due_date;
 $count=mysql_query("SELECT * FROM student WHERE reg_no='$student_id'");
 $count2=mysql_query("SELECT * FROM books WHERE id='$book_id'");
 $num_rows = mysql_num_rows($count);
 $num_rows2 = mysql_num_rows($count2);
 //  echo "  ".$num_rows."  "."julius";
   if($num_rows!=Null && $num_rows2!=Null)
   { 
if($_POST['student_id'] != NULL && $_POST['book_id'] !=NULL && $_POST['issue_date'] !=NULL && $_POST['due_date'] != NULL)
    {
mysql_query("INSERT INTO  borrow values('$book_id','$student_id','$issue_date','$due_date')") or die(mysql_error());
mysql_query("update books SET total=total-1 WHERE id='$book_id' ") or die(mysql_error());	
      echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.'<div class="callout callout-info"><h4>'.'successfull!'.'</h4>Book have been borrowed</div>'.'</div><div class="col-md-3"> </div></div>';
    }
}else if($num_rows==Null && $num_rows2!=Null)
   {
	  echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.'<div class="callout callout-info"><h4>'.'Fail!'.'</h4>Reg number note recognized</div>'.'</div><div class="col-md-3"> </div></div>';  
	   
   }else if($num_rows2==Null && $num_rows!=Null )
       {
	  echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.'<div class="callout callout-info"><h4>'.'Fail!'.'</h4>Incorrect book id</div>'.'</div><div class="col-md-3"> </div></div>';  
	   
     }else  if($num_rows2==Null && $num_rows2==Null)
         {
	  echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.
		   '<div class="callout callout-info"><h4>'.'Fail!'.
		   '</h4>invalid book id and the student id not exist</div>'.
		   '</div><div class="col-md-3"> </div></div>'; 
       }

 
 ////
   }
 }if($due_date < date('Y-m-d'))
 {
	echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.
		   '<div class="callout callout-info"><h4>'.'Fail!'.'</h4>Invalid due date</div>'.
		   '</div><div class="col-md-3"> </div></div>'; 
	 
 }
 /*

	   */
	
mysql_close($conn);
}
?>

<?php
 
 // Set timezone
  date_default_timezone_set("UTC");
   function dateDiff($time1, $time2, $precision = 6) {
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }
    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();
    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Create temp time from time1 and interval
      $ttime = strtotime('+1 ' . $interval, $time1);
      // Set initial values
      $add = 1;
      $looped = 0;
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
        // Create new temp time from time1 and interval
        $add++;
        $ttime = strtotime("+" . $add . " " . $interval, $time1);
        $looped++;
      }
 
      $time1 = strtotime("+" . $looped . " " . $interval, $time1);
      $diffs[$interval] = $looped;
    }
    
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
        break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
        // Add s if value is not 1
        if ($value != 1) {
          $interval .= "s";
        }
        // Add value and interval to times array
        $times[] = $value . " " . $interval;
        $count++;
      }
    }
    // Return string with times
    return implode(", ", $times);
  }
?>
	<div class="row">
	  <div class="col-md-6">
	
   <div class="box box-primary" style="padding-bottom:0 width:40%;" >
   <div class="box-header with-border">

              <h3 class="box-title" style="margin-left:40%;">BOOROW BOOK</h3>
            </div>
        <form class="form-horizontal" role="form" method="post" style="padding-bottom:6%;">
                
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label"> Book Id </label>
                  <div class="handle_error_book has-feedback">
                  <input type="text" class="form-control book" name="book_id" placeholder="Enter ..." minlength="4" maxlength="4">
				   <span class="glyphicon glyphicon-book form-control-feedback " ></span>
				   <span class="help-block book_error"></span>
                   </div>
				      
                </div>
             
			      
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label"> Student Id</label>
                  <div class="handle_error_student a has-feedback ctrl_error">
                  <input type="text" class="form-control student" name="student_id" minlength="12" maxlength="12" id="book_field" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-user form-control-feedback " ></span>
                    <span class="help-block student_error"> </span>
					</div>				    
                </div>
             			      
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label"> Issue Date </label>
                  <div class="handle_error_issue a has-feedback ctrl_error">
                  <input type="text" class="form-control date issue" id="#date"  name="issue_date" readonly value ="<?php echo date('Y-m-d'); ?>" >
				   <span class="glyphicon glyphicon-calendar form-control-feedback " ></span>
                   <span class="help-block issue_error"></span>
				   </div>				   
                </div>
             <div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Due Date</label>
                  <div class="handle_error_due has-feedback ctrl_error">
                  <input type="text" class="form-control date due" id="#date" name="due_date" id="book_field" >
				   <span class="glyphicon glyphicon-calendar  form-control-feedback " ></span>
                    <span class="help-block due_error"></span>
					</div>				  
                </div>
            
			<!-- 
			<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label">Librarian Id</label>
                      <div class="handle_error_librarian has-feedback ctrl_error">
                         <input type="text" class="form-control librarian" name="librarian_id" id="book_field" placeholder="Enter ...">
				              <span class="glyphicon glyphicon-user  form-control-feedback" ></span>
                              <span class="help-block librarian_error"></span>
					</div>				  
                </div>
			-->
              <div  class="form-group " style="padding-left:20%;padding-right:20%">        
                      <div >
                        <input type="submit"  value="BORROW" class="btn btn-primary book_borrow" name="borrow" Width="30%" style="margin-bottom:3%;">
                                       
					</div>
                      </div>					  
                    </form>
				  </div>
				   </div> 
				   	  <div class="col-md-6">
	
   <div class="box box-primary" style="padding-bottom:0 width:40%;" >
   <div class="box-header with-border">
   
   <?php
   //
 $cost=00.00; $due_date= "yyy-mm-dd" ;
 $stn_to_number= 0;
 $total_cost=00.00;
//echo date('Y-m-d');
   if(isset($_POST['receive']))
 {  
  $student_id=$_POST['student_id'];
  $book_id=$_POST['book_id'];
 $conn=mysql_connect("localhost","root","") or die("not connected");
 $select_db=mysql_select_db('mkombo',$conn);
 $count=mysql_query("SELECT * FROM borrow WHERE student_code='$student_id' AND id='$book_id'");
 $num_rows = mysql_num_rows($count);
//echo "  ".$num_rows."  "."julius";
  if($num_rows!=Null)
{ 
	//$student= (int)$_POST['student_id'];
    $cost=200;
	//$conn=mysql_connect("localhost","root","") or die("not connected");
	//$select_db=mysql_select_db('mkombo',$conn);
	$result=mysql_query("SELECT id,student_code,due_date FROM borrow WHERE student_code='$student_id' ") or die(mysql_error());
while($row=mysql_fetch_array($result))
        { 
		 $bookid=$row['id'];
		 $student_code=$row['student_code'];
		 $due_date=$row['due_date'];
		 }
 if( date('yyyy-mm-dd') < $due_date)
{
	// echo "the date". $due_date."sysdate ".date('Y-m-d');
	// echo  "the book".$bookid;
	// echo  "the id".$student_code;
mysql_query("update books SET total=total+1 WHERE id='$bookid' ") or die(mysql_error());	
$days_exceed=dateDiff( date('Y-m-d'), $due_date) . "<br>";
$stn_to_number= (int)$days_exceed;
$cost_value= (int)$cost;
$total_cost=$stn_to_number*$cost_value;
}else
{
$total_cost="0.00";
$stn_to_number="0";	
}

 }else if($num_rows==Null)
   {
	  echo '<div class="row popup"><div class="col-md-3"> </div><div class="col-md-6">'.
		   '<div class="callout callout-info"><h4>'.'Fail!'.'</h4>Incorrect Input</div>'.
		   '</div><div class="col-md-3"> </div></div>';  
	   
   }
 mysql_close($conn);


}
?>

<?php

?>
  <h3 class="box-title" style="margin-left:40%;">RETURNED BOOK RECORD</h3>
     </div><form class="form-horizontal" role="form" method="post" >
                   <div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                   <label class="control-label"> Book Id</label>
                   <div class="handle_error_book2 has-feedback">
                   <input type="text" class="form-control book2" name="book_id" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-book form-control-feedback " ></span>
				   <span class="help-block book2_error"></span>
                   </div>
				      
                </div>
             
			      
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label"> Student Id</label>
                  <div class="handle_error_student2  has-feedback">
                  <input type="text" class="form-control student2"  name="student_id" placeholder="Enter ...">
				   <span class="glyphicon glyphicon-user form-control-feedback " ></span>
                    <span class="help-block student2_error"></span>
					</div>				    
                </div>
             			      
				<div class="form-group has-feedback " style="padding-left:20%;padding-right:20%">
                  <label class="control-label"> Due Date </label>
                  <div class="handle_error_issue2  has-feedback ">
                  <input type="text" class="form-control issue2" readonly  value= '<?php echo $due_date; ?>'>
				   <span class="glyphicon glyphicon-calendar form-control-feedback " ></span>
                 <label class="control-label">Exceed Day</label>
                  <div class="handle_error_exceed has-feedback ">
                  <input type="text" class="form-control exceed" style="pwidth:10%" readonly id="book_field" value='<?PHP  echo $stn_to_number." &nbsp;&nbsp; "."days"; ?>'>
				   <span class="glyphicon glyphicon-calendar  form-control-feedback " ></span>
					 <label class="control-label">Cost</label>
                  <div class="handle_error_cost has-feedback ">
                  <input type="text" class="form-control cost" id="book_field" readonly value='<?php  echo " &nbsp;&nbsp; "."Tsh".' '. $total_cost."/="; ?>'>
				   <span class="glyphicon glyphicon-bank  form-control-feedback " ></span>
								  
				  </div>				   
                </div>			  
                </div>
				      <div  class="form-group " style="padding-left:4%;padding-right:20%; ">        
                      <div >
                   <input type="submit"   class="btn btn-primary receive_book" name="receive"  value="get detail" Width="50%" style="margin-top:10%;">
                    </div>
                      </div>
					  
					  
                    </form>
				  </div>
				   </div>
				   </div>  
				 <?php 
include('include/books_bottom.php')
?>