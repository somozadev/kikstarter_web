<?php session_start();

if (isset($_POST["donate"])) {

    $donated_amount = $_POST["donate_amount_value"];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if (EmptyDonation($donated_amount) !== false) {
        header("location: ../cars.php?donation=EmptyDonation");
        exit();
    }
    MakeDonation($conn, $donated_amount, $_SESSION['donated_proyect_to'], GetUserId($conn, $_SESSION['username']));
} else {
    header("location: ../".$_SESSION['current_proyect_group']);
    exit();
}
