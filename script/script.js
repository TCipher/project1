	$(document).ready(function(){
	//$(".dashboardtoggler").on("click" function(){
		//$(".wrapper").toggleClass("active");
		
	//});


	//registration form validation.
	$('#form1').submit(function(e){
		//a listener that prevents the default submission of the form data when it is called.
		e.preventDefault();

		//form  fields variable initilization
		var firstname = $('#Fname').val();
		var lastname = $('#Lname').val();
		var email = $('#Email').val();
		var password= $('#Password').val();
		var address = $('#Address').val();
		var city = $('#City').val();
		var phone = $('#Phone').val();
		var state = $('#state').val();

		//initializing the variables with regular expresions for valid entry.
		var Fname_regx = /^[a-zA-Z-_.,']+$/;
		var Lname_regx = /^[a-zA-Z-_.,']+$/;
		var email_regx = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
		var pswd_regx = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#\$%\^&\_*])(?=.*[A-Z])[0-9a-zA-Z!@#\$%\^&\_*]{8,}$/;
		var add_regex = /^[0-9a-zA-Z\-\s]+$/;
		var phone_regex = /^([0-9]{11,})*$/;

 	$(".error").remove();
		//validating empty field input
		if (firstname.length == "" || lastname.length == "" || email.length == "" 
			|| password.length == "" || address.length == "" ||  phone.length == "") {
			$('#head').html('<span class="error">*All fields are required*</span>');
			$('#firstname').focus();
			return false; 

		//validating firstname field
	}else if(!firstname.match(Fname_regx) ||firstname.length == "")
	{
		$('#Fname').after('<span class="error text-danger"> please enter a valid First name</span>');
		$('#Fname').focus();
		return false;
		//validating Lastname field
	}
	else if(!lastname.match(Lname_regx) || lastname.length == "")
	{

		$('#Lname').after('<span class="error text-danger"> please enter a valid Last name</span>');
		$('#Lname').focus();
		return false;
		//validating email fied
	}else if(!email.match(email_regx) || email.length== "")
	{
		$('#Email').after('<span class="error text-danger"> please enter a valid Email Address</span>');
		$('#Email').focus();
		return false;
		//validating password field
	}else if(!password.match(pswd_regx) || password.length == "")
	{
		$('#Password').after('<span class="error text-danger">invalid password must contain at least a lowercase,uppercase,digits and special character</span>');
		$('#Password').focus();
		return false;

	}else if(!address.match(add_regex) || address.length == "")
	{
		$('#Address').after('<span class="error"> please enter a valid Address</span>');
		$('#Address').focus();
		return false;
	}else if(!phone.match(phone_regex) || phone.length == "")
	{
		$('#Phone').after('<span class="error text-danger"> please enter a valid Phone</span>');
		return false;
		$('#Phone').focus();
		return false;
	}else{
		$('#alert').text('Your Form has been submitted Sucessfully! Check your mail for confirmation');
	return true;

	}


});
	
		
});
