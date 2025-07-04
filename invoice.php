<?php

include "connection.php";

session_start();
$user = $_SESSION["u"]["id"];
$oid = $_GET["id"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `invoice` INNER JOIN `product` ON `invoice`.`product_id` = `product`.`id` WHERE `order_id` = '" . $oid . "'");
    $d = $rs->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice</title>
</head>

<body>

    <?php include "customerNavbar.php" ?>

    <div class="container mt-5" id="page">
        
        <div class="card shadow-lg rounded-3" style="height: 700px; " >
        
            <a href="home.php"><button class="btn btn-danger mt-2 btn-sm col-1 offset-11 ">X</button></a>
            <h2 class="text-center text-primary">invoice</h2>
            <img src="image/icon/Logo_1.svg" class="ms-4" style="width: 150px;">
            <h6 class="ms-4">Order Id: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $d["order_id"] ?></h6>
            <h6 class="ms-4">Order Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $d["date"] ?></h6>

            <table class="table table-hover text-center mt-5 container ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Order id</th>
                        <th scope="col">title</th>
                        <th scope="col">qty</th>
                        <th scope="col">amount</th>
                        <th scope="col">date</th>



                    </tr>
                </thead>
                <tbody class="table-primary">
                    <tr>
                        <td><?php echo $d["order_id"]?></td>
                        <td><?php echo $d["title"] ?></td>
                        <td><?php echo $d["product_qty"] ?></td>
                        <td><?php echo $d["total"] ?></td>
                        <td><?php echo $d["date"] ?></td>
                    </tr>

                </tbody>
            </table>
            <h5 class="mt-5 me-3 text-end"> Qty(<?php echo $d["product_qty"] ?>)</h5>
            
            <h5 class="mt-4 me-3 text-end text-danger">Total: <?php echo $d["total"] ?></h5>
        </div>
    </div>

    <div class="container mt-4 d-flex justify-content-end">
        <div class="row">
            <button class="btn btn-dark me-4 " onclick="printInvoice();"><i class="bi bi-printer-fill"></i> Print</button>
        </div>
    </div>

    <br>


    <script src="script.js" ></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>

<?php
} else {
    header("location:signin.php");
}

?>