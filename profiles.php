<?php 
include 'upload.php';

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
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
        <?php foreach($users as $user); ?>

       
        <div class="profile-header">
            <div class="profile-image">
            <img src="images/<?php echo $user['profile_image']; ?>" width="160px" height="160px"/>                   
            <form action="update_bio.php" method="POST">
                    <?php echo $user['bio']; ?>
                
            </form>
            </div endforeach;>
        </div>
    </div>
</body>

</html>