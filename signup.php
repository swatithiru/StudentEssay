<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="box">
    <h2> SIGN UP </h2>
    <form method="post" action="signup.php">
        <div class="inputBox">
            <input type="text" name="name" autocomplete="off" required>
            <label>Name</label>
        </div>
        <div class="inputBox">
            <input type="email" name="email" autocomplete="off" required>
            <label>Email</label>
        </div>
        <div class="inputBox">
            <input type="text" name="username" autocomplete="off" required>
            <label>Username</label>
        </div>
        <div class="inputBox">
            <input name="date" type="text" onfocus="(this.type='date')" onfocusout="(this.type='text')">
            <label>Date of Birth</label>
        </div>
        <div class="inputBox">
            <input type="password" name="password" autocomplete="off" required>
            <label>Password</label>
        </div>
        <div class="inputBox">
            <input type="password" name="confirmpassword" autocomplete="off" required>
            <label>Confirm Password</label>
        </div>
        <input type="submit" name="submit" value="SIGNUP"><br>
<?php
require('connectToDb.php');

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
	$dob = $_POST['date'];
	if (is_valid_email($email) && is_valid_passwords($password,$cpassword))
    {
        if (create_user($name, $username, $password, $cpassword, $email,$dob)) {
				
						echo 'New User Registered Successfully.';
						header("refresh:3;url=login.php"); 
						exit;
					  
			  
        }else{
          echo 'Error Registering User!';
        }
	}
}
function is_valid_email($email)
{
	if(empty($email))
	{
		echo "Email is required.";
		return false;
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo "Invalid email format."; 
		return false;
	}
		$slquery = "SELECT 1 FROM profile WHERE email = '$email'";
		$selectresult = mysqli_query($db,$slquery);
		if(mysqli_num_rows($selectresult)>0) {
		echo 'This email already exists.';
		return false;
		}
	return true;
}
function is_valid_passwords($password,$cpassword) 
{
if(empty($password))
	{
            echo "Password is required.";
            return false;
	}
	else if($password != $cpassword)
	{
            echo 'Your passwords do not match. Please type carefully.';
            return false;
	}
return true;	
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