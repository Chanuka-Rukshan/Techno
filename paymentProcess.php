<?php

session_start();
include "connection.php";
$user = $_SESSION["u"]["id"];
$prostockList = array();
$qtyList = array();
$address_rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $user . "'");
//$address_num = $address_rs->num_rows;
$address_data = $address_rs->fetch_assoc();

$hi = $address_data["line1"] . " " . $address_data["line2"];
$userdetails_rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $user . "'");
$user = $userdetails_rs->fetch_assoc();
$city = "Kalutara";


if (isset($_POST["cart"]) && $_POST["cart"] == "true") {
    // echo ("From Cart");
    $rs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $user["id"] . "'");
    $num = $rs->num_rows;
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        $prostockList[] = $d["product_id"];
        $qtyList[] = $d["cart_qty"];
    }
} else {
    //From Buy Now

    $prostockList[] = $_POST["pid"];
    $qtyList[] = $_POST["cart_qty"];
}

$merchantId = "1224090";
$merchantSecret = "MTMxNDU0NDYxMzI2ODM2OTY4MzUwNTE4NTM3MDY3ODc5MzMyMw==";
$items = "";
$netTotal = 0;
$currency = "LKR";
$orderId = uniqid();

for ($i = 0; $i < sizeof($prostockList); $i++) {

    $rs2 = Database::search("SELECT * FROM `product` WHERE `id`='" . $prostockList[$i] . "'");
    $d2 = $rs2->fetch_assoc();
    $stockQty = $d2["qty"];

    if ($stockQty >= $qtyList[$i]) {
        //         //Stock Available
        $items .= $d2["title"];
        if ($i != sizeof($prostockList) - 1) {
            $items .= ", ";
        }
        $netTotal += (($d2["price"]) * ($qtyList[$i]));
    } else {
        echo ("Product has no available stock.");
    }

    if ($stockQty >= $qtyList[$i]) {
        //         //Stock Available
        $items .= $d2["title"];
        if ($i != sizeof($prostockList) - 1) {
            $items .= ", ";
        }
        $netTotal += (($d2["shipping_fee"]));
    } else {
        echo ("Product has no available stock.");
    }
}

//Delivary Fee

$subTotal = $netTotal;
$hash = strtoupper(
    md5(
        $merchantId .
            $orderId .
            number_format($subTotal, 2, '.', '') .
            $currency .
            strtoupper(md5($merchantSecret))
    )
);



$payment = array();
$payment["sandbox"] = true;
$payment["merchant_id"] = $merchantId;
$payment["first_name"] = $user["fname"];
$payment["last_name"] = $user["lname"];
$payment["email"] = $user;
$payment["phone"] = $user["mobile"];
$payment["address"] = $hi;
$payment["city"] = $city;
$payment["country"] = "Sri Lanka";
$payment["order_id"] = $orderId;
$payment["items"] = $items;
$payment["currency"] = $currency;
$payment["amount"] = $subTotal;
$payment["hash"] = $hash;
$payment["return_url"] = "";
$payment["cancel_url"] = "";
$payment["notify_url"] = "";

$ody = json_encode($payment);
echo json_encode($payment);
