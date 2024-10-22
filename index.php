<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="./Favicon.png">

    <link rel="stylesheet" href="./style.css">

    <title>Login</title>

</head>

<body>

    <div class="row d-flex justify-content-center align-items-center h-100 m-0 p-0">
        <section class="vh-100" style="padding: 1%;">
            <div class="container pt-5 mt-5 pb-2 h-100 white-box-shadow border rounded">
                <div class="row d-flex align-items-center justify-content-center h-100 m-2">

                    <div class="col-md-8 col-lg-7 col-xl-6 mt-2">
                        <div><img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                alt="" height="60px" width="150px" class="border"></div>
                        <br>
                        <div>
                            <h2 class="m-0 p-0">Kendra Ek</h2>
                            <h2 class="m-0 p-0">Suvidhayen Anek</h2>
                        </div>
                        <br>
                        <div>
                            <h5 style="font-weight: 530;">आज ही वेदांत एसेट से जुड़े और नयी सेवाओ के <br>
                                साथ बढ़ाये अपनी आमदनी !</h5>
                        </div>
                        <br>
                        <div class="border"><img
                                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                alt="" width="60%"></div>
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5">
                        <form method="post" action="./check-login.php">
                            <div class="form-outline mb-4">
                                <h4 class="display-4" style="font-size: 1.2em;font-weight: 350;">Welcome Back</h4>
                                <h2>Login To Your Account</h2>
                            </div>
                            <hr>

                            <!-- bank select -->
                            <!-- <div class="form-outline mb-4">
                                <label class="form-label" for="bank">Bank</label>
                                <select type="text" name="bank" id="bank" class="form-control form-control-lg" required>
                                    <option value="">Select</option>
                                    <option value="boi">BOI</option>
                                    <option value="jrgb">JRGB</option>
                                </select>
                            </div> -->
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="koid">User Id</label>
                                <input type="text" name="userId" id="koid" class="form-control form-control-lg" required />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control form-control-lg" maxlength="16"
                                    required />
                            </div>
                            <div class="form-outline mb-4 text-center">
                                <button type="submit" id="login" class="btn btn-primary btn-lg">Login
                                    Now</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
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
        // $("#login").on("click", () => {
        //     var koid = String($("#koid").val())
        //     var pass = String($("#password").val())

        //     if (koid == "ABHI123" & pass == "12345") {
        //         window.location.href = "./creatives.html";
        //     } else {
        //         alert("Invalid Username or password");
        //     }
        // })
    </script>

</body>

</html>