<?php

include "connection.php";

$m_i = $_POST["m_i"];


if (empty($m_i)) {
    echo("Please Enter Your Model");
} else {
    $rs = Database::search("SELECT * FROM `model` WHERE `model_name` = '" . $m_i . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("This Model is Already exists please select the Model");
    }else{
        Database::iud("INSERT INTO `model` (`model_name`) VALUES ('".$m_i."')");
        echo("success");
    }
}










