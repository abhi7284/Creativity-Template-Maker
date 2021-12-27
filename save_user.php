<?php
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<body>
<?php
session_start();
if($_SESSION['user_id'] != ""){

    include './connection.php';
    //$bank = $_POST['bank'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile_number'];
    $role = 2;

    $imgData = mysqli_real_escape_string($conn,file_get_contents($_FILES['user_image']['tmp_name']));
    $imageType = $_FILES['user_image']['type'];
    $imageName = $_FILES['user_image']['name'];
    $imageError = $_FILES['user_image']['error'];
    $imageSize = $_FILES['user_image']['size'];

    $query = "INSERT INTO `login_table`(`name`, `bc_image`, `role`, `password`, `user_id`, `mobile_number`, `image_type`) VALUES ('{$name}','{$imgData}','{$role}','{$mobile}','{$user_id}','{$mobile}','{$imageType}')";

    //$query = "INSERT INTO `login_table`(`name`, `bc_image`, `bank`, `role`, `password`, `user_id`, `mobile_number`, `image_type`) VALUES ('{$name}','{$imgData}','{$bank}','{$role}','{$mobile}','{$user_id}','{$mobile}','{$imageType}')";

    //Auto Commit Off
    mysqli_autocommit($conn, FALSE);
    //Count
    $count = 0;

    // if (!mysqli_query($conn,$query)) {
    //     echo("Error description: " . mysqli_error($conn));
    //   }


    if (!mysqli_query($conn, $query)) {
        $count = $count + 1;
    }

    if($count == 0) {
        mysqli_commit($conn);
        mysqli_close($conn);
    ?>
        <script>
            swal("User Saved...", "", "success", {
                    button: "Back",
                }).then((value) => {
                    window.location.href = "./creatives.php";
                });
        </script>
    <?php

    } else {
        mysqli_rollback($conn);
        mysqli_close($conn);
    ?>
        <script>
            swal("Internal Server Error!", "", "error", {
                    button: "Back",
                }).then((value) => {
                    window.location.href = "./creatives.php";
                });
        </script>
    <?php
    }

}
else{
    ?>
    <script>
        window.location.href = "./";
    </script>
<?php
}






?>