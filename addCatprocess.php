<?php

include "connection.php";

$cat_i = $_POST["cat_i"];


if (empty($cat_i)) {
    echo("Please Enter Your Category");
} else {
    $rs1 = Database::search("SELECT * FROM `category` WHERE `cat_name` = '" . $cat_i . "'");
    $n1 = $rs1->num_rows;

    if ($n1 > 0) {
        echo ("This Category is Already exists please select the catagory");
    }else{
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('".$cat_i."')");
        echo("success");
    }
}










