<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>EssayGrading</title>
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
                <li class="nav-item active">
                  <a class="nav-link" href="studentlist.php">Student List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about-us.html">Activity</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="about-us.html">Add Student</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="about-us.html">Add Topic</a>
                </li>
               
                <li class="nav-item">
                  <a class="nav-link" href="newlogin.php">Login</a>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner_content text-center">
                <p class="text-uppercase">
                 Challenge yourself everyday
                </p>
                <h2 class="text-uppercase mt-4 mb-5">
                 Improve your skills
                </h2>
                <!--<div>
                  <a href="#" class="primary-btn2 mb-3 mb-sm-0">learn more</a>
                  <a href="#" class="primary-btn ml-sm-3 ml-0">see course</a>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
   
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    <div class="section_gap registration_area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="row clock_sec clockdiv" id="clockdiv">
              <div class="col-lg-12">
                <h1 class="mb-3">Register Before Starting the Essay Writing</h1>
                <p><i>
                 Writing is Easy. All you have to do is cross out the wrong words.
				 </i>
                </p>
              </div>
              <!--<div class="col clockinner1 clockinner">
                <h1 class="days">150</h1>
                <span class="smalltext">Days</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="hours">23</h1>
                <span class="smalltext">Hours</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="minutes">47</h1>
                <span class="smalltext">Mins</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="seconds">59</h1>
                <span class="smalltext">Secs</span>
              </div>-->
            </div>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <div class="register_form">
              <h3>Sign UP</h3>
              <p>It is high time for learning</p>
             <form method="post" action="home.php">
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
                      name="username"
                      placeholder="Enter Your UserName"
                      required=""
                      type="text"
                    />
                   <input
                      name="date"
                      placeholder="Enter Your DOB"
                      required=""
                      type="date"
                    />
					<input
                      name="password"
                      placeholder="Enter Your Password"
                      required=""
                      type="password"
                    />
					<input
                      name="confirmpassword"
                      placeholder="Enter Your Confirm Password"
                      required=""
                      type="password"
                    />
                   
                   
                  </div>
                  <div class="col-lg-12 text-center">
                    <!--<input type="submit" name="submit" value="Register">-->
					<button class="primary-btn" name="submit">Register</button>
					<?php
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
        if (create_user($name, $username, $password, $cpassword, $email,$dob))
            {
                echo 'New User Registered Successfully.';
	    }
            else
				{
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
            require('connectToDb.php');
            $slquery = "SELECT 1 FROM profile WHERE email = '$email'";
            $selectresult = mysqli_query($db,$slquery);
            if(mysqli_num_rows($selectresult)>0) 
            {
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

    $db = mysqli_connect('localhost','login','login','masterdb')
    or die('Error connecting to MYSQL server.');
    $ins = "INSERT INTO profile(name,email,image,type,dob) VALUES ('$name','$email','image','student','$dob')";     
    $result = mysqli_query($db,$ins);
    $ret = "SELECT profileid FROM profile WHERE email = '$email'";
    $retrive = mysqli_query($db,$ret);
    $row = mysqli_fetch_assoc($retrive);
    $new =  $row['profileid'];
    $insLogin = "INSERT INTO login(uname,password,profilefk) VALUES ('$username','$password','$new')";
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
?>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Registration Area =================-->

    <!--================ Start Trainers Area =================-->
    
    <!--================ End Trainers Area =================-->

    <!--================ Start Events Area =================-->
    
    <!--================ End Events Area =================-->

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
