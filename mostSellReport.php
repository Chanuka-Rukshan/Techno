<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body onload="loadMostChart();">

    <div class="col-11 mx-auto">

        <a href="report.php"><img src="image/back.png " style="width: 70px;"></a>

        <button class="btn mt-5 btn-dark col-2 offset-9" onclick="printUser();"><i class="bi bi-printer-fill"></i> Print</button>
    </div>




    <div id="printuserReports">
        <div class="col-8 mx-auto mt-5">
            <div class="card" style="height: 620px;">

                <div class="col-11 m mx-auto">
                    <div class="row ">



                        <div class=" mx-auto mt-3 card shadow-lg" style="height: 580px; ">
                            <div class="row">

                                <h5 class="text-center mt-2">Most Selling Categorys</h5>
                                <div class="col-8 mx-auto">
                                    <div style="height: 500px;" class="mx-auto mt-2">
                                        <canvas id="MostChart"></canvas>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>


    <?php include "footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>

</html>