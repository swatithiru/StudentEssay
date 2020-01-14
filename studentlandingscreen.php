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
    <title>Student Landing Screen</title>
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
  font-family: roboto;
  color: #777777;
  background-color: #FFFFFF; 
  background: url('img/blog/post-img2.jpg');
  background-size: cover;
  background-repeat: no-repeat;
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
                  <a class="nav-link" href="studentlandingscreen.php"><font color="#FABD4A">Home</font><a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://mentis.uta.edu/explore/profile/john-romig"><font color="#FABD4A">About</font></a>
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
                    ><font color="#FABD4A">WELCOME '.$usersession.' !!!!!</font></a>';
                  
                echo '<ul class="dropdown-menu">';
                echo ' <li class="nav-item">';
                echo '<a class="nav-link" href="updateprofile.php">Profile</a>';
                echo '</li>';
				
				echo '<li class="nav-item">';
                echo '<a class="nav-link" href="viewgrades.php">view Grades</a>';
                echo '</li>';
				
				require('connectToDb.php');
				$topic_query ="SELECT * FROM activity WHERE status = 1 order by time";
				$result = mysqli_query($db,$topic_query);
				if(mysqli_num_rows($result)>0)
				{
				echo '<li class="nav-item">';
                echo '<a class="nav-link" href="essaybuffer.php">Take Exam</a>';
                echo '</li>';
				}
				else
				{
				echo '<li class="nav-item">';
                echo '<a class="nav-link" href="noactivity.php">Take Exam</a>';
                echo '</li>';
				}
			
                   
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

    <!--================Home Banner Area =================-->
   <!-- <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <div class="banner_content text-center">
				
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->

    <!--================Contact Area =================-->

    <!--================ start footer Area  =================-->
  
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
