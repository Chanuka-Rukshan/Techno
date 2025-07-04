<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])) {

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
    </head>

    <body style="overflow-x: hidden;">

        <!-- Navbar -->
        <?php include "customerNavbar.php"; ?>
        <!-- Navbar -->

        <div class="col-11 mt-5 ms-5">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="h2 text-primary ">Add Your New Product</h2>
                    <hr class="border-2 ">
                </div>


                <div class="col-10 mt-5 container-fluid">
                    <div class="row">


                        <div class="col-4 offset-1 ">
                            <div class="row">
                                <label class="form-lable fw-bold" style="font-size: 18px;">01. Select Product Category &nbsp; :</label>
                            </div>
                        </div>


                        <div class="col-7 ">
                            <div class="row">
                                <select class="form-control border-2  text-center " id="cat_s">
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
                        </div>


                        <div class="col-7 offset-5 mt-2 " >
                            <div class="row input-group ">
                                <input type="text" class="form-control border-2 text-center " placeholder="Add New Product Category" id="cat_i">
                                <button type="button" class="btn btn-primary col-3" onclick="addCatProcess();">+ Add</button>

                                </select>
                            </div>

                        </div>

                    </div>
                </div>
                <hr class="mt-3 border-2 ">


                <div class="col-10 mt-5 container-fluid">
                    <div class="row">


                        <div class="col-4 offset-1 ">
                            <div class="row">
                                <label class="form-lable fw-bold" style="font-size: 18px;">02. Select Product Brand &nbsp; :</label>
                            </div>
                        </div>


                        <div class="col-7 ">
                            <div class="row">
                                <select class="form-control border-2  text-center " id="br_s">
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
                        </div>


                        <div class="col-7 offset-5 mt-2 " >
                            <div class="row input-group ">
                                <input type="text" class="form-control border-2 text-center" placeholder="Add New Product Brand" id="br_i">
                                <button type="button" class="btn btn-primary col-3" onclick="addbrProcess();">+ Add</button>

                                </select>
                            </div>

                        </div>

                    </div>
                </div>
                <hr class="mt-3 border-2 ">


                <div class="col-10 mt-5 container-fluid">
                    <div class="row">


                        <div class="col-4 offset-1 ">
                            <div class="row">
                                <label class="form-lable fw-bold" style="font-size: 18px;">03. Select Product Model &nbsp; :</label>
                            </div>
                        </div>


                        <div class="col-7 ">
                            <div class="row">
                                <select class="form-control border-2  text-center " id="m_s">
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
                        </div>


                        <div class="col-7 offset-5 mt-2 ">
                            <div class="row input-group ">
                                <input type="text" class="form-control border-2 text-center" placeholder="Add New Product Model" id="m_i">
                                <button type="button" class="btn btn-primary col-3" onclick="addMProcess();">+ Add</button>

                                </select>
                            </div>

                        </div>

                    </div>
                </div>
                <hr class="mt-3 border-2 ">


                <div class="col-10 mt-5 container-fluid">
                    <div class="row">


                        <div class="col-4 offset-1 ">
                            <div class="row">
                                <label class="form-lable fw-bold" style="font-size: 18px;">04. Select Product Colour &nbsp; :</label>
                            </div>
                        </div>


                        <div class="col-7 ">
                            <div class="row">
                                <select class="form-control border-2  text-center " id="co_s">
                                    <option value="0">Select Colour</option>
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
                        </div>


                        <div class="col-7 offset-5 mt-2 ">
                            <div class="row input-group ">
                                <input type="text" class="form-control border-2 text-center" placeholder="Add New Product Colour" id="co_i">
                                <button type="button" class="btn btn-primary col-3" onclick="addCoProcess();">+ Add</button>

                                </select>
                            </div>

                        </div>

                    </div>
                </div>
                <hr class="mt-3 border-2 ">



                <div class="col-10 mt-4 container-fluid">
                    <label for="" class="from-lable fw-bold" style="font-size: 18px; ">05. Add a Title to your product :</label>
                    <input type="text" class="form-control col-12 mt-2 ms-5" placeholder="Add Your Title" id="title">
                </div>
                <hr class="mt-3 border-2 ">



                <div class="col-10 mt-4 container-fluid">
                    <div class="row">

                        <div class="col-5 offset-1">
                            <div class="row">

                                <label for="" class="form-lable fw-bold" style="font-size: 18px; ">06. Select Product Condition</label>

                                <div class="col-12">
                                    <div class="form-check form-check-inline mx-5">
                                        <input class="form-check-input" type="radio" name="c" id="r_b" checked/>
                                        <label class="form-check-label " for="b">Brandnew</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="c" id="r_u" />
                                        <label class="form-check-label " for="u">Used</label>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-5 offset-1">
                            <div class="row">


                                <div class="col-12">
                                    <label class="form-label fw-bold" style="font-size: 18px;">07. Add Product Quantity</label>
                                </div>
                                <div class="col-12">
                                    <input type="number" class="form-control" value="0" min="0" id="qty" />

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr class="mt-3 border-2 ">


                <div class="col-10 container-fluid mt-4">
                    <div class="row">

                        <div class="col-5 offset-1">
                            <div class="row">


                                <div class="col-12">
                                    <label class="form-label fw-bold" style="font-size: 18px;">08. Add Product Price</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Add price" id="p" />

                                </div>
                            </div>
                        </div>


                        <div class="col-5 offset-1">
                            <div class="row">


                                <div class="col-12">
                                    <label class="form-label fw-bold" style="font-size: 18px;">09. Add Shipping Cost</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="shipping cost" id="s"/>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <hr class="mt-3 border-2 ">



                <div class="col-10 mt-4 container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fw-bold" style="font-size: 20px;">10. Product Description</label>
                        </div>
                        <div class="col-12">
                            <textarea cols="30" rows="15" class="form-control" placeholder="add your product description" id="des"></textarea>
                        </div>
                    </div>
                </div>

                <hr class="mt-3 border-2 ">


                <div class="col-10 mt-4 container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fw-bold" style="font-size: 18px;">11. Add Product Images</label>
                        </div>
                        <div class="offset-lg-2 col-12 col-lg-8">
                            <div class="row">
                                <div class="col-4 border border-dark rounded">
                                    <img src="image/udarai.png" class="img-fluid" style="width: 250px;" id="i0" />
                                </div>
                                <div class="col-4 border border-dark rounded">
                                    <img src="image/udarai.png" class="img-fluid" style="width: 250px;" id="i1" />
                                </div>
                                <div class="col-4 border border-dark rounded">
                                    <img src="image/udarai.png" class="img-fluid" style="width: 250px;" id="i2" />
                                </div>
                            </div>
                        </div>
                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                            <input type="file" class="d-none" multiple id="imageuploader" />
                            <label for="imageuploader" class="col-12 btn btn-outline-primary" onclick="changeProductImage();" >Upload Images</label>
                    </div>
                </div>
            </div>
            <hr class=" mt-3 border-2 ">


                    <div class=" col-12">
                                <label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
                                <label class="form-label">
                                    We are taking 5% of the product from price from every
                                    product as a service charge.
                                </label>
                        </div>

                        <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                            <button class="btn btn-outline-success" onclick="productReg();">Save Product</button>
                    </div>














                </div>
            </div>



            <?php include "footer.php" ?>



            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="script.js" ></script>
            <script src="bootstrap.bundle.js" ></script>
</body>

</html>

    <?php
} else {
    header("location:signin.php");
}


    ?>