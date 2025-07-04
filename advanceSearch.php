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
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

    <?php include "customerNavbar.php"; ?>


    <div class="container mt-4">
        <div class="card " style="height: 250px;">

            <div class="col-12">
                <div class="row">
                    <div class="mt-2 offset-1 col-3">
                        <label class="form-label">Category:</label>
                        <select class="form-control" id="cat">
                            <option value="0">Select Category</option>
                            <?php

                            $rs = Database::search("SELECT * FROM `category`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo $d["cat_id"] ?>"><?php echo $d["cat_name"] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="mt-2 ms-4 col-3">
                        <label class="form-label">Brand:</label>
                        <select class="form-control" id="brand">
                            <option value="0">Select Brand</option>
                            <?php

                            $rs = Database::search("SELECT * FROM `brand`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo $d["brand_id"] ?>"><?php echo $d["brand_name"] ?></option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="mt-2 ms-4 col-3">
                        <label class="form-label">Model:</label>
                        <select class="form-control" id="model">
                            <option value="0">Select Model</option>
                            <?php

                            $rs = Database::search("SELECT * FROM `model`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo $d["model_id"] ?>"><?php echo $d["model_name"] ?></option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>

                    <div class="mt-3 offset-1 col-3">
                        <label class="form-label">Color:</label>
                        <select class="form-control" id="color">
                            <option value="0">Select Color</option>
                            <?php

                            $rs = Database::search("SELECT * FROM `color`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo $d["color_id"] ?>"><?php echo $d["color_name"] ?></option>

                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="mt-3 ms-4 col-3">
                        <label class="form-label">Min Price:</label>
                        <input type="text" class="form-control" placeholder="Min Price" id="min">
                    </div>
                    <div class="mt-3 ms-4 col-3">
                        <label class="form-label">Max Price:</label>
                        <input type="text" class="form-control" placeholder="Max Price" id="max">

                    </div>
                    <div class="mt-4 offset-4 col-3 row">
                        <button class="btn btn-primary ms-4" onclick="addvanceSearch(0);">Search</button>

                    </div>


                </div>
            </div>





        </div>
    </div>
    <hr>


    <!-- card -->
    <div class="row col-12 container-fluid  ms-lg-5 " id="add">


    </div>

    <!--card  -->

    <?php include "footer.php" ?>


    <script src="bootstrap.bundle.js" ></script>
    <script src="script.js" ></script>
</body>

</html>