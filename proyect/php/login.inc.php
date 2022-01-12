<?php

if (isset($_POST["submit"])) {

    $l_username = $_POST["login_username"];
    $l_password = $_POST["login_password"];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if (EmptyInputLogin($l_username, $l_password) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }
    LoginUser($conn,$l_username,$l_password);
}else{
    header("location: ../login.php");
    exit();
}
