<?php session_start();
$textsession ="start Activity";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
	<style>
table {
  border-collapse: collapse;
  width: 50%;
  text-align: center;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #ff7f50 ;
  color: white;
}
</style>
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Start Activity</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
	
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
	
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="assets/css/newscreenstyle.css">
	
	
<script>
	function change() // no ';' here
{
    var elem = document.getElementById("myButton1");
    if (elem.value=="START ACTIVITY") elem.value = "STOP ACTIVITY";
    else elem.value = "START ACTIVITY";
}
	</script>
  </head>

  <body class="indexbody">
  <?php 
  if(isset($_SESSION['usersession']))
  {
	    $usersession = $_SESSION['usersession'];	
		//$textsession = $_SESSION['textsession'];
  }
  if(isset($_SESSION['textsession']))
  {
	    $textsession = $_SESSION['textsession'];	
  }
   if(isset($_SESSION['currentactivity']))
  {
	    $currentactivity = $_SESSION['currentactivity'];	
  }
?>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <div class="search_input" id="search_input_box">
          <div class="container">
          </div>
        </div>

       <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
           <a class="navbar-brand logo_h" href="index.html"
              ><h1><strong>Essay Grading</strong></h1></a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
               <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="studentlist.php">Student List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="viewactivity.php">Activity</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="addstudent.php">Add Student</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="addtopic.php">Add Topic</a>
                </li>
               
                 
               <?php
			   if($usersession!="none")
			   {
				echo '<li class="nav-item submenu dropdown">';
                echo '<a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >WELCOME '.$usersession.' !!!!!</a>';
                  
                echo '<ul class="dropdown-menu">';
                echo ' <li class="nav-item">';
                echo '<a class="nav-link" href="updateprofile.php">Profile</a>';
                echo '</li>';
                   
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="logout.php">LogOut</a>';
                echo '</li>';
                echo '</ul>';
                echo '</li>';
			   }
				?>
                
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
      <div class="container">
	  <form method="post" action="startactivity.php">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="main_title">
              <h2 class="mb-3"><i>Start An Activity</i></h2><br>
			  <?php

require('connectToDb.php');
$essaytopic = 'none';
$topicid = 'none';
//session_start();                
if(isset($_GET['topic']))
{
	$essaytopic = $_GET['topic'];
	//echo "first" .$essaytopic;
	$_SESSION['essaytopic'] = $essaytopic;
}
    if(isset($_SESSION['essaytopic']))
    {
        $essaytopic = $_SESSION['essaytopic'];
		//echo "second" .$essaytopic;
	}
	if(isset($_SESSION['topicid']))
    {
        $topicid = $_SESSION['topicid'];
		//echo "id" .$topicid;
	}

//$topic = "SELECT * FROM essay where topic = '".$essaytopic."'";
$topic = "SELECT * from essay where topic = '".$essaytopic."'";
$result = mysqli_query($db,$topic);
$row1 = mysqli_fetch_assoc($result);
//$new = $row1['topic'];

$topicid = $row1['essayid'];
$_SESSION['topicid'] = $topicid;

$topic_query ="SELECT activityid FROM activity WHERE topicidfk =$topicid and status = 1 order by time desc";
$current_activity = mysqli_query($db,$topic_query);
$currentRow=null;
if($current_activity!=null)
$currentRow = mysqli_fetch_assoc($current_activity);
?>
<label> <strong> Essay Topic: </strong> <?php echo $row1['topic'] ?></label><br>
<label id="label" align="left"> <strong>Current Activity</strong>: <?php echo $currentRow['activityid']; ?></label> &nbsp;
<!--<input type="submit" class="primary-btn" name="startActivity" value="START ACTIVITY" onclick="change()" id="myButton1">-->
<input class="primary-btn" onclick="change()" type="submit" value="<?php echo $textsession; ?>" id="myButton1" name="startActivity"></input>
<?php

if(isset($_POST['startActivity']))
{
	
	if($textsession == "start Activity")
	{
	
	 
	$time = date("F d, Y h:i:s A",time());
	
	$insertActivity = "INSERT INTO activity(topicidfk,time,status) VALUES (".$topicid.",now(),'1')";
	$resultActivity = mysqli_query($db,$insertActivity);
	
	$retActivity = "SELECT activityid FROM activity WHERE topicidfk =".$topicid." ORDER BY time desc LIMIT 1";
	$retriveActivity = mysqli_query($db,$retActivity);
	$rowActivity = mysqli_fetch_assoc($retriveActivity);
	$new =  $rowActivity['activityid'];
	$ret = "SELECT profileid FROM profile";
	$retrive = mysqli_query($db,$ret);
	
	
          
	while($rowAct = mysqli_fetch_assoc($retrive))
	{
	$studentid =  $rowAct['profileid'];
	$insertStudentActivity = "INSERT INTO activitystudent(activity_idfk,student_idfk,content,student_Status,grade) VALUES ('$new','$studentid','','','')";
	$resultStudentActivity = mysqli_query($db,$insertStudentActivity);
	}
	if($resultStudentActivity){
		 $_SESSION['textsession'] = "stop Activity";
		//$textsession = $_SESSION['textsession'];
		 $textsession = $_SESSION['textsession'];
		  echo "<script>location.href='startactivity.php';</script>";
		   //echo "activity is successfully started";	
		  //header("refresh:0;url=profScreen.php");
		  mysqli_close($db);
          return true; // Success
      }
	  else{
		  // echo "activity is not started";	
		   echo "<script>location.href='startActivity.php';</script>";
		   mysqli_close($db);
           return false; // Error somewhere
      }
	//$_SESSION['currentactivity'] = $new;
	//$currentactivity = $_SESSION['currentactivity'];
	
 //$usersession = $_SESSION['usersession'];	 
	// echo $textsession;
	}
	else if($textsession == "stop Activity")
	{
	 
	 $secondlastactivity = "SELECT activityid from activity where activityid in (select max(activityid) from activity) order by activityid DESC limit 1";
	 //$secondlastactivity = "SELECT activityid FROM activity ORDER BY activityid desc LIMIT 1";
	 $secondlactivity = mysqli_query($db,$secondlastactivity);
	
	 $secondrow = mysqli_fetch_assoc($secondlactivity);
	 $secondrowid = $secondrow['activityid'];
	
	$secondupdate = "update activity set status = 0 where activityid =".$secondrowid;
	$secondupdateactivity = mysqli_query($db,$secondupdate);
	 $_SESSION['textsession'] = "start Activity";
	 $textsession = $_SESSION['textsession'];
	  echo "<script>location.href='startactivity.php';</script>";
	  //echo $secondrowid;
	 //echo "activity is stopped";
	 //$current_activity = null;
	 
	 
	}
}
	
	/*$time = date("F d, Y h:i:s A",time());
	
	$insertActivity = "INSERT INTO activity(topicidfk,time,status) VALUES (".$topicid.",now(),'1')";
	$resultActivity = mysqli_query($db,$insertActivity);
	
	$retActivity = "SELECT activityid FROM activity WHERE topicidfk =".$topicid." ORDER BY time desc LIMIT 1";
	$retriveActivity = mysqli_query($db,$retActivity);
	
	
	$secondlastactivity = "SELECT activityid from activity where activityid not in (select max(activityid) from activity) order by activityid DESC limit 1";
	$secondlactivity = mysqli_query($db,$secondlastactivity);
	
	$secondrow = mysqli_fetch_assoc($secondlactivity);
	$secondrowid = $secondrow['activityid'];
	
	$secondupdate = "update activity set status = 0 where activityid =".$secondrowid;
	$secondupdateactivity = mysqli_query($db,$secondupdate);
	
	$rowActivity = mysqli_fetch_assoc($retriveActivity);
	$new =  $rowActivity['activityid'];

	
	$ret = "SELECT profileid FROM profile";
	$retrive = mysqli_query($db,$ret);
	
	
          
	while($rowAct = mysqli_fetch_assoc($retrive))
	{
	$studentid =  $rowAct['profileid'];
	$insertStudentActivity = "INSERT INTO activitystudent(activity_idfk,student_idfk,content,student_Status,grade) VALUES ('$new','$studentid','','','')";
	$resultStudentActivity = mysqli_query($db,$insertStudentActivity);
	}
	if($resultStudentActivity){
		 $textsession = $_SESSION['textsession'];
		  echo "<script>location.href='startactivity.php';</script>";
		   //echo "activity is successfully started";	
		  //header("refresh:0;url=profScreen.php");
		  mysqli_close($db);
          return true; // Success
      }
	  else{
		  // echo "activity is not started";	
		   echo "<script>location.href='startActivity.php';</script>";
		   mysqli_close($db);
           return false; // Error somewhere
      }*/
	

	

?>

              
            </div>
          </div>
        </div>
		</form>
        
		 <div class="row justify-content-center">
<table>
  <t>
        <th> previous Activity </th>
		<th> time </th>
        </t>
		
<?php
require('connectToDb.php');
$topic_query ="SELECT * FROM activity WHERE topicidfk = $topicid and status = 0 order by time";
$result = mysqli_query($db,$topic_query);
while($pastrow = mysqli_fetch_assoc($result))
{
?>
    <tr>
		<?php $activityid = $pastrow['activityid']; $activitytime = $pastrow['time'];?>
        <td> <a href="essayDetailsView.php?activityid=<?php echo $activityid;?>&activitytime = <?php echo $activitytime;?>"><?php echo $activityid;?></a> </td>
		 <td> <a href="essayDetailsView.php?activityid=<?php echo $activityid;?>&activitytime = <?php echo $activitytime;?>"><?php echo $activitytime;?></a> </td>
    </tr>
<?php                
}
?>
</div>
</table>

</div>
    </section>
	<section align="center">
	<div>
		<form method="post" action="viewactivity.php">
		<input type="submit" name="back" value="back" class="myButton">
		<?php
		if(isset($_POST['back']))
		{
			//exit(header("refresh:0;url=viewactivity.php"));
		}
		?>
		</form>
		</div>
	</section>
	<br>
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
   
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
   

    <!--================ Start Testimonial Area =================-->
    
    <!--================ End Testimonial Area =================-->

    <!--================ Start footer Area  =================-->
     <footer class="footer-area section_gap" align="center">
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
  </body>
</html>
