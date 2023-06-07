<?php
session_start();
include('includes/dbh.inc.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '88e0814e9f6118';
    $mail->Password = '2cac75e9cbbeaf';

    $mail->setFrom("danila127@outlook.com", $get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Reset your password";
    $mail_template = "
    <h2>Reset your password</h2>
    <p>Hi $get_name, click on the link below to reset your password</p>
    <a href='http://localhost/git/xampp1/N-N-N-N/N-N-N-N/password-change.php?token=$token&email=$get_email'>Reset Password</a>
    ";

    $mail->Body = $mail_template;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->send();
}



if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['uid']);
    $token = md5(rand());

    $check_email = "SELECT * FROM users WHERE usersEmail='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['usersName']; // Assuming the username column exists in the table
        $get_email = $row['usersEmail']; // Change 'email' to 'usersEmail'

        $update_token = "UPDATE users SET verify_token='$token' WHERE usersEmail='$get_email' LIMIT 1"; // Change 'email' to 'usersEmail'
        $update_token_run = mysqli_query($conn, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "We have sent you a password reset link to your email - $get_email";
            header('Location: password_window.php');
            exit(0);
        } else {
            $_SESSION['status'] = "Somthing went wrong. Please try again! #1";
            header('Location: password_window.php');
            exit(0);
        }
    } else {
        $_SESSION['status'] = "Email not found!";
        header('Location: password_window.php');
        exit(0);
    }
}

?>