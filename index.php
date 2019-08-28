<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>APP NAME</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body a link="white" vlink="white">
<div class="box">
<h2> Login <h2>
<form method="post" action="index.php">
<div class="inputBox">
    <input type="text" name="username" autocomplete="off" required>
<label>Username</label>
</div>
<div class="inputBox">
<input type="password" name="password" autocomplete="off" required>
<label>Password</label>
</div>
<input type="submit" name="submit" value="SIGN IN">
<br>
<br>

<div style="font-size: 0.8em; text-align: center;">
    <label> Not a member yet?</label> <a href="signup.php">SIGN UP</a>
<br>
<a href="reset-password.php">Forgot my password</a>
</div>
<?php
require('connectToDb.php');

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
        $password = $_POST['password'];
	$getlogindetails = "SELECT * FROM login WHERE uname = '$username' and password = '$password'";
	$selectresult = mysqli_query($db,$getlogindetails);
        
	$result= mysqli_fetch_assoc($selectresult);
	if(mysqli_num_rows($selectresult)>0) {
		header("refresh:0;url=profScreen.php"); 
		//echo $result['uname'] . " " . "has succesfully Logged in";
	}
	else
	{
		echo "Invalid Username and Password. Please try again.";
	}
}
function create_user($name,$username, $password, $cpassword, $email,$dob)
{

	  $ins = "INSERT INTO profile(name,email,image,type,dob) VALUES ('$name','$email','image','student','$dob')";     
	  $result = mysqli_query($db,$ins);
          
	  $ret = "SELECT profileid FROM profile WHERE email = '$email'";
	  $retrive = mysqli_query($db,$ret);
          
	  $row = mysqli_fetch_assoc($retrive);
	  $new =  $row['profileid'];
	  
          $insLogin = "INSERT INTO login(uname,password,profilefk) VALUES ('$username','$password','$new')";
	  $resLogin = mysqli_query($db,$insLogin);
      
          if($resLogin){
		   mysqli_close($db);
          return true; // Success
      }
	  else{
		   mysqli_close($db);
           return false; // Error somewhere
      }
	  
	}
?>
</form>
</div>
</body>
</html>