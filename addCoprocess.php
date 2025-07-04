<?php

include "connection.php";

$co_i = $_POST["co_i"];


if (empty($co_i)) {
    echo("Please Enter Your Colour");
} else {
    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '" . $co_i . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("This Colour is Already exists please select the Colour");
    }else{
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$co_i."')");
        echo("success");
    }
}










