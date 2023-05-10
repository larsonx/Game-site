<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE-edge" />
  <meta name="viewport" content="width=device-width, initial-scale 1.0" />
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
  <title>GameHub</title>
</head>

<body>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="script.js" defer></script>

  <?php
include 'header.php';
  ?>

  <div class="wrapper">
    <div class="form-box login">
      <h2>Login</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail-outline"></ion-icon></ion-icon></span>
          <input class="kleur" type="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></ion-icon></span>
          <input class="kleur" type="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">
            Remember me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="login-button">Login
        </button>
        <div class="login-register">
          <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
        </div>
      </form>
    </div>
    <div class="form-box register">
      <h2>Registration</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></ion-icon></ion-icon></span>
          <input class="kleur" type="text" required>
          <label>Username</label>
        </div>
        <form action="#">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></ion-icon></span>
            <input class="kleur" type="email" required>
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></ion-icon></span>
            <input class="kleur" type="password" required>
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">
              I agree to the terms & conditions</label>
          </div>
          <button type="submit" class="login-button">Register
          </button>
          <div class="login-register">
            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
          </div>
        </form>
    </div>
  </div>

</body>

</html>