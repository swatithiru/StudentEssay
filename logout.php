<?php
 session_start();
 //session_destroy();
 unset($_SESSION["usersession"]);
 header("refresh:0;url=newlogin.php");
?>
