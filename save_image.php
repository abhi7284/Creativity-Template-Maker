<?php
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<body>
<?php
session_start();
if ($_SESSION['user_id'] != "") {
    include './connection.php';
    //Time Details
    $time = date_default_timezone_set('Asia/Kolkata');
    $date = Date("Y-m-d");
    $ac_time = Date("h:i:s");

    $imgData = mysqli_real_escape_string($conn, file_get_contents($_FILES['creative']['tmp_name']));
    $imageType = $_FILES['creative']['type'];
    $imageName = $_FILES['creative']['name'];
    $imageError = $_FILES['creative']['error'];
    $imageSize = $_FILES['creative']['size'];
    $query = "INSERT INTO `gallery`(`name_image`, `image`, `date`,`image_type`,`creative`) VALUES ('{$imageName}','{$imgData}','{$date}','{$imageType}','{$_POST['event_name']}')";
    //$query = "INSERT INTO `gallery`(`name_image`, `image`, `date`, `bank`, `image_type`,`creative`) VALUES ('{$imageName}','{$imgData}','{$date}','{$_POST['bank']}','{$imageType}','{$_POST['event_name']}')";
    
    // if (!mysqli_query($conn,$query)) {
    //     echo("Error description: " . mysqli_error($conn));
    //   }

    //Auto Commit Off
    mysqli_autocommit($conn, FALSE);
    //Count
    $count = 0;
    if (!mysqli_query($conn, $query)) {
        $count = $count + 1;
    }

    if($count == 0) {
        mysqli_commit($conn);
        mysqli_close($conn);
    ?>
        <script>
            swal("Image Saved...", "", "success", {
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

} else {
?>
    <script>
        window.location.href = "./";
    </script>
<?php
}
?>
    </body>

    </html>
<?php


?>