<?php


	
	session_start();
	$_SESSION["rol_user"]=  $persona;
	$valida=               $persona['rol_user'];
	$id=                   $persona['id_user'];
	
?>
<!DOCTYPE html>
<html>
<head>
	

	<meta charset="utf-8">
	<h3 align="center">ADMINISTRADOR</h3>
	<title></title>
	<link rel="stylesheet" href="../css/admi.css">
	<style type="text/css">
		#contorno{
			border: 3px solid orange;
			width: 480px;
			padding-top:  20px;
			font-size: 1.2em;
		}
	table{
		margin-top: 20px;
	}
	
	</style>
</head>
<center>
<body>

	<form method="post" action="">
	
	<div id="contorno">
		<br>
	<table align="center" bgcolor="orange">
		<td></td><td align="right"><?php include ("fecha.php"); echo fechas();?></td></tr></table>
	    <h4  align="center">Usuario <?php echo $nombre;?><td><a href="cerrar.php">|Cerrar Sesión|</a></td></h4>
	</table>
	</div>
<?php 
include("../connection/connection.php");
?>
<table border="1" bordercolor="orange">
	<tr><th>MODULOS</th><th>ACCION</th></tr>
	<tr><td>Usuarios</td><td><a href="usuarios/crud.php?id=<?php echo $id;?> & nomb=<?php echo $nombre?>" target=_blank><input type="button" name="iusu" value="Ingresar"></a></td></tr>
	<tr><td>Materias</td><td><input type="submit" name="imate" value="Ingresar"></td>
	<tr><td>Estudiantes</td><td><input type="submit" name="iest" value="Ingresar"></td>
	<tr><td>Matriculas</td><td><input type="submit" name="imatri" value="Ingresar"></td>
	
</table>




</form>
</body>

</center>
</html>