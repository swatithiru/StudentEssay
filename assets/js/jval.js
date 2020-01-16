$(function() {
	$("#user_error").hide();
	$("#password_error").hide();
	$("#confirm_error").hide();
	$("#email_error").hide();
	
	var error_username = false;
	var error_password = false;
	var error_confirmpassword = false;
	var error_email = false;
	
	$("#user").focusout(function(){
		alert("test");
	});
	
});