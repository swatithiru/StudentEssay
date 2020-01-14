<?php  
 $connect = mysqli_connect("localhost", "login", "login", "masterdb");
 if(isset($_POST["postTitle"]) && isset($_POST["postDescription"]))
 {
  $post_title = mysqli_real_escape_string($connect, $_POST["postTitle"]);
  $post_description = mysqli_real_escape_string($connect, stripslashes($_POST["postDescription"]));
  $profile_id = mysqli_real_escape_string($connect, $_POST['profileId']);
  //$post_id = mysqli_real_escape_string($connect, $_POST["postId"]);
  if($_POST["postId"] != '')  
  {  
    //update post  
    //$sql = "UPDATE tbl_post SET post_title = '".$post_title."', post_description = '".$post_description."' WHERE post_id = '".$_POST["postId"]."'";  
	$sql = "update activitystudent set content = '$post_description',student_Status = '1' where activity_idfk = '".$_POST["postId"]."' and student_idfk = '".$_POST["profileId"]."'";
    mysqli_query($connect, $sql);  
  }  
  else  
  {  
    //insert post  
   // $sql = "INSERT INTO tbl_post(post_title, post_description, post_status) VALUES ('".$post_title."', '".$post_description."', 'draft')";  
    $sql = "update activitystudent set content = '$post_description',student_Status = '1' where activity_idfk = '".$_POST["postId"]."' and student_idfk = '".$_POST["profileId"]."'";
    mysqli_query($connect, $sql);  
    echo mysqli_insert_id($connect);  
  }
 }  
 ?>