<?php
// Assuming you have already established a connection to your MySQL database using mysqli or PDO
// and have set the appropriate credentials and database name

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "usersgamehub";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection failed:" . mysqli_connect_error());
}

// Update the biography
$biography = $_POST['bio'];
$userId = 1; // Assuming you have the user's ID available (e.g., fetched from session or database)

$sql = "UPDATE users SET bio='$biography' WHERE usersId='$userId'";
if (mysqli_query($conn, $sql)) {
    header("location: Profiel.php");
} else {
  echo "Error updating biography: " . mysqli_error($conn);
}

// Handle profile image upload
if ($_FILES["profileImage"]["size"] > 0) {
  $targetDirectory = "uploads/"; // Directory to store the uploaded images
  $targetFile = $targetDirectory . basename($_FILES["profileImage"]["name"]);
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Allow only specific file formats (you can modify this if needed)
  $allowedFormats = array("jpg", "jpeg", "png", "gif");
  if (!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
  } else {
    // Try to upload the file
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
      // Update the profile image path in the database
      $profileImage = $targetFile;
      $sql = "UPDATE users SET profile_image='$profileImage' WHERE usersId='$userId'";
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

// Close the database connection
mysqli_close($conn);
?>
