
<?php

include "connection.php";
   
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.techno.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="image/icon/Logo.svg" type="image/x-icon">

</head>

<body style="overflow-x: hidden;" onload="loadProduct(0);">

    <?php include "customerNavbar.php"; ?>

    <div class="col-lg-12 col-10 container-lg mt-4">
        <div class="row">

            <div class="col-lg-7 col-12 mt-lg-0">
                <div class="row">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" id="product" placeholder="Search Your Choice Product ">
                </div>
            </div>
            <div class="col-lg-2 ms-lg-3 mt-lg-0 mt-2">
                <div class="row">
                    <button class="btn btn-primary" onclick="searchProduct(0);">Search</button>
                </div>
            </div>
            <div class="col-lg-2 ms-lg-3 mt-lg-0 mt-2">
                <div class="row">
                    <a href="advanceSearch.php"><button class="btn btn-outline-success">Advanced</button></a>
                </div>
            </div>


        </div>
    </div>

    <hr class="mt-4 border-2 border-primary" />

    <div class="div-1 container-lg " id="cors">
        <div id="carouselExampleIndicators" class="carousel slide   div-1">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner div-1">
                <div class="carousel-item active" style="z-index: -1;">
                    <img src="image/home/03.png" class="d-block img-3" alt="...">
                </div>
                <div class="carousel-item" style="z-index: -1;">
                    <img src="image/home/02.png" class="d-block img-2" alt="...">
                </div>
                <div class="carousel-item" style="z-index: -1;">
                    <img src="image/home/01.png" class="d-block img-1" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <hr class="mt-4 border-2 border-primary" />




    <!-- card -->
    <div class="row col-12 container-fluid  ms-lg-5 " id="cid">


    </div>

    <!--card  -->


    <?php include "footer.php"; ?>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>

