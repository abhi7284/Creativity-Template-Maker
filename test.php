<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./test.php" method="POST" enctype="multipart/form-data">
        <br>
        <label for="">Image Upload</label>
        <input type="file" name="image" required>
        <br>
        <br>
        <input type="submit" name="submit">
    </form>

    <br><br><br><br><br>

    <?php


    if (isset($_POST['submit'])) {
        include './connection.php';
        echo ("<pre>");
        print_r($_FILES['image']);
        echo ("<pre>");
        $name = $_FILES['image']['name'];
        $imgData = mysqli_real_escape_string($conn, file_get_contents($_FILES['image']['tmp_name']));
        $imageType = $_FILES['image']['type'];
        $imageName = $_FILES['image']['name'];
        $imageError = $_FILES['image']['error'];
        $imageSize = $_FILES['image']['size'];
        $query = "INSERT INTO `image_save`(`image_code`, `image_type`, `image_name`, `imgae_error`, `image_size`) VALUES ('{$imgData}','{$imageType}','{$imageName}','{$imageError}','{$imageSize}')";
        if (mysqli_query($conn, $query)) {
    ?>
            <script>
                alert("File Saved");
            </script>
        <?php
            echo ("File Saved");
        }
    } else {
        ?>
        <script>
            alert("File Saved");
        </script>
    <?php
        echo ("Error File Not Saved");
    }
    ?>
    <br><br><br><br>

    <?php
    ?>

    

    <!-- <img src="./readImage.php" alt=""> -->
    <?php
    $value = file_get_contents('C:/Users/ASUS/Downloads/VedantAsset (9).png');
    echo("<img src='".$value."' </img>");
    ?>
</body>

</html>