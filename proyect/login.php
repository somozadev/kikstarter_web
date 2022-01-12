<!DOCTYPE html>
<?php include_once('header.php') ?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container-centerer">
        <div class="container">
            <form method="post" action="php/login.inc.php"  class="form" id="login">
                <h1 class="form__title"> Login </h1>
                <!-- <div class="form__message form__message--error"></div> -->
                <div class="form__input-group">
                    <input type="text" class="form__input" name="login_username" autofocus autocomplete="current-password" required placeholder="Username/Email">
                    <!-- <div class="form__input-error-message"> </div> -->
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="login_password" required autocomplete="current-password" placeholder="Password">
                    <!-- <div class="form__input-error-message"></div> -->
                </div>
                <button class="form__button" type="submit" name="submit">Login</button>

                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyInput")
                        echo "<p> Rellena todos los formularios</p>";
                    else if ($_GET["error"] == "wrongLogin")
                        echo "<p> Información de inicio de sesión errónea </p>";
                    else if ($_GET["error"] == "none")
                        echo "<p> Loggeado!</p>";
                }
                ?>



                <p class="form__text">
                    <a href="#" class="form__link"> Recuperar contraseña</a>
                </p>
                <p class="form__text">
                    <a href="register.php" id="linkRegister" class="form__link"> ¿No tienes una cuenta? Regístrate aquí</a>
                </p>
            </form>
        </div>
    </div>
    <script src="./js/login.js"></script>
</body>

<!-- 
<?php
if (!isset($username))
    $username = "";
$password = ""; ?> -->