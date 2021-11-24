<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Bienvenido</title>
</head>
<body>
<?php
if(isset($_POST['uname'])){
	$_SESSION['uname'] = $_POST['uname'];
	echo "Bienvenido! Has iniciado sesion: ".$_POST['uname'];
}else{
	if(isset($_SESSION['uname'])){
		echo "Has iniciado Sesion: ".$_SESSION['uname'];
	}else{
		echo "Acceso Restringido";
	}
}
?>
<br /><a href="login.php">INICIO</a>
</body>
</html>