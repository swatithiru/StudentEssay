<?php
session_start();
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
    <title>Add Topic</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
	<script src="assets/js/mainscreenfunc.js"></script>
    <script src="assets/js/topicscreenfunc.js"></script>
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

  <body>
  <?php 
  if(isset($_SESSION['usersession']))
  {
	    $usersession = $_SESSION['usersession'];	
  }
?>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Search Here"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
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
                <li class="nav-item">
                  <a class="nav-link" href="studentlist.php">Student List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="viewactivity.php">Activity</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="addstudent.php">Add Student</a>
                </li>
				<li class="nav-item active">
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
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="main_title">
              <h2 class="mb-3"><i>Add a new Topic</i></h2>
              
            </div>
          </div>
        </div>
        
	<div class="row justify-content-center">
	 <div class="single_feature">
	<div class="row">
    <div class="col-lg-12 form_group">
	<form method="post" action="addtopic.php" enctype="multipart/form-data">
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
    <input type="submit" name="Enter"  class="primary-btn" onclick="printMessage()" value="Enter">
    <p id="demo"></p>
    </div>
	</div>
	</div>
	</div>
	</div>
<br>
<br>
<?php
if(isset($_POST['Enter']))
{
          $topic = trim($_POST['subnetmask']);
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
		  
						echo "<script>if(confirm('New Essay Topic has been succesfully added')){document.location.href='viewactivity.php'};</script>";
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
		</div>

    </section>
	
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
