<html>
	<head>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script>
	$(function() {
		$("#user_error").hide();
		$("#password_error").hide();
		$("#confirm_error").hide();
		$("#email_error").hide();
		
		var error_username = false;
		var error_password = false;
		var error_confirmpassword = false;
		var error_email = false;
		
		$("#form_username").focusout(function(){
			check_username();
		});
		
		$("#form_password").focusout(function(){
			check_password();
		});
		
		$("#confirmpassword").focusout(function(){
			check_confirmpassword();
		});
		
		$("#form_email").focusout(function(){
			check_email();
		});
		
		function check_username() {
			var username_length = $("#form_username").val().length;
			if(username_length < 5 || username_length > 20)
			{
				$("#user_error").html("Should be between 5-20 characters");
				$("#user_error").show();
				error_username = true;
			}
			else
			{
				$("#user_error").hide();
			}
			
		}
		
		function check_password() {
			var password_length = $("#form_password").val().length;
			if(password_length < 5 || password_length > 20)
			{
				$("#password_error").html("At least 8 characters");
				$("#password_error").show();
				password_error = true;
			}
			else
			{
				$("#password_error").hide();
			}
			
		}
		
		function check_confirmpassword() {
			var password = $("#form_password").val().length;
			var confirmpassword = $("#confirm_error").val().length;
			if(password != confirmpassword)
			{
				$("#confirm_error").html("Passwords don't match");
				$("#confirm_error").show();
				error_confirmpassword = true;
			}
			else
			{
				$("#confirm_error").hide();
			}
			
		}
		
		function check_email() {
			var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
			if(pattern.test($("#form_email").val()))
			{
			$("#email_error").hide();	
			}
			else
			{
				
				$("#email_error").html("Invalid email address");
				$("#email_error").show();
				error_email = true;
			}
			
		}
		
	});		
	</script>
	</head>
	<body>
	<h1> Create an Account </h1>
	<form id="registration" action="real.php" method="post">
	<table>
	<tr><td>Choose Username: </td><td><input type="text" class="form_text" id="form_username"></td><td><span class="error_form" id="user_error"></span></td></tr>
	<tr><td>Password: </td><td><input type="password" class="form_text" id="form_password"></td><td><span class="error_form" id="password_error"></span></td></tr>
	<tr><td>Retype Password: </td><td><input type="password" class="form_text" id="confirmpassword"></td><td><span class="error_form" id="confirm_error"></span></td></tr>
	<tr><td>Email: </td><td><input type="text" class="form_text" id="form_email"></td><td><span class="error_form" id="email_error"></span></td></tr>
	<tr><td></td><td><input type="submit" class="form_text" value="Create Account"></td></tr>
	</table>
	</form>
	
	</body>
</html>