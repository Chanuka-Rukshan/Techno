<?php

include "connection.php";
session_start();

$user = $_SESSION["u"]["id"];
$productId = $_POST["proId"];
$qty = $_POST["qty"];

// echo($);
$rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$productId."'");
$num = $rs->num_rows;

$img = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '".$productId."'");
$mum = $img->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
    $productQty = $d["qty"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_id` = '".$user."' AND `product_id` = '".$productId."'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        // echo("Update");
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["cart_qty"];


        if ($productQty >= $newQty) {
            //Update quary
            Database::iud("UPDATE `cart` SET `cart_qty` = '".$newQty."' WHERE `cart_id` = '".$d2["cart_id"]."'");
            echo("Cart item Updated Successfully");
        } else {
            echo("Stock Quantity has been exceeded!");
        }
        
    }else{
        //Insert
        if ($productQty >= $qty) {
            Database::iud("INSERT INTO `cart` (`cart_qty`,`user_id`,`product_id`) VALUES ('".$qty."','".$user."','".$productId."')");

            
            
            echo("Cart item Add Successfully");
        } else {
            echo("Stock Quantity has been exceeded!");
        }
        
    }
}else{
    echo("Your Stock is not Fund!");
}


?>