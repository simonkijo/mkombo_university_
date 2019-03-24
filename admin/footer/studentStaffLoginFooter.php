<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- front-end validation-->
<script src="../dist/js/loginValidation.js"></script>
<script>
	//Initialize Select2 Elements
    $(".select2").select2();
	//message
	$('.displaySms').delay(4000).fadeOut();
	$('.reg-id,.password,.username,.st-email').keyup(function(){
		$('.errSms').fadeOut();
	});
</script>
</body>
</html>