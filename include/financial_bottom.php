 </section>
    <!-- /.content -->
  </div>
<?php 
include('footer.php');
?>  
  <div class="control-sidebar-bg"></div>
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/validate.js"></script>
<script src="dist/js/daterange.js"></script>
<script type="text/javascript"></script>
<script src="dist/js/mask.js"></script>
</body>
</html>
<script>
 $(function () {
    $("#example1").DataTable({
		"ordering": false
		
	});
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  
  $(function() {
    $('input[name="daterange"]').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }});
         });
		 // popup  dialog
$('.popup').delay(4000).fadeOut();

</script>