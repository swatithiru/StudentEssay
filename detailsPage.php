<html>
	<head>
	</head>
	<body>
	<form method="post" action="detailsPage.php">
		<div>
		<h3> Students List</h3>
		<div id="spaceTop">
		<table border="1px" style="width:300px; line-height:15px;">
				<t>
				<th> Name </th>
				<th> Content </th>
				<th> Grade</th>
				<th>  </th>
				
			</t>
		<?php
		require('connectToDb.php');
		$studentid = 'none';
		$activityid = 'none';
		session_start();                
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
				<td><a href="#"> <?php echo $row1['name']; ?></a></td>
				<td><?php echo $row1['content']; ?></td>
				<td><input type = "text"  id = "gradetext" name = "gradetext" value = "<?php echo $row1['grade']; ?>" autocomplete ="off"></td>
				<td><input type = "submit" id = "changegrade" name = "changegrade" value ="Change Grade"></td>
			</tr>
			
		</table>
		</div>
		<div>
		<input type="submit" name="back" value="back">
		</div>

		</div>
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
						exit(header("refresh:0;url=essayActivity.php")); 
					
		        }
		}
		
		if(isset($_POST['back']))
		{
			exit(header("refresh:0;url=essayActivity.php"));
		}
		?>

	</body>
</html>