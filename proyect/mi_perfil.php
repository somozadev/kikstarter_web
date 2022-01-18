<?php include_once('header.php') ?>
<?php if (!isset($_SESSION["username"])) {
    echo "<script>window.setTimeout(function() { window.location = '../proyect/index.php' }, 0);</script>";
} else {
    echo '<link rel="stylesheet" href="css/perfil.css">
<div class="profile-container">
    <div class="parrafo">
        <h1>Perfil</h1>
        <br>
        <br>
    </div>
    <div class="profile-inner-container">
        <div class="profile-image">
            <div class="profile-image-img">
                <img src="images/profile_image.png">
            </div>
            <div class="profile-image-info">
                <span class="profile-image-info-name">'.$_SESSION['username'].'</span>
                <span class="profile-image-info-email">'.$_SESSION['email'].'</span>
            </div>
        </div>
        <div>
            <hr>
        </div>
        <div class="profile-transactions" style="padding-right: 40px;">
            <ul style="display: flex; flex-flow:column; justify-content:space-between;">
                <h2 style="text-align: center; font-weight: 400; color: whitesmoke;">Donaciones</h2>';

    require_once('php/dbh.inc.php');
    require_once('php/functions.inc.php');
    GetUserDonations($conn, $_SESSION['username'],false);
    if (!GetUserDonations($conn, $_SESSION['username'],true))
        echo "<p style='text-align: center; font-weight: 900;font-size: 2.4rem; color: #cdd2fd; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;'> ninguna </p>";


    echo " </ul>
        </div>
    </div>
</div>";
}
?>

<?php include_once('footer.php') ?>