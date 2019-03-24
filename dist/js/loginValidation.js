$('.recover-st').click(function(){
	var reg_id = $('.reg-id').val();
	var st_email = $('.st-email').val();
	
	if(reg_id == ""){
		$('.id-err').addClass('has-error');
		$('.id-err-sms').text('Please fill Registration ID.');
		return false;
	}else if(numberValidation(reg_id) == false){
		$('.id-err').addClass('has-error');
		$('.id-err-sms').text('Numbers Only');
		return false;
	}
	if(st_email == ""){
		$('.st-email-err').addClass('has-error');
		$('.st-email-err-sms').text('E-mail is required');
		return false;
	}else if(emailValidation(st_email) == false){
		$('.st-email-err').addClass('has-error');
		$('.st-email-err-sms').text('Valid E-mail format is example@gmail.com');
		return false;
	}
});
$('.recover-staff').click(function(){
	var username = $('.username').val();
	var sta_email = $('.st-email').val();
	
	if(username == ""){
		$('.username-err').addClass('has-error');
		$('.username-err-sms').text('Please fill Username.');
		return false;
	}
	if(sta_email == ""){
		$('.st-email-err').addClass('has-error');
		$('.st-email-err-sms').text('E-mail is required');
		return false;
	}else if(emailValidation(sta_email) == false){
		$('.st-email-err').addClass('has-error');
		$('.st-email-err-sms').text('Valid E-mail format is example@gmail.com');
		return false;
	}
});
//login
$('.log-in-student').click(function(){
	var reg_id = $('.reg-id').val();
	var pass = $('.password').val();
	
	if(reg_id == ""){
		$('.id-err').addClass('has-error');
		$('.id-err-sms').text('Please fill Registration ID.');
		return false;
	}else if(numberValidation(reg_id) == false){
		$('.id-err').addClass('has-error');
		$('.id-err-sms').text('Numbers Only');
		return false;
	}
	if(pass == ""){
		$('.password-err').addClass('has-error');
		$('.password-err-sms').text('Please fill Password.');
		return false;
	}
});
$('.log-in-staff').click(function(){
	var username = $('.username').val();
	var pass = $('.password').val();
	
	if(username == ""){
		$('.username-err').addClass('has-error');
		$('.username-err-sms').text('Please fill Username.');
		return false;
	}
	if(pass == ""){
		$('.password-err').addClass('has-error');
		$('.password-err-sms').text('Please fill Password.');
		return false;
	}
});
$('.reg-id,.username,.password,.st-email').keyup(function(){
	$('.id-err,.username-err,.password-err,.st-email-err').removeClass('has-error');
	$('.id-err-sms,.username-err-sms,.password-err-sms,.st-email-err-sms').text('');
});
//for checking account number contains allnumeric.
function numberValidation(parameter){    
	var numbers = /^[0-9]+$/.test(parameter);
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