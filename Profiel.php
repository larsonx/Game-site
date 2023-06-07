<?php
include_once 'includes/dbh.inc.php';
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

    if (isset($_SESSION['useruid'])){
        if ($_SESSION['useruid'] == 1){
            echo "You are logged in as user #1";
        }
        echo '<div class="container"><form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="submit">upload</button>
                </form></div>';

    }else{
        echo "You are not logged in";
        echo "<form>

        </form>";
    }
    ?>
    


</body>

</html>