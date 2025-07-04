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
    <link rel="shortcut icon" href="image/icon/Logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php include "customerNavbar.php" ?>

    <div class="text-center mt-5  col-12">

        <div class="row">

            <h3><i class="fa-solid fa-star col-1 text-warning"></i>Watchlist<i class="fa-solid fa-star col-1 text-warning"></i></h3>
            <hr class="mt-3 border-2">
        </div>

    </div>

    <div class="col-11 mx-auto mt-5">
        <div class="row">

            <div class="col-5 mx-auto card shadow-lg" style="height: 350px;">

                <button class="btn btn-sm btn-danger col-1 offset-11 mt-2">x</button>

                <div class="row">
                    <div class="card shadow-lg ms-2 col-5 mt-3" style="height: 200px;">
                        <img src="user.png" class="mt-1 ">
                    </div>

                    <div class=" col-6 mt-4">
                        <h5>Title</h5>
                        <h6 class="mt-5">Laptop</h6>
                        <h6 class="mt-1">Asus</h6>
                        <h6 class="mt-1">10000.00</h6>
                        <h6 class="mt-2 text-danger">200</h6>
                        <h6 class="mt-4 text-end text-primary">Brnadnew</h6>
                    </div>
                </div>

                <div class="row">
                    <button class="btn btn-outline-warning mt-2 btn-sm mx-auto col-5">Add to cart</button>
                    <button class="btn btn-outline-success mt-2 btn-sm mx-auto col-5">Add to cart</button>
                </div>


            </div>

            <div class="col-5 mx-auto card shadow-lg" style="height: 350px;">

                <button class="btn btn-sm btn-danger col-1 offset-11 mt-2">x</button>

                <div class="row">
                    <div class="card shadow-lg ms-2 col-5 mt-3" style="height: 200px;">
                        <img src="user.png" class="mt-1 ">
                    </div>

                    <div class=" col-6 mt-4">
                        <h5>Title</h5>
                        <h6 class="mt-5">Laptop</h6>
                        <h6 class="mt-1">Asus</h6>
                        <h6 class="mt-1">10000.00</h6>
                        <h6 class="mt-2 text-danger">200</h6>
                        <h6 class="mt-4 text-end text-primary">Brnadnew</h6>
                    </div>
                </div>

                <div class="row">
                    <button class="btn btn-outline-warning mt-2 btn-sm mx-auto col-5">Add to cart</button>
                    <button class="btn btn-outline-success mt-2 btn-sm mx-auto col-5">Add to cart</button>
                </div>


            </div>





        </div>

    </div>
    </div>






    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>