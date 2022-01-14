<!DOCTYPE html>
<?php include_once('header.php') ?>

<div class="login_register_body">
    <div class="container-centerer">
        <div class="container-form">
            <form method="post" action="php/register.inc.php" class="form" id="register">
                <h1 class="form__title"> Register </h1>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                    <input type="text" id="registerUsername" class="form__input" required autocomplete="username" name="register_username" autofocus placeholder="Username">
                    <!-- <div class="form__input-error-message"> </div> -->
                </div>
                <div class="form__input-group">
                    <input type="text" id="registerEmail" class="form__input" autofocus required autocomplete="username" name="register_email" placeholder="Email">
                    <!-- <div class="form__input-error-message"> </div> -->
                </div>
                <div class="form__input-group">
                    <input type="password" id="registerPassword" class="form__input" required autocomplete="new-password" name="register_password" autofocus placeholder="Password">
                    <!-- <div class="form__input-error-message"></div> -->
                </div>
                <div class="form__input-group">
                    <input type="password" id="confirmRegisterPassword" class="form__input" autofocus autocomplete="new-password" name="register_new-password" required placeholder="Confirm password">
                    <!-- <div class="form__input-error-message"></div> -->
                </div>
                <button class="form__button" name="submit" type="submit">Register</button>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyInput")
                        echo "<p class = 'form__input-error-message'> Rellena todos los formularios</p>";
                    else if ($_GET["error"] == "invalidUsername")
                        echo "<p class = 'form__input-error-message'> Nombre de usuario inválido </p>";
                    else if ($_GET["error"] == "invalidEmail")
                        echo "<p class = 'form__input-error-message'> Dirección de correo invalido </p>";
                    else if ($_GET["error"] == "passwordTooShort")
                        echo "<p class = 'form__input-error-message'> La contraseña debe tener al menos 6 carácteres </p>";
                    else if ($_GET["error"] == "passwordsDontMatch")
                        echo "<p class = 'form__input-error-message'> Las contraseñas deben ser iguales</p>";
                    else if ($_GET["error"] == "stmtFailure")
                        echo "<p class = 'form__input-error-message'> ¡Algo ha ido mal! prueba de nuevo</p>";
                    else if ($_GET["error"] == "usernameTaken")
                        echo "<p class = 'form__input-error-message'> Este usuario ya está registrado </p>";
                    else if ($_GET["error"] == "none")
                        echo "<p class = 'form__message--success'> Registrado!</p>";
                }
                ?>


                <p class="form__text">
                    <a href="login.php" id="linkLogin" class="form__link"> ¿Ya tienes cuenta? Iniciar sesión</a>
                </p>

            </form>
        </div>
    </div>
</div>

<?php include_once('footer.php') ?>