<?php
include "connection.php";

$pageno = 0;
$page = $_POST["pg"];

$color = $_POST["color"];
$cat = $_POST["cat"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

// echo ($minPrice);

$status = 0; // No condition

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `product` INNER JOIN `category` ON `product`.`cat_id` = `category`.`cat_id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
INNER JOIN `model` ON `product`.`model_id` = `model`.`model_id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `product_img` ON `product_img`.`product_id` = `product`.`id`";

// Search by color------------------------------------------------------------------------

if ($status == 0 && $color != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `color`.`color_id`='" . $color . "'";
    $status = 1;
} elseif ($status != 0 && $color != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `color`.`color_id`='" . $color . "'";
}

// Search by color-------------------------------------------------------------------------




// Search by Category----------------------------------------------------------------------

if ($status == 0 && $cat != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `category`.`cat_id`='" . $cat . "'";
    $status = 1;
} elseif ($status != 0 && $cat != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `category`.`cat_id`='" . $cat . "'";
}

// Search by Category----------------------------------------------------------------------






// Search by Brand-------------------------------------------------------------------------

if ($status == 0 && $brand != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `brand`.`brand_id`='" . $brand . "'";
    $status = 1;
} elseif ($status != 0 && $brand != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `brand`.`brand_id`='" . $brand . "'";
}


// Search by Brand-------------------------------------------------------------------------






// Search bySize---------------------------------------------------------------------------

if ($status == 0 && $model != 0) {
    // 1st time search by color (WHERE)
    $q .= " WHERE `model`.`model_id`='" . $model . "'";
    $status = 1;
} elseif ($status != 0 && $model != 0) {
    // 2nd time search by color (AND)
    $q .= " AND `model`.`model_id`='" . $model . "'";
}

// Search bySize---------------------------------------------------------------------------



// Search by Min Price---------------------------------------------------------------------
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `product`.`price` >= '" . $minPrice . "' ORDER BY `product`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= " AND `product`.`price` >= '" . $minPrice . "' ORDER BY `product`.`price` ASC";
    }
}
// Search by Min Price---------------------------------------------------------------------



// Search by MaxPrice----------------------------------------------------------------------
if (empty($maxPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `product`.`price` <= '" . $maxPrice . "' ORDER BY `product`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= " AND `product`.`price` <= '" . $minPrice . "' ORDER BY `product`.`price` ASC";
    }
}
// Search by MaxPrice----------------------------------------------------------------------




// Search by Price range-------------------------------------------------------------------
if (!empty($maxPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `product`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `product`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= " AND `product`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `product`.`price` ASC";
    }
}

// Search by Price range-------------------------------------------------------------------

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 5;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    # Search No result
?>
    <div class="d-flex align-items-center flex-column mt-5">
        <h5>Search No Results</h5>
        <p>We're Sorry , We cannot find any matches for your search term...</p>
    </div>
    <?php
} else {
    # Load page





    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

    ?>
        <!-- Card -->

        <div class="col-lg-2 ms-4 col-12 card_any  offset-lg-0 offset-2 mt-3">
            <div class="row ">

                <div class="card shadow-lg bg-body-tertiary rounded-2  mt-2 " style="width: 16rem; height: 480px;">



                    <a href="singleProductView.php?s=<?php echo $d["id"] ?>">

                        <img src="<?php echo $d["img_path"]  ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" /></a>




                    <div class="card-body ms-0 m-0 text-center">

                        <a href="singleProductView.php?s=<?php echo $d["id"] ?>" style="text-decoration: none; color: black;">
                            <h6 class="text-start"><?php echo $d["title"] ?></h6>
                        </a>
                        <p class="text-primary text-start mt-2 "><?php

                                                                    if ($d["con_id"] == 1) {
                                                                        echo ("Brandnew");
                                                                    } else {
                                                                        echo ("Used");
                                                                    }


                                                                    ?></p>
                        <h6 class="mt-2">LKR <?php echo $d["price"] ?>.00</h6>
                        <p class="mt-2 text-danger">Shipping : LKR <?php echo $d["shipping_fee"] ?>.00</p>

                        <button class="col-12 btn btn-outline-dark mt-2 border border-primary">
                            Add To watchlist
                        </button>

                        <button class="col-12 btn btn-success mt-2 ">
                            Buy now
                        </button>
                    </div>
                </div>
            </div>
        </div>




    <?php
    }

    ?>

    <!-- pagination -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="addvanceSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Previous</a></li>
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="addvanceSearch(<?php echo $y ?>);"><?php echo $y ?></a></li>

                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="addvanceSearch(<?php echo $y ?>);"><?php echo $y ?></a></li>

                <?php
                    }
                }
                ?>



                <li class="page-item"><a class="page-link" <?php


                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="addvanceSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                }


                                                                                                                    ?>>Next</a></li>
            </ul>
        </nav>
    </div>

    <!-- pagination -->



<?php


}

?>

<!-- card -->





<!-- pagination -->

<?php






?>