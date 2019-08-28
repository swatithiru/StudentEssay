<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$servername = "localhost";
$username = "login";
$passworddb = "login";
$dbname = "masterdb";

try {
    
        $db = mysqli_connect($servername,$username,$passworddb,$dbname);
    }
    catch(Exception $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>
