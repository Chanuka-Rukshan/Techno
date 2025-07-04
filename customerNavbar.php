<?php




if (!isset($_SESSION["u"])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="customerNavbar.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <title>Document</title>
    </head>

    <body style="overflow-x: hidden;">




        <nav class="navbar navbar-expand-lg " style="background: #eaeaea;">
            <div class="container-fluid ">


                <div class="col-lg-12">
                    <div class="row div_1">

                        <div class="col-lg-2 col-5 ms-lg-5 ">

                            <img src="image/icon/Logo_1.svg" class="img" alt="">

                        </div>

                        <div class="col-lg-5 col-7 ms-lg-2 mt-lg-2">
                            <div class="row">
                                <nav class="navbar_1">
                                    <a href="home.php">Home</a>
                                    <a href="#">New</a>
                                    <a href="#">Category</a>
                                    <a href="#">About</a>
                                </nav>
                            </div>
                        </div>

                        <div class="col-lg-1 col-6">
                            <div class="row">
                                <div class="col-lg-6 col-2  mt-2 ">
                                    <div class="row">
                                        <i class="bi bi-heart-fill text-danger i_1" style="font-size: 1.4rem;"></i>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-2  mt-1">
                                    <div class="row">
                                        <a href="cart.php"><i class="bi bi-cart-check-fill text-danger  i_2" style="font-size: 1.5rem;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1 col-4 offset-1 mt-2">
                            <div class="row">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Techno Pages
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">My Products</a></li>
                                        <li><a class="dropdown-item" href="addProduct.php">Add Product</a></li>
                                        <li><a class="dropdown-item" href="#">My Sellings</a></li>
                                        <li><a class="dropdown-item" href="#">Watchlist</a></li>
                                        <li><a class="dropdown-item" href="#">Purchase History </a></li>
                                        <li><a class="dropdown-item" href="#">Messages </a></li>
                                        <li><a class="dropdown-item" href="#">Contact Admin </a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1   " style="z-index: 1000;">
                            <div class="row">






                                <img src="user.png" class="col-lg-8 col-2 offset-10" style="clip-path: circle();" onclick="toggleMenu();" />





                                <div class="sub-menu-wrap col-lg-3 col-10 mt-lg-5 mt-5" id="subMenu">
                                    <div class="sub-menu mt-lg-3 mt-5">
                                        <div class="user-info">
                                            <img src="user.png" alt="">
                                            <h5>Jon Doe</h5>
                                        </div>
                                        <hr>

                                        <a href="profileC.php" class="sub-menu-link">
                                            <img src="image/New folder/profile.png" alt="">
                                            <p>Edit Profile</p>
                                            <span>></span>
                                        </a>

                                        <a href="#" class="sub-menu-link">
                                            <img src="image/New folder/setting.png" alt="">
                                            <p>Settings & Privacy</p>
                                            <span>></span>
                                        </a>

                                        <a href="#" class="sub-menu-link">
                                            <img src="image/New folder/help.png" alt="">
                                            <p>Help & Support</p>
                                            <span>></span>
                                        </a>

                                        <a href="signin.php" class="sub-menu-link"  ;>
                                            <img src="image/New folder/logout.png" alt="">
                                            <p>Sign in or Sign up</p>
                                            <span>></span>
                                        </a>






                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </nav>

        <script src="script.js"></script>
    </body>

    </html>

<?php


} else {
    $user = $_SESSION["u"]["id"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="customerNavbar.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <title>Document</title>
    </head>

    <body style="overflow-x: hidden;">




        <nav class="navbar navbar-expand-lg " style="background: #eaeaea;">
            <div class="container-fluid ">


                <div class="col-lg-12">
                    <div class="row div_1">

                        <div class="col-lg-2 col-5 ms-lg-5 ">

                            <img src="image/icon/Logo_1.svg" class="img" alt="">

                        </div>

                        <div class="col-lg-5 col-7 ms-lg-2 mt-lg-2">
                            <div class="row">
                                <nav class="navbar_1">
                                    <a href="home.php">Home</a>
                                    <a href="#">New</a>
                                    <a href="#">Category</a>
                                    <a href="#">About</a>
                                </nav>
                            </div>
                        </div>

                        <div class="col-lg-1 col-6">
                            <div class="row">
                                <div class="col-lg-6 col-2  mt-2 ">
                                    <div class="row">
                                        <i class="bi bi-heart-fill text-danger i_1" style="font-size: 1.4rem;"></i>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-2  mt-1">
                                    <div class="row">
                                        <a href="cart.php"><i class="bi bi-cart-check-fill text-danger  i_2" style="font-size: 1.5rem;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1 col-4 offset-1 mt-2">
                            <div class="row">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Techno Pages
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">My Products</a></li>
                                        <li><a class="dropdown-item" href="addProduct.php">Add Product</a></li>
                                        <li><a class="dropdown-item" href="#">My Sellings</a></li>
                                        <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                                        <li><a class="dropdown-item" href="purchaseHistory.php">Purchase History </a></li>
                                        <li><a class="dropdown-item" href="#">Messages </a></li>
                                        <li><a class="dropdown-item" href="#">Contact Admin </a></li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1   " style="z-index: 1000;">
                            <div class="row">



                                <?php

                                $img_rs = Database::search("SELECT * FROM `img_profile` WHERE `user_id` = '" . $user . "'");
                                $d2 = $img_rs->fetch_assoc();


                                if (empty($d2["pimg_path"])) {

                                ?>
                                    <img src="user.png" class="col-lg-8 col-2 offset-10" style="clip-path: circle();" onclick="toggleMenu();" />

                                <?php
                                } else {
                                ?>
                                    <img src="<?php echo $d2["pimg_path"] ?>" class="col-lg-8 col-2 offset-10" style="clip-path: circle();" onclick="toggleMenu();">
                                <?php
                                }
                                ?>
                                <?php

                                $user_data = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user . "'");
                                $d3 = $user_data->fetch_assoc();

                                ?>

                                <div class="sub-menu-wrap col-lg-3 col-10 mt-lg-5 mt-5" id="subMenu">
                                    <div class="sub-menu mt-lg-3 mt-5">
                                        <div class="user-info">
                                            <img src="<?php echo $d2["pimg_path"] ?>" alt="">
                                            <h5><?php echo $d3["fname"] ?> <?php echo $d3["lname"] ?></h5>
                                        </div>
                                        <hr>

                                        <a href="profileC.php" class="sub-menu-link">
                                            <img src="image/New folder/profile.png" alt="">
                                            <p>Edit Profile</p>
                                            <span>></span>
                                        </a>

                                        <a href="#" class="sub-menu-link">
                                            <img src="image/New folder/setting.png" alt="">
                                            <p>Settings & Privacy</p>
                                            <span>></span>
                                        </a>

                                        <a href="#" class="sub-menu-link">
                                            <img src="image/New folder/help.png" alt="">
                                            <p>Help & Support</p>
                                            <span>></span>
                                        </a>

                                        <a href="#" class="sub-menu-link" onclick="signOut()" ;>
                                            <img src="image/New folder/logout.png" alt="">
                                            <p>Logout</p>
                                            <span>></span>
                                        </a>






                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </nav>

        <script src="script.js"></script>
    </body>

    </html>

<?php
}
