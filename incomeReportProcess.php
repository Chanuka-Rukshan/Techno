<?php

include "connection.php";

$from = $_POST["from"];
$to = $_POST["to"];

// echo($from);
// echo($to);

if (empty($from)) {
    echo ("Please enter your from date");
} else if (empty($to)) {
    echo ("Please enter your to date");
} else {
?>

    <div class="col-12 mt-4" >



        <?php


        $rs = Database::search("SELECT * FROM `invoice` WHERE `date` BETWEEN '".$from."' AND '".$to."'");
        $num = $rs->num_rows;

        for ($i = 0; $i < $num; $i++) {
            $d = $rs->fetch_assoc();

        ?>
            <div class="col-11 mx-auto card shadow-lg mt-2 text-center border-0" style="height: 55px; background: #eaeaea;">
                <div class="row p-3">

                    <div class="col-2">
                        <h6><?php echo $d["invoice_id"] ?></h6>
                    </div>

                    <div class="col-2">
                        <h6><?php echo $d["order_id"] ?></h6>
                    </div>


                    <div class="col-3">
                        <h6><?php echo $d["date"] ?></h6>
                    </div>

                    <div class="col-2">
                        <h6><?php echo $d["product_qty"] ?></h6>
                    </div>

                    <div class="col-2">
                        <h6><?php echo $d["total"] ?></h6>
                    </div>

                    <div class="col-1">
                        <h6><?php echo $d["user_id"] ?></h6>
                    </div>

                </div>
            </div>

        <?php
        }


        ?>


    </div>

<?php
}


?>