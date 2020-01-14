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
    <title>Essay Grade Change</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="assets/css/newscreenstyle.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script>
	function commentClick(){
        document.getElementById("comment_text").style.display = 'block';
    }
	function commentblur() {
		document.getElementById("comment_text").style.display = 'none';
	}
	</script>
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
              <h2 class="mb-3"><i>Review Or Change Student Grades</i></h2>
              
            </div>
          </div>
        </div>
        
		<form method="post" action="EssayGradeChange.php">		
		<div class="row justify-content-center">
		<table style="width:100%">
				<t>
				<th> Name </th>
				<th> Content </th>
				<th> Grade</th>
				<th> </th>
				
				
			</t>
		<?php
		require('connectToDb.php');
		$studentid = 'none';
		$activityid = 'none';
		            
		if(isset($_GET['studentid']))
		{
			$studentid = $_GET['studentid'];
			$_SESSION['studentid'] = $studentid;
		}
		if(isset($_SESSION['activityid']))
		{
			$activityid = $_SESSION['activityid'];
		}
		if(isset($_SESSION['studentid']))
		{
			$studentid = $_SESSION['studentid'];
		}
		$student_query ="SELECT * FROM profile p, activitystudent a WHERE p.profileid=a.student_idfk AND a.activity_idfk='$activityid' AND student_idfk='$studentid'";
		$result = mysqli_query($db,$student_query);
		$count = 1;
		$row1 = mysqli_fetch_assoc($result);
		?>
			<tr>
				<td width="20%"><a href="#"> <?php echo $row1['name']; ?></a></td>
				<td width="60%"><?php echo $row1['content']; ?></td>
				<td width="10%"><input type = "text" id = "gradetext" name = "gradetext" value = "<?php echo $row1['grade']; ?>" autocomplete ="off" width="50px"></td>
				<td width="10%"><input type = "submit" id = "changegrade" name = "changegrade" value ="Change Grade" class="myButton"></td>
			</tr>
			
		</table>
		</form>
		<?php
		if(isset($_POST['changegrade']))
		{
			$grade = $_POST['gradetext'];
			$updatequery ="update activitystudent set grade = '$grade' where activity_idfk = $activityid and student_idfk = $studentid";
			$result = mysqli_query($db,$updatequery);
			echo $grade;
			echo $activityid;
			echo $studentid;
			if($result){
				       echo "<script>location.href='essayDetailsView.php';</script>";
						//exit(header("refresh:0;url=essayDetailsView.php")); 
					
		        }
		}
		?>
</div>
</div>

    </section>
	<section align="right">
	
	<div class="w3-container" id="comment">
	<button name="commentbutton" id="commentbutton" onclick="commentClick()" class="w3-button w3-large w3-circle w3-orange">+</button> <label> <font color="#007bff">Add a comment for the essay</font></label>
	<div id="comment_text" style="display:none;">
	<form method="post" action="EssayGradeChange.php">
	<input type="text" name="com_text" id="com_text" placeholder="Enter a comment."/><input type="submit" name="subcomment" id="subcomment"/><br>
	</form>
	<?php
	if(isset($_POST['subcomment']))
	{
			$getcomment = $_POST['com_text'];
			$updatequery ="update activitystudent set comments = '$getcomment' where activity_idfk = $activityid and student_idfk = $studentid";
			$result = mysqli_query($db,$updatequery);
			if($result){
				       echo "<script>location.href='essayDetailsView.php';</script>";
						//exit(header("refresh:0;url=essayDetailsView.php")); 
					
		        }
		//echo "comment is added" .$getcomment;
	}
	?>
	<br>
    </div>
	</div>
	
	</section>
	<section align="center">
	<div>
		<form method="post" action="essayDetailsView.php">
		<input type="submit" name="back" value="back" class="myButton">
		<?php
		if(isset($_POST['back']))
		{
			exit(header("refresh:0;url=viewactivity.php"));
		}
		?>
		</div>
		</form>
		
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
