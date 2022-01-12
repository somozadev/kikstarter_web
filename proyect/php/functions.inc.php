<?php
function EmptyInputRegister($r_username, $r_email, $r_password, $r_new_password){
    if (empty($r_username) || empty($r_email) || empty($r_password) || empty($r_new_password))
        $result = true;
    else
        $result = false;

    return $result;
}
function EmptyInputLogin($l_username, $l_password){
    if (empty($l_username) || empty($l_password))
        $result = true;
    else
        $result = false;

    return $result;
}
function InvalidUsername($r_username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $r_username))
        $result = true;
    else {
        $result = false;
    }
    return $result;
}
function InvalidEmail($r_email)
{
    if (!filter_var($r_email, FILTER_VALIDATE_EMAIL))
        $result = true;

    else
        $result = false;

    return $result;
}
function PasswordMatch($r_password, $r_new_password)
{
    if ($r_password != $r_new_password)
        $result = true;

    else
        $result = false;

    return $result;
}
function PasswordTooShort($r_password)
{
    if (strlen($r_password) < 6)
        $result = true;
    else
        $result = false;
    return $result;
}
function UserExists($conn, $r_username, $r_email){

    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtFailure");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $r_username, $r_email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function CreateUser($conn, $r_username, $r_email, $r_password)
{

    $sql = "INSERT INTO users (usersUsername,usersEmail,usersPwd) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtFailure");
        exit();
    }
    $hashedPasword = password_hash($r_password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $r_username, $r_email, $hashedPasword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
}
function LoginUser($conn, $l_username, $l_password)
{
    $username_exists = UserExists($conn,$l_username,$l_username);
    if($username_exists == false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }
    
    $hashedPasword = $username_exists["usersPwd"];
    $checkPassword = password_verify($l_password,$hashedPasword);
    if($checkPassword == false){
        header("location: ../login.php?error=incorrectPassword");
        exit();
    }
    else if($checkPassword == true){
        session_start();
        $_SESSION["username"] = $username_exists["usersUsername"];
        $_SESSION["email"] = $username_exists["usersEmail"];
        header("location: ../index.php");
        exit();
    }

}
