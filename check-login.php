<?php include './connection.php';


if (isset($_POST['userId']) && isset($_POST['password'])) {

    function test_input($data) {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $userId=test_input($_POST['userId']);
    $password=test_input($_POST['password']);


    $sql="SELECT * FROM login_table WHERE user_id ='$userId' AND password ='$password'";

    $result=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    if($count==1) {
        $object = mysqli_fetch_assoc($result);
        mysqli_close($conn);//Close Database
        session_start();//Start Session if User Found
        //Session Variables
        $_SESSION["id"] = $object['id'];
        $_SESSION['name'] = $object['name'];
        $_SESSION['bc_image'] = $object['bc_image'];
        $_SESSION['bank'] = $object['bank'];
        $_SESSION['role'] = $object['role'];
        $_SESSION['user_id'] = $object['user_id'];
        $_SESSION['mobile_number'] = $object['mobile_number'];
        $_SESSION['image_type'] = $object['image_type'];
        //Session Variable End
       ?>
<script>
    window.location.href = "./creatives.php";
</script>
<?php
    }
    else{
        mysqli_close($conn);
       ?>
<script>
    alert("invalid koid or password");
    window.location.href = "./";
</script>
<?php

    }

}


?>