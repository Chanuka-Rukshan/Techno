<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header_2.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
</head>

<body>


<div class="col-11 card shadow-lg mt-2 ms-5 " style="height: 60px;">
    <div class="row ms-1">



        <div class="col-3 row">
            <img src="image/icon/Logo_3.svg" style="margin-top: -100px; margin-left: -20px;">
        </div>

        <div class="col-7">
            <nav class="mt-3 adminNav">
                <a href="adminHome.php">Dashboard</a>
                <a href="adminUserM.php">Users</a>
                <a href="adminProduct.php">Products</a>
                <a href="history.php">Oders Hitory</a>
                <a href="report.php">reports</a>
            </nav>
        </div>

        <div class="col-lg-2   " >
            <div class="row">



                <img src="user.png" class="col-lg-4 col-2 offset-9 mt-2" onclick="toggleMenu();">


                <div class="sub-menu-wrap col-lg-3 col-10 mt-lg-5 mt-5" id="subMenu">
                    <div class="sub-menu mt-lg-3 mt-5">
                        <div class="user-info">
                            <img src="user.png" alt="">
                            <h4>Jone Doe</h4>
                        </div>
                        <hr>

                        <a href="#" class="sub-menu-link">
                            <img src="image/New folder/profile.png" alt="">
                            <p>Admin Profile</p>
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

                        <a href="index.php" class="sub-menu-link">
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

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>