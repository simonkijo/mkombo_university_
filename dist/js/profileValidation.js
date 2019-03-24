//student profile personal info validation.
$('.sv_pinfo').bind('click',function(){
	var st_email = $('.inputEmail').val();
	var st_phone = $('.inputPhone').val();
	var st_marital = $('.inputMarital').val();
	var st_home = $('.inputHome').val();
	var st_pass = $('.inputPassword').val();
	var st_pass_length = $('.inputPassword').val().length;
	var st_repass = $('.inputRepassword').val();
	
	if(st_email == ''){
		$('.email-err').addClass('has-error');
		$('.email-err-sms').text('This field should not be empty');
		return false;
	}else if(emailValidation(st_email) == false){
		$('.email-err').addClass('has-error');
		$('.email-err-sms').text('Valid email format is example: something@domain.com');
		return false;
	}
	if(st_phone == ''){
		$('.phone-err').addClass('has-error');
		$('.phone-err-sms').text('This field should not be empty');
		return false;
	}else if(phoneNoValidation(st_phone) == false){
		$('.phone-err').addClass('has-error');
		$('.phone-err-sms').text('Valid phone number format is example: +255-XXX-XXXXXX OR +255.XXX.XXXXXX OR +255 XXX XXXXXX');
		return false;
	}
	if(st_marital == ''){
		$('.marital-err').addClass('has-error');
		$('.marital-err-sms').text('This field should not be empty');
		return false;
	}else if(allLetter(st_marital) == false){
		$('.marital-err').addClass('has-error');
		$('.marital-err-sms').text('Letters Only');
		return false;
	}
	if(st_home == ''){
		$('.home-err').addClass('has-error');
		$('.home-err-sms').text('This field should not be empty');
		return false;
	}else if(nationalityValidation(st_home) == false){
		$('.home-err').addClass('has-error');
		$('.home-err-sms').text('Letters Only');
		return false;
	}
	if(st_pass == ''){
		$('.pass-err').addClass('has-error');
		$('.pass-err-sms').text('This field should not be empty');
		return false;
	}else if(st_pass_length < 8){
		$('.pass-err').addClass('has-error');
		$('.pass-err-sms').text('Password should contain atleast eight charaters');
		return false;
	}
	
	if(st_repass == ''){
		$('.repass-err').addClass('has-error');
		$('.repass-err-sms').text('This field should not be empty');
		return false;
	}else if(st_pass != st_repass){
		$('.repass-err').addClass('has-error');
		$('.repass-err-sms').text('Passwords should match');
		return false;
	}
});
//student bank info validation.
$('.sv_binfo').bind('click',function(){
	var bname = $('.inputBankName').val();
	var bbranch = $('.inputBankBranch').val();
	var accountNo = $('.inputAccountNo').val();
	
	if(bname == ''){
		$('.bname-err').addClass('has-error');
		$('.bname-err-sms').text('This field should not be empty');
		return false;
	}else if(nationalityValidation(bname) == false){
		$('.bname-err').addClass('has-error');
		$('.bname-err-sms').text('Letters Only');
		return false;
	}
	if(bbranch == ''){
		$('.bbranch-err').addClass('has-error');
		$('.bbranch-err-sms').text('This field should not be empty');
		return false;
	}else if(nationalityValidation(bbranch) == false){
		$('.bbranch-err').addClass('has-error');
		$('.bbranch-err-sms').text('Letters Only');
		return false;
	}
	
	if(accountNo == ''){
		$('.accountno-err').addClass('has-error');
		$('.accountno-err-sms').text('This field should not be empty');
		return false;
	}else if(accountNoValidation(accountNo) == false){
		$('.accountno-err').addClass('has-error');
		$('.accountno-err-sms').text('Numbers Only');
		return false;
	}
});
//student profile sponsor info validation
$('.sv_sponsor').bind('click',function(){
	var sname = $('.inputSponsorName').val();
	var sphone = $('.inputSponsorPhone').val();
	var semail = $('.inputSponsorEmail').val();
	
	if(sname == ''){
		$('.sname-err').addClass('has-error');
		$('.sname-err-sms').text('This field should not be empty');
		return false;
	}else if(nationalityValidation(sname) == false){
		$('.sname-err').addClass('has-error');
		$('.sname-err-sms').text('Letters Only');
		return false;
	}
	if(sphone == ''){
		$('.sphone-err').addClass('has-error');
		$('.sphone-err-sms').text('This field should not be empty');
		return false;
	}else if(phoneNoValidation(sphone) == false){
		$('.sphone-err').addClass('has-error');
		$('.sphone-err-sms').text('Valid phone number format is example: +255-XXX-XXXXXX OR +255.XXX.XXXXXX OR +255 XXX XXXXXX');
		return false;
	}
	if(semail == ''){
		$('.semail-err').addClass('has-error');
		$('.semail-err-sms').text('This field should not be empty');
		return false;
	}else if(emailValidation(semail) == false){
		$('.semail-err').addClass('has-error');
		$('.semail-err-sms').text('Valid email format is example: something@domain.com');
		return false;
	}
});
//time table profile validation
$('.sv_ttmaster').bind('click',function(){
	var t_email = $('.tinputEmail').val();
	var t_phone = $('.tinputPhone').val();
	var t_username = $('.tinputUsername').val();
	var t_pass = $('.tinputPassword').val();
	var t_pass_length = $('.tinputPassword').val().length;
	var t_repass = $('.tinputRepassword').val();
	
	if(t_email == ''){
		$('.temail-err').addClass('has-error');
		$('.temail-err-sms').text('This field should not be empty');
		return false;
	}else if(emailValidation(t_email) == false){
		$('.temail-err').addClass('has-error');
		$('.temail-err-sms').text('Valid email format is example: something@domain.com');
		return false;
	}
	if(t_phone == ''){
		$('.tphone-err').addClass('has-error');
		$('.tphone-err-sms').text('This field should not be empty');
		return false;
	}else if(phoneNoValidation(t_phone) == false){
		$('.tphone-err').addClass('has-error');
		$('.tphone-err-sms').text('Valid phone number format is example: +255-XXX-XXXXXX OR +255.XXX.XXXXXX OR +255 XXX XXXXXX');
		return false;
	}
	if(t_username == ''){
		$('.tusername-err').addClass('has-error');
		$('.tusername-err-sms').text('This field should not be empty');
		return false;
	}
	if(t_pass == ''){
		$('.tpass-err').addClass('has-error');
		$('.tpass-err-sms').text('This field should not be empty');
		return false;
	}else if(t_pass_length < 8){
		$('.tpass-err').addClass('has-error');
		$('.tpass-err-sms').text('Password should contain atleast eight charaters');
		return false;
	}
	if(t_repass == ''){
		$('.trepass-err').addClass('has-error');
		$('.trepass-err-sms').text('This field should not be empty');
		return false;
	}else if(t_pass != t_repass){
		$('.trepass-err').addClass('has-error');
		$('.trepass-err-sms').text('Passwords should match');
		return false;
	}
});
//examination officer profile validation
$('.sv_examMaster').bind('click',function(){
	var e_email = $('.einputEmail').val();
	var e_phone = $('.einputPhone').val();
	var e_username = $('.einputUsername').val();
	var e_pass = $('.einputPassword').val();
	var e_pass_length = $('.einputPassword').val().length;
	var e_repass = $('.einputRepassword').val();
	
	if(e_email == ''){
		$('.eemail-err').addClass('has-error');
		$('.eemail-err-sms').text('This field should not be empty');
		return false;
	}else if(emailValidation(e_email) == false){
		$('.eemail-err').addClass('has-error');
		$('.eemail-err-sms').text('Valid email format is example: something@domain.com');
		return false;
	}
	if(e_phone == ''){
		$('.ephone-err').addClass('has-error');
		$('.ephone-err-sms').text('This field should not be empty');
		return false;
	}else if(phoneNoValidation(e_phone) == false){
		$('.ephone-err').addClass('has-error');
		$('.ephone-err-sms').text('Valid phone number format is example: +255-XXX-XXXXXX OR +255.XXX.XXXXXX OR +255 XXX XXXXXX');
		return false;
	}
	if(e_username == ''){
		$('.eusername-err').addClass('has-error');
		$('.eusername-err-sms').text('This field should not be empty');
		return false;
	}
	if(e_pass == ''){
		$('.epass-err').addClass('has-error');
		$('.epass-err-sms').text('This field should not be empty');
		return false;
	}else if(e_pass_length < 8){
		$('.epass-err').addClass('has-error');
		$('.epass-err-sms').text('Password should contain atleast eight charaters');
		return false;
	}
	if(e_repass == ''){
		$('.erepass-err').addClass('has-error');
		$('.erepass-err-sms').text('This field should not be empty');
		return false;
	}else if(e_pass != e_repass){
		$('.erepass-err').addClass('has-error');
		$('.erepass-err-sms').text('Passwords should match');
		return false;
	}
});
//lecturer profile validation
$('.sv_lec').bind('click',function(){
	var l_email = $('.linputEmail').val();
	var l_phone = $('.linputPhone').val();
	var l_username = $('.linputUsername').val();
	var l_pass = $('.linputPassword').val();
	var l_pass_length = $('.linputPassword').val().length;
	var l_repass = $('.linputRepassword').val();
	
	if(l_email == ''){
		$('.lemail-err').addClass('has-error');
		$('.lemail-err-sms').text('This field should not be empty');
		return false;
	}else if(emailValidation(l_email) == false){
		$('.lemail-err').addClass('has-error');
		$('.lemail-err-sms').text('Valid email format is example: something@domain.com');
		return false;
	}
	if(l_phone == ''){
		$('.lphone-err').addClass('has-error');
		$('.lphone-err-sms').text('This field should not be empty');
		return false;
	}else if(phoneNoValidation(l_phone) == false){
		$('.lphone-err').addClass('has-error');
		$('.lphone-err-sms').text('Valid phone number format is example: +255-XXX-XXXXXX OR +255.XXX.XXXXXX OR +255 XXX XXXXXX');
		return false;
	}
	if(l_username == ''){
		$('.lusername-err').addClass('has-error');
		$('.lusername-err-sms').text('This field should not be empty');
		return false;
	}
	if(l_pass == ''){
		$('.lpass-err').addClass('has-error');
		$('.lpass-err-sms').text('This field should not be empty');
		return false;
	}else if(l_pass_length < 8){
		$('.lpass-err').addClass('has-error');
		$('.lpass-err-sms').text('Password should contain atleast eight charaters');
		return false;
	}
	if(l_repass == ''){
		$('.lrepass-err').addClass('has-error');
		$('.lrepass-err-sms').text('This field should not be empty');
		return false;
	}else if(l_pass != l_repass){
		$('.lrepass-err').addClass('has-error');
		$('.lrepass-err-sms').text('Passwords should match');
		return false;
	}
});
//admission officer profile validation
$('.sv_adm').bind('click',function(){
	var a_email = $('.ainputEmail').val();
	var a_phone = $('.ainputPhone').val();
	var a_username = $('.ainputUsername').val();
	var a_pass = $('.ainputPassword').val();
	var a_pass_length = $('.ainputPassword').val().length;
	var a_repass = $('.ainputRepassword').val();
	
	if(a_email == ''){
		$('.aemail-err').addClass('has-error');
		$('.aemail-err-sms').text('This field should not be empty');
		return false;
	}else if(emailValidation(a_email) == false){
		$('.aemail-err').addClass('has-error');
		$('.aemail-err-sms').text('Valid email format is example: something@domain.com');
		return false;
	}
	if(a_phone == ''){
		$('.aphone-err').addClass('has-error');
		$('.aphone-err-sms').text('This field should not be empty');
		return false;
	}else if(phoneNoValidation(a_phone) == false){
		$('.aphone-err').addClass('has-error');
		$('.aphone-err-sms').text('Valid phone number format is example: +255-XXX-XXXXXX OR +255.XXX.XXXXXX OR +255 XXX XXXXXX');
		return false;
	}
	if(a_username == ''){
		$('.ausername-err').addClass('has-error');
		$('.ausername-err-sms').text('This field should not be empty');
		return false;
	}
	if(a_pass == ''){
		$('.apass-err').addClass('has-error');
		$('.apass-err-sms').text('This field should not be empty');
		return false;
	}else if(a_pass_length < 8){
		$('.apass-err').addClass('has-error');
		$('.apass-err-sms').text('Password should contain atleast eight charaters');
		return false;
	}
	if(a_repass == ''){
		$('.arepass-err').addClass('has-error');
		$('.arepass-err-sms').text('This field should not be empty');
		return false;
	}else if(a_pass != a_repass){
		$('.arepass-err').addClass('has-error');
		$('.arepass-err-sms').text('Passwords should match');
		return false;
	}
});
//admin profile validation
$('.sv_ad_2').bind('click',function(){
	var fname = $('.inputFname').val();
	var mname = $('.inputMname').val();
	var sname = $('.inputSname').val();
	var nationality = $('.inputNationality').val();
	
	if(fname == ""){
		$('.pfname-err').addClass('has-error');
		$('.pfname-err-sms').text('This field is required');
		return false;
	}else if(allLetter(fname) == false){
		$('.pfname-err').addClass('has-error');
		$('.pfname-err-sms').text('Letters only and no space.');
		return false;
	}
	if(mname == ""){
		$('.pmname-err').addClass('has-error');
		$('.pmname-err-sms').text('This field is required');
		return false;
	}else if(allLetter(mname) == false){
		$('.pmname-err').addClass('has-error');
		$('.pmname-err-sms').text('Letters only and no space.');
		return false;
	}
	if(sname == ""){
		$('.psname-err').addClass('has-error');
		$('.psname-err-sms').text('This field is required');
		return false;
	}else if(allLetter(sname) == false){
		$('.psname-err').addClass('has-error');
		$('.psname-err-sms').text('Letters only and no space.');
		return false;
	}
	if(nationality == ""){
		$('.pnationality-err').addClass('has-error');
		$('.pnationality-err-sms').text('This field is required');
		return false;
	}else if(nationalityValidation(nationality) == false){
		$('.pnationality-err').addClass('has-error');
		$('.pnationality-err-sms').text('Letters Only');
		return false;
	}
});
$('.inputEmail,.inputPhone,.inputMarital,.inputHome,.inputPassword,.inputRepassword,.inputBankName,.inputBankBranch,.inputAccountNo,.inputSponsorName,.inputSponsorPhone,.inputSponsorEmail,.tinputEmail,.tinputPhone,.tinputUsername,.tinputPassword,.tinputRepassword,.einputEmail,.einputPhone,.einputUsername,.einputPassword,.einputRepassword,.linputEmail,.linputPhone,.linputUsername,.linputPassword,.linputRepassword,.ainputEmail,.ainputPhone,.ainputUsername,.ainputPassword,.ainputRepassword,.inputFname,.inputMname,.inputSname,.inputNationality').keyup(function(){
	$('.email-err,.phone-err,.marital-err,.home-err,.pass-err,.repass-err,.bname-err,.bbranch-err,.accountno-err,.sname-err,.sphone-err,.semail-err,.temail-err,.tphone-err,.tusername-err,.tpass-err,.trepass-err,.eemail-err,.ephone-err,.eusername-err,.epass-err,.erepass-err,.lemail-err,.lphone-err,.lusername-err,.lpass-err,.lrepass-err,.aemail-err,.aphone-err,.ausername-err,.apass-err,.arepass-err,.pfname-err,.pmname-err,.psname-err,.pnationality-err').removeClass('has-error');
	$('.email-err-sms,.phone-err-sms,.marital-err-sms,.home-err-sms,.pass-err-sms,.repass-err-sms,.bname-err-sms,.bbranch-err-sms,.accountno-err-sms,.sname-err-sms,.sphone-err-sms,.semail-err-sms,.temail-err-sms,.tphone-err-sms,.tusername-err-sms,.tpass-err-sms,.trepass-err-sms,.eemail-err-sms,.ephone-err-sms,.eusername-err-sms,.epass-err-sms,.erepass-err-sms,.lemail-err-sms,.lphone-err-sms,.lusername-err-sms,.lpass-err-sms,.lrepass-err-sms,.aemail-err-sms,.aphone-err-sms,.ausername-err-sms,.apass-err-sms,.arepass-err-sms,.pfname-err-sms,.pmname-err-sms,.psname-err-sms,.pnationality-err-sms').text('');
});
//for checking account number contains allnumeric.
	function accountNoValidation(parameter){    
		var numbers = /^[0-9]+$/.test(parameter);
		if(numbers == true){  
			return true;  
		}else{    
			return false;  
		}  
	}
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