<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
            <!-- Modal creative upload -->
            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload New Creative</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form method="post" action="./post_upload_creative.php">
                                <div class="form-group mt-3">
                                    <label class=" m-1" for="event">Event Name :</label>
                                    <input type="text" name="name" class="form-control" id="event">
                                </div>

                                <div class="form-group text-center mt-3">
                                    <small class="text-danger m-1">*Prefered Image resolution (1500 X 1500)px</small>
                                    <input type="file" name="creative" class="form-control" id="file" accept="image/*"
                                        onchange=loadUploadedCreative(event)>
                                </div>
                                <div id="view" class="form-group text-center">
                                    <img class="m-2 border p-2 rounded" id="outputCreative" src=""
                                        alt="Creative Image" srcset="" style=" width:400px; height: 400px;">
                                </div>
                                <div class="form-group text-center">
                                    <button name="submit" type="submit" id="submit" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>


            <!-- Modal bc details upload -->
            <div class="modal fade" id="bcUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload BC Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group mt-3">
                                    <label class=" m-1" for="koid">KOID :</label>
                                    <input type="text" class="form-control" id="koid">
                                </div>
                                <div class="form-group mt-3">
                                    <label class=" m-1" for="name">Name :</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group mt-3">
                                    <label class=" m-1" for="mobile">Mobile :</label>
                                    <input type="text" class="form-control" id="mobile">
                                </div>

                                <div class="form-group mt-3">
                                    <label class=" m-1" for="photo">Photo :</label>
                                    <input type="file" class="form-control" id="photo" accept="image/*"
                                        onchange=loadUploadedPhoto(event)>
                                </div>
                                <div id="view" class="form-group text-center">
                                    <img class="m-2 border p-2 rounded" id="outputPhoto" src="" alt="Photo"
                                        srcset="" style=" width:300px; height: 300px;">

                                </div>
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
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
                        <input class="form-control mr-sm-2 bg-light" type="search" placeholder="Search"
                            aria-label="Search" style="border-radius: 10px;width: 300px;height: 45px;">
                    </form>

                    <a class="navbar-brand" href="#">
                        <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-success"
                            href="#" data-whatever="@getbootstrap"><i class="bi bi-upload mr-1"></i> Creatives </button>
                    </a>

                    <a class="navbar-brand" href="#">
                        <button type="button" data-toggle="modal" data-target="#bcUpload" class="btn btn-success"
                            href="#" data-whatever="@getbootstrap"><i class="bi bi-upload mr-1"></i> BC Details
                        </button>
                    </a>
                    <div>
                        <a class="navbar-brand m-0 p-0" href="#">
                            <h1 class="nav-link disabled" href="#"><i class="bi bi-gear"></i></h1>
                        </a>

                        <a class="navbar-brand m-0 p-0" href="#">
                            <h1 class="nav-link disabled p-0 m-0 pr-2" href="#"><i class="bi bi-person-circle"></i></h1>
                        </a>

                        <a class="navbar-brand m-0 p-0" href="#">
                            <small class="nav-link m-0 p-0 disabled">Admin</small>
                            <h5 class="nav-link disabled p-0 m-0 " href="#">Abhishek Kumar</h5>
                        </a>
                    </div>
                </nav>
                <!------------------------ navbar END     ----------------------->


                <div class="row m-4 p-0 rounded">

                    <div class="col-md-4 col-sm-12 bg-light border-dark " style="height: 450px;">
                        <div class="content">
                            <a href="#" target="#">
                                <div class="content-overlay m-2 rounded text-center"></div>
                                <img id="top-image" class="m-2  p-2 rounded  content-image border rounded text-center"
                                    src="./Sample.jpg" alt="" height="410px">
                                <div class="content-details fadeIn-bottom">
                                    <button id="download-creative" class="btn btn-success">Download</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 bg-light border-dark">
                        <div class="row text-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 bg-light border-dark "
                                        style="height: 300; width:300px;">

                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded " src="./1.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-12 bg-light border-dark">
                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded" src="./2.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-12 bg-light border-dark">
                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded" src="./3.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-12 bg-light border-dark">
                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded" src="./4.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-md-3 col-sm-12 bg-light border-dark">
                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded" src="./5.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-12 bg-light border-dark">
                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded" src="./6.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-12 bg-light border-dark">
                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded" src="./7.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-12 bg-light border-dark">
                                        <a href="#" class="hover-box-shadow">
                                            <img class="m-2 p-2 rounded img-fluid border rounded" src="./8.png"
                                                width="300px" height="300px" alt="" onclick="changeIt(this.src)">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <div id="create-area" class="d-none">
        <div id="top-div" class=""> <img id="top" src="./Sample.jpg" alt=""></div>
        <div class="" style="width:1500px; height:300px;background-color: #1e2434;">
            <div class="row text-light">
                <div class="col-3 text-right" style="margin-top:28px;">
                    <img id="top-img-main" class="" src="./profile.png" alt="" width="225px"
                        style="border-radius:200px;border: 4px solid #fff;margin-right: 38px;">
                </div>
                <div class="col-9  " style="margin-top: 28px;">
                    <div class="row">
                        <div class="col-11 mt-3">
                            <div class="d-flex bd-highlight">
                                <div class="bd-highlight">
                                    <h1 style="font-weight: 700; font-size: 3em;"> ABHISHEK KUMAR</h1>
                                </div>
                                <div class="ml-auto bd-highlight">
                                    <h1 style="font-weight: 800; font-size: 3em;">+917488116014</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-11">
                            <h1 id="hindi-vednat" class="mt-2" style=" font-size: 2.5em;">Vedant Mitra</h1>
                        </div>
                        <div class="col-12 mt-2">
                            <h3>Banking | Mutual Funds | Insurance | Loans | Money Transfer | Bill payments</h3>
                        </div>
                        <div class="col-12">
                            <h3>DTH & Mobile Recharge | Tour Package | Railway & Flight Bookings</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

    <script>
        function download(url) {
            var a = $("<a style='display:none' id='js-downloder'>")
                .attr("href", url)
                .attr("download", "creative.png")
                .appendTo("body");

            a[0].click();

            a.remove();
        }

        function saveCapture(element) {
            html2canvas(element).then(function (canvas) {
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


        var loadUploadedCreative = function (event) {
            var output = document.getElementById('outputCreative');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };


        var loadUploadedPhoto = function (event) {
            var output = document.getElementById('outputPhoto');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        function changeIt(img) {
            $("#top").attr("src", img);
            $("#top-image").attr("src", img);
        }
    </script>







</body>

</html>