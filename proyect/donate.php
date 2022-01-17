<div class="container-donate">
    <form method="post" action="php/donate.inc.php" class="form" id="donate">

        <?php if (isset($_SESSION["username"])) {

            if (isset($_SESSION["donated_proyect_to"]))
                unset($_SESSION['donated_proyect_to']);
            $_SESSION['donated_proyect_to'] = basename($_SERVER["REQUEST_URI"], ".php");

            echo "<form method='post' action='php/donate.inc.php' class='form' id='donate'>
                    <input type='number' min='1' class='donate-amount' name='donate_amount_value' required placeholder='5$'>
                    <button class='donate-button' type='submit' name='donate'>Donate!</button>
                </form>";
            if (isset($_SESSION['donation']) == 'Success') {
                echo "<p> donacion correcta para " . $_SESSION['donated_proyect_to'] . "</p>";
                unset($_SESSION['donation']);
            }
        } else {
            echo "<h4> Para donar <a href='login.php'>inicie sesión</a> </h4>";
        }


        ?>
    </form>
</div>