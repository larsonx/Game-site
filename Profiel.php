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



$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gamehub";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
die("Connection failed:" . mysqli_connect_error());
}


$sql = "SELECT * FROM users WHERE usersId = ".$_SESSION["userid"]. "";

 $result = $conn->query($sql);

$row = $result->fetch_assoc();



 
?>


    <div class="container">
        <div class="profile-header">
            <div class="profile-image">
                <img src="<?php echo $row['profileImage'] ?>" width="200" height="200" alt="Profile Image">
                <form class ="bestand" action="profile_update.php" method="POST" enctype="multipart/form-data">
                    <input class="button-p" type="file" name="profileImage" id="profileImage">
            </div>
            <div class="profile-username">
                <h1><?php  echo "Welkom" ."   ". $row['usersName'] ?></h1>
            </div>
        </div>
        <div class="profile-bio">
            <label for="bio">
                <h2>Biography:<h2>
            </label>
          
            <textarea name="bio" id="bio"><?php echo $row['bio'] ?></textarea>
            <div>
            <input class="button-p" type="submit" value="Update Profile">
</div>

        </div>
    </div>
</body>