<?php ?>

<div class="container-donate">
    <form method="post" action="php/donate.inc.php" class="form" id="donate">

        <?php if (isset($_SESSION["username"])) {
            echo "<form method='post' action='php/donate.inc.php' class='form' id='donate'>
                    <input type='number' min='1' class='donate-amount' name='donate_amount_value' required placeholder='5$'>
                    <button class='donate-button' type='submit' name='donate'>Donate!</button>
                </form>";
        } else {
            echo "<h4> Para donar <a href='login.php'>inicie sesión</a> </h4>";
        }


        ?>
    </form>
</div>