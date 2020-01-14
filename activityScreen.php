<html>
<body>
<form method="post" action="activityScreen.php">
<div align="left">
<?php
require('connectToDb.php');
$essaytopic = 'none';
$topicid = 'none';
session_start();                
if(isset($_GET['topic']))
{
	$essaytopic = $_GET['topic'];
	$_SESSION['essaytopic'] = $essaytopic;
}
    if(isset($_SESSION['essaytopic']))
    {
        $essaytopic = $_SESSION['essaytopic'];
	}
	if(isset($_SESSION['topicid']))
    {
        $topicid = $_SESSION['topicid'];
	}

$topic = "SELECT * FROM essay where topic = '".$essaytopic."'";
$result = mysqli_query($db,$topic);
$row1 = mysqli_fetch_assoc($result);
$topicid = $row1['essayid'];
$_SESSION['topicid'] = $topicid;
$topic_query ="SELECT activityid FROM activity WHERE topicidfk =$topicid and status = 1 order by time desc";
$current_activity = mysqli_query($db,$topic_query);
$currentRow=null;
if($current_activity!=null)
$currentRow = mysqli_fetch_assoc($current_activity);
?>
<label> <strong> Essay Topic: </strong> <?php echo $row1['topic'] ?></label><br>
<label id="label" align="left"> <strong>Current Activity</strong>: <?php echo $currentRow['activityid'] ?></label> &nbsp;
<input type="submit" name="startActivity" value="startActivity">
<?php

if(isset($_POST['startActivity']))
{
	$time = date("F d, Y h:i:s A",time());
	
	$insertActivity = "INSERT INTO activity(topicidfk,time,status) VALUES (".$topicid.",now(),'1')";
	$resultActivity = mysqli_query($db,$insertActivity);
	
	$retActivity = "SELECT activityid FROM activity WHERE topicidfk =".$topicid." ORDER BY time desc LIMIT 1";
	$retriveActivity = mysqli_query($db,$retActivity);
	
	
	$secondlastactivity = "SELECT activityid from activity where activityid not in (select max(activityid) from activity) order by activityid DESC limit 1";
	$secondlactivity = mysqli_query($db,$secondlastactivity);
	
	$secondrow = mysqli_fetch_assoc($secondlactivity);
	$secondrowid = $secondrow['activityid'];
	
	$secondupdate = "update activity set status = 0 where activityid =".$secondrowid;
	$secondupdateactivity = mysqli_query($db,$secondupdate);
	
	$rowActivity = mysqli_fetch_assoc($retriveActivity);
	$new =  $rowActivity['activityid'];

	
	$ret = "SELECT profileid FROM profile";
	$retrive = mysqli_query($db,$ret);
          
	while($rowAct = mysqli_fetch_assoc($retrive))
	{
	$studentid =  $rowAct['profileid'];
	$insertStudentActivity = "INSERT INTO activitystudent(activity_idfk,student_idfk,content,student_Status,grade) VALUES ('$new','$studentid','','','')";
	$resultStudentActivity = mysqli_query($db,$insertStudentActivity);
	}
	if($resultStudentActivity){
		  echo "activity is successfully started";	
		  header("refresh:0;url=profScreen.php");
		  mysqli_close($db);
          return true; // Success
      }
	  else{
		   echo "activity is not started";	
		   mysqli_close($db);
           return false; // Error somewhere
      }
	
}
	

?>

<div>
<br>
<table border="1px" style="width:300px; line-height:12px;">
        <t>
        <th> previous Activity </th>
		<th> time </th>
        </t>
		
<?php
require('connectToDb.php');
$topic_query ="SELECT * FROM activity WHERE topicidfk = $topicid and status = 0 order by time";
$result = mysqli_query($db,$topic_query);
while($pastrow = mysqli_fetch_assoc($result))
{
?>
    <tr>
		<?php $activityid = $pastrow['activityid']; $activitytime = $pastrow['time'];?>
        <td> <a href="essayActivity.php?activityid=<?php echo $activityid;?>&activitytime = <?php echo $activitytime;?>"><?php echo $activityid;?></a> </td>
		 <td> <a href="essayActivity.php?activityid=<?php echo $activityid;?>&activitytime = <?php echo $activitytime;?>"><?php echo $activitytime;?></a> </td>
    </tr>
<?php                
}
?>
</div>
</table>

		<div>
		<input type="submit" name="back" value="back">
		<?php
		if(isset($_POST['back']))
		{
			exit(header("refresh:0;url=profScreen.php"));
		}
		?>
		</div>
		</form>
</body>  

</html>