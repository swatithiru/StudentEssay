<?php
require('connectToDb.php');

$student_query ="SELECT * FROM profile ORDER BY profileid ASC";
$student_result = mysqli_query($db,$student_query);
$student_list = '';
while($row = mysqli_fetch_array($student_result))
{
	$student_list .= '
   <li><a href="#'.$row["profileid"] .$row["name"].'</a></li>
  ';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/mainscreenstyle.css">
<script src="assets/js/mainscreenfunc.js"></script>

</head>
<body onload="getDefault()">
<h2 align="center">Professor Activity Screen</h2>

<form method="post" action="main_screen.php">
    <button class="tablink" onclick="openPage('Student_list', this, 'orange')" id="defaultOpen">Student List</button>
    <button class="tablink" onclick="openPage('Act', this, 'orange')">Activity</button>
    <button class="tablink" onclick="openPage('Add_stu', this, 'orange')">Add Student</button>
    <button class="tablink" onclick="openPage('Add_Title', this, 'orange')">Add Topic</button>

<div id="Student_list" class="tabcontent">
<h3> List Of Students Enrolled</h3>
<?php

$student_query ="SELECT name FROM profile ORDER BY profileid";
$result = mysqli_query($db,$student_query);
$array = Array();
$count = 1;
while($row1 = mysqli_fetch_assoc($result))
{
	echo  $count . " " . $row1['name'] . "<br>";
	$count++;
}

?>
</div>

<div id="Act" class="tabcontent">
  <h3>Activity</h3>
  <p>List of activities</p> 
</div>

<div id="Add_stu" class="tabcontent">
    <h3>Add new Student</h3>
    <div class="inputBox">
        <input type="text" name="name" required="">
        <label>Enter your name</label>
    </div>
    <div class="inputBox">
        <input type="email" name="email" required="">
        <label>Enter your Email</label>
    </div>
    <div class="inputBox">
        <input type="text" name="eng" value="English">
        <label>Course enrolled</label>
    </div>
    <div class="inputBox">
        <input type="text" name="prof" value="Prof John Romig">
        <label>Professor Name</label>
    </div>
    <div style="text-align: center;">
        <input type="submit" name="submit" value="Register">
    </div>
<br>
<?php
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
        $email = $_POST['email'];
	$password = random_password(8);
	if (is_valid_email($email))
    {
        if (create_user($name, $email, $password)) {
				
						echo 'New User Registered Successfully . Re directing to student list page.....';
						header("refresh:3;url=main_screen.php"); 
						exit;
					  
			  
        }else{
          echo 'Error Registering User!';
        }
	}
}
function random_password($len)
{
   $pass = "";
   $charac = "abcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   $size = strlen($charac);
   for ($i = 0; $i < $len; $i++) {
       $pass .= $charac[rand(0, $size - 1)];
   }
   return $pass; 
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
function create_user($name,$email, $password)
{

	  $ins = "INSERT INTO profile(name,email,image,type,dob) VALUES ('$name','$email','image','student','')";     
	  $result = mysqli_query($db,$ins);
	  
          $ret = "SELECT profileid FROM profile WHERE email = '$email'";
	  $retrive = mysqli_query($db,$ret);
	  
          $row = mysqli_fetch_assoc($retrive);
	  $new =  $row['profileid'];
	  
          $insLogin = "INSERT INTO login(uname,password,profilefk) VALUES ('$email','$password','$new')";
	  $resLogin = mysqli_query($db,$insLogin);
      if($resLogin){
          return true; // Success
      }
	  else{
           return false; // Error somewhere
      }
	  
	}
?>

</div>
<div id="Add_Title" class="tabcontent">
    <h3>Add Topic</h3>
    <input type="checkbox" name="advancecheck" id="advancecheck" value="enter topic" onchange="valueChanged()"/> Topic Name<br />
    
    <div id="subnetmaskdiv" style="display:none;">
        <input type="text" name="subnetmask" id="subnetmask"><br>
    </div>
    
    <input type="checkbox" name="image" id="image" value="upload image" onchange="uploadimg()"/> Add Image<br />
    <div id="upload" style="display:none;">
        <input type="file" name="file" id="uploadfile"/><br>
    </div>
    
    <input type="checkbox" name="spellcheck" value="spellcheck">Spell Check(Enable/Disable)<br>
    
    <input spellcheck="true" type="text"/><br>
    
    <div style="text-align: center;">
    <input type="submit" name="Enter" onclick="fun()" value="Enter">
    <p id="demo"></p>
</div>
<br>
<br>
<?php

    $ins = "INSERT INTO essay(topic,picture,spellcheck) VALUES ('nov','','1')";     
    $result = mysqli_query($db,$ins);
    if($result){
        mysqli_close($db);
        echo "<script>printMessage()</script>";           
      }
    else{
        mysqli_close($db);
        echo "error registering";
      }
 
?>

</div>
</form>
</body>
</html> 
