<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
  <title>GameHub</title>
</head>

<body>
  <?php
  include 'header.php';
  require_once 'includes/dbh.inc.php';

  // Database connection setup
  // $serverName = "localhost";
  // $dBUsername = "root";
  // $dBPassword = "";
  // $dBName = "test";
  
  // try {
  //   $pdo = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUsername, $dBPassword);
  //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // } catch (PDOException $e) {
  //   die("Database connection failed: " . $e->getMessage());
  // }
  
  // // Check if the user is logged in
  // if (isset($_SESSION['userId'])) {
  //   $userId = $_SESSION['userId'];
  
  //   // Retrieve user data from the database
  //   $query = "SELECT usersName FROM users WHERE usersId='$userId'";
  //   $stmt = $pdo->prepare($query);
  //   $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
  //   $stmt->execute();
  //   $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
  //   // Check if a user with the provided ID exists
  //   if ($user) {
  //     $welcomeMessage = "Welcome, " . $user['usersName'] . "!"; // Customize the welcome message as per your needs
  //   } else {
  //     $welcomeMessage = "Welcome!";
  //   }
  // } else {
  //   $welcomeMessage = "Welcome!";
  // }
  
  // // Display the welcome message
  // echo $welcomeMessage;
  // ?>

</body>

</html>