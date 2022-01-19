<div class="container-donate">
    <form method="post" action="php/donate.inc.php" class="form" id="donate">

        <?php if (isset($_SESSION["username"])) {

            if (isset($_SESSION["donated_proyect_to"]))
                unset($_SESSION['donated_proyect_to']);
            $_SESSION['donated_proyect_to'] = basename($_SERVER["REQUEST_URI"], ".php");


           echo "<link rel='stylesheet' href='css/donation.css'>";

            echo "<div class='donation_form' >
                <form method='post' action='php/donate.inc.php' class='form' id='donate'>
                    <div class='donation_item'> <input type='number' min='1' class='donate-amount' name='donate_amount_value' required placeholder='5€'></div>
                    <div class='donation_item'><button class='donate-button' type='submit' name='donate'>Donate</button></div>
                </form>
            </div>";
            if (isset($_SESSION['donation']) == 'Success') {
                include_once('modal_donation.php');
                unset($_SESSION['donation']);
            }
        } else {
            echo "<h3 style=' display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;'> Para donar <a href='login.php'>inicie sesión</a></h3>";
        }
        ?>
    </form>
</div>