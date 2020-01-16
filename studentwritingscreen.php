<?php
session_start();
$profileid= 'none';    
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
.newbody
{
	background-color: #FABD4A;
	font-family: Rajdhani;
	font-size: 18px;
}
img {
  border-radius: 15%;
}
.headercolor
{
	font-family: 'Amatic SC', cursive;
	color: #FFFFFF;
	
}
.shadow-textarea textarea.form-control::placeholder {
    font-weight: 300;
}
.shadow-textarea textarea.form-control {
    padding-left: 0.8rem;
}
textarea {
    overflow-y: scroll;
    height: 100px;
    resize: none; /* Remove this if you want the user to resize the textarea */
}

</style>
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Student Writing Screen</title>
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

  <body class="newbody">
  <?php 
  if(isset($_SESSION['usersession']))
  {
	    $usersession = $_SESSION['usersession'];	
		//$profileid = $_SESSION['profileid'];
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
              ><h1 class="headercolor"><strong>Essay Grading</strong></h1></a>
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
				if($usersession!="none")
			   {
				echo '<li class="nav-item active submenu dropdown">';
                echo '<a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
					style="color:#FFFFFF"
                    ><font size="3px">WELCOME '.$usersession.' !!!!!</font></a>';
                  
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
	<?php
require('connectToDb.php');

    $username='unset';
	$profileid= 'none';
    
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
	}
	 if(isset($_SESSION['profileid']))
    {
        $profileid = $_SESSION['profileid'];
	}
$profile_query ="SELECT profilefk from login where uname='".$usersession."'";
$profile_result = mysqli_query($db,$profile_query);
$profile_row1 = mysqli_fetch_assoc($profile_result);

$profileid = $profile_row1['profilefk'];
$_SESSION['profileid'] = $profileid;

$topic_query ="SELECT DISTINCT e.*,a.activityid from essay e, activity a where a.topicidfk = e.essayid and a.status = 1";
$result = mysqli_query($db,$topic_query);
$row1 = mysqli_fetch_assoc($result);
$spellcheckInd = (string)$row1['spellcheck'] == '0' ? "False": "True";

$activityid = $row1['activityid'];
?>
    <section class="feature_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="main_title">
              <h2 class="headercolor"><i> You Can Start Writing Your Essay</i></h2>
			  <label id="label" align="left" class="headercolor"> <strong>Topic</strong>: <?php echo $row1['topic']; ?></label><br> 
			  <label id="label" align="left" class="headercolor"><strong>Time left:</strong><font color="blue"><i><span id="timerCheck"></span></i></font></label><br>
			  <?php if($row1['picture'] != '') echo '<img src="data:image/jpeg;base64,'.base64_encode( $row1['picture'] ).'" height ="300" width ="300"/>'; ?><br>
              
            </div>
          </div>
        </div>
        
			
		<div class="row justify-content-center">
		

<form method="post" action="studentwritingscreen.php">

               
<div class="form-group shadow-textarea">
  <h3 class="headercolor">Answer:</h3> 
  <textarea class="form-control z-depth-1" id="content" spellcheck = <?php echo $spellcheckInd?> rows="15" cols="200" name="content" placeholder="Start writing your essay..."></textarea>
</div>
<div class="form-group">  
                     <input type="hidden" name="studentid_fk" id="studentid_fk" value="<?php echo $profileid;?>" />  
					 <input type="hidden" name="activityid_fk" id="activityid_fk" value="<?php echo $activityid;?>" />  
                     <div id="autoSave"></div>  
                </div>  
<div style="text-align: left;">
<input type="submit" name="Finish" value="Grade Me!" class="myButton" align="left">
</div>
<br />
<br />
<?php 

if(isset($_POST['Finish']))
	{
		
		$topic = $row1['topic'];
		$contentspecialchar = stripslashes($_POST['content']);
		$content = mysqli_real_escape_string($db, $contentspecialchar);
		$time = date("F d, Y h:i:s A",time());
		$_POST['activityid_fk']=$profileid;
		//echo $time;
		$updatequery = "update activitystudent set content = '$content',student_Status = '1' where activity_idfk = $activityid and student_idfk = $profileid";
		$result = mysqli_query($db,$updatequery);
		if($result){
		  
						//echo "You have succesfully submitted your essay on: " .$time;
						echo "<script>if(confirm('You have succesfully submitted your essay. Please click on ok to Log Out')){document.location.href='logout.php'};</script>";
						//header("refresh:3;url=index.php"); 
						mysqli_close($db);
					
		        }
		else{
		  echo "Your essay could not been succesfully submitted";
		  echo "content" .$content;
		  echo "actvity" .$activityid;
		  echo "profile" .$profileid;
		  
		   mysqli_close($db);
           //return false; // Error somewhere
      }
	
	}
	

	//echo "finished";
?>
<script>
/*document.getElementById('timer').innerHTML =
05 + ":" + 00;*/
document.getElementById('timerCheck').innerHTML = <?php echo $row1['timer']?> + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timerCheck').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
	 // var topic = exampleFormControlTextarea6.value;
	 // alert(exampleFormControlTextarea6.value);
	  if(confirm('Your time is up. Please click on ok to Log Out'))
	  {
		  document.location.href='logout.php'
	  };
  }
  
  document.getElementById('timerCheck').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
</script>
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
<script>  
 $(document).ready(function(){  
      function autoSave()  
      {  
           var post_title = "post";  
           var post_description = $('#content').val();  
           var activityid_fk = $('#activityid_fk').val();
		   var profile_id = $("#studentid_fk").val();
           if(post_title != '' && post_description != '')  
           {  
                $.ajax({  
                     url:"save_post.php",  
                     method:"POST",  
                     data:{postTitle:post_title,postDescription:post_description, postId:activityid_fk, profileId:profile_id},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          if(data != '')  
                          {  
                               $('#activityid_fk').val(data);  
                          }  
                          $('#autoSave').text("Post save as draft");  
                          setInterval(function(){  
                               $('#autoSave').text('');  
                          }, 5000);  
                     }  
                });  
           }            
      }  
      setInterval(function(){   
           autoSave();   
           }, 10000);  
 });  
 </script>
