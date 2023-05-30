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
  <div class="wrapper">
    <div class="form-box login">
      <h2>Login</h2>
      <form action="includes/login.inc.php" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail-outline"></ion-icon></ion-icon></span>
          <input class="kleur" type="email" name="email" required>
          <label>Username/E-mail</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></ion-icon></span>
          <input class="kleur" type="password" name="pwd" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">
            Remember me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" name="submit" class="login-button">Login
        </button>
        <div class="login-register">
          <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
        </div>
      </form>
    </div>
    
   
    <div class="form-box register">
      <h2>Registration</h2>
      <form action="includes/register.inc.php" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
          <input class="kleur" type="text" name="name" required>
          <label>Naam</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></ion-icon></span>
          <input class="kleur" type="text" name="uid" required>
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail-outline"></ion-icon></ion-icon></span>
          <input class="kleur" type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></ion-icon></span>
          <input class="kleur" type="password" name="pwd" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">
            I agree to the terms & conditions</label>
        </div>
        <button type="submit" name="submit" class="login-button">Register
        </button>
        <div class="login-register">
          <p>Already have an account? <a href="#" class="login-link">Login</a></p>
        </div>
        <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>fill in all fields! </p";
      } else if ($_GET["error"] == "invaliduid") {
        echo "<p> Choose a proper username</p>";
      } else if ($_GET["error"] == "invalidemail") {
        echo "<p> Choose a proper email!</p>";
      } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p> Passwords don't match</p>";
      } else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already in use.</p>";
      } else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
      }
    }
    ?>
      </form>
    </div>
    
  </div>
  


</body>

</html>