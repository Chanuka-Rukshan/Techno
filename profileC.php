<?php

include "connection.php";

session_start();
$user = $_SESSION["u"]["id"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user . "'");
    $d = $rs->fetch_assoc();



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.techno.com</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body style="overflow-x: hidden;">

        <?php include "customerNavbar.php" ?>

        <div class="container mt-5 ">
            <div class="row">

                <h3 class="text-center text-primary" style="font-family: calibri;">Account Settings</h3>

                <div class="col-3 ms-5 card rounded-4 mt-4 shadow-lg  " style="height: 650px; ">
                    <?php

                    $img_rs = Database::search("SELECT * FROM `img_profile` WHERE `user_id` = '" . $user . "'");
                    $d2 = $img_rs->fetch_assoc();

                    if (empty($d2["pimg_path"])) {

                    ?>
                        <img src="user.png" class="mt-4 align-self-center" style="clip-path: circle(); width: 150px; " onclick="toggleMenu();" />

                    <?php
                    } else {
                    ?>
                        <img src="<?php echo $d2["pimg_path"] ?>" class="mt-4  align-self-center " style="width: 150px; clip-path: circle();">
                    <?php
                    }
                    ?>
                    <h6 class="text-center mt-4"><?php echo $d["fname"]; ?> <?php echo $d["lname"] ?></h6>
                    <h6 class="text-center text-primary"><?php echo $d["email"] ?></h6>
                    <hr class="border-2 border-primary">
                    <div class="text-center ">
                        <a href="#" class="pa " onclick="accountProcess();"><span>Account</span></a>
                        <hr class="border-2 border-primary">
                        <a href="#" class="pa " onclick="passwordProcess();"><span>Password</span></a>
                        <hr class="border-2 border-primary">
                        <a href="#" class="pa " onclick="shippingProcess();"><span>Shipping Details</span></a>
                        <hr class="border-2 border-primary">
                        <a href="#" class="pa mb-2 " onclick="profileProcess();"><span>Profile Image Update</span></a>
                        <hr class="border-2 border-primary">
                    </div>



                </div>

                <div class="col-8 card shadow-lg mt-4 ms-3 rounded-4 " style="height: 650px;">
                    <div class=" col-12    " id="account">

                        <h4 class="mt-4 ms-3 text-primary">Account</h4>
                        <hr class="border-2" style="margin-top:-2px" ;>

                        <div class="col-12 row ms-3">
                            <div class="col-5 mt-2 ms-3">
                                <label for="" class="form-label">First Name:</label>
                                <input type="text" class="form-control" placeholder="First Name" value="<?php echo $d["fname"] ?>" id="fname">
                            </div>

                            <div class="col-5 mt-2 offset-1">
                                <label for="" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $d["lname"] ?>" id="lname">
                            </div>
                        </div>

                        <div class="col-12 row ms-3">
                            <div class="col-5 mt-4 ms-3">
                                <label class="form-label">Username:</label>
                                <input type="text" class="form-control" placeholder="Username" value="<?php echo $d["username"] ?>" id="uname">
                            </div>

                            <div class="col-5 mt-4 offset-1">
                                <label class="form-label">Birthday:</label>
                                <input type="date" class="form-control" value="<?php echo $d["birth"] ?>" id="birth">
                            </div>
                        </div>

                        <div class="col-12 row ms-3">
                            <div class="col-5 mt-4 ms-3">
                                <label class="form-label">Mobile:</label>
                                <input type="text" class="form-control" placeholder="Mobile" value="<?php echo $d["mobile"] ?>" id="mobile">
                            </div>

                            <div class="col-5 mt-4 offset-1">
                                <label class="form-label">Gender:</label>
                                <select name="" class="form-control" id="gen">
                                    <option value="0">Select your gender</option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                    ?>

                                        <option value="<?php echo $data["gen_id"]; ?>">
                                            <?php echo $data["gen_name"]; ?>
                                        </option>

                                    <?php
                                    }

                                    ?>


                                </select>
                            </div>
                        </div>



                        <div class="col-12 row ms-3">
                            <div class="col-11  mt-4 ms-3">
                                <label class="form-label">Email:</label>
                                <input type="text" class="form-control " placeholder="Email" disabled value="<?php echo $d["email"] ?>" id="email">
                            </div>
                        </div>

                        <div class="col-12 row ms-3">
                            <div class="col-11  mt-4 ms-3">
                                <label for="" class="form-label">Bio:</label>
                                <textarea rows="3 " class="col-12 rounded-2 border" id="bio"><?php echo $d["bio"] ?></textarea>
                            </div>
                        </div>

                        <div class="col-11 ms-4 mt-3">
                            <button class="btn btn-primary col-3 offset-9  " onclick="saveDetails();">Save Details</button>
                        </div>




                    </div>
                    <!-- Acount -->



                    <!-- password -->

                    <div class="col-8 ms-3 card rounded-4 mt-4 shadow-lg d-none" style="height: 650px;" id="password">

                        <h4 class="mt-5 ms-3 text-primary">Password</h4>
                        <hr class="border-2" style="margin-top:-2px" ;>

                        <div class="col-10 offset-1 mt-4">
                            <label class="form-label">Old Password:</label>
                            <input type="password" class="form-control" disabled placeholder="*****************">


                            <h5 class="mt-5">Change Your Password</h5>
                            <hr class="border-2">

                        </div>

                        <div class="col-10 offset-1 mt-3">
                            <label for="" class="form-label">New Password:</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="npi">
                                <button class="btn btn-success" type="button" onclick="showPassword1();" id="npb"><i class="bi bi-eye-slash"></i></button>
                            </div>
                        </div>
                        <div class="col-10 offset-1 mt-3">
                            <label for="" class="form-label">Re Enter Password:</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnpi">
                                <button class="btn btn-success" type="button" onclick="showPassword2();" id="rnpb"><i class="bi bi-eye-slash"></i></button>
                            </div>
                        </div>


                        <!-- popupMsg -->
                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Verfication Email:</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" value="<?php echo $d["email"] ?>" id="email" disabled>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Send Your Varificaion code</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Enter Your Verification Code</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- popUpMsg -->
                        <div class="col-11 mt-4">
                            <button class="btn btn-primary col-3 offset-9  " data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Update Password</button>
                        </div>
                    </div>
                    <!-- password -->



                    <!-- Shopping Detailes -->
                    <div class="col-8 ms-3 card rounded-4 mt-4 shadow-lg d-none" style="height: 650px;" id="shopping">

                        <h4 class="mt-4 ms-3 text-primary">Shipping Address</h4>
                        <hr class="border-2" style="margin-top:-2px" ;>

                        <div class="container">
                            <div class="col-12">
                                <label for="" class="form-label">Country:</label>
                                <select name="" id="con" class="form-control">
                                    <option value="0">Select Your country</option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `country`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                    ?>

                                        <option value="<?php echo $data["coun_id"]; ?>">
                                            <?php echo $data["coun_name"]; ?>
                                        </option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="container mt-3">
                            <div class="col-12">
                                <label for="" class="form-label">Province:</label>
                                <select name="" id="pro" class="form-control">
                                    <option value="0">Select Your Province</option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `province`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                    ?>

                                        <option value="<?php echo $data["pro_id"]; ?>">
                                            <?php echo $data["pro_name"]; ?>
                                        </option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="container mt-3">
                            <div class="col-12">
                                <label for="" class="form-label">District:</label>
                                <select name="" id="dis" class="form-control">
                                    <option value="0">Select Your District</option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `district`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {
                                        $data = $rs->fetch_assoc();
                                    ?>

                                        <option value="<?php echo $data["dis_id"]; ?>">
                                            <?php echo $data["dis_name"]; ?>
                                        </option>

                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="container mt-3">
                            <div class="col-12">
                                <label for="" class="form-label">Address Line 01:</label>
                                <input type="text" class="form-control" value="<?php echo $d["line1"] ?>" id="line1">
                            </div>
                        </div>
                        <div class="container mt-3">
                            <div class="col-12">
                                <label for="" class="form-label">Address Line 02:</label>
                                <input type="text" class="form-control" value="<?php echo $d["line2"] ?>" id="line2">
                            </div>
                        </div>
                        <div class="container mt-3">
                            <div class="col-12">
                                <label for="" class="form-label">Postal Code:</label>
                                <input type="text" class="form-control" value="<?php echo $d["postal_code"] ?>" id="pc">
                            </div>
                        </div>
                        <div class="col-12 mt-4 row">
                            <button class="btn btn-primary col-3 offset-9 " onclick="saveSDetails();">Save Details</button>
                        </div>



                    </div>
                    <!-- shopping details -->


                    <div class="col-8 ms-3 card rounded-4 mt-4 shadow-lg d-none" style="height: 650px;" id="profile">

                        <h4 class="mt-5 ms-3 text-primary">Profile image Update</h4>
                        <hr class="border-2" style="margin-top:-2px" ;>

                        <?php

                        $img_rs = Database::search("SELECT * FROM `img_profile` WHERE `user_id` = '" . $user . "'");
                        $d2 = $img_rs->fetch_assoc();

                        if (empty($d2["pimg_path"])) {

                        ?>
                            <img src="user.png" class="mt-4 offset-4" style="height: 250px; clip-path: circle();" onclick="toggleMenu();" />

                        <?php
                        } else {
                        ?>
                            <img src="<?php echo $d2["pimg_path"] ?>" class="mt-4 offset-4  " style="height: 250px; clip-path: circle();">
                        <?php
                        }
                        ?>

                        <div class="col-7 mx-auto mt-5">
                            <label for="form-label">Profile Image: </label>
                            <input type="file" class="form-control" id="imgUploader">
                        </div>

                        <div class="col-11 ms-4 mt-3 ">
                            <button class="btn btn-primary col-6 offset-3 " onclick="changeImgProfile();">Update profile image</button>
                        </div>




                    </div>







                </div>
            </div>
        </div>




        <!-- Acount -->

        <br>
        <?php require "footer.php"; ?>


        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:signin.php");
}

?>