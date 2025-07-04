<?php


include "connection.php";

session_start();
$user = $_SESSION["u"]["id"];
$netTotal = 0;
$shipping = 0;

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
        <link rel="shortcut icon" href="image/icon/Logo.svg" type="image/x-icon">
    </head>

    <body onload="loadCart();">

        <?php include "customerNavbar.php" ?>

        <div class="col-12 row">
            <div class="container-fluid col-7 mt-5 " id="cardBody">
                <div class="row">






                </div>
            </div>

            <?php



            $rs = Database::search("SELECT * FROM `cart` INNER JOIN `user` ON `cart`.`user_id` = `user`.`id` INNER JOIN `product` ON `cart`.`product_id` = `product`.`id` ");
            $num = $rs->num_rows;
            if ($num > 0) {



                for ($i = 0; $i < $num; $i++) {
                    $d = $rs->fetch_assoc();
                    $total = $d["price"] * $d["cart_qty"];
                    $netTotal = $netTotal + $total;

                    $ship = 0;

                    $ship = $d["shipping_fee"];
                    $shipping = $shipping + $ship;

                    // $amount = 0;
                    // $amount = 
                }

            ?>


                <div class="card mt-5 shadow-lg col-3" style="width: 450px; height: 480px;">

                    <h4 class="text-center text-primary mt-2">Summery</h4>
                    <hr>
                    <h6 class="mt-5">Items: (<?php echo ($num); ?>)</h6>
                    <hr>
                    <h6 class="mt-3">Items Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LKR <?php echo ($netTotal) ?>.00</h6>
                    <h6>Items Shipping Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LKR <?php echo ($shipping); ?>.00</h6>
                    <hr>
                    <h4 class="text-end text-danger">Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LKR <?php echo ($netTotal + $shipping); ?>.00</h4>
                    <hr>

                    <button class="btn btn-success mt-5" onclick="checkout();">Checkout</button>

                </div>

        </div>



        <br>
    <?php
            } else {
    ?>
        <div class="col-12 text-center mt-5">
            <h2>Your Cart is Empty!</h2>
            <a href="home.php" class="btn btn-primary">Start Shopping</a>
        </div>
        <br>
    <?php
            }
    ?>



    <?php include "footer.php" ?>







    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    </body>

    </html>


<?php
} else {
    header("location:signin.php");
}

?>