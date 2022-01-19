<link rel="stylesheet" href="css/progress_bar.css">
<?php

if (isset($_SESSION["donated_proyect_to"]))
    unset($_SESSION['donated_proyect_to']);
$_SESSION['donated_proyect_to'] = basename($_SERVER["REQUEST_URI"], ".php");
require_once('php/dbh.inc.php');
require_once('php/functions.inc.php');
$current = GetProyectCurrentFunding($conn, $_SESSION['donated_proyect_to']);
$goal = GetProyectGoal($conn, $_SESSION['donated_proyect_to']);

$ratio = number_format((float)(($current / $goal) * 100), 1, '.', '');


echo
'<div class="progress-container">
<div class="goal-text"> ' . $goal . '€</div>

    <div class="progress">
        <div class="progress-done" style="height: 100%; display: flex; align-items: center; justify-content: center;
                    width:' . ($ratio) . '%; opacity: 1; border-radius: 40px; box-shadow: 0 3px 3px -5px #ffc861, 0 2px 5px #8ae226; 
                    background: linear-gradient(to right, #ffc861 0%, #8ae226 100%); transition: 1s ease 0.3s;">
                    ' .
    $ratio
    . '%
        </div>
    </div>
</div>';
?>