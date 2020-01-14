<html>
	<head>
	</head>
	<body>
	<form method="post" action="essayActivity.php">
		<div>
		<h3> Students List</h3>
		<div id="spaceTop">
		<table border="1px" style="width:300px; line-height:15px;">
				<t>
				<th> ID </th>
				<th> Name </th>
				<th> Content </th>
				<th> Grade</th>
				
			</t>
		<?php
		require('connectToDb.php');
		$activityid = 'none';
		session_start();
		if(isset($_GET['activityid']))
		{
			$activityid = $_GET['activityid'];
			$_SESSION['activityid'] = $activityid;
		}
		if(isset($_SESSION['activityid']))
		{
			$activityid = $_SESSION['activityid'];
		}
		$student_query ="SELECT a.student_idfk,p.name,a.content,a.grade FROM profile p, activitystudent a WHERE p.profileid=a.student_idfk AND a.activity_idfk=".$activityid;
		$result = mysqli_query($db,$student_query);
		$count = 1;
		while($row1 = mysqli_fetch_assoc($result))
		{
			$variable = $row1['student_idfk'];
		
		?>
		
			<tr>
				<td><?php echo $count++; ?></td>
				<!--<td><a href="detailsPage.php?id=".$row1['student_idfk']></a></td>-->
				<td><a href="detailsPage.php?studentid=<?php echo $variable?>"> <?php echo $row1['name']; ?></a></td>
				<td><?php echo $row1['content']; ?></td>
				<td><?php echo $row1['grade']; ?></td>
				<!--<td><a href="detailsPage.php?activity_idfk=35"></a></td>-->
			</tr>
		<?php                
		}
		?>
			
		</table>
		</div>
		<div>
		<input type="submit" name="back" value="back">
		<?php
		if(isset($_POST['back']))
		{
			exit(header("refresh:0;url=activityScreen.php"));
		}
		?>
		</div>

		</div>
		</form>
		
	</body>
</html>