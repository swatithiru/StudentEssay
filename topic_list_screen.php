<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/mainscreenstyle.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="assets/js/topicscreenfunc.js"></script>
<style>
.navbar {
  overflow: hidden;
  background-color: #555;
   
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
.labcolor
{
    color: #555;
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

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

</head>
<body>
    <div class="navbar">
    <div class="dropdown">
    <!--<button class="dropbtn">Account <i class="fa fa-caret-down"></i>
    </button>-->
         
    <!--<label class="labcolor">Account </label><i class="fa fa-bars fa-2x info"></i> -->
    <input type="image" src="assets/img/profile.jpeg" width="40px" height="38px"><i class="fa fa-bars fa-3x info"></i>
    <div class="dropdown-content">
       <a href="#" onclick="userProfile()"><i class="fa fa-user information"> Profile</i></a> 
      <a href="#" onclick="logOut()"> <i class="fa fa-sign-out information"> Logout</i> </a>
    </div>
  </div> 
</div>
<form method="post" action="topic_list_screen.php">
    
<div id="Student_list" class="tabcontent">
<h3 align="center"> List Of Topics Added</h3>
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
        <td><?php echo $row1['essayid']; ?></td>
        <td><?php echo $row1['topic']; ?></td>
    </tr>
<?php                
}
?>
    
</table>
</div>
</form>
</body>
</html> 
