<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])) {

    $prid = $_GET["id"];
    $qty = $_GET["qty"];
    $email = $_SESSION["u"]["email"];

    $array;

    $order_id = uniqid();

    $product_rs = Database::search("SELECT * FROM product WHERE id='" . $prid . "'");
    $product_data = $product_rs->fetch_assoc();

    $price = $product_data["price"];
    $delivery = $product_data["shipping_fee"];
    $amount = ((int)$product_data["price"] * (int)$qty) + (int)$delivery;



    $userdetails_rs = Database::search("SELECT * FROM user WHERE email='" . $email . "'");
    $user_data = $userdetails_rs->fetch_assoc();




    $item = $product_data["title"];
    $fname = $user_data["fname"];
    $lname = $user_data["lname"];
    $mobile = $user_data["mobile"];
    $address = $user_data["line1"];
    $uaddress = $user_data["line2"];
    $city = "Kalutara";


    $merchant_id = "1224090";
    $merchant_secret = "MTMxNDU0NDYxMzI2ODM2OTY4MzUwNTE4NTM3MDY3ODc5MzMyMw==";
    $currency = "LKR";

    $hash = strtoupper(
        md5(
            $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
        )
    );

    

    $array["id"] = $order_id;
    $array["item"] = $item;
    $array["amount"] = $amount;
    $array["fname"] = $fname;
    $array["lname"] = $lname;
    $array["mobile"] = $mobile;
    $array["address"] = $address;
    $array["city"] = $city;
    $array["email"] = $email;
    $array["mid"] = $merchant_id;
    $array["msecret"] = $merchant_secret;
    $array["currency"] = $currency;
    $array["hash"] = $hash;

    $obj = json_encode($array);

    

    echo $obj;
}
