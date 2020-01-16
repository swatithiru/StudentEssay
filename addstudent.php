<?php session_start();
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
input[type=text]:disabled {
	color: #A9A9A9;
	font-weight: bold;
	background: #FFFFFF;
}
</style>
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Add Student</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
	
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
				<li class="nav-item active">
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
     <div class="section_gap registration_area" style='background-color: #ffffff' align="center">
      <div class="container" align="left">
        <div class="row align-items-center">
          <div class="col-lg-4 offset-lg-1" align="center">
            <div class="register_form" align="center">
              
             <form method="post" action="addstudent.php">
			  <h3><i>List Of Students Enrolled</i></h3> 
			  <br>
                <div class="row">
                  <div class="col-lg-12 form_group">
                    <input
                      name="name"
                      placeholder="Enter Your Name"
                      required=""
                      type="text"
                    />
					 <input
                      name="email"
                      placeholder="Enter Your Email Address"
                      pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                      required=""
                      type="email"
                    />
					<input
                      name="english"
                      required=""
                      type="text"
					  value="English"
					  disabled
                    />
						<input
                      name="prof"
                      required=""
                      type="text"
					  value="Prof John Romig"
					  disabled
                    />
                   
                  </div>
                  <div class="col-lg-12 text-center">
                    <!--<input type="submit" name="submit" value="Register">-->
					<button class="primary-btn" name="submit">Register</button>
					<?php
 if(isset($_POST['submit']))
{
	$name = $_POST['name'];
        $email = $_POST['email'];
	$password = random_password(8);
	if (is_valid_email($email))
    {
        if (create_user($name, $email, $password)) {
				
						echo 'New User Registered Successfully';
						
					  
			  
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
	  $checkrow = "SELECT * from profile";
	  $check = mysqli_query($db, $checkrow);
	  $count = mysqli_num_rows($check);
	  if($count ==0)
	  {
		$ins = "INSERT INTO profile(profileid,name,email,image,type,dob) VALUES ('1','admin','admin@gmail.com','image','prof','01/01/2019')";     
		$result = mysqli_query($db,$ins);
		
		$ret = "SELECT profileid FROM profile WHERE email = 'admin@gmail.com'";
		$retrive = mysqli_query($db,$ret);
		$row = mysqli_fetch_assoc($retrive);
		$new =  $row['profileid'];
	   
		$insLogin = "INSERT INTO login(uname,password,profilefk) VALUES ('admin','123456','$new')";
		$resLogin = mysqli_query($db,$insLogin);
		
		if($resLogin)
			{
				mysqli_close($db);
				return true; // Success
			}
		 else
				 {
					mysqli_close($db);
					return false; // Error somewhere
				 }
	  }
	  else
	  {
		$retrieveauto = "SELECT profileid from profile order by profileid desc limit 1";
		$retrive = mysqli_query($db,$retrieveauto);
		$row = mysqli_fetch_assoc($retrive);
		$new =  $row['profileid'];
		$new = $new + 1;
		
		$ins = "INSERT INTO profile(profileid,name,email,image,type,dob) VALUES ('$new','$name','$email','image','student','')";     
		$result = mysqli_query($db,$ins);
		
		$retauto = "SELECT profileid FROM profile WHERE email = '$email'";
		$retriveauto = mysqli_query($db,$retauto);
		$row = mysqli_fetch_assoc($retriveauto);
		$newauto =  $row['profileid'];
	   
		$insAuto = "INSERT INTO login(uname,password,profilefk) VALUES ('$email','$pass','$newauto')";
		$resAuto = mysqli_query($db,$insAuto);
		
		if($resAuto)
			{
				mysqli_close($db);
				return true; // Success
			}
		 else
				 {
					mysqli_close($db);
					return false; // Error somewhere
				 }	
	  }
	  /*$ins = "INSERT INTO profile(name,email,image,type,dob) VALUES ('$name','$email','image','student','')";     
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
      }*/
	  
	}
?>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>			  
            
          </div>

      </div>
    </div>
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
