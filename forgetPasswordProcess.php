<?php

include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST["e"];

if (empty($email)) {
    echo ("Please enter your email");
} else {
    if (isset($_POST["e"])) {



        $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        $n = $rs->num_rows;

        if ($n == 1) {

            $code = uniqid();
            Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'chanukarukshan81@gmail.com';
            $mail->Password = 'ousfzkbdsclgcfjj';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('chanukarukshan81@gmail.com', 'Reset Password');
            $mail->addReplyTo('chanukarukshan81@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'www.techno.com Forgot password Verification Code';
            $bodyContent = '<h1 style="color:blue;">Your Verification Code is ' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed.';
            } else {
                echo 'Success';
            }
        } else {
            echo ("Invalid Email Address.");
        }
    } else {
        echo ("Please enter your Email Address in Email Field.");
    }
}
