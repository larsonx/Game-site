<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gamehub";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed:" . mysqli_connect_error());
}
session_start();
// bio update
$biography = $_POST['bio'];
$userId = $_SESSION["userid"];

$sql = "UPDATE users SET bio='$biography' WHERE usersId='$userId'";


if (mysqli_query($conn, $sql)) {
    header("location: Profiel.php");
} else {
  echo "Error updating biography: " . mysqli_error($conn);
}

// Upload handler
if ($_FILES["profileImage"]["size"] > 0) {
  $targetDirectory = "uploads/"; // Directory to store the uploaded images
  $targetFile = $targetDirectory . basename($_FILES["profileImage"]["name"]);
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // bestand formaat
  $allowedFormats = array("jpg", "jpeg", "png", "gif");
  if (!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
  } else {
    // Try to upload the file
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
      // Update the profile image path in the database
      $profileImage = $targetFile;
      $sql = "UPDATE users SET profileImage='$profileImage' WHERE usersId='$userId'";
      if (mysqli_query($conn, $sql)) {
        header("location: Profiel.php");
      } else {
        echo "Error updating profile picture: " . mysqli_error($conn);
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}


mysqli_close($conn);
?>
