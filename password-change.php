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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <?php
    include 'header.php';
    ?>
    <?php
    if (isset($_SESSION['status'])) {
        ?>
        <div class="succes-field">
            <p>
                <?php echo $_SESSION['status']; ?>
            </p>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Change your password</h2>
            <form action="password-reset.php" method="post">
                <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])) {
                    echo $_GET['token'];
                } ?>">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></ion-icon></span>
                    <input class="kleur" type="text" value="<?php if (isset($_GET['email'])) {
                        echo $_GET['email'];
                    } ?>" name="uid" required>
                    <label>Username/E-mail</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></ion-icon></span>
                    <input class="kleur" type="password" name="new_password" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></ion-icon></span>
                    <input class="kleur" type="password" name="confirm_password" required>
                    <label>Confirm password</label>
                </div>
                <button type="submit" name="password_update" class="login-button">Change password
                </button>
            </form>
        </div>
        <!-- <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>fill in all fields! </p";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p> Incorrect info</p>";
            }
        }
        ?> -->
</body>

</html>