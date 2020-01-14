<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/mainscreenstyle.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="assets/js/mainscreenfunc.js"></script>
<script src="assets/js/topicscreenfunc.js"></script>
<style>
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
}
#header3 {
	text-align: center;
	color: white;
}
#spaceTop {
	margin-top: 5px;
	color: white;
	font-family: Roboto;
	font-style: italic;
}
.navbar {
  overflow: hidden;
  background-color: #fff;
}

.navbar a {
  float: right;
  font-size: 16px;
  color: black;
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
  color: black;
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
.dropdown-content .information
{
    color: #4b4fe2;
    margin-right: 16px;
}
.dropdown .info
{
   color: #4b4fe2;
    margin-right: 1px;  
}

.dropdown-content a:hover {
  background-color: #ddd;
}
.labcolor
{
    color: white;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<script>
function bufferTime(){
    if (document.getElementById('buffercheck').checked) 
        {document.getElementById("buffer_time").style.display = 'block';
    }
    else
        document.getElementById("buffer_time").style.display = 'none';
    }
	function setTimer(){
    if (document.getElementById('settimer').checked) 
        {document.getElementById("set_timer").style.display = 'block';
    }
    else
        document.getElementById("set_timer").style.display = 'none';
    }
</script>
</head>
<body onload="getDefault()" spellcheck="false" style='background-color: #bdc9ea'>
<?php
	session_start(); 
    $username='unset';
    
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
	}
	
?>
    <div class="navbar">
    <div class="dropdown">
    <!--<button class="dropbtn">Account <i class="fa fa-caret-down"></i>
    </button>-->
        <label class="labcolor">Account </label><i class="fa fa-bars fa-2x info"></i> 
        <!--<label class="labcolor">Account </label><input type="image" src="assets/img/dot.png" width="35" height="35">-->
    <div class="dropdown-content">
      <a href="#" onclick="userProfile()"><i class="fa fa-user information"> Profile</i></a> 
      <a href="#" onclick="logOut()"> <i class="fa fa-sign-out information"> LogOut</i> </a>
    </div>
  </div> 
</div>
<form method="post" action="profScreen.php">
    <button class="tablink" onclick="openPage('Student_list', this, '#bdc9ea')" id="defaultOpen">Student List</button>
    <button class="tablink" onclick="openPage('Act', this, '#bdc9ea')">Activity</button>
    <button class="tablink" onclick="openPage('Add_stu', this, '#bdc9ea')">Add Student</button>
    <button class="tablink" onclick="openPage('Add_Title', this, '#bdc9ea')">Add Topic</button>

<div id="Student_list" class="tabcontent" style='background-color: #4b4fe2'>
<h3 id="header3"> List Of Students Enrolled</h3>
<div id="spaceTop">
<table align="center" border="1px" style="width:300px; line-height:15px;">
        <t>
        <th> ID </th>
        <th> Name </th>
        <th> email</th>
        
    </t>
<?php
require('connectToDb.php');
$student_query ="SELECT * FROM profile ORDER BY profileid";
$result = mysqli_query($db,$student_query);
$count = 1;
while($row1 = mysqli_fetch_assoc($result))
{
?>
    <tr>
        <td><?php echo $row1['profileid']; ?></td>
        <td><?php echo $row1['name']; ?></td>
        <td><?php echo $row1['email']; ?></td>
    </tr>
<?php                
}
?>
    
</table>
</div>

</div>

<div id="Act" class="tabcontent" style='background-color: #4b4fe2'>
  <h3 id="header3"> List of activities</h3>
<div id="spaceTop">
<table align="center" border="1px" style="width:300px; line-height:12px;">
        <t>
        <th> ID </th>
        <th> Topic </th>
        </t>
		
<?php
require('connectToDb.php');
$topic_query ="SELECT * FROM essay ORDER BY essayid";
$result = mysqli_query($db,$topic_query);
$count = 1;
while($row1 = mysqli_fetch_assoc($result))
{
?>
    <tr>
        <td><?php echo $row1['essayid']; $topic =  $row1['topic']; ?></td>
        <td><a href ="activityScreen.php?topic=<?php echo $topic;?> "><?php echo $topic; ?></a></td>
    </tr>
<?php                
}
?>
    
</table>
</div>
</div>

<div id="Add_stu" class="tabcontent" style='background-color: #4b4fe2'>
    <h3 id="header3">Add new Student</h3>
	<div id="spaceTop">
    <div class="inputBox">
        <input type="text" name="name" required="">
        <label>Enter your name</label>
    </div>
	</div>
	<div id="spaceTop">
    <div class="inputBox">
        <input type="email" name="email" required="">
        <label>Enter your Email</label>
    </div>
	</div>
	<div id="spaceTop">
    <div class="inputBox">
        <input type="text" name="eng" value="English">
        <label>Course enrolled</label>
    </div>
	</div>
	<div id="spaceTop">
    <div class="inputBox">
        <input type="text" name="prof" value="Prof John Romig">
        <label>Professor Name</label>
    </div>
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
</form>
<div id="Add_Title" class="tabcontent" style='background-color: #4b4fe2'>
    <h3 id="header3">Add Topic</h3>
    <form method="post" action="profScreen.php" enctype="multipart/form-data">
    <div id="spaceTop">
	<input type="checkbox" name="advancecheck" id="advancecheck" value="enter topic" onchange="valueChanged()"/> Topic Name<br />
    <div id="subnetmaskdiv" style="display:none;">
	<textarea rows="5" cols="42" placeholder="Start writing your essay Topic ." name="subnetmask" id="subnetmask">
	</textarea><br>
    </div>
	</div>
	
    <div id="spaceTop">
    <input type="checkbox" name="image" id="image" value="upload image" onchange="uploadimg()"/> Add Image<br />
    <div id="upload" style="display:none;">
    <input type="file" name="uploadfile" id="uploadfile" accept= "images/*" /><br>
    </div>
	</div>
	<div id="spaceTop">	
    <input type="hidden" name="spellcheck" value="0" />
    <input type="checkbox" name="spellcheck" value="1">Spell Check(Enable/Disable)
	<br>
	</div>
	
	<div id="spaceTop">
	<input type="checkbox" name="buffercheck" id="buffercheck" value="enter time" onchange="bufferTime()"/> Add Buffer Time(Default is 2 mins) <br />
    <div id="buffer_time" style="display:none;">
	<input type="text" name="buffer" id="buffer" placeholder="Change buffer time."/><br>
	<br>
    </div>
	</div>
	
	<div id="spaceTop">
	<input type="checkbox" name="settimer" id="settimer" value="set timer" onchange="setTimer()"/> Set Timer(Default is 5 mins) <br />
    <div id="set_timer" style="display:none;">
	<input type="text" name="settime" id="settime" placeholder="set timer."/><br>
	<br>
    </div>
	<br>
    <br>
	</div>
	
	<div id="spaceTop">
    <div style="text-align: center;">
    <input type="submit" name="Enter"  onclick="printMessage()" value="Enter">
    <p id="demo"></p>
    </div>
	</div>
<br>
<br>
<?php
if(isset($_POST['Enter']))
{
          $topic = $_POST['subnetmask'];
		  $spellcheck = $_POST['spellcheck'];
		  $imagef = addslashes(file_get_contents($_FILES['uploadfile']['tmp_name']));
		  $buffer = $_POST['buffer'];
		  if($buffer == "")
			  $buffer = '02';
		  $timercheck = $_POST['settime'];
		  if($timercheck == "")
			  $timercheck = '05';
          require('connectToDb.php');
	  $ins = "INSERT INTO essay(topic,picture,spellcheck,buffer,timer) VALUES ('$topic','$imagef','$spellcheck','$buffer','$timercheck')";  
	  $result = mysqli_query($db,$ins);
	  if($result){
		  
						echo 'New Essay Topic has been successfully Added';
						exit(header("refresh:0;url=profScreen.php")); 
						mysqli_close($db);
					
		        }
	  else{
		  echo "error registering";
		   mysqli_close($db);
           //return false; // Error somewhere
      }
}
 ?>
 </form>
</div>
</body>
</html> 
