<?php

include "connection.php";

$pageno = 0;
$page = $_POST["page"];
// echo($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}


$q = "SELECT * FROM `product_img` INNER JOIN `product` ON `product_img`.`product_id` = `product`.`id` ";
$rs = Database::search($q);
$num = $rs->num_rows;

// echo($num);

$results_per_page = 5;
$num_of_pages = ceil($num / $results_per_page);
// echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;
// echo($page_results);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

if ($num2 == 0) {
    echo ("No Product Here.....");
} else {
    for ($x = 0; $x < $num2; $x++) {
        $d = $rs2->fetch_assoc();

?>

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
                                                            ?> onclick="loadProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Previous</a></li>
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="loadProduct(<?php echo $y ?>);"><?php echo $y ?></a></li>

                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="loadProduct(<?php echo $y ?>);"><?php echo $y ?></a></li>

                <?php
                    }
                }
                ?>



                <li class="page-item"><a class="page-link" <?php


                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="loadProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                }


                                                                                                                    ?>>Next</a></li>
            </ul>
        </nav>
    </div>


<?php


}




?>