<?php

include "connection.php";

$br_i = $_POST["br_i"];


if (empty($br_i)) {
    echo("Please Enter Your Brand");
} else {
    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` = '" . $br_i . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("This Brand is Already exists please select the Brand");
    }else{
        Database::iud("INSERT INTO `brand` (`brand_name`) VALUES ('".$br_i."')");
        echo("success");
    }
}










