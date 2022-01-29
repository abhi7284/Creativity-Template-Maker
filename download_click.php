<?php
include './connection.php';
$userId = $_POST['user_id'];
$mobile = $_POST['mobile'];

//Time Details
$time = date_default_timezone_set('Asia/Kolkata');
$date = Date("Y-m-d");
$time = Date("h:i:s");

//Query
$query_for_save_download_click = "INSERT INTO `download_click`(`user_id`, `mobile`, `date`, `time`) VALUES ('{$userId}','{$mobile}','{$date}','{$time}')";
//Auto Commit Off
mysqli_autocommit($conn, FALSE);
$count = 0;
if(!mysqli_query($conn,$query_for_save_download_click)){
    $count = $count + 1;
}

if($count == 0){
    mysqli_commit($conn);
    mysqli_close($conn);
    echo("1"); // True
}else{
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo("0");// False
}
?>