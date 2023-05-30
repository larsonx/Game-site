<?php

if (isset($_POST["submitregister"])) {
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["uid"];
$pwd = $_POST["pwd"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (emptyInputRegister($name, $email, $username, $pwd) !== false){
    header("location: ../Inloggen.php?error=emptyinput");
exit();
}
if (invalidUid($username) !== false){
    header("location: ../Inloggen.php?error=invaliduid");
exit();
}
if (invalidEmail($email) !== false){
    header("location: ../Inloggen.php?error=invalidemail;");
exit();
}
if (uidExists($conn, $username, $email) !== false){
    header("location: ../Inloggen.php?error=usernametaken;");
exit();
}

createUser($conn, $name, $email, $username, $pwd);
} 
else {
    header("location: ../Inloggen.php");
    exit();
}



