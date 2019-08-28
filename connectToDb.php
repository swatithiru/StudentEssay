<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masterdb";

try {
    
        $db = mysqli_connect($servername,$username,$password,$dbname);
    }
    catch(Exception $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>
