<!DOCTYPE html>
<?php
session_start();
?>
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
    <title>Essay Details View</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="assets/css/newscreenstyle.css">
	
  </head>

  <body class="indexbody">
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
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="main_title">
              <h2 class="mb-3"><i>Essay Content View</i></h2>
              
            </div>
          </div>
        </div>
         <form method="post" action="essayDetailsView.php">
		 <div class="row justify-content-center">
		
		<table>
				<t>
				<th> ID </th>
				<th> Name </th>
				<th> Content </th>
				<th> Grade</th>
				<th> Comments</th>
				
			</t>
		<?php
		require('connectToDb.php');
		$activityid = 'none';
		
		if(isset($_GET['activityid']))
		{
			$activityid = $_GET['activityid'];
			$_SESSION['activityid'] = $activityid;
		}
		if(isset($_SESSION['activityid']))
		{
			$activityid = $_SESSION['activityid'];
		}
		$student_query ="SELECT a.student_idfk,p.name,a.content,a.grade,a.comments FROM profile p, activitystudent a WHERE p.profileid=a.student_idfk AND a.activity_idfk='$activityid' AND a.student_idfk !=1";
		$result = mysqli_query($db,$student_query);
		$count = 1;
		while($row1 = mysqli_fetch_assoc($result))
		{
			$variable = $row1['student_idfk'];
		
		?>
		
			<tr>
				<td><?php echo $count++; ?></td>
				<!--<td><a href="detailsPage.php?id=".$row1['student_idfk']></a></td>-->
				<td><a href="essayGradeChange.php?studentid=<?php echo $variable?>"> <?php echo $row1['name']; ?></a></td>
				<!--<td><?php echo $row1['content']; ?></td>-->
				<td><a href="essayGradeChange.php?studentid=<?php echo $variable?>"><i>Click Here to view and grade the Essay</i> </a></td>
				<td><?php echo $row1['grade']; ?></td>
				<td><?php echo $row1['comments']; ?></td>
				<!--<td><a href="detailsPage.php?activity_idfk=35"></a></td>-->
			</tr>
		<?php                
		}
		?>
		
		</table>
		</form>	
</div>

    </section>
	<section align="center">
	<div>
		<form method="post" action="startactivity.php">
		<input type="submit" name="back" value="back" class="myButton">
		<?php
		if(isset($_POST['back']))
		{
			//exit(header("refresh:0;url=startactivity.php"));
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
