<?php
$msg = "";
$css_class = "";

$conn = mysqli_connect('localhost', 'root', '','gamehub');


if (isset($_POST['save-user'])) {
    echo "<pre>", print_r($_FILES['user_img']), "</pre>";


    $bio = $_POST['biography'];
    $profileImageName = time() . '_' . $_FILES['user_img']['name'];


    $target = 'images/' . $profileImageName;

    if (move_uploaded_file($_FILES['user_img']['tmp_name'], $target)) {
        $sql = "INSERT INTO users (profile_image, bio) VALUES ('$profileImageName', '$bio')";
        if (mysqli_query($conn, $sql)) {
            $msg = "Image uploaded and saved to database";
            $css_class = "alert-success";
        } else {
            $msg = "Database Error: Failed to save user";
            $css_class = "alert-danger";
        }

    } else {
        $msg = "Failed to upload to upload";
        $css_class = "alert-danger";
    }

}
?>