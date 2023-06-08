<?php include 'upload.php' ?>
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


    <?php if (!empty($msg))
        ; ?>
    <div class="alert <?php echo $css_class; ?>">
        <?php echo $msg; ?>
    </div>
    <div class="container">
        <div class="profile-header">
            <div class="profile-image">
                <img src="https://via.placeholder.com/150" onclick="triggerClick()" id="profileDisplay" alt="Profile Picture">
                <form action="Profiel.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="user_img" onchange="displayImage(this)" id="user_img" style="display:none">
            </div>
            <div class="profile-username">
                <h1>Username</h1>
            </div>
        </div>
        <div class="profile-bio">
            <h2>Biography</h2>
            <form action="update_bio.php" method="POST">
                <textarea name="biography"></textarea>
                <input type="submit" name="save-user" value="Save">
            </form>
<script src="scripts.js"></script>
        </div>
    </div>
</body>

</html>