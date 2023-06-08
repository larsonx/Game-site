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

if (isset($_POST['password_update'])) {
    $email = mysqli_real_escape_string($conn, $_POST['uid']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);


    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            //checking token is valid or not
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {
                if ($new_password == $confirm_password) {
                    // echo $new_password;
                    // die;
                    $hashedPwd = password_hash($new_password, PASSWORD_DEFAULT);
                    $update_password = "UPDATE users SET usersPwd='$hashedPwd' WHERE verify_token='$token' LIMIT 1";
                    // echo "test";
                    // die;
                    $update_password_run = mysqli_query($conn, $update_password);

                    if ($update_password_run) {
                        $_SESSION['status'] = "New password updated successfully!";
                        header('Location: inloggen.php');
                        exit(0);
                    } else {
                        $_SESSION['status'] = "Did not update password!";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION['status'] = "Password and confirm password does not match!";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION['status'] = "Invalid token!";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "All fields are required!";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "No token provided!";
        header('Location: password-change.php');
        exit(0);
    }
}

?>