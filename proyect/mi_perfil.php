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
        <div class="profile-image" >
            <div class="profile-image-img">
                <img src="images/avatar_usuario.png">
            </div>
            <div class="profile-image-info">
                <span class="profile-image-info-name">' . $_SESSION['username'] . '</span>
                <span class="profile-image-info-email">' . $_SESSION['email'] . '</span>
            </div>
        </div>
        <div>
            <hr>
        </div>
        <div class="profile-transactions" style="display: flex; flex-flow:column;">
        <h2 style="text-align: center; font-weight: 400; color: whitesmoke;">Donaciones</h2>
        <ul style="display: flex; flex-flow:column; background-color: #cdd2fd; border-radius:10px; list-style:none; 
        margin-left: 0; padding-left: 2em;padding-right: 1em;padding-bottom: 1em;padding-top: 0.2em; text-indent: -1em; text-aling:center;">';

    require_once('php/dbh.inc.php');
    require_once('php/functions.inc.php');
    GetUserDonations($conn, $_SESSION['username'], false);
    if (!GetUserDonations($conn, $_SESSION['username'], true))
        echo "<p style='text-align: center;margin:auto;font-weight: 200;font-size: 1.2rem; color: rgb(160, 160, 160);; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;'>Sin donaciones realizadas</p>";


    echo " </ul>
        </div>
    </div>
</div>";
}
?>

<?php include_once('footer.php') ?>