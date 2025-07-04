<?php

include "connection.php";
session_start();

$user = $_SESSION["u"]["id"];

if (sizeof($_FILES) == 1) {

    $image = $_FILES["image"];
    $image_extension = $image["type"];

    $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

    if (in_array($image_extension, $allowed_image_extensions)) {
        $new_img_extension;

        if ($image_extension == "image/jpeg") {
            $new_img_extension = ".jpeg";
        } else if ($image_extension == "image/png") {
            $new_img_extension = ".png";
        } else if ($image_extension == "image/svg+xml") {
            $new_img_extension = ".svg";
        }

        $file_name = "image//profile_images//" . "2024Chanu2003" . "_" . uniqid() . $new_img_extension;
        move_uploaded_file($image["tmp_name"], $file_name);

        $profile_img_rs = Database::search("SELECT * FROM `img_profile` WHERE `user_id`='" . $user . "'");

        if ($profile_img_rs->num_rows == 1) {

            Database::iud("UPDATE `img_profile` SET `pimg_path`='" . $file_name . "' WHERE `user_id`='" . $user . "'");
            echo ("Updated");
        } else {

            Database::iud("INSERT INTO `img_profile` (`pimg_path`,`user_id`) VALUES ('" . $file_name . "','" . $user . "')");
            echo ("Saved");
        }
    }
} else if (sizeof($_FILES) == 0) {

    echo ("You have not selected any image.");
} else {
    echo ("You must select only 01 profile image.");
}
