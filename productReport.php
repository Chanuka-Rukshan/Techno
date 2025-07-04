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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="col-11 mx-auto">

        <a href="report.php"><img src="image/back.png " style="width: 70px;"></a>

        <button class="btn mt-5 btn-dark col-2 offset-9" onclick="printUser();"><i class="bi bi-printer-fill"></i> Print</button>
    </div>

    <div id="printuserReports">

        <h3 class="text-center mt-5  col-10 mx-auto ">Product Management</h3>
        

        <div class="col-11 mx-auto ">

            <div class="col-12 mt-5">

                <div class="col-11 mx-auto card shadow-lg  text-center border-0" style="height: 50px; ">
                    <div class="row p-2 ">

                        <div class="col-1">
                            <h5>Id</h5>
                        </div>

                        <div class="col-3">
                            <h5>Title</h5>
                        </div>

                        <div class="col-3">
                            <h5>Price</h5>
                        </div>

                        <div class="col-2">
                            <h5>Shipping cost</h5>
                        </div>

                        <div class="col-2">
                            <h5>Qty</h5>
                        </div>


                        <div class="col-1">
                            <h5>Seller Id</h5>
                        </div>




                    </div>
                </div>

            </div>




            <div class="col-12 mt-4">



                <?php


                $rs = Database::search("SELECT * FROM `product`");
                $num = $rs->num_rows;

                for ($i = 0; $i < $num; $i++) {
                    $d = $rs->fetch_assoc();

                ?>
                    <div class="col-11 mx-auto card shadow-lg mt-2 text-center border-0" style="height: 55px; background: #eaeaea;">
                        <div class="row p-3">

                            <div class="col-1">
                                <h6><?php echo $d["id"] ?></h6>
                            </div>

                            <div class="col-3">
                                <h6><?php echo $d["title"] ?></h6>
                            </div>


                            <div class="col-3">
                                <h6><?php echo $d["price"] ?>.00</h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $d["shipping_fee"] ?>.00</h6>
                            </div>

                            <div class="col-2">
                                <h6><?php echo $d["qty"] ?></h6>
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

    </div>









    <script src="script.js"></script>
</body>

</html>

<?php


} else {
    header("location:adminLogin.php");
}

?>