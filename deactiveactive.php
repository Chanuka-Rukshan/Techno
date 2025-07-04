<?php

include "connection.php";

$deactive = $_POST["deactiveactive"];

$rs = Database::search("SELECT * FROM `user` WHERE `id`='".$deactive."' AND `status` = '0'");
$num = $rs->num_rows;


// echo($deactive);

if (empty($deactive)) {
    echo ("Please Enter User Id");
} else {

    if ($num == 1) {

        $d = $rs->fetch_assoc();
        
        if ($d["status"] == 0) {
            Database::iud("UPDATE user SET status = '1' WHERE id = '" . $deactive . "' ");
            echo ("Activate Successfully");
        }
        if ($d["status"] == 1) {
            
            echo ("Alrady Active User");
        }
    } else {
        echo ("Invalid User Id.");
    }
}
