<?php 
//session_start();
include("include/report_financial_top.php");
?>
<?php
//error_reporting(0);
?>


<div class="row mm">
	<div class="col-md-12">  
	<?php
	     // header("location:pdf_page_financial.php"); 
			?>
			   <!-- Date and time range -->
              <div class="form-group">
                <label>Financial:</label>
                <!-- /.input group -->
              </div>
			<form action="" method="post">
			<div class="row" style="margin:2%; margin-top:1%;">
            
			<table id="example1" class="table table-bordered table-striped" cellspacing="20%" cellpadding="20%">
               <thead><tr ><th>ID</th><th>NAME</th><th>COURSE</th><th>AMOUNT</th><th>PURPOSE</th><th>DATE</th><th>RECEIPT CODE</th></tr></thead>
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
				$student=mysql_query("SELECT fname,mname,course,starting year FROM student WHERE reg_no='$id'") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($student))
                {
			    $fname=$row['fname'];
				$mname=$row['mname'];
				$name=$fname."  ".$mname;
			    $course=$row['course'];
				$admission=$row['starting year'];
				$admission_year=(int)$admission;
				$year=date("Y")-$admission_year." "."Year";
				//echo $year. $name.$course."</br>";
				//goTo a;
				}
			  echo '<tr>';
			   echo '<td>'.' ' .$id.'</td><td width="20%">'.' ' .$name.'</td> <td width="30%">'.' ' .$course.'</td><td>'.' ' .$amount.'</td><td>'.' ' .$purpose.'</td><td>'.' ' .$date_financial.'</td><td width="20%">'.' ' .$receipt_code.'</td>';
               echo '</tr>';
		      }
           mysql_close($conn);             
				?>          
                </tbody> </table>
			  </div>
			  </form>
                 </div>
			</div>
	  </div>
  <div class="control-sidebar-bg"></div>
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
   
    $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
