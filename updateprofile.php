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
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Update Profile</title>
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
    <header class="header_area white-header">
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
            <a class="navbar-brand" href="home.php">
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
               <?php
			   
				
				if($usersession == "admin")
				{
				echo '<li class="nav-item ">';
                echo '<a class="nav-link" href="studentlist.php">Home</a>';
                echo '</li>';	
				
				echo '<li class="nav-item">';
                echo '<a class="nav-link" href="https://mentis.uta.edu/explore/profile/john-romig">About</a>';
				echo '</li>';
				
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
				else{
					
				echo '<li class="nav-item ">';
                echo '<a class="nav-link" href="studentlandingscreen.php">Home</a>';
                echo '</li>';	
				
				echo '<li class="nav-item">';
                echo '<a class="nav-link" href="https://mentis.uta.edu/explore/profile/john-romig">About</a>';
				echo '</li>';
				
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
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Update Profile</h2>
                <div class="page_link">
                  <a href="updateprofile.php">Update the information</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
      <div class="container">
	  
        <div>

          <!--<?php if($row1['picture'] != '') echo '<img src="data:image/jpeg;base64,'.base64_encode( $row1['picture'] ).'" height ="300" width ="300"/>'; ?><br>-->
		  <?php
require('connectToDb.php');


//$login = "SELECT * FROM login where profilefk = '.$getprofileid.'";
$login = "SELECT * FROM login where uname = '$usersession'";
$querylogin = mysqli_query($db,$login);
$queryrowlogin = mysqli_fetch_assoc($querylogin);
$getprofileid = $queryrowlogin['profilefk'];


$profile = "SELECT * FROM profile where profileid = '$getprofileid'";
$queryprofile = mysqli_query($db,$profile);
$queryrow = mysqli_fetch_assoc($queryprofile);
//$getprofileid = $queryrow['profileid'];



//echo "row" .$queryrow['profileid'] .$queryrow['email'];
//echo "loginrow" .$queryrowlogin['uname'];

?>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <div class="contact_info">
              
            </div>
          </div>
          <div class="col-lg-9">
            <form
             
              action="updateprofile.php"
              method="post"
              
              
            >
              <div class="col-md-6">
			  <div class="contact_info">
                <div class="info_item">
				<div class="form-group">
				<i class="ti-user"></i>
                <h6>Enter your name</h6>
                 <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value=<?php echo $queryrow['name'];?>
					style="color:#000000;"
                  />
              </div>
                 
                </div>
				<br>
                <div class="form-group">
				<div class="info_item">
				<i class="ti-email"></i>
				<h6>Enter your Email</h6>
                  <input
                    type="email"
                    class="form-control"
                    id="emailupdate"
                    name="emailupdate"
                    placeholder="<?php echo $queryrow['email'];?>"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = <?php echo $queryrow['email'];?>"
					style="color:#000000;"
					value=<?php echo $queryrow['email'];?>                 
                  />
				  </div>
                </div>
				<br>
                <div class="form-group">
				<div class="info_item">
				<i class="ti-calendar"></i>
				<h6>Enter your DOB</h6>
				<?php
				$originalDate = $queryrow['dob'];
				//$newDate = date("m-d-Y", strtotime($originalDate));
				
				?>
                  <input
                    type="text"
                    class="form-control"
                    id="newdate"
                    name="newdate"
                    onfocus="this.type='date'"
                    onblur="this.type='text'"
					value=<?php echo $originalDate;?>
					style="color:#000000;"
                    
                  />
				  </div>
                </div>
				<br>
				<div class="form-group">
				<div class="info_item">
				<i class="ti-user"></i>
				<h6>Enter your Username</h6>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="<?php echo $queryrowlogin['uname'];?>"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = <?php echo $queryrowlogin['uname'];?>"
					value=<?php echo $queryrowlogin['uname'];?>
					style="color:#000000;"
                    
                  />
				  </div>
                </div>
				<br>
				<div class="form-group">
				<div class="info_item">
				<i class="ti-lock"></i>
				<h6>Enter your password</h6>
                  <input
                    type="text"
                    class="form-control"
                    id="newpassword"
                    name="newpassword"
                    placeholder="<?php echo $queryrowlogin['password'];?>"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = <?php echo $queryrowlogin['password'];?>"
					value=<?php echo $queryrowlogin['password'];?>
					style="color:#000000;"
                    
                  />
				  </div>
                </div>
				<br>
				<div class="form-group">
				<div class="info_item">
                 <button type="submit" name="updateprofile" value="submit" class="btn primary-btn">
                  Update Profile
                </button> 
				<?php
				require('connectToDb.php');
				if(isset($_POST['updateprofile']))
				{
				$getname = $_POST['name'];
				$getemail = $_POST['emailupdate'];
				$getusername = $_POST['username'];
				$getdob = $_POST['newdate'];
				$getpassword = $_POST['newpassword'];
				
				$updatelogin = "UPDATE login SET uname = '$getusername',password = '$getpassword' WHERE profilefk = '$getprofileid' ";
				$queryupdatelogin = mysqli_query($db, $updatelogin);
				
				$updateprofile = "UPDATE profile SET email = '$getemail',name = '$getname', dob = '$getdob' WHERE profileid = '$getprofileid' ";
				$queryupdateprofile = mysqli_query($db, $updateprofile);
				
				
				if($queryupdateprofile)
				{
				
				//echo "<section><p><font color='#007bff'>Profile is updated</font></p></section>";
				echo "<script>if(confirm('profile updated succesfully')){document.location.href='updateprofile.php'};</script>";
				//echo "<script>if(confirm('<p><font color='#007bff'>Profile is updated</font></p>')){document.location.href='studentlist.php'};</script>";
				
								
				}
				}
				?>
				</div>
                </div>
				</div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
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
  </body>
</html>
