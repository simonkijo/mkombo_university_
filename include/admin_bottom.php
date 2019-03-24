
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
include('footer.php');
?>
   <div class="control-sidebar-bg"></div>
</div>
<script src="dist/js/validate.js"></script>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script>
  $(function () {
    $("#example2").DataTable({
		"ordering": false,
		  "searching": true,
		   "lengthChange": true

		
	});
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  

$('.popup').delay(4000).fadeOut();
//alert("mungaya");

// validate the admin part
$('.adding').click(function(){
	var username = $('.username').val();
	var password1  = $('.password').val();
		
if(username == ""){
$('.handle_error_usename').addClass('has-error');
$('.username_error').text("Enter username ");
 return false;
}
else if(allLetterAndSpace(username)==false)
{
$('.handle_error_usename').addClass('has-error');
$('.username_error').text("letters");
return false;
}
if(password1 == ""){
$('.handle_error_password').addClass('has-error');
$('.password_error').text("Enter password");
 return false;
}
else if(lettersNumberNoSpace(password1)==false)
{
$('.handle_error_password').addClass('has-error');
$('.password_error').text("no space");
return false;
}
});
$('.username,.password').keyup(function(){
		$('.handle_error_usename,.handle_error_password').removeClass('has-error');
		$('.username_error,.password_error').text('');
	});
	
	
	
	
	
	
	
// popup  dialog
$('.popup').delay(4000).fadeOut();

//for checking characters only in names.
function allLetter(parameter){    
	var letters = /^[A-Za-z]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}

	//for checking account number contains allnumeric.
	function bookValidation(parameter){    
		var numbers = /^[0-9]+$/.test(parameter);
		if(numbers == true){  
			return true;  
		}else{    
			return false;  
		}  
	}
	
		function allNumber(parameter){    
		var numbers = /^[0-9]+$/.test(parameter);
		if(numbers == true){  
			return true;  
		}else{    
			return false;  
		}
		}
		//for checking characters and space in names.
function allLetterAndSpace(parameter){    
	var letters = /^[A-Za-z ]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}

// for letter number no space
function lettersNumberNoSpace(parameter){    
	var letters = /^[A-Za-z0-9]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}


jQuery(function($){
   $(".date").mask("9999-99-99",{placeholder:"yyyy/mm/dd"});
   $("#phoneValidate").mask("+255-999-999999");
   $("#tin").mask("99-9999999");
   $("#ssn").mask("999-99-9999");
});

	

</script>

</body>
</html>
