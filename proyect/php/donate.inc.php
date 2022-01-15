<?php

if (isset($_POST["submit"])) {

    $donated_amount = $_POST["donate_amount_value"];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if (EmptyDonation($donated_amount) !== false) {
        header("location: ../coches1.php?error=emptyDonation");
        exit();
    }

    // if (EmptyInputLogin($l_username, $l_password) !== false) {
    // header("location: ../login.php?error=emptyInput");
    // exit();
    // }
    // SendDonation($conn,$username,$proyect);
} else {
    header("location: ../coches1.php");
    exit();
}
