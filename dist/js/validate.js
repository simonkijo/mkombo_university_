//book validation
$('.new_book').click(function(){

	var b_id = $('.book_id').val();
	var title  = $('.book_title').val();
	var author  = $('.book_author').val();
	var publisher = $('.book_publisher').val();
	var category  = $('.book_category').val();
 if(b_id == ""){
$('.handle_error').addClass('has-error');
$('.book_error').text("Enter book id");
 return false;
}else if(bookValidation(b_id)==false)
{
$('.handle_error').addClass('has-error');
$('.book_error').text("Numbers Only");
return false;
}
if(title == ""){
$('.handle_error_title').addClass('has-error');
$('.title_error').text("Enter Book Title");
 return false;
}else if(allLetterAndSpace(title)==false)
{
$('.handle_error_title').addClass('has-error');
$('.title_error').text("letters Only");
return false;
}

if(author == ""){
$('.handle_error_author').addClass('has-error');
$('.author_error').text("Enter Author name");
 return false;
}else if(allLetterAndSpas(author)==false)
{
$('.handle_error_author').addClass('has-error');
$('.author_error').text("letters Only");
return false;
}


if(publisher == ""){
$('.handle_error_publisher').addClass('has-error');
$('.publisher_error').text("Enter publisher name");
 return false;
}else if(allLetter(publisher)==false)
{
$('.handle_error_publisher').addClass('has-error');
$('.publisher_error').text("letters Only");
return false;
}

if(category == ""){
$('.handle_error_category').addClass('has-error');
$('.category_error').text("Enter category name");
 return false;
}else if(allLetter(category)==false)
{
$('.handle_error_category').addClass('has-error');
$('.category_error').text("letters Only");
return false;
}

});

	
	$('.book_id,.book_title,.book_author,.book_publisher').keyup(function(){
		$('.handle_error,.handle_error_title,.handle_error_author,.handle_error_publisher').removeClass('has-error');
		$('.book_error,.title_error,.author_error,.publisher_error').text('');
	});  
	
//Validate change password
$('.recover').click(function(){
	var username = $('.username').val();
	var email  = $('.email').val();
	var password1= $('.password').val();
	var repassword = $('.repassword').val();
if(username == ""){
$('.handle_error_username').addClass('has-error');
$('.username_error').text("Enter Username");
 return false;
}
if(email == ""){
$('.handle_error_email').addClass('has-error');
$('.email_error').text("Enter Email");
 return false;
}

if(password1 == ""){
$('.handle_error_password').addClass('has-error');
$('.password_error').text("Enter Password");
 return false;
}

if(repassword == ""){
$('.handle_error_repassword').addClass('has-error');
$('.repassword_error').text("Reconfirm  Password");
 return false;
}
});

$('.username,.email,.password,.repassword').keyup(function(){
		$('.handle_error_username,.handle_error_email,.handle_error_password,.handle_error_repassword').removeClass('has-error');
		$('.username_error,.email_error,.password_error,.repassword_error').text('');
	});
	
	
	
//validating brrored book
$('.borrow').click(function(){
	var book = $('.book').val();
	var student  = $('.student').val();
	var issue  = $('.issue').val();
	var due = $('.due').val();
	var librarian  = $('.librarian').val();
if(book == ""){
$('.handle_error_book').addClass('has-error');
$('.book_error').text("Enter book id");
 return false;
}else if(bookValidation(book)==false)
{
$('.handle_error_book').addClass('has-error');
$('.book_error').text("Numbers Only");
return false;
}

if(student == ""){
$('.handle_error_student').addClass('has-error');
$('.student_error').text("Enter Student id");
 return false;
}else if(bookValidation(student)==false)
{
$('.handle_error_student').addClass('has-error');
$('.student_error').text("Numbers  Only");
return false;
}

if(issue == ""){
$('.handle_error_issue').addClass('has-error');
$('.issue_error').text("Enter Issue Date ");
 return false;
}

if(due == ""){
$('.handle_error_due').addClass('has-error');
$('.due_error').text("Enter due Date ");
 return false;
}


if(librarian == ""){
$('.handle_error_librarian').addClass('has-error');
$('.librarian_error').text("Librarian Name");
 return false;
}else if(allLetter(librarian)==false)
{
$('.handle_error_librarian').addClass('has-error');
$('.librarian_error').text("letters Only");
return false;
}
});

$('.book,.student,.issue,.due,.librarian').keyup(function(){
		$('.handle_error_book,.handle_error_student,.handle_error_issue,.handle_error_due,.handle_error_librarian').removeClass('has-error');
		$('.book_error,.student_error,.issue_error,.due_error,.librarian_error').text('');
	});
	
	
	
//validatent returned book

$('.receive_book').click(function(){
	var book2 = $('.book2').val();
	var student2  = $('.student2').val();
	
if(book2 == ""){
$('.handle_error_book2').addClass('has-error');
$('.book2_error').text("Enter book id");
 return false;

}else if(bookValidation(book2)==false)
{
$('.handle_error_book2').addClass('has-error');
$('.book2_error').text("Numbers only");
return false;
}
if(student2 == ""){
$('.handle_error_student2').addClass('has-error');
$('.student2_error').text("Enter Student id");
 return false;
}else if(bookValidation(student2)==false)
{
$('.handle_error_student2').addClass('has-error');
$('.student2_error').text(" Numbers Only");
return false;
}

});

$('.book2,.student2').keyup(function(){
		$('.handle_error_book2,.handle_error_student2').removeClass('has-error');
		$('.book2_error,.student2_error').text('');
		
	});
	
	
	


	
	
	//validating book_borrow book

$('.book_borrow').click(function(){
	var book = $('.book').val();
	var student  = $('.student').val();
	var issue  = $('.issue').val();
	var due = $('.due').val();
	var librarian  = $('.librarian').val();
if(book == ""){
$('.handle_error_book').addClass('has-error');
$('.book_error').text("Enter book id");
 return false;
}else if(bookValidation(book)==false)
{
$('.handle_error_book').addClass('has-error');
$('.book_error').text("Numbers Only");
return false;
}

if(student == ""){
$('.handle_error_student').addClass('has-error');
$('.student_error').text("Enter Student id");
 return false;
}else if(bookValidation(student)==false)
{
$('.handle_error_student').addClass('has-error');
$('.student_error').text("Numbers  Only");
return false;
}

if(issue == ""){
$('.handle_error_issue').addClass('has-error');
$('.issue_error').text("Enter Issue Date ");
 return false;
}

if(due == ""){
$('.handle_error_due').addClass('has-error');
$('.due_error').text("Enter due Date ");
 return false;
}


if(librarian == ""){
$('.handle_error_librarian').addClass('has-error');
$('.librarian_error').text("Librarian Name");
 return false;
}else if(allLetter(librarian)==false)
{
$('.handle_error_librarian').addClass('has-error');
$('.librarian_error').text("letters Only");
return false;
}
});

$('.book,.student,.issue,.due,.librarian').keyup(function(){
		$('.handle_error_book,.handle_error_student,.handle_error_issue,.handle_error_due,.handle_error_librarian').removeClass('has-error');
		$('.book_error,.student_error,.issue_error,.due_error,.librarian_error').text('');
	});
	



//add classrooms validation

$('.add_classrooms').click(function(){
	var room = $('.class_id').val();
	var name  = $('.class_name').val();
	var chair = $('.chair').val();
	var description = $('.description').val();
	var status = $('.status').val();
if(room == ""){
$('.handle_error').addClass('has-error');
$('.class_error').text("Enter room id");
 return false;

}else if(allNumber(room)==false)
{
$('.handle_error').addClass('has-error');
$('.class_error').text("Numbers only");
return false;
}
if(name == ""){
$('.handle_error_name').addClass('has-error');
$('.name_error').text("Enter room name");
 return false;
}else if(lettersNumberNoSpace(name)==false)
{
$('.handle_error_name').addClass('has-error');
$('.name_error').text(" letters Only");
return false;
}

if(chair == ""){
$('.handle_error_chair').addClass('has-error');
$('.chair_error').text("Enter number");
 return false;
}else if(allNumber(chair)==false)
{
$('.handle_error_chair').addClass('has-error');
$('.chair_error').text(" numbers Only");
return false;
}


if(description == ""){
$('.handle_error_description').addClass('has-error');
$('.description_error').text("Enter description");
 return false;
}else if(allLetterAndSpace(description)==false)
{
$('.handle_error_description').addClass('has-error');
$('.description_error').text(" letters Only");
return false;
}

if(status == ""){
$('.handle_error_status').addClass('has-error');
$('.status_error').text("Enter description");
 return false;
}else if(allLetterAndSpace(status)==false)
{
$('.handle_error_status').addClass('has-error');
$('.status_error').text(" letters Only");
return false;
}
});

$('.class_id,.class_name,.chair,.description,.status').keyup(function(){
		$('.handle_error,.handle_error_name,.handle_error_chair,.handle_error_description,.handle_error_status').removeClass('has-error');
		$('.class_error,.name_error,.chair_error,.description_error,.status_error').text('');
		
	});
	
	
	
//validating enter financial record

$('.enter_financial').click(function(){
	var amount = $('.amount').val();
	var student  = $('.student').val();
	var purpose  = $('.purpose').val();
	var code = $('.code').val();
if(student == ""){
$('.handle_error').addClass('has-error');
$('.student_error').text("Enter student id");
 return false;
}else if(allNumber(student)==false)
{
$('.handle_error').addClass('has-error');
$('.student_error').text("Numbers Only");
return false;
}

if(amount == ""){
$('.handle_error_amount').addClass('has-error');
$('.amount_error').text("Enter amountxx");
 return false;
}else if(bookValidation(amount)==false)
{
$('.handle_error_amount').addClass('has-error');
$('.amount_error').text("Numbers Only");
return false;
}



if(purpose == ""){
$('.handle_error_purpose').addClass('has-error');
$('.purpose_error').text("purpose");
 return false;
}else if(allLetterAndSpace(purpose)==false)
{
$('.handle_error_purpose').addClass('has-error');
$('.purpose_error').text("letters Only");
return false;
}

if(code == ""){
$('.handle_error_code').addClass('has-error');
$('.code_error').text("receipt code");
 return false;
}else if(allNumber(code)==false)
{
$('.handle_error_code').addClass('has-error');
$('.code_error').text("Number only");
return false;
}

});
$('.amount,.student,.purpose,.code').keyup(function(){
		$('.handle_error,.handle_error_amount,.handle_error_purpose,.handle_error_code').removeClass('has-error');
		$('.book_error,.amount_error,.purpose_error,.code_error').text('');
	});
	
	


// validate the busar login form
$('.bursar_in').click(function(){
	var username = $('.username').val();
	var passwordi  = $('.password').val();
	
if(username == ""){
$('.control_error_username').addClass('has-error');
$('.username_error').text("Enter username ");
 return false;

}else if(lettersNumberAndSpace(username)==false)
{
$('.control_error_username').addClass('has-error');
$('.username_error').text("letters only");
return false;
}
if(passwordi == ""){
$('.control_error_password').addClass('has-error');
$('.password_error').text("Enter password");
 return false;
}else if(lettersNumberNoSpace(passwordi)==false)
{
$('.control_error_password').addClass('has-error');
$('.password_error').text("letters or numbers");
return false;
}

});

$('.username,.password').keyup(function(){
		$('.control_error_username,.control_error_password').removeClass('has-error');
		$('.username_error,.password_error').text('');
		
	});	
	
	
	
	//validate the profile
	
$('.change').click(function(){
	var fname = $('.fname').val();
	var sname  = $('.sname').val();
	var email  = $('.email').val();
	var phone = $('.phone').val();
	var password  = $('.password').val();
	var repassword  = $('.repassword').val();
if(fname == ""){
$('.error_fname').addClass('has-error');
$('.fname_error').text("Enter full Name");
 return false;
}
else if(allLetterAndSpace(fname)==false)
{
$('.error_fname').addClass('has-error');
$('.fname_error').text("letters only");
return false;
}

if(email == ""){
$('.error_email').addClass('has-error');
$('.email_error').text("email here");
 return false;
}

if(phone == ""){
$('.error_phone').addClass('has-error');
$('.phone_error').text("Enter phone");
 return false;
}else if(allLetter(phone)==true)
{
$('.error_phone').addClass('has-error');
$('.phone_error').text("Letters not allowed");
return false;
}

if(sname == ""){
$('.error_sname').addClass('has-error');
$('.sname_error').text("Enter Position");
 return false;
}else if(allLetter(sname)==false)
{
$('.error_sname').addClass('has-error');
$('.sname_error').text("Letters Only");
return false;
}


if(password == ""){
$('.error_password').addClass('has-error');
$('.password_error').text("Enter password");
 return false;
}


if(repassword == ""){
$('.error_repassword').addClass('has-error');
$('.repassword_error').text("retype password");
 return false;
}else if(password != repassword)
{
$('.error_repassword').addClass('has-error');
$('.repassword_error').text("password missmatch");
return false;
}

});

$('.fname,.sname,.email,.phone,.password').keyup(function(){
		$('.error_fname,.error_sname,.error_email,.error_phone,.error_password,.error_repassword').removeClass('has-error');
		$('.fname_error,.sname_error,.email_error,.phone_error,.password_error,.repassword_error').text('');
	});
	


	
// validate the admin block part
$('.block').click(function(){
	var block_name = $('.block_name').val();
	var statusi  = $('.statusi').val();
		//alert('julius');
if(block_name == ""){
$('.handle_error_block').addClass('has-error');
$('.block_error').text("Enter username ");
 return false;
}
else if(allLetter(block_name)==false)
{
$('.handle_error_block').addClass('has-error');
$('.block_error').text("letters");
return false;
}
if(statusi == ""){
$('.handle_error_status').addClass('has-error');
$('.statusi_error').text("Enter status");
 return false;
}
else if(allLetter(statusi)==false)
{
$('.handle_error_status').addClass('has-error');
$('.statusi_error').text("letters only");
return false;
}
});
$('.block_name,.statusi').keyup(function(){
		$('.handle_error_block,.handle_error_status').removeClass('has-error');
		$('.block_error,.statusi_error').text('');
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


// for letter number and space
function lettersNumberAndSpace(parameter){    
	var letters = /^[A-Za-z0-9 ]+$/.test(parameter);
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

	