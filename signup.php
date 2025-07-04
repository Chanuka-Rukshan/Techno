<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.techno.com</title>
    <link rel="icon" href="image/icon/Logo.svg">
    <link rel="stylesheet" href="pageSide.css">
    <link rel="stylesheet" href="header_1.css">
    <link rel="stylesheet" href="bootstrap.css">

</head>

<body class="overflow-x-hidden" style="background: #eaeaea;">

    <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-2 col-4 d-flex justify-content-center">
                <img src="image/icon/Logo_1.svg" onclick="window.location='index.php';"  class="div_1" alt="">
            </div>

            <div class="col-lg-5 mt-lg-3 text-center">

                <nav class="navbar_1">
                    <a href="home.php">Home</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                    <a href="#">Help Desk</a>
                </nav>
            </div>

            <div class="col-lg-4 col-10 mt-2 ms-5">
                <div class="row">
                    <button class="btn btn-success" onclick="window.location='signin.php';">Already have an account? Sign In</button>
                </div>
            </div>

        </div>

    </div>

    <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-5 col-10 offset-1">
                <div class="row">

                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="signUp_Box mt-5" id="signUpBox">


                        <h2 class="text-center">Sign Up</h2>


                        <div class="row mt-2">


                            <div class="col-6 mt-2">
                                <label for="form-label">First Name</label>
                                <Input type="text" class="form-control" placeholder="ex:-Jon" id="fname"></Input>
                            </div>

                            <div class="col-6 mt-2">
                                <label for="form-label">Last Name</label>
                                <Input type="text" class="form-control" placeholder="ex:-Doe" id="lname"></Input>
                            </div>

                        </div>



                        <div class="mt-3">
                            <label for="form-label">email</label>
                            <Input type="email" class="form-control" placeholder="ex:-jondoe2003@gmail.com" id="email"></Input>
                        </div>

                        <div class="mt-3">
                            <label for="form-label">Mobile</label>
                            <Input type="text" class="form-control" placeholder="ex:-0770000000" id="mobile"></Input>
                        </div>

                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="form-label">Username</label>
                                <Input type="text" class="form-control" placeholder="ex:-Jon123@" id="username"></Input>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="form-label">Password</label>
                                <Input type="password" class="form-control" placeholder="ex:-Jon123@Doe" id="password"></Input>
                            </div>
                        </div>



                        <div class="mt-5">
                            <button class="btn btn-primary col-12 border-dark" onclick="signUp();">Sign Up</button>
                        </div>
                        <br>




                    </div>
                </div>
            </div>

            <div class="col-lg-5 offset-1">
                <div class="row">
                    <div>
                        <div class="home_3-img ">
                            <div class="rbombus_5"></div>
                        </div>
                        <div>
                            <div class="rbombus_6"></div>
                        </div>

                        <img src="image/head.png" class="img_3" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>



    <?php include "footer.php"; ?>




    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>

</html>