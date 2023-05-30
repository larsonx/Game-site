<?php

function emptyInputRegister($name, $email, $username, $pwd){
$result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd)) {
$result = true;
    }
    else{
        $result= false;
    }
}
return $result;

function invalidUid($username){
$result;
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
$result = true;
    }
    else   {
        $result= false;
    }
}
return $result;

function invalidEmail($email)
{
$result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$result = true;
    }
    else   {
        $result= false;
    }
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); 

    
}
