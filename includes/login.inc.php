<?php
if (isset($_POST["submit"])) {


    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $email = $_POST["usersEmail"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../Inloggen.php?error=emptyinput");
        exit();
    }


    loginUser($conn, $username, $pwd);
} else {
    header("location: ../Inloggen.php");
    exit();
}





?><?php
if (isset($_POST["submit"])){


    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
   

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


if (emptyInputLogin($username, $pwd) !== false){
    header("location: ../Inloggen.php?error=emptyinput");
    exit();
}


loginUser($conn, $username, $pwd);
}
else{
   header("location: ../Inloggen.php"); 
   exit();
}





?>