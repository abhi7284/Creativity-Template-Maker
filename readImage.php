<?php
include './connection.php';
$query = "SELECT * FROM image_save ";
$result = mysqli_query($conn,$query);

    //header("content-type: image/jpg");
    //echo($row['image_code']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br>
<?php while($row = mysqli_fetch_assoc($result)){
    ?>
        <img src="data:<?php echo($row['image_type']); ?>;charset=utf-8;base64,<?php echo(base64_encode($row['image_code'])); ?>" alt="">
    <?php
} ?>
    
</body>
</html>