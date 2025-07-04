<?php

session_start();
include "connection.php";
$ProductId = $_GET["s"];


// echo($ProductId);
if (isset($ProductId)) {

    $q = "SELECT * FROM `product` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` 
    INNER JOIN `category` ON `product`.`cat_id` = `category`.`cat_id` INNER JOIN 
    `color` ON `product`.`color_id` = `color`.`color_id` INNER JOIN 
    `condition` ON `product`.`con_id` = `condition`.`con_id` INNER JOIN 
    `model` ON `product`.`model_id` = `model`.`model_id` INNER JOIN 
    `user` ON `product`.`user_id` = `user`.`id` INNER JOIN 
    `product_img` ON `product_img`.`product_id` = `product`.`id` WHERE `product`.`id` = '" . $ProductId . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.techno.com</title>
        <link rel="shortcut icon" href="image/icon/Logo.svg" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body style="overflow-x: hidden;">

        <?php include "customerNavbar.php"; ?>

        <div class="col-12 container-fluid mt-5 ">
            <div class="row ">

                <div class="col-7 card ms-5   " style="   box-shadow: 0px 0px 20px 0px #555555; ">

                    <h3 class=" mt-3 ms-3"><?php echo $d["description"] ?></h3>


                    <div class="col-12 ms-2 mt-4  d-flex justify-content-center ">
                        <div class="row">
                            <img src="<?php echo $d["img_path"]; ?>" class=" card-me card-img-top   " style="height: 290px; width: 30rem; ">

                        </div>
                    </div>

                    <hr class="mt-5">

                    <h6 class=" me-5  text-end  text-primary"><?php
                                                                if ($d["con_id"] == '1') {
                                                                    echo ("Brandnew");
                                                                } else {
                                                                    echo ("Used");
                                                                }
                                                                ?></h6>
                    <h4 class="text-center  mt-2">LKR <?php echo $d["price"] ?>.00</h4>
                    <h5 class="mt-3 ms-4">Category :&nbsp;&nbsp; <?php echo $d["cat_name"] ?></h5>
                    <h5 class=" ms-4">Brand :&nbsp;&nbsp; <?php echo $d["brand_name"] ?></h5>
                    <h5 class=" ms-4">Colour :&nbsp;&nbsp; <?php echo $d["color_name"] ?></h5>
                    <h5 class=" ms-4">In Stock :&nbsp;&nbsp; <?php echo $d["qty"] ?> Items Available</h5>
                    <div class="col-12 row">
                        
                        <div class="col-2 mt-4 ms-4">
                            <h5 class="text-primary">Qty:</h5>
                            <input type="text" class="form-control mt-3 border-black" placeholder="qty items" id="qty">
                        </div>
                    </div>
                    <h5 class="mt-1 text-end me-4 text-danger">Shipping Fee : LKR <?php echo $d["shipping_fee"] ?>.00</h5>

                    <div class="col-12 row mb-4 mt-2">
                        <div class="col-5 offset-1">
                            <div class="row">
                                <button class="btn btn-outline-warning" onclick="addtoCart('<?php echo $ProductId ?>');">Add To Cart</button>
                            </div>
                        </div>

                        <div class="col-5 ms-3">
                            <div class="row">
                                <button class="btn btn-outline-success" onclick="payNow(<?php echo $ProductId ?>)">Buy Now</button>
                            </div>
                        </div>
                    </div>








                </div>



                <div class="col-lg-4 col-12 ms-5  offset-lg-0 offset-2 ">
                    <div class="row ">

                        <div class="card  " style="width: 30rem; height: 500px; box-shadow: 0px 0px 20px 0px #555555;">

                            <div class="card-body ms-0 m-0 text-center">
                                <h4 class="text-primary">Summery</h4>
                                <hr>
                                <h5 ><?php echo $d["description"] ?></h5> 
                                <h5 class="mt-5 text-start">Color: &nbsp;&nbsp;<?php echo $d["color_name"] ?></h5>
                                <h5 class="mt-1 text-start">Brand: &nbsp;&nbsp;<?php echo $d["brand_name"] ?></h5>
                                <h5 class="mt-1 text-start">Price: &nbsp;&nbsp;<?php echo $d["price"] ?></h5>
                                <h5 class="mt-1 text-start">Shipping Cost: &nbsp;&nbsp;<?php echo $d["shipping_fee"] ?></h5>
                                <h5 class="mt-4 text-danger text-end">Amount: &nbsp;&nbsp;<?php echo $d["price"] + $d["shipping_fee"] ?></h5>
                                <hr>


                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>





        </div>

        <br>







        <?php include "footer.php" ?>



        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>


<?php




}

?>