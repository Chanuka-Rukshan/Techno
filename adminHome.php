<?php

include "connection.php";

session_start();
$user = $_SESSION["a"]["id"];

if (isset($_SESSION["a"])) {

    $auser = Database::search("SELECT * FROM `user` WHERE `status` = '1'");
    $num = $auser->num_rows;

    $duser = Database::search("SELECT * FROM `user` WHERE `status` = '0'");
    $num_1 = $duser->num_rows;

    $product = Database::search("SELECT * FROM `product` ");
    $num_2 = $product->num_rows;

    $coder = Database::search("SELECT SUM(`product_qty`) FROM `invoice`");
    $codernum = $coder->fetch_assoc();

    $complete = implode(', ', $codernum);

    $total = Database::search("SELECT SUM(`total`) FROM `invoice`;");
    $totalnum = $total->fetch_assoc();

    $amount = implode(', ', $totalnum);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.techno.com</title>
        <link rel="stylesheet" href="adminHome.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="shortcut icon" href="image/icon/Logo.svg" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body style="overflow-x: hidden;" onload="loadChart();">

        <?php include "adminNavbar.php" ?>


        <div class="mt-5 values ms-3">
            <div class="val-box shadow-lg">
                <i class="fa-solid fa-users"></i>
                <div>
                    <h3><?php echo $num ?></h3>
                    <span>Active Users</span>
                </div>
            </div>

            <div class="val-box shadow-lg">
                <i class="fa-solid fa-users"></i>
                <div>
                    <h3><?php echo $num_1 ?></h3>
                    <span>Deactive Users</span>
                </div>
            </div>

            <div class="val-box shadow-lg">
                <i class="fa-solid fa-cart-shopping"></i>
                <div>
                    <h3><?php echo $num_2 ?></h3>
                    <span>Total Products</span>
                </div>
            </div>

            <div class="val-box shadow-lg">
                <i class="fa-solid fa-box-open"></i>
                <div>
                    <h3><?php echo $complete ?></h3>
                    <span>Sold Products</span>
                </div>
            </div>

            <div class="val-box shadow-lg">
                <i class="fa-solid fa-dollar-sign"></i>
                <div>
                    <h6>LKR <?php echo $amount ?>.00</h6>
                    <span>Income</span>
                </div>
            </div>


        </div>


        <div class="col-11 mt-5 mx-auto">
            <div class="row ">


                <div class="col-5 mx-auto mt-3 card shadow-lg" style="height: 600px; ">
                    <div class="row">

                        <h5 class="text-center mt-2">Most Sell Products</h5>

                        <div class="mt-3">
                            <canvas id="userChart" width="290" height="300"></canvas>
                        </div>

                    </div>
                </div>

                <div class="col-5 mx-auto mt-3 card shadow-lg" style="height: 600px; z-index: -1;">
                    <div class="row">

                        <h5 class="text-center mt-2">Most Selling Categorys</h5>
                        <div>
                            <canvas id="productChart" width="290" height="300"></canvas>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-11 mt-5 mx-auto">
            <div class="row ">


                <div class="col-5 mx-auto mt-3 card shadow-lg" style="height: 600px; ">
                    <div class="row">

                        <h5 class="text-center mt-2">Most Selling Brand</h5>

                        <div class="mt-3">
                            <canvas id="BrandChart" width="290" height="300"></canvas>
                        </div>

                    </div>
                </div>

                <div class="col-5 mx-auto mt-3 card shadow-lg" style="height: 600px; z-index: -1;">
                    <div class="row">

                        <h5 class="text-center mt-2">Most Selling Categorys</h5>
                        <div>
                            <canvas id="OtherChart" width="290" height="300"></canvas>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <br>
        <?php include "footer.php" ?>










        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctb = document.getElementById('BrandChart');

            new Chart(ctb, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <script>
            const ctc = document.getElementById('OtherChart');

            new Chart(ctc, {
                type: 'polarArea',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <script>
            window.addEventListener('load', onLoadHandler1);
        </script>

        <script src="script.js"></script>
    </body>

    </html>

<?php


} else {
    header("location:adminLogin.php");
}

?>