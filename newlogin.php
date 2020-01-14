<?php session_start();
$usersession ='none';
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
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
	<style>
	#wrapper
	{
	width:90%;
	margin:auto;
	}
.indexbody {
  margin:0;
  padding:0;
  margin-top: 20px;
  font-family: roboto;
  color: #777777;
  background-color: #FFFFFF; 
}

	</style>
  </head>

  <body class="indexbody">
  <?php 
  if(isset($_SESSION['usersession']))
  {
	    $usersession = $_SESSION['usersession'];	
  }
?>
    <!--================ Start Header Menu Area =================-->
	<div id="wrapper">
    <header class="header_area white-header">
      <div class="main_menu">

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="index.html">
              <h1><strong><font color="gray">Essay Grading</font></strong></h1>
            </a>
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
                <li class="nav-item ">
                  <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://mentis.uta.edu/explore/profile/john-romig">About</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="newlogin.php">Login</a>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <div class="banner_content text-center">
				<form method="post" action="newlogin.php">
              <div class="banner_content text-center">
			   <br>
			   <br>
			   <br>
			  
			  
			   
			   <h2>Login</h2>
			   <br>
                <div class="form-group">
                   <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your username'"
                    required=""
					
                  />
                </div>
				
				<div class="form-group">
				<input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your password'"
                    required=""
                  />
              </div>
			  <div class="form-group">
				<button type="submit" value="submit" name="submit" class="btn primary-btn">
                  Login
                </button>
              </div>
			   <div class="form-group">
				<label> Not a member yet?</label> <a href="home.php">SIGN UP</a><br>
				<a href="reset-password.php">Forgot my password</a>
              </div>
			  
			 <?php
require('connectToDb.php');

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
    $password = $_POST['password'];
	$getlogindetails = "SELECT * FROM login WHERE uname = '$username' and password = '$password'";
	$selectresult = mysqli_query($db,$getlogindetails);
        
	$result= mysqli_fetch_assoc($selectresult);
	$count = mysqli_num_rows($selectresult);
	if($count == 1) {
		//session_start();                
		//$_SESSION['username'] = $username;
		    $_SESSION['usersession'] = $username;
    	    $usersession = $_SESSION['usersession'];
		if($username == 'admin')
		{
			 $usersession = $_SESSION['usersession'];
			echo "<script>if(confirm('$username has succesfully logged in')){document.location.href='studentlist.php'};</script>";
		}
		else
		{
			 $usersession = $_SESSION['usersession'];
			//header("refresh:0;url=studentLand.php");
		echo "<script>if(confirm('student $username has succesfully logged in')){document.location.href='studentlandingscreen.php'};</script>";
		exit();
		}
		//echo $result['uname'] . " " . "has succesfully Logged in";
	}
	else
	{
		echo "Invalid Username and Password. Please try again.";
	}
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
			  </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->

    <!--================Contact Area =================-->

    <!--================ start footer Area  =================-->
  <footer class="footer-area section_gap" align="center">
	
    </footer>
    <!--================ End footer Area  =================-->

    <!--================Contact Success and Error message Area =================-->
    

    <!-- Modals error -->

    <!--================End Contact Success and Error message Area =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/theme.js"></script>
	</div>
  </body>
</html>
