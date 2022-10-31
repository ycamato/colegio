<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DETALLES  DE MATRICULA</title>
	<link rel="stylesheet" href="../css/detalle.css">
</head>
<body>

<form  action="<?php echo $_SERVER['PHP_SELF'];?>"   class="detalle" method="get" autocomplete="off">

	<?php
	require("../connection/connection.php");
	if(!isset($_GET["buscarm"]) and !isset($_GET['agr'])){
	$idestudiante=	$_GET['ide'];
	$nombre=		$_GET['nomb'];
	$apellido=		$_GET['ape'];
	$idu=			$_GET['iduser'];
	$auxiliar=		$_GET['nombaux'];
	}else{
	$idestudiante=		$_GET['ide'];
	$nombre=			$_GET['nomb'];
	$apellido=			$_GET['ape'];
	$idu=				$_GET['iduser'];
	$auxiliar=			$_GET['nombre'];	
	}
	echo $idu;
	
	?>

	<table align="center">
		<tr><td><td><h4 >DATOS DEL ESTUDIANTE</h4></td></td></tr>
		<tr>
			<td>Identificación
				<input class="iden" type="text" name="ide" readonly value="<?php echo $idestudiante?>">
			</td>
		</tr>
		<tr>
			<td>Nombre
				<input class="nom" type="text" name="nomb" readonly value="<?php echo $nombre?>">
			</td>
		</tr>
		<tr>
			<td>Apellido
				<input class="ape" type="text" name="ape" value="<?php echo $apellido?>">
			</td>
		</tr>

		<input type="hidden" name="iduser" value="<?php echo $idu?>">

		<tr>
			<td>Funcionario
				<input class="fun" type="text" name="nombre"value="<?php echo $auxiliar?>">
			</td>
			
		</tr>
	</table>
	

    <table>
	<th>Buscar</th>
	<th>Nombre</th>
	<th>Horas</th>
	<th colspan="2">Acción</th>
	
	<tr>
		<td>Código
			<input class="cod" type="text" style="width: 35px; height: 20px" name="codi"><input type="submit"  class="buscar" name="buscarm" value="Busca"><input type="hidden" name="codpro">
		</td>
		
		<?php
	   if(isset($_GET['buscarm'])){
		$busca=		$_GET['codi'];
        $sql="SELECT  * from materias  where n_materias=:co";
        $resultado=$base_de_datos->prepare($sql);
        $resultado->execute(array(":co"=>$busca));
	   if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

		?>
		<td>
			<input type="text"  name="mate" value=" <?php echo $registro['nombre'];?>">
		</td>
		<td>
			<input type="text" name="hora" style="width: 50px; height: 20px" value=" <?php echo $registro['horas'];?>">
		</td>
		<td>
			<input type="submit" name="agr" value="Agregar">
		</td>
	</tr></table>
		<input type="hidden" name="codm" value="<?php echo $registro['n_materias'];?>">
	<?php
	}
    }
    if(isset($_GET['agr'])){
    	
    	
    	$codigo=		$_GET['codm'];
    	$nombrem=		$_GET['mate'];
		$hm=			$_GET['hora'];
		
		
        $sql="INSERT INTO detalletemp (n_materias) values (:co)";
		$resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":co"=>$codigo));
		
		
	}
	$registros=$base_de_datos->query("SELECT * from detalletemp")->fetchALL(PDO::FETCH_OBJ);
			?>
			<table align="center" border="" bordercolor="orange">
			<th>Código</th>
			<th>Nombre</th>
			<th>Horas</th>
			<tr>
			<?php
			$contador=0;
	        foreach ($registros as $materias) :?> 
			
				<td><?php echo $materias->n_materias?></td>
				<?php $id_ma=$materias->n_materias;
				$sql="SELECT nombre, horas from materias WHERE n_materias = :co";
				$resultado=$base_de_datos->prepare($sql);
	            $resultado->execute(array(":co"=>$id_ma));
	            $registro1=$resultado->fetch(PDO::FETCH_ASSOC);
	            ?>
	            <td><?php echo $registro1['nombre'];?></td>
				<td><?php echo $registro1['horas'];?></td>
				<?php $contador=$contador+1;?>
				</tr>
				<tr>

	<?php
	endforeach;
	
	?>
	
	</table>
	<table align="center">
	<tr><th colspan="4">Total materias a matricular</th><th></th>

	<td colspan="3"><td><td><td><?php echo $contador;?></td></td></td></td></tr>
	
	<tr><td> <a href="matricular.php?id=<?php echo $idestudiante?> & nomb=<?php echo $nombre?>  & contador=<?php echo $contador?> & iduser=<?php echo $idu?> & nombaux=<?php echo $auxiliar?>"><input align="center" class="matricular" type="button" name="matricular" value="Matricular"></a></td></tr>
	</table>
	
	
	
</form>
</body>
</html>