<?php
	session_start();
	$_SESSION["iduser"] = 		$registro['id_user'];
	$_SESSION["usuario"] =   	$nombre;
	$valida=                	$registro['rol_user'];
	$idu=                    	$registro['id_user'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/funcionario.css">
	<title>Funcionario</title>
</head>
<body>
	<header >
		<div id="subheader">
			<div id="logotipo">
				<img src="../imag/Guillermo.png" alt="Institución educativa">	
			</div>
			<nav>
				<ul>
					<li>Bienvenido</li><br>
					<li><?php echo $registro['nom_user'];?></li><br>
					<li><?php echo $registro['ap_user'];?></li><br>

				
				    <li><?php include ("../fecha.php"); echo fechas();?></li>

					<li><button class="button"><a href="../Administrador/cerrar.php">Salir</a></button></li>
				</ul>
				
			</nav>
		</div>
	</header>

	<div class="form">
		<form   action="../matriculaa/matricula.php">
			<table  class="table" align="center">
	
	
			<tr>
				<td>
					<h4 align="center">
						Bienvenido <?php echo $nombre;?>
					</h4>
				</td>
			</tr>
	
	
			<td>
				<a href="../matriculaa/matricula.php?iduser=<?php echo $idu?> & nombaux=<?php echo $nombre?>" target="_blank">
					<input class="btn" type="button" name="fact" value="Matricular">
				</a><br><br>
				<a href="../funcionario/matricula.php/matricular.php" target=_blank><input class="boton" type="button" name="iusu" value="Panel de matricula"></a></td>
			</td>
	<?php
	//target="_blank"
	?>
	</div>
</table>
</form>
</body>
</html>