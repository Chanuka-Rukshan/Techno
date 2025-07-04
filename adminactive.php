<?php

include "connection.php";

$aadmin = $_POST["aadmin"];

$rs = Database::search("SELECT * FROM `user` WHERE `id`='".$aadmin."' AND `user_type_id` = '2'");
$num = $rs->num_rows;


// echo($aactive);

if (empty($aadmin)) {
    echo ("Please Enter User Id");
} else {

    if ($num == 1) {

        $d = $rs->fetch_assoc();
        
        if ($d["user_type_id"] == 2) {
            Database::iud("UPDATE user SET `user_type_id` = '1' WHERE id = '" . $aadmin . "' ");
            echo ("Admin Successfully");
        }
        if ($d["user_type_id"] == 1) {
            
            echo ("Alrady Admin User");
        }
    } else {
        echo ("Invalid User Id.");
    }
}

?>