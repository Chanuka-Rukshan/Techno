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
        <title>Document</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    </head>

    <body style="overflow-x: hidden;">

        <div class="col-11 mx-auto">

            <a href="report.php"><img src="image/back.png " style="width: 70px;"></a>

            <button class="btn mt-5 btn-dark col-2 offset-9" onclick="printUser();"><i class="bi bi-printer-fill"></i> Print</button>
        </div>


        <div id="printuserReports">

            <div class="col-10 mt-5 mx-auto">
                <h3 class="text-center text-bg-primary text-black">User Reports</h3>
            </div>








            <div class="col-11 mx-auto mt-5">

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

            <div class="col-11 mx-auto mt-4">



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



       
        <br>

        <?php include "footer.php" ?>



        <script src="script.js"></script>
    </body>

    </html>

<?php


} else {
    header("location:adminLogin.php");
}

?>