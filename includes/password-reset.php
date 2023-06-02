<?php
include('dbh.inc.php');

if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['uid']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['username'];
        $get_email = $row['email'];
        $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email'";
    } else {
        $_SESSION['status'] = "Email not found!";
        header('Location: password_window.php');
        exit(0);
    }
}
?>