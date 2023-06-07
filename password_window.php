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
            <h2>Forgot your password?</h2>
            <h3>That's okey, it happens! Enter your Email below to reset your password.</h3>
            <form action="password-reset.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></ion-icon></span>
                    <input class="kleur" type="email" name="uid" required>
                    <label>Username/E-mail</label>
                </div>
                <button type="submit" name="password_reset_link" class="login-button">Reset password
                </button>
                <div class="login-register">
                    <p>Don't have an account? <a href="inloggen.php" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>fill in all fields! </p";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p> Incorrect info</p>";
            }
        }
        ?>
    </div>
    </div>
</body>

</html>