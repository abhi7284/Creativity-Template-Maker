<?php
    $timezone = date_default_timezone_set('Asia/Kolkata');//Set  India Time 
    /* Details*/
    $servername = "localhost";
    $database = "creatives";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database) or die("Connection Failed");
?>