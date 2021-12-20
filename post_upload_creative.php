<?php 

include './connection.php';

$status = $statusMsg = ''; 

if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["creative"]["name"])) { 
        // Get file info 
        $name=$_POST['name'];
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        echo $name;
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 

        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['creative']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $sql = "INSERT into creatives (id,creative_name ,creative, date) VALUES (,id,'$name','$imgContent',None)"; 
            $insert=mysqli_query($conn, $sql);

            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
}
else{

    ?>
    <script>
        alert("Not Uploaded!");
      window.location.href = "./creatives.php";
    </script>
    <?php
}
 
// Display status message 
echo $statusMsg; 

?>