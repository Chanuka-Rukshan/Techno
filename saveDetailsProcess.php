<?php


include "connection.php";
session_start();
$user = $_SESSION["u"];


$fname = $_POST["fname"];
$lname = $_POST["lname"];
$uname = $_POST["uname"];
$birth = $_POST["birth"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$bio = $_POST["bio"];

if(empty($fname)){
    echo ("Please Enter Your First Name.");
}else if(strlen($fname) > 45){
    echo ("First Name Must Contain LOWER THAN 20 characters.");
}else if(empty($lname)){
    echo ("Please Enter Your Last Name.");
}else if(strlen($lname) > 45){
    echo ("Last Name Must Contain LOWER THAN 20 characters.");
}else if(empty($uname)){
    echo ("Please Enter Your Last Name.");
}else if(strlen($uname) > 45){
    echo ("Last Name Must Contain LOWER THAN 20 characters.");
}else if(empty($email)){
    echo ("Please Enter Your Email Address.");
}else if(strlen($email) > 100){
    echo ("Email Address Must Contain LOWER THAN 100 characters.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email Address.");
}else if(empty($mobile)){
    echo ("Please Enter Your Mobile Number.");
}else if(strlen($mobile) != 10){
    echo ("Mobile Number Must Contain 10 characters.");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo ("Invalid Mobile Number.");
}else if(empty($gender)){
    echo("Please Select Your Gender");
}else if(empty($birth)){
    echo("Please Select Your Birthday");
}else{
    
    Database::iud("UPDATE `user` SET `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`mobile` = '".$mobile."',`username` = '".$uname."',`bio` = '".$bio."',`gender_gen_id` = '".$gender."',`birth` = '".$birth."' WHERE `id` = '".$user["id"]."'");

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo("update Successfully");
}