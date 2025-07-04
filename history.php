<?php

include "connection.php";

session_start();
$user = $_SESSION["a"]["id"];

if (isset($_SESSION["a"])) {



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.techno.com</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body style="overflow-x: hidden;">

    <?php include "adminNavbar.php" ?>

    <h3 class="mt-5 text-center text-primary">Order History</h3>
    <hr>

    <div class="col-12 " >

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

                    <div class="col-2">
                        <h6>Total</h6>
                    </div>


                    <div class="col-1">
                        <h6>Buyer Id</h6>
                    </div>




                </div>
            </div>

        </div>




        <div class="col-12 mt-4">



            <?php


            $rs = Database::search("SELECT * FROM `invoice`");
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

                        <div class="col-2">
                            <h6><?php echo $d["total"] ?></h6>
                        </div>

                        <div class="col-1">
                            <h6><?php echo $d["user_id"] ?></h6>
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

</body>

</html>


<?php


} else {
    header("location:adminLogin.php");
}

?>