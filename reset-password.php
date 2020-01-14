<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Input form UI Design</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body a link="white" vlink="white">
<div class="box">
<h2> Recover password <h2>
<div style="font-size: 0.7em; text-align: center;">
<p>Please enter your email account so we can assist you in recovering your account.</p>
</div>
<form method="post" action="reset-password.php">
<div class="inputBox">
<input type="text" name="email" placeholder="Enter your e-mail address...">
</div>
<input type="submit" name="submit" value="Recover my Password">
<br />
<?php
if(isset($_POST['email']) && ($_POST['email']!=""))
{
	$email = trim($_POST['email']);
	$code = md5(uniqid(true));
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo "Invalid email format."; 
		
	}
	else
	{
	  $db = mysqli_connect('localhost','login','login','masterdb')
	  or die('Error connecting to MYSQL server.');
	  $ret = "SELECT profileid FROM profile WHERE email = '$email'";
	  $retrive = mysqli_query($db,$ret);
	  $row = mysqli_fetch_assoc($retrive);
	  $new =  $row['profileid'];
	  if($row > 0)
	  {
	  $updateLogin = "UPDATE login SET password='$code' WHERE profilefk = '$new'";

	  $to = $email;
	  $subject = "reset password link";
	  $headers = "MIME-Version: 1.0" . "\r\n";
	  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
	  $headers .= 'From: <swa.swati228@gmail.com>' . "\r\n";
      $headers .= 'Cc: myboss@example.com' . "\r\n";
	  
	  $body = "here is your link to reset your password
	  For active your account, visit the link below to complete :
	  http://www.educationapp.com/updatepassword.php?email=$email&code=$code";
	  //mail("swa.swati228@gmail.com",$subject,$body,$headers);
	  
	  if($updateLogin)
	  {
		  echo("<h6>An email has been sent to your email address with a link to reset your password!</h6> <br/>");
		  
	  }
	  }
	  else
	  {
		  echo ("Oops! Sorry, $email doesnot belong to any account!");
	  }
	  mysqli_close($db);
}
}

?>
</form>
</div>
</body>
</html>