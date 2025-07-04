<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.techno.com</title>
    <link rel="icon" href="image/icon/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="pageSide.css">
    <link rel="stylesheet" href="header_1.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="overflow-x-hidden" style="background: #eaeaea;">

    <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-2 col-4 d-flex justify-content-center">
               <a href="index.php"><img src="image/icon/Logo_1.svg" class="div_1" alt=""></a> 
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
                    <a href="signin.php"><button class="btn btn-light border-black col-12">Techno site Customer Login</button></a>
                </div>
            </div>

        </div>

    </div>

    <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-5 col-10 offset-1">
                <div class="row">
                    <div class="d-none" id="msgDiv3">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>
                    <div class="SigninBox   container-fluid mt-5" id="SigninBox">

                        <h2 class="col-12 text-center">Admin Sign In</h2>


                        <div class="col-12 mt-5">
                            <label for="form-label">Username</label>
                            <Input type="text" placeholder="ex:-Chanu2024@" class="form-control " id="un">
                        </div>

                        <div class="col-12 mt-4 input-box">
                            <label for="form-label">Passowrd</label>
                            <Input type="password" placeholder="ex:-Abc123@" class="form-control" id="pw">
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success col-12 border-dark" onclick="adminSignIn();">Sign In</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 ">
                <div class="row">
                    <div>
                        <div class="home_2-img ">
                            <div class="rbombus_3"></div>
                        </div>
                        <div>
                            <div class="rbombus_4"></div>
                        </div>

                        <img src="image/head.png" class="img_2" />
                    </div>
                </div>
            </div>


        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="Mt-">
        <?php include "footer.php"; ?>

    </div>



    <script src="script.js"></script>
</body>

</html>