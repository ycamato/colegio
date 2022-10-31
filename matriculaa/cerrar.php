<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
$aux=0;
session_start();
session_destroy();//cierra la sesión
echo "<p align=center> Ha cerrado la sesión, ingrese su usuario y contraseña de nuevo ";


require("../index.php");

?>
</body>
</html>