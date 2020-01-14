<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Input form UI Design</title>
<link rel="stylesheet" href="assets/css/mainscreenstyle.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="assets/js/mainscreenfunc.js"></script>
<script src="assets/js/topicscreenfunc.js"></script>
<style>
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
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style the tab content (and add height:100% for full page content) */
.box {
  /*color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;*/
  position: absolute;
	top: 55%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 400px;
	padding: 40px;
    background: orange;
	box-sizing: border-box;
	box-shadow: 0 15px 25px rgba(0,0,0,.5);
	border-radius: 10px;
}
.box .inputBox
{
	position: relative;
}
.box .inputBox input
{
	width: 100%;
	padding: 10px 0;
	font-size: 16px;
	color: #000;
	letter-spacing: 1px;
	margin-bottom: 30px;
	border: none;
	border-bottom: 1px solid #000;
	outline: none;
	background: transparent;
}
.box .inputBox textarea
{
	width: 100%;
	padding: 10px 0;
	font-size: 16px;
	color: #000;
	letter-spacing: 1px;
	margin-bottom: 30px;
	border: none;
	border-bottom: 1px solid #000;
	outline: none;
	background: transparent;	
}
.box h2
{
	margin: 0 0 30px;
	padding: 0;
	color: #000;
	text-align: center;
}
.box .inputBox label
{
	position: absolute;
	top: 0;
	left: 0;
	padding: 10px 0;
	font-size: 16px;
	color: #000;
	letter-spacing: 1px;
	pointer-events: none;
	transition: .5s;
}

.box .inputBox input:focus ~ label,
.box .inputBox input:valid ~ label
{
	top: -18px;
	left: 0;
	color: #000000;
	font-size:12px;
}
#paragraph {
	font-style: italic;
	font-size: 16px;
	color: Blue;
}
</style>
</head>
<body>
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
<div class="box">
<h2 align="center">Student Activity Screen <h2>
<?php
require('connectToDb.php');
$topic_query ="SELECT DISTINCT e.* from essay e, activity a where a.topicidfk = e.essayid and a.status = 1";
$result = mysqli_query($db,$topic_query);
$row1 = mysqli_fetch_assoc($result)
?>

<form method="post" action="studentScreen.php">
<div>
    <!--<input type="text" name="topic" id="topic" disabled> Time left: <span id="timer"></span>-->
<label align="left">TITLE: <?php echo $row1['topic'] ?> </label><br>
<p id="paragraph">Your essay writing starts in : <span id="timer"></span><br>
<small>You can use the provided preparatory time or move directly to the exam by clicking on the Start Button below<small>
</p>
<!--<span style="float: left;">Time Left: </span><div style="float:left;"><input type="text" /></div>-->
</div>
<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row1['picture'] ).'" height ="200" width ="200"/>'; ?>
<div style="text-align: center;">
<input type="submit" name="submit" value="Start">
</div>
</div>
<br />
<br />
<script>
document.getElementById('timer').innerHTML =
  <?php echo $row1['buffer']?> + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){window.location.href="studentScreen.php"}
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
</script>
</form>
</div>
</body>
</html>