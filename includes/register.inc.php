<?php

if (isset($_POST["submitregister"])) {
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["uid"];
$pwd = $_POST["pwd"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (emptynputRegister($name, $email, $username, $pwd) !== false){
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
if (uidExists($conn, $username) !== false){
    header("location: ../Inloggen.php?error=usernametaken;");
exit();
}


else{
    header("location: ../Inloggen.php");
}
}