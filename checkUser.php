<?php
include './connection.php';
$data = $_POST['value'];
$query_user_serach = "SELECT * FROM `login_table` l WHERE l.user_id='{$data}'";
$result = mysqli_query($conn,$query_user_serach);
$count = mysqli_num_rows($result);
if($count == 0 ){
    echo("0");//Not Found
}
else{
    echo("1");//Found
}
?>