<?php

session_start();
include "connection.php";

if (!isset($_SESSION["u"])) {
    header("location:signin.php");
}

$username = $_SESSION["u"]["id"];


$cat_s = $_POST["cat_s"];
$cat_i = $_POST["cat_i"];
$br_s = $_POST["br_s"];
$br_i = $_POST["br_i"];
$m_s = $_POST["m_s"];
$m_i = $_POST["m_i"];
$co_s = $_POST["co_s"];
$co_i = $_POST["co_i"];
$title = $_POST["title"];
$con = $_POST["con"];
$qty = $_POST["qty"];
$p = $_POST["p"];
$s = $_POST["s"];
$des = $_POST["des"];

if ($cat_s == "0" and  empty($cat_i)) {
    echo ("Please Select Your Category or Enter New Category");
} else if (!empty($cat_s) and !empty($cat_i)) {
    echo ("Only INSERT or SELECT can be done at a time a Category.");
} else if (strlen($cat_i) > 45) {
    echo ("Category Must Contain LOWER THAN 45 characters.");
} else if ($br_s == "0" and empty($br_i)) {
    echo ("Please Select Your Brand or Enter New Brand");
} else if (!empty($br_s) and !empty($br_i)) {
    echo ("Only INSERT or SELECT can be done at a time a brand.");
} else if (strlen($br_i) > 45) {
    echo ("Brand Must Contain LOWER THAN 45 characters.");
} else if ($m_s == "0" and empty($m_i)) {
    echo ("Please Select Your Model or Enter New Model");
} else if (!empty($m_s) and !empty($m_i)) {
    echo ("Only INSERT or SELECT can be done at a time a Model.");
} else if (strlen($m_i) > 45) {
    echo ("Model Must Contain LOWER THAN 45 characters.");
} else if ($co_s == 0 and empty($co_i)) {
    echo ("Please Select Your Colour or Enter New Colour");
} else if (!empty($co_s) and !empty($co_i)) {
    echo ("Only INSERT or SELECT can be done at a time a Colour.");
} else if (strlen($co_i) > 45) {
    echo ("Category Must Contain LOWER THAN 45 characters.");
} else if (empty($title)) {
    echo ("Please Enter Your Title");
} else if (strlen($title) > 50) {
    echo ("Title Must Contain LOWER THAN 50 characters.");
} else if (empty($qty)) {
    echo ("Please Enter Your Qty");
} else if (empty($p)) {
    echo ("Please Enter Your Price");
} else if (empty($s)) {
    echo ("Please Enter Your Shipping cost");
} else if (strlen($s) > 30) {
    echo ("Shipping Cost must contain Lower Than 30 Characters");
} else if (empty($des)) {
    echo ("Please Enter Your Description");
} else {



    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    Database::iud("INSERT INTO `product` (`price`,`qty`,`description`,`title`,`datetime`,`shipping_fee`,`color_id`,
    `con_id`,`brand_id`,`model_id`,`cat_id`,`user_id`) VALUES ('" . $p . "','" . $qty . "','" . $des . "',
    '" . $title . "','" . $date . "','" . $s . "','" . $co_s . "','" . $con . "','" . $br_s . "','" . $m_s . "',
    '" . $cat_s . "','" . $username . "')");


    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $image_file = $_FILES["image" . $x];
                $file_extension = $image_file["type"];

                if (in_array($file_extension, $allowed_image_extensions)) {

                    $new_img_extension;

                    if ($file_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } else if ($file_extension == "image/png") {
                        $new_img_extension = ".png";
                    } else if ($file_extension == "image/svg+xml") {
                        $new_img_extension = ".svg";
                    }

                    $file_name = "image//productImg//" . "1h2j4" . "_" . $x . "_" . uniqid() . $new_img_extension;
                    move_uploaded_file($image_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `product_img` (`img_path`,`product_id`) VALUES 
                    ('" . $file_name . "','" . $product_id . "')");

                } else {
                    echo ("Inavid image type.");
                }
            }
        }

        echo ("success");
    } else {
        echo ("Invalid Image Count.");
    }
}
