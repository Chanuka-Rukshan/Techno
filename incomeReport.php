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
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body style="overflow-x: hidden;">

        <div class="col-11 mx-auto ">

            <a href="report.php"><img src="image/back.png " style="width: 70px;"></a>

            <h3 class="text-center text-primary">Income Report</h3>
            <hr class="col-7 mx-auto">
            <div class="row col-8 mx-auto mt-5">
                <div class="col-5 mx-auto">
                    <label class="form-label">From:</label>
                    <input type="date" class="form-control" id="from">
                </div>




                <div class="col-5 mx-auto">
                    <label class="form-label">To:</label>
                    <input type="date" class="form-control" id="to">
                </div>

                <button class="btn btn-success mt-3 col-4 mx-auto" onclick="filterIncome();">Filter</button>
            </div>


        </div>


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

                        <div class="col-2">
                            <h6>Total</h6>
                        </div>


                        <div class="col-1">
                            <h6>Buyer Id</h6>
                        </div>




                    </div>
                </div>

            </div>



            <div id="incomeReport">
              
            </div>


        </div>

        <button class="btn mt-4 mb-3 btn-warning col-2 offset-9 " onclick="printUser();"><i class="bi bi-printer-fill"></i> Print</button>
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