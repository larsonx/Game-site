<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <title>GameHub</title>
</head>
<body>

<?php
include 'header.php';
  ?>
        <div class="container">
            <div class="profile-header">
                <div class="profile-image">
                <img src="https://via.placeholder.com/150" alt="Profile Picture">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="profile-image">
            <input type="submit" name="upload" value="Upload Image">
        </form>
                </div>
                <div class="profile-username">
                    <h1>Username</h1>
                </div>
            </div>
            <div class="profile-bio">
            <h2>Biography</h2>
        <form action="update_bio.php" method="POST">
            <textarea name="biography"></textarea>
            <input type="submit" name="save-bio" value="Save">
        </form>

        </div>
        </div>
</body>
</html>