<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>POCHOKIKSTARTER</title>
    <!-- Para que se vea bonito el footer
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main_page.css">
    <link rel="stylesheet" type="text/css" href="css/circle_bar.css">
    <script src="js/comportamiento.js"></script>
</head>

<body>
    <!-- background="images/fondo.jpg" -->
    <header>
        <h1 id="title">POCHOKIKSTARTER</h1>

        <input type="image" src="images/avatar_usuario.png" OnClick="ShowLoginWindow()" alt="Usuario" name="login_button" width="40" />
        <script src="js/login_button.js">
        </script>
        <!-- <img src="images/avatar_usuario.png" alt="Usuario" title="Perfil de usuario"> -->
    </header>
    <ul>
        <?php
            if(isset($_SESSION["username"])){
                
                echo "<li> Hello " .$_SESSION["username"] ."</li>";
                echo "<li> <a href='profile.php'>mi perfil</a> </li>";
                echo "<li> <a href='php/logout.inc.php'>Salir</a> </li>";
            }else{
                
                echo "<li> <a href='login.php'>login</a> </li>";
                echo "<li> <a href='register.php'>register</a> </li>";
            }
        ?>
</ul>
    <nav>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
    </nav>

