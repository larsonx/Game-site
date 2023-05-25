<?php

if (isset($_POST["submitregister"])) {
$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["uid"];
$pwd = $_POST["pwd"];
}
else{
    header("location: ../Inloggen.php");
}