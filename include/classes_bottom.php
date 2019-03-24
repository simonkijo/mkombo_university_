 </section>
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
<script src="dist/js/app.min.js"></script>
<script src="dist/js/validate.js"></script>
<script src="dist/js/mask.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/input-mask/jquery.inputmaske.date.extension.js"></script>
<script>

jQuery(function($){
   $(".date").mask("9999-99-99",{placeholder:"yyyy/mm/dd"});
   $("#phone").mask("(999) 999-9999");
   $("#tin").mask("99-9999999");
   $("#ssn").mask("999-99-9999");
});

// popup  dialog
$('.popup').delay(4000).fadeOut();
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
</script>



</body>
</html>
