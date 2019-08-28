<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/mainscreenstyle.css">
<script src="assets/js/mainscreenfunc.js"></script>
<style>
.navbar {
  overflow: hidden;
  background-color: #03a9f4;
}

.navbar a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 10px 10px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  text-align: right;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body onload="getDefault()">
    <div class="navbar">
    <div class="dropdown">
    <button class="dropbtn">signout? <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
</div>
<form method="post" action="profScreen.php">
    <button class="tablink" onclick="openPage('Student_list', this, 'orange')" id="defaultOpen">Student List</button>
    <button class="tablink" onclick="openPage('Act', this, 'orange')">Activity</button>
    <button class="tablink" onclick="openPage('Add_stu', this, 'orange')">Add Student</button>
    <button class="tablink" onclick="openPage('Add_Title', this, 'orange')">Add Topic</button>

<div id="Student_list" class="tabcontent">
<h3> List Of Students Enrolled</h3>
<?php
 require('connectToDb.php');
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
						header("refresh:0;url=profScreen.php"); 
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
                require('connectToDb.php');
		$slquery = "SELECT 1 FROM profile WHERE email = '$email'";
		$selectresult = mysqli_query($db,$slquery);
		if(mysqli_num_rows($selectresult)>0) {
		echo 'This email already exists.';
		return false;
		}
	return true;
}
function create_user($name,$email, $pass)
{
          require('connectToDb.php');
	  $ins = "INSERT INTO profile(name,email,image,type,dob) VALUES ('$name','$email','image','student','')";     
	  $result = mysqli_query($db,$ins);
	  
          $ret = "SELECT profileid FROM profile WHERE email = '$email'";
	  $retrive = mysqli_query($db,$ret);
	  
          $row = mysqli_fetch_assoc($retrive);
	  $new =  $row['profileid'];
	  
          $insLogin = "INSERT INTO login(uname,password,profilefk) VALUES ('$email','$pass','$new')";
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
if(isset($_POST['Enter']))
{
    echo 'entered';
}
//    $ins = "INSERT INTO essay(topic,picture,spellcheck) VALUES ('nov','','1')";     
//    $result = mysqli_query($db,$ins);
//    if($result){
//        mysqli_close($db);
//        echo "<script>printMessage()</script>";           
//      }
//    else{
//        mysqli_close($db);
//        echo "error registering";
//      }
 ?>
</div>
</form>
</body>
</html> 
