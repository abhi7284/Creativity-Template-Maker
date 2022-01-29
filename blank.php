<?php
session_start();
//session_destroy();
if ($_SESSION['user_id'] != "") {
    include './connection.php';
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">
        <link rel="icon" href="./Favicon.png">

        <link rel="stylesheet" href="./style.css">

        <title>Creatives</title>
        <style>
            .hover-box-shadow :hover {
                transition: 0.3s;
                border: 2px solid #D8E3E7 !important;
            }
        </style>

    </head>

    <body>
        <div id="main" class="h-100 m-0 p-0">
            <section class="vh-100" style="padding: 1%;">
                <!-- Modal creative upload for Image -->
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload New Creative</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="post" action="./save_image.php" enctype="multipart/form-data">
                                    <div class="form-group mt-3">
                                        <label class=" m-1" for="event">Event Name :</label>
                                        <input type="text" name="event_name" class="form-control" id="event" required>
                                    </div>

                                    <!--<div class="form-group mt-3">-->
                                    <!--    <label for="m-1">Bank</label>-->
                                    <!--    <select type="text" name="bank" class="form-control" required>-->
                                    <!--        <option value="" selected>Select Bank</option>-->
                                    <!--        <option value="JRGB">JRGB</option>-->
                                    <!--        <option value="BOI">BOI</option>-->
                                    <!--    </select>-->
                                    <!--</div>-->

                                    <div class="form-group text-center mt-3">
                                        <small class="text-danger m-1">*Prefered Image resolution (1500 X 1500)px</small>
                                        <input type="file" name="creative" class="form-control" id="file" accept="image/*" onchange=loadUploadedCreative(event) required>
                                    </div>
                                    <div id="view" class="form-group text-center">
                                        <img class="m-2 border p-2 rounded" id="outputCreative" src="" alt="Creative Image" srcset="" style=" width:400px; height: 400px;">
                                    </div>
                                    <div class="form-group text-center">
                                        <button name="submit" type="submit" id="submit" class="btn btn-success">Upload</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal For Upload Image END -->


                <!-- Modal bc details upload -->
                <div class="modal fade" id="bcUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload BC Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="./save_user.php" method="POST" enctype="multipart/form-data">
                                    <!--<div class="form-group mt-3">-->
                                    <!--    <label for="m-1">Bank</label>-->
                                    <!--    <select name="bank" id="m-2" required class="form-control">-->
                                    <!--        <option value="" selected>Select Bank</option>-->
                                    <!--        <option value="JRGB" >JRGB</option>-->
                                    <!--        <option value="BOI" >BOI</option>-->
                                    <!--    </select>-->
                                    <!--</div>-->
                                    <div class="form-group mt-3">
                                        <label class="m-1" for="koid">User ID :</label>
                                        <input type="text" name="user_id" class="form-control" id="koid" required>
                                        <div id="error" style="display:none;"><small class="text-danger">User Already
                                                Exist!!!</small></div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class=" m-1" for="name">Name :</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class=" m-1" for="mobile">Mobile :</label>
                                        <input type="text" name="mobile_number" class="form-control" id="mobile" required>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label class=" m-1" for="photo">Photo :</label>
                                        <input type="file" name="user_image" class="form-control" id="photo" accept="image/*" onchange=loadUploadedPhoto(event) required>
                                    </div>
                                    <div id="view" class="form-group text-center">
                                        <img class="m-2 border p-2 rounded" id="outputPhoto" src="" alt="Photo" srcset="" style=" width:300px; height: 300px;">
                                    </div>
                                    <div id="submitButton" class="form-group text-center">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Modal End -->


                <!---------------------------- Navbar ------------------------------>

                <div class="m-4 pt-2 mb-2 h-100 white-box-shadow rounded border">
                    <nav class="navbar navbar-light  justify-content-between rounded mx-4 mt-2">
                        <a class="navbar-brand" href="./creatives.html">
                            <img class="disabled nav-link p-3" src="./dark-logo.png" alt="vedant-asset-logo" width="350px;">
                            <!-- <h2 class="display-4 nav-link disabled" style="font-weight: 400;">Vedant Asset</h2> -->
                        </a>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2 bg-light" type="search" placeholder="Search" aria-label="Search" style="border-radius: 10px;width: 300px;height: 45px;">
                        </form>
                        <!-- Creatives Button -->
                        <?php if ($_SESSION['role'] == "1") { ?>
                            <a class="navbar-brand">
                                <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-success" data-whatever="@getbootstrap"><i class="bi bi-upload mr-1"></i> Creatives </button>
                            </a>


                            <a class="navbar-brand" href="#">
                                <button type="button" data-toggle="modal" data-target="#bcUpload" class="btn btn-success" href="#" data-whatever="@getbootstrap"><i class="bi bi-upload mr-1"></i> BC Details
                                </button>
                            </a>

                            <!-- <a class="navbar-brand" href="#">
                        <button type="button" data-toggle="modal" data-target="#listModel" class="btn btn-success"
                            href="#" data-whatever="@getbootstrap"><i class="bi bi-upload mr-1"></i> BC List
                        </button>
                    </a> -->

                        <?php } ?>
                        <div>
                            <a class="navbar-brand m-0 p-0" href="./logout.php">
                                <h3 class="nav-link disabled"><i class="bi bi-box-arrow-left text-danger px-3"></i>
                                </h3>
                            </a>

                            <a class="navbar-brand m-0 p-0" href="#">
                                <h1 class="nav-link disabled p-0 m-0 pr-2" href="#"><i class="bi bi-person-circle"></i></h1>
                            </a>

                            <a class="navbar-brand m-0 p-0" href="#">
                                <!-- <small class="nav-link m-0 p-0 disabled">Admin</small> -->
                                <h5 class="nav-link disabled p-0 m-0 " href="#"><?php echo ($_SESSION['name']); ?></h5>
                            </a>
                        </div>
                    </nav>
                    <!------------------------ navbar END     ----------------------->

                    <?php
                    $limit = 10;

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $offset = ($page - 1) * $limit;

                    $sql = "SELECT * FROM `login_table` WHERE role=2 ORDER BY id DESC LIMIT {$offset},{$limit}";
                    $result_obj1 = mysqli_query($conn, $sql);

                    ?>
                    <div class="m-4 p-0 rounded w-80 text-center">
                        <h3>Heading</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1;
                                while ($row = mysqli_fetch_assoc($result_obj1)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo ($num); ?></th>
                                        <td><?php echo ($row['user_id']); ?></td>
                                        <td><?php echo ($row['name']); ?></td>
                                        <td><?php echo ($row['mobile_number']); ?></td>
                                        <td class="text-center"><img src="data:<?php echo ($row['image_type']); ?>;charset=utf-8;base64,<?php echo (base64_encode($row['bc_image'])); ?>" alt="" style="height: 200px;width:200px;"></td>
                                        <td><button type="button" data-toggle="modal" data-target="#<?php echo ($num); ?>" class="btn btn-primary" data-whatever="@getbootstrap">Edit</button>
                                        </td>

                                        <!-- Model -->
                                        <div class="modal fade" id="<?php echo ($num); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update BC Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="#" method="POST" enctype="multipart/form-data">
                                                            <!--<div class="form-group mt-3">-->
                                                            <!--    <label for="m-1">Bank</label>-->
                                                            <!--    <select name="bank" id="m-2" required class="form-control">-->
                                                            <!--        <option value="" selected>Select Bank</option>-->
                                                            <!--        <option value="JRGB" >JRGB</option>-->
                                                            <!--        <option value="BOI" >BOI</option>-->
                                                            <!--    </select>-->
                                                            <!--</div>-->
                                                            <div class="form-group mt-3 text-left">
                                                                <label class="m-1" for="koid">User ID :</label>
                                                                <input type="text" name="user_id" class="form-control" required value="<?php echo ($row['user_id']); ?>" disabled>
                                                            </div>
                                                            <div class="form-group mt-3 text-left">
                                                                <label class=" m-1" for="name">Name :</label>
                                                                <input type="text" name="name" class="form-control" id="name" required value="<?php echo ($row['name']); ?>">
                                                            </div>
                                                            <div class="form-group mt-3 text-left">
                                                                <label class=" m-1" for="mobile">Mobile :</label>
                                                                <input type="text" name="mobile_number" class="form-control" id="mobile" required value="<?php echo ($row['mobile_number']); ?>">
                                                            </div>

                                                            <div class="form-group mt-3 text-left">
                                                                <label class=" m-1" for="photo">Photo :</label>
                                                                <input type="file" name="user_image" class="form-control" id="photo" accept="image/*" onchange=loadUploadedPhoto(event) required>
                                                            </div>
                                                            <div id="view" class="form-group text-center">
                                                                <img class="m-2 border p-2 rounded" id="outputPhoto" src="" alt="Photo" srcset="" style=" width:300px; height: 300px;">
                                                            </div>
                                                            <div id="submitButton" class="form-group text-center">
                                                                <input type="submit" class="btn btn-success">
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Model End -->
                                    </tr>
                                <?php $num = $num + 1;
                                } ?>
                            </tbody>
                        </table>
                        <!-- Pagination HTML  -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                $sql1 = "SELECT id FROM `login_table` WHERE role=2";
                                $result_obj = mysqli_query($conn, $sql1);

                                if (mysqli_num_rows($result_obj) > 0) {
                                    $total_records = mysqli_num_rows($result_obj);

                                    $total_page = ceil($total_records / $limit);

                                    if ($page > 1) {
                                ?>
                                        <li class="page-item"><a class="page-link" href="./bc_list.php?page=<?php echo ($page - 1); ?>">Prev</a></li>
                                    <?php
                                    }
                                    for ($i = 1; $i <= $total_page; $i++) {
                                        if ($i == $page) {
                                            $active = "active";
                                        } else {
                                            $active = "";
                                        }
                                    ?>
                                        <li class="page-item <?php echo ($active); ?>"><a class="page-link" href="./bc_list.php?page=<?php echo ($i); ?>"><?php echo ($i); ?></a></li>
                                <?php
                                    }
                                    if ($page > 1) {
                                        ?>
                                                <li class="page-item"><a class="page-link" href="./bc_list.php?page=<?php echo($page+1);?>">Next</a></li>
                                            <?php
                                            }
                                }

                                ?>

                                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                            </ul>
                        </nav>
                    </div>

                </div>
            </section>
        </div>






















        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function download(url) {
                dowloadClick();
                var a = $("<a style='display:none' id='js-downloder'>")
                    .attr("href", url)
                    .attr("download", "VedantAsset")
                    .appendTo("body");

                a[0].click();

                a.remove();
            }

            function saveCapture(element) {
                html2canvas(element).then(function(canvas) {
                    download(canvas.toDataURL("image/png"));
                })
            }

            // $('#btnDownload').click(function () {
            //     var element = document.querySelector("#create-area");
            //     saveCapture(element)
            // })

            $("#download-creative").on("click", () => {

                $("#main").addClass("d-none")
                $("#create-area").removeClass("d-none")
                $("#top-div").append($("#bottom"))
                var element = document.querySelector("#create-area");
                saveCapture(element)
                $("#create-area").addClass("d-none")
                $("#main").removeClass("d-none")
            })


            var loadUploadedCreative = function(event) {
                var output = document.getElementById('outputCreative');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };


            var loadUploadedPhoto = function(event) {
                var output = document.getElementById('outputPhoto');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };

            function changeIt(img) {
                $("#top").attr("src", img);
                $("#top-image").attr("src", img);
            }

            //Check User Name Exist Or Not
            $("#koid").on("keyup", function(e) {
                var koid = $("#koid").val();
                var koid = koid.trim();
                // var str = $("#inputBlock").val();
                // var bank = $("#bank").val();
                $.ajax({
                    url: "./checkUser.php",
                    type: "POST",
                    data: {
                        value: koid
                    },
                    success: function(data) {
                        if (data == 1) { //User Found
                            $("#submitButton").css("display", "none");
                            $("#error").css("display", "block");
                        } else //User Not Found
                        {
                            $("#submitButton").css("display", "block");
                            $("#error").css("display", "none");
                        }
                    }
                });
            });

            //Get Information About who Download Imgae
            function dowloadClick() {
                var userID = "<?php echo ($_SESSION['user_id']); ?>";
                var mobile_Number = "<?php echo ($_SESSION['mobile_number']); ?>";
                $.ajax({
                    url: "./download_click.php",
                    type: "POST",
                    data: {
                        user_id: userID,
                        mobile: mobile_Number
                    },
                    success: function(data) {

                    }
                });
            }
        </script>







    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location.href = "./";
    </script>
<?php
}
?>