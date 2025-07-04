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

    <h3 class="text-center mt-5 text-primary">Reports</h3>
    <hr>

    <div class="col-11 mx-auto mt-5">
        <div class="row">

            <div class="col-5 mx-auto card shadow-lg" style="height: 200px;">

                <h3 class="text-center mt-4">User Management</h3>

                <p class="mt-2 text-center">Collect your anual user reports.</p>

                <button class="mt-2 col-7 btn btn-primary mx-auto" onclick="window.location='userReport.php';">User Reports</button>

            </div>

            <div class="col-5 mx-auto card shadow-lg" style="height: 200px;">

                <h3 class="text-center mt-4">Product Management</h3>

                <p class="mt-2 text-center">Collect your anual Products reports.</p>

                <button class="mt-2 col-7 btn btn-primary mx-auto" onclick="window.location='productReport.php';">Products Reports</button>

            </div>

        </div>
    </div>
    <div class="col-11 mx-auto mt-5">
        <div class="row">

            <div class="col-5 mx-auto card shadow-lg" style="height: 200px;">

                <h3 class="text-center mt-4">Income Statment</h3>

                <p class="mt-2 text-center">Collect your income reports.</p>

                <button class="mt-2 col-7 btn btn-primary mx-auto" onclick="window.location='incomeReport.php';"> Income Reports</button>

            </div>

            <div class="col-5 mx-auto card shadow-lg" style="height: 200px;">

                <h3 class="text-center mt-4">Most Sell Products</h3>

                <p class="mt-2 text-center">Collect your most sell productd reports.</p>

                <button class="mt-2 col-7 btn btn-primary mx-auto" onclick="window.location='mostSellReport.php';">Most Sell Product Reports</button>

            </div>

        </div>
    </div>
    <br>



    <?php include "footer.php" ?>

</body>

</html>