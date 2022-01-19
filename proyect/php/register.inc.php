<?php

if (isset($_POST["submit"])) {
    $r_username = $_POST["register_username"];
    $r_email = $_POST["register_email"];
    $r_password = $_POST["register_password"];
    $r_new_password = $_POST["register_new-password"];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if (EmptyInputRegister($r_username, $r_email, $r_password, $r_new_password) !== false) {
        header("location: ../register.php?error=emptyInput");
        exit();
    }
    if (InvalidUsername($r_username) !== false) {
        header("location: ../register.php?error=invalidUsername");
        exit();
    }
    if (InvalidEmail($r_email) !== false) {
        header("location: ../register.php?error=invalidEmail");
        exit();
    }
   if (PasswordTooShort($r_password) !== false) {
       header("location: ../register.php?error=passwordTooShort");
       exit();
   }
    if (PasswordMatch($r_password,$r_new_password) !== false) {
        header("location: ../register.php?error=passwordsDontMatch");
        exit();
    }
    if (UserExists($conn, $r_username, $r_email) !== false) {
        header("location: ../register.php?error=usernameTaken");
        exit();
    }


    CreateUser($conn, $r_username, $r_email, $r_password);
    LoginUser($conn,$r_username,$r_password);


    
} else {
    header("location: ../register.php");
    exit();
}
