<html>
<head>
</head>
<body>
<form method="post" action="auto.php">
<input type="submit" name="submit" value="submit">
<?php
if(isset($_POST['submit']))
{
	//echo "submitted";
	
	$db = mysqli_connect('localhost','login','login','masterdb')
    or die('Error connecting to MYSQL server.');
	
	$checkrow = "SELECT * from auto";
	$check = mysqli_query($db, $checkrow);
	$count = mysqli_num_rows($check);
	if ($count ==0 )
	{
		//echo "no rows found";
		 $ins = "INSERT INTO auto(id,name) VALUES ('1','sansa')";     
		 $result = mysqli_query($db,$ins);
		 
		 $retauto = "SELECT id FROM auto WHERE name = 'sansa'";
		 $retriveauto = mysqli_query($db,$retauto);
		 $row = mysqli_fetch_assoc($retriveauto);
         $new =  $row['id'];
   
		 $insAuto = "INSERT INTO autofk(autoid_fk,name) VALUES ('$new','sansa')";
		 $resAuto = mysqli_query($db,$insAuto);
		 if($resAuto)
        {
            echo "submitted";
			mysqli_close($db);
            return true; // Success
        }
	 else
             {
                mysqli_close($db);
                return false; // Error somewhere
             }	
	}
	else
	{
	$retrieveauto = "SELECT id from auto order by id desc limit 1";
	$retrive = mysqli_query($db,$retrieveauto);
	$row = mysqli_fetch_assoc($retrive);
	$new =  $row['id'];
	$new = $new + 1;
	
    $ins = "INSERT INTO auto(id,name) VALUES ('$new','stark')";     
    $result = mysqli_query($db,$ins);
	
	$retauto = "SELECT id FROM auto WHERE name = 'stark'";
	$retriveauto = mysqli_query($db,$retauto);
	$row = mysqli_fetch_assoc($retriveauto);
    $newauto =  $row['id'];
   
	$insAuto = "INSERT INTO autofk(autoid_fk,name) VALUES ('$newauto','stark')";
	$resAuto = mysqli_query($db,$insAuto);
	
    if($resAuto)
        {
            echo "submitted" .$new;
			mysqli_close($db);
            return true; // Success
        }
	 else
             {
                mysqli_close($db);
                return false; // Error somewhere
             }	
	}
	
	
	
}
?>
</form>
</body>
</html>