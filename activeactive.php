<?php

include "connection.php";

$aactive = $_POST["aactive"];

$rs = Database::search("SELECT * FROM `user` WHERE `id`='".$aactive."' AND `user_type_id` = '2'");
$num = $rs->num_rows;


// echo($aactive);

if (empty($aactive)) {
    echo ("Please Enter User Id");
} else {

    if ($num == 1) {

        $d = $rs->fetch_assoc();
        
        if ($d["status"] == 1) {
            Database::iud("UPDATE user SET status = '0' WHERE id = '" . $aactive . "' ");
            echo ("Deactive Successfully");
        }
        if ($d["status"] == 0) {
            
            echo ("Alrady Deactive User");
        }
    } else {
        echo ("Invalid User Id.");
    }
}
