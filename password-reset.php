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
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = "danila127@outlook.com";
    $mail->Password = "***";

    $mail->SMTPSecure = "tls";
    $mail->Port = "587";

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
    $mail->send();
}


if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['uid']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['username'];
        $get_email = $row['email'];

        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
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

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>