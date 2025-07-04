<?php


include "connection.php";
session_start();
$user = $_SESSION["u"];

$con = $_POST["con"];
$pro = $_POST["pro"];
$dis = $_POST["dis"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$pc = $_POST["pc"];


if(empty($con)){
    echo("Please Select your coountry");
}else if(empty($pro)){
    echo("Please Select your province");
}else if(empty($dis)){
    echo("Please Select your district");
}else if(empty($line1)){
    echo("Please enter your Address line 01");
}else if(strlen($line1) > 45){
    echo("Address line 01 Must Contain LOWER THAN 45 characters");
}else if(empty($line2)){
    echo("Please enter your Address line 02");
}else if(strlen($line2) > 45){
    echo("Address line 02 Must Contain LOWER THAN 45 characters");
}else if(empty($pc)){
    echo("Please enter your Postal Code");
}else if(strlen($pc) > 10){
    echo( "Postal Code Must Contain LOWER THAN 10 characters");
}else{
    Database::iud("UPDATE `user` SET `line1` = '".$line1."',`line2` = '".$line2."',`postal_code` = '".$pc."',`country_coun_id` = '".$con."',`province_pro_id` = '".$pro."',`district_dis_id` = '".$dis."' WHERE `id` = '".$user["id"]."'");

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo("Update Successfully");
}




?>
