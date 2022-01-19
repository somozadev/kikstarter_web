<?php include_once('header.php') ?>

<div class="login_register_body">
    <div class="container-centerer">
        <div class="container-form">
            <form method="post" action="php/login.inc.php" class="form" id="login">
                <h1 class="form__title"> Iniciar sesión </h1>
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
                        echo "<p class = 'form__input-error-message'> Rellena todos los formularios</p>";
                    else if ($_GET["error"] == "wrongLogin")
                        echo "<p class = 'form__input-error-message'> Información de inicio de sesión errónea </p>";
                    else if ($_GET["error"] == "none")
                        echo "<p class = 'form__message--success'> Loggeado!</p>";
                }
                ?>


<!-- 
                <p class="form__text">
                    <a href="#" class="form__link"> Recuperar contraseña</a>
                </p> -->
                <p class="form__text">
                    <a href="register.php" id="linkRegister" class="form__link"> ¿No tienes una cuenta? Regístrate aquí</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php include_once('footer.php') ?>