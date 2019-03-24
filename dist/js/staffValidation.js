//for enter key validation
$(document).bind('keypress', function(e){
	var fname = $('.fname').val();
	var mname = $('.mname').val();
	var sname = $('.sname').val();
	var phone = $('.phone').val();
	var email = $('.email').val();
	var nationality = $('.nationality').val();
	var module = $('.module').val();
	var username = $('.username').val();
	var password = $('.password').val();
	var password_length = $('.password').val().length;
	var repassword = $('.repassword').val();
	
	if(e.which == 13){
		if(fname == ""){
			$('.fname-err').addClass('has-error');
			$('.fname-err-sms').text('First Name is required');
			return false;
		}else if(allLetter(fname) == false){
			$('.fname-err').addClass('has-error');
			$('.fname-err-sms').text('Letters only and no space.');
			return false;
		}
		if(mname == ""){
			$('.mname-err').addClass('has-error');
			$('.mname-err-sms').text('Middle Name is required');
			return false;
		}else if(allLetter(mname) == false){
			$('.mname-err').addClass('has-error');
			$('.mname-err-sms').text('Letters only and no space.');
			return false;
		}
		if(sname == ""){
			$('.sname-err').addClass('has-error');
			$('.sname-err-sms').text('Surname is required');
			return false;
		}else if(allLetter(sname) == false){
			$('.sname-err').addClass('has-error');
			$('.sname-err-sms').text('Letters only and no space.');
			return false;
		}
		if(phone == ""){
			$('.phone-err').addClass('has-error');
			$('.phone-err-sms').text('Phone number is required');
			return false;
		}else if(phoneNoValidation(phone) == false){
			$('.phone-err').addClass('has-error');
			$('.phone-err-sms').text('Valid format is, example +255-713-678945');
			return false;
		}
		if(email == ""){
			$('.email-err').addClass('has-error');
			$('.email-err-sms').text('E-mail is required');
			return false;
		}else if(emailValidation(email) == false){
			$('.email-err').addClass('has-error');
			$('.email-err-sms').text('Valid E-mail format is example@gmail.com');
			return false;
		}
		if(nationality == ""){
			$('.nationality-err').addClass('has-error');
			$('.nationality-err-sms').text('Nationality is required');
			return false;
		}else if(nationalityValidation(nationality) == false){
			$('.nationality-err').addClass('has-error');
			$('.nationality-err-sms').text('Letters Only');
			return false;
		}
		if(module != "" && nationalityValidation(module) == false){
			$('.module-err').addClass('has-error');
			$('.module-err-sms').text('Letters Only');
			return false;
		}
		if(username == ""){
			$('.username-err').addClass('has-error');
			$('.username-err-sms').text('Username is required');
			return false;
		}
		if(password == ""){
			$('.password-err').addClass('has-error');
			$('.password-err-sms').text('Password is required');
			return false;
		}else if(password_length < 8){
			$('.password-err').addClass('has-error');
			$('.password-err-sms').text('Too short, Password requires atleast 8 characters.');
			return false;
		}
		if(repassword == ""){
			$('.repassword-err').addClass('has-error');
			$('.repassword-err-sms').text('Please retype password.');
			return false;
		}else if(password != repassword){
			$('.repassword-err').addClass('has-error');
			$('.repassword-err-sms').text('Passwords should match.');
			return false;
		}
	}
});	
//end of enter key validation
$('.reg_btn').click(function(){
	var fname = $('.fname').val();
	var mname = $('.mname').val();
	var sname = $('.sname').val();
	var phone = $('.phone').val();
	var email = $('.email').val();
	var nationality = $('.nationality').val();
	var module = $('.module').val();
	var username = $('.username').val();
	var password = $('.password').val();
	var password_length = $('.password').val().length;
	var repassword = $('.repassword').val();
	
	if(fname == ""){
		$('.fname-err').addClass('has-error');
		$('.fname-err-sms').text('First Name is required');
		return false;
	}else if(allLetter(fname) == false){
		$('.fname-err').addClass('has-error');
		$('.fname-err-sms').text('Letters only and no space.');
		return false;
	}
	if(mname == ""){
		$('.mname-err').addClass('has-error');
		$('.mname-err-sms').text('Middle Name is required');
		return false;
	}else if(allLetter(mname) == false){
		$('.mname-err').addClass('has-error');
		$('.mname-err-sms').text('Letters only and no space.');
		return false;
	}
	if(sname == ""){
		$('.sname-err').addClass('has-error');
		$('.sname-err-sms').text('Surname is required');
		return false;
	}else if(allLetter(sname) == false){
		$('.sname-err').addClass('has-error');
		$('.sname-err-sms').text('Letters only and no space.');
		return false;
	}
	if(phone == ""){
		$('.phone-err').addClass('has-error');
		$('.phone-err-sms').text('Phone number is required');
		return false;
	}else if(phoneNoValidation(phone) == false){
		$('.phone-err').addClass('has-error');
		$('.phone-err-sms').text('Valid format is, example +255-713-678945');
		return false;
	}
	if(email == ""){
		$('.email-err').addClass('has-error');
		$('.email-err-sms').text('E-mail is required');
		return false;
	}else if(emailValidation(email) == false){
		$('.email-err').addClass('has-error');
		$('.email-err-sms').text('Valid E-mail format is example@gmail.com');
		return false;
	}
	if(nationality == ""){
		$('.nationality-err').addClass('has-error');
		$('.nationality-err-sms').text('Nationality is required');
		return false;
	}else if(nationalityValidation(nationality) == false){
		$('.nationality-err').addClass('has-error');
		$('.nationality-err-sms').text('Letters Only');
		return false;
	}
	if(module != "" && nationalityValidation(module) == false){
		$('.module-err').addClass('has-error');
		$('.module-err-sms').text('Letters Only');
		return false;
	}
	if(username == ""){
		$('.username-err').addClass('has-error');
		$('.username-err-sms').text('Username is required');
		return false;
	}
	if(password == ""){
		$('.password-err').addClass('has-error');
		$('.password-err-sms').text('Password is required');
		return false;
	}else if(password_length < 8){
		$('.password-err').addClass('has-error');
		$('.password-err-sms').text('Too short, Password requires atleast 8 characters.');
		return false;
	}
	if(repassword == ""){
		$('.repassword-err').addClass('has-error');
		$('.repassword-err-sms').text('Please retype password.');
		return false;
	}else if(password != repassword){
		$('.repassword-err').addClass('has-error');
		$('.repassword-err-sms').text('Passwords should match.');
		return false;
	}
	
});
$('.fname,.mname,.sname,.phone,.email,.nationality,.module,.username,.password,.repassword').keyup(function(){
	$('.fname-err,.mname-err,.sname-err,.phone-err,.email-err,.nationality-err,.module-err,.username-err,.password-err,.repassword-err').removeClass('has-error');
	$('.fname-err-sms,.mname-err-sms,.sname-err-sms,.phone-err-sms,.email-err-sms,.nationality-err-sms,.module-err-sms,.username-err-sms,.password-err-sms,.repassword-err-sms').text('');
});
//for checking characters and space in nationality.
function nationalityValidation(parameter){    
	var letters = /^[A-Za-z ]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}
//for checking characters only in names.
function allLetter(parameter){    
	var letters = /^[A-Za-z]+$/.test(parameter);
	if(letters == true){  
		return true;  
	}else{    
		return false;  
	}  
}
//for validating phone no
function phoneNoValidation(parameter){
	var numbers = /^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{6})$/.test(parameter);
	if(numbers == true){  
		return true;  
	}else{    
		return false;  
	}
}
//for validating email
function emailValidation(parameter){
	var mailformat = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,3})+$/.test(parameter);
	if(mailformat == true){  
		return true;  
	}else{    
		return false;  
	}
}