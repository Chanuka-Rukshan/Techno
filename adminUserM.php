<?php

include "connection.php";

session_start();
$user = $_SESSION["a"]["id"];

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `user`");
    $numr = $rs->num_rows;

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

        <?php include "adminNavbar.php" ?>


        <div class="col-9 card shadow-lg mt-5 mx-auto text-center p-3" style="height: 50px;">
            <div class="row">

                <div class="col-3 user ">
                    <a>
                        <h6 onclick="allusers();">All Users</h6>
                    </a>
                </div>
                <div class="col-3 user ">
                    <h6 onclick="activeUsers();">Active Users</h6>
                </div>
                <div class="col-3 user">
                    <h6 onclick="deactiveUsers();">Dective Users</h6>
                </div>
                <div class="col-3 user">
                    <h6 onclick="adminUsers();">Admin Users</h6>
                </div>
            </div>
        </div>



        <!-- All users -->
        <div class="col-12 " id="allusers">


            <h2 class="mt-5 text-bg-primary text-center">All Users</h2>



            <div class="col-12 mt-5">

                <div class="col-11 mx-auto card shadow-lg  text-center border-0" style="height: 50px; ">
                    <div class="row p-2 ">

                        <div class="col-1">
                            <h4>Id</h4>
                        </div>

                        <div class="col-2">
                            <h4>Fname</h4>
                        </div>

                        <div class="col-2">
                            <h4>Lname</h4>
                        </div>

                        <div class="col-3">
                            <h4>Email</h4>
                        </div>

                        <div class="col-2">
                            <h4>Mobile</h4>
                        </div>

                        <div class="col-2">
                            <h4>Username</h4>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-12 mt-4">



                <?php
                for ($i = 0; $i < $numr; $i++) {
                    $d = $rs->fetch_assoc();
                ?>
                    <div class="col-11 mx-auto card shadow-lg mt-2 text-center border-0" style="height: 50px; background: #eaeaea;">
                        <div class="row p-3">

                            <div class="col-1">
                                <h6><?php echo $d["id"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $d["fname"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $d["lname"] ?></h6>
                            </div>

                            <div class="col-3">
                                <h6><?php echo $d["email"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $d["mobile"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $d["username"] ?></h6>
                            </div>

                        </div>
                    </div>

                <?php
                }


                ?>


            </div>

        </div>
        <!-- All users -->



        <!-- Active Users -->

        <div class="col-12 d-none" id="active">
            <div class="col-11 mx-auto mt-5">
                <div class="row mx-auto">

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" id="aactive">
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-danger" onclick="activeactive();">Deactive</button>
                    </div>

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-success" disabled>Active</button>
                    </div>

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" id="aadmin">
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-warning" onclick="ActiveAdmin();">Admin</button>
                    </div>

                </div>
            </div>

            <h2 class="mt-5 text-bg-success text-center">Active Users</h2>



            <div class="col-12 mt-5">

                <div class="col-11 mx-auto card shadow-lg  text-center border-0" style="height: 50px; ">
                    <div class="row p-2 ">

                        <div class="col-1">
                            <h4>Id</h4>
                        </div>

                        <div class="col-2">
                            <h4>Fname</h4>
                        </div>

                        <div class="col-2">
                            <h4>Lname</h4>
                        </div>

                        <div class="col-3">
                            <h4>Email</h4>
                        </div>

                        <div class="col-2">
                            <h4>Mobile</h4>
                        </div>

                        <div class="col-2">
                            <h4>Username</h4>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-12 mt-4">



                <?php

                $ars = Database::search("SELECT * FROM `user` WHERE `status` = '1'");
                $anum = $ars->num_rows;

                for ($i = 0; $i < $anum; $i++) {
                    $a = $ars->fetch_assoc();
                ?>
                    <div class="col-11 mx-auto card shadow-lg mt-2 text-center border-0" style="height: 50px; background: #eaeaea;">
                        <div class="row p-3">

                            <div class="col-1">
                                <h6><?php echo $a["id"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $a["fname"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $a["lname"] ?></h6>
                            </div>

                            <div class="col-3">
                                <h6><?php echo $a["email"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $a["mobile"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $a["username"] ?></h6>
                            </div>

                        </div>
                    </div>

                <?php
                }


                ?>


            </div>

        </div>
        <!-- active users -->


        <!-- Deactive users -->
        <div class="col-12 d-none" id="deactive">
            <div class="col-11 mx-auto mt-5">
                <div class="row mx-auto">

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-danger" disabled>Deactive</button>
                    </div>

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" id="deactiveactive">
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-success" onclick="deactiveActive();">Active</button>
                    </div>

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-warning" disabled>Admin</button>
                    </div>

                </div>
            </div>

            <h2 class="mt-5 text-bg-danger text-center">Deactive Users</h2>



            <div class="col-12 mt-5">

                <div class="col-11 mx-auto card shadow-lg  text-center border-0" style="height: 50px; ">
                    <div class="row p-2 ">

                        <div class="col-1">
                            <h4>Id</h4>
                        </div>

                        <div class="col-2">
                            <h4>Fname</h4>
                        </div>

                        <div class="col-2">
                            <h4>Lname</h4>
                        </div>

                        <div class="col-3">
                            <h4>Email</h4>
                        </div>

                        <div class="col-2">
                            <h4>Mobile</h4>
                        </div>

                        <div class="col-2">
                            <h4>Username</h4>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-12 mt-4">



                <?php

                $drs = Database::search("SELECT * FROM `user` WHERE `status` = '0'");
                $dnum = $drs->num_rows;


                for ($i = 0; $i < $dnum; $i++) {
                    $dd = $drs->fetch_assoc();
                ?>
                    <div class="col-11 mx-auto card shadow-lg mt-2 text-center border-0" style="height: 50px; background: #eaeaea;">
                        <div class="row p-3">

                            <div class="col-1">
                                <h6><?php echo $dd["id"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dd["fname"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dd["lname"] ?></h6>
                            </div>

                            <div class="col-3">
                                <h6><?php echo $dd["email"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dd["mobile"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dd["username"] ?></h6>
                            </div>

                        </div>
                    </div>

                <?php
                }


                ?>


            </div>

        </div>
        <!-- Deactive users -->

        <!-- admin -->
        <div class="col-12 d-none" id="admin">
            <div class="col-11 mx-auto mt-5">
                <div class="row mx-auto">

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-danger" disabled>Deactive</button>
                    </div>

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" disabled>
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-success" disabled>Active</button>
                    </div>

                    <div class="col-2 mt-5">
                        <input type="text" class="form-control" id="disableAdmin">
                    </div>
                    <div class="col-2 mt-5">
                        <button class="btn btn-warning" onclick="disableAdmin();">Disable admin</button>
                    </div>

                </div>
            </div>

            <h2 class="mt-5 text-bg-warning text-center">Admin Users</h2>



            <div class="col-12 mt-5">

                <div class="col-11 mx-auto card shadow-lg  text-center border-0" style="height: 50px; ">
                    <div class="row p-2 ">

                        <div class="col-1">
                            <h4>Id</h4>
                        </div>

                        <div class="col-2">
                            <h4>Fname</h4>
                        </div>

                        <div class="col-2">
                            <h4>Lname</h4>
                        </div>

                        <div class="col-3">
                            <h4>Email</h4>
                        </div>

                        <div class="col-2">
                            <h4>Mobile</h4>
                        </div>

                        <div class="col-2">
                            <h4>Username</h4>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-12 mt-4">



                <?php

                $adrs = Database::search("SELECT * FROM `user` WHERE `user_type_id` = '1'");
                $adnum = $adrs->num_rows;


                for ($i = 0; $i < $adnum; $i++) {
                    $dad = $adrs->fetch_assoc();
                ?>
                    <div class="col-11 mx-auto card shadow-lg mt-2 text-center border-0" style="height: 50px; background: #eaeaea;">
                        <div class="row p-3">

                            <div class="col-1">
                                <h6><?php echo $dad["id"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dad["fname"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dad["lname"] ?></h6>
                            </div>

                            <div class="col-3">
                                <h6><?php echo $dad["email"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dad["mobile"] ?></h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $dad["username"] ?></h6>
                            </div>

                        </div>
                    </div>

                <?php
                }


                ?>


            </div>

        </div>
        <!-- admin -->


        <br>


        <?php include "footer.php" ?>








        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php


} else {
    header("location:adminLogin.php");
}

?>