<?php include './connection.php';


if (isset($_POST['bank']) && isset($_POST['koid']) && isset($_POST['password'])) {

    function test_input($data) {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $bank=test_input($_POST['bank']);
    $koid=test_input($_POST['koid']);
    $password=test_input($_POST['password']);


    $sql="SELECT * FROM user WHERE bank='$bank' AND koid ='$koid' AND password ='$password' ";

    $result=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    if($count==1) {
       ?>
<script>
    setInterval(function () {
        window.location.href = "./creatives.php";
    }, 2000);
</script>
<?php

    }
    else{
       ?>
<script>
    alert("invalid koid or password");
    window.location.href = "./";
</script>
<?php

    }

}


?>