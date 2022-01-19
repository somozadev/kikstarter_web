<?php

#region LOGIN/REGISTER
function EmptyInputRegister($r_username, $r_email, $r_password, $r_new_password)
{
    if (empty($r_username) || empty($r_email) || empty($r_password) || empty($r_new_password))
        $result = true;
    else
        $result = false;

    return $result;
}
function EmptyInputLogin($l_username, $l_password)
{
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
function UserExists($conn, $r_username, $r_email)
{

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
    $username_exists = UserExists($conn, $l_username, $l_username);
    if ($username_exists == false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $hashedPasword = $username_exists["usersPwd"];
    $checkPassword = password_verify($l_password, $hashedPasword);
    if ($checkPassword == false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } else if ($checkPassword == true) {
        session_start();
        $_SESSION["username"] = $username_exists["usersUsername"];
        $_SESSION["email"] = $username_exists["usersEmail"];
        header("location: ../index.php");
        exit();
    }
}

#endregion

#region DONATIONS
function EmptyDonation($donation)
{
    if (empty($donation))
        $result = true;
    else
        $result = false;

    return $result;
}
function GetProyectId($conn, $d_proyect)
{
    $sql_proyectId = "SELECT proyectsId FROM proyects WHERE proyectsName = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql_proyectId))
        exit();
    mysqli_stmt_bind_param($stmt, "s", $d_proyect);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData))
        return $row["proyectsId"];
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function GetUserId($conn, $d_username)
{
    $sql_usernameId = "SELECT usersId FROM users WHERE usersUsername = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql_usernameId))
        exit();
    mysqli_stmt_bind_param($stmt, "s", $d_username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData))
        return $row["usersId"];
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function MakeDonation($conn, $d_amount, $d_proyect_name, $d_username)
{
    $sql = "INSERT INTO donations (donationsAmount,proyectsId,usersId) VALUES (?,?,?);";
    $d_proyect = GetProyectId($conn, $d_proyect_name);
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../" . $d_proyect_name . ".php?donation=Error");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "dii", $d_amount, $d_proyect, $d_username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $_SESSION['donation'] = "Success";
    header("location: ../" . $d_proyect_name . ".php"); //. ".php?donation=Success");
    exit();
}
#endregion
#region DONATIONS
function GetUserDonations($conn, $username, $get_bool)
{

    $sql = "SELECT usersUsername,donationsAmount,proyectsName FROM donations d INNER JOIN proyects p INNER JOIN users u WHERE d.proyectsId=p.proyectsId AND d.usersId = u.usersId AND d.usersId= ? ORDER BY d.donationsId;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    $id = GetUserId($conn, $username);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $resultData =   mysqli_stmt_get_result($stmt);
    $count = 0;
    while ($row = mysqli_fetch_assoc($resultData)) {
        if (!$get_bool)
            echo '<li style=" display: inline-block; padding-top:.5em; text-align:center; "> <b style="color:#52c23f;">' . $row["donationsAmount"] . '€ </b> para ' . str_replace("_", " ", $row["proyectsName"]) . '</li>';
        else
            return true;
    }

    mysqli_free_result($resultData);
    mysqli_stmt_close($stmt);
}

#endregion
#region PROYECTS
function GetProyectGoal($conn, $proyect_name)
{
    $sql = "SELECT proyectsGoal FROM proyects WHERE proyectsName = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $proyect_name);
    mysqli_stmt_execute($stmt);
    $resultData =   mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row['proyectsGoal'];
    } else
        return false;
}

function GetProyectCurrentFunding($conn, $proyect_name)
{
    $sql = "SELECT donationsAmount FROM donations WHERE proyectsId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    
    $id_proyect = GetProyectId($conn, $proyect_name);

    mysqli_stmt_bind_param($stmt, "i", $id_proyect);
    mysqli_stmt_execute($stmt);
    $resultData =   mysqli_stmt_get_result($stmt);
    $funds=0;
    while ($row = mysqli_fetch_assoc($resultData)) {
        $funds+= $row['donationsAmount'];
    }
    return $funds;
}
