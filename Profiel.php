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


if (isset($_SESSION['bio'])) {
    $biography = $_SESSION['bio'];
    // Display the biography on the profile page
    echo $biography;
}
?>


    <div class="container">
        <div class="profile-header">
            <div class="profile-image">
                <img src="uploads/<?php echo $profileImage; ?>" alt="Profile Image">
                <form action="profile_update.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="profileImage" id="profileImage">
            </div>
            <div class="profile-username">
                <h1>Username</h1>
            </div>
        </div>
        <div class="profile-bio">
            <label for="bio">
                <h2>Biography:<h2>
            </label>
          
            <textarea name="bio" id="bio"></textarea>
            <input type="submit" value="Update Profile">


        </div>
    </div>
</body>