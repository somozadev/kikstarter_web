<?php ?>

<div class="container-donate">
    <form method="post" action="php/donate.inc.php" class="form" id="donate">
        <input type="text" class="donate-amount" name="donate_amount_value" autofocus required placeholder="5$">

        <?php if (isset($_SESSION["username"])) {
            echo "<button class='donate-button' type='submit' name='submit'>Donate!</button>";
        } 
        else{
            echo "<h4> Para donar <a href='login.php'>inicie sesión</a> </h4>";
        }
        
        
        ?>
    </form>
</div>