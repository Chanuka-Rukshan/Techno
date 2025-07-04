<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `user` ON `cart`.`user_id` = `user`.`id` INNER JOIN `product` ON `cart`.`product_id` = `product`.`id` INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id` INNER JOIN product_img ON product_img.product_id = product.id ");
$num = $rs->num_rows;






if ($num > 0) {


    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
       
        
        
        $total = $d["price"] * $d["cart_qty"] + $d["shipping_fee"];
        $netTotal += $total;

?>
        <div class="card shadow-lg ms-4 border row mb-3" style="width: 770px; height: 480px;">

            <button class="col-1  mt-2 btn btn-sm btn-danger" onclick="removeCart('<?php echo $d['cart_id'] ?>');">X</button>

            <div class="card col-4 mt-3 ms-2 shadow-lg" style="height: 190px; width: 220px;">
                <img src="<?php echo $d["img_path"] ?>" style="width: 170px;" class="mt-2 ms-4">

            </div>
            <div class=" col-8 mt-5  ">
                <div class="row">


                    <h3><?php echo $d["description"] ?></h3>


                    <h6 class="mt-4">Price: <?php echo $d["price"] ?></h6>

                    <h6>Colour: <?php echo $d["color_name"] ?></h6>

                    <h6>Shipping Cost: <?php echo $d["shipping_fee"] ?></h6>

                    <h6 class="mt-4">Qty: <input type="number" class="ms-3 mt-1" style="border-radius: 30px;" value="<?php echo $d["cart_qty"] ?>"></h6>

                    <h4 class="mt-5 text-warning">Total: &nbsp;&nbsp;LKR <?php echo ($total) ?></h4>



                    <div class="col-4 offset-7 row mt-4">
                        <button class="ms-4 btn btn-success">Buy Now</button>
                    </div>

                </div>
            </div>
        </div>

<?php

    }
}


?>