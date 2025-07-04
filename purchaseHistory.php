<?php

include "connection.php";

session_start();
$user = $_SESSION["u"]["id"];

if (isset($_SESSION["u"])) {




?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.techno.com</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="shortcut icon" href="image/icon/Logo.svg" type="image/x-icon">
    </head>

    <body>

        <?php include "customerNavbar.php" ?>

        <button class="btn mt-4 mb-3 btn-warning col-2 offset-9 " onclick="printUser();"><i class="bi bi-printer-fill"></i> Print</button>


        <h3 class="mt-5 text-center text-primary">Purchase History</h3>

    <hr>

    <div class="col-12 " id="printuserReports">

        <div class="col-12 mt-5">

            <div class="col-11 mx-auto card shadow-lg  text-center border-0" style="height: 50px; ">
                <div class="row p-3 ">

                    <div class="col-2">
                        <h6>Invoice Id</h6>
                    </div>

                    <div class="col-2">
                        <h6>Order Id</h6>
                    </div>

                    <div class="col-3">
                        <h6>Order Date</h6>
                    </div>

                    <div class="col-2">
                        <h6>Qty</h6>
                    </div>

                    <div class="col-3">
                        <h6>Total</h6>
                    </div>


                    




                </div>
            </div>

        </div>




        <div class="col-12 mt-4">



            <?php


            $rs = Database::search("SELECT * FROM invoice WHERE user_id = '".$user."'");
            $num = $rs->num_rows;

            for ($i = 0; $i < $num; $i++) {
                $d = $rs->fetch_assoc();

            ?>
                <div class="col-11 mx-auto card shadow-lg mt-2 text-center border-0" style="height: 55px; background: #eaeaea;">
                    <div class="row p-3">

                        <div class="col-2">
                            <h6><?php echo $d["invoice_id"] ?></h6>
                        </div>

                        <div class="col-2">
                            <h6><?php echo $d["order_id"] ?></h6>
                        </div>


                        <div class="col-3">
                            <h6><?php echo $d["date"] ?></h6>
                        </div>

                        <div class="col-2">
                            <h6><?php echo $d["product_qty"] ?></h6>
                        </div>

                        <div class="col-3">
                            <h6><?php echo $d["total"] ?></h6>
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
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php
} else {
    header("location:signin.php");
}

?>