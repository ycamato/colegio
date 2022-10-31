<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ver Matricula</title>
	<link rel="stylesheet" href="../css/ver.css">
</head>
<body>
	<form method="get" class="form">
	<table align="center" border="1">
		
	<tr><td><table align="center">
		<tr>
			<td colspan="3"><div style='text-align:center'><label style="color:#FF0000"><b> INSTITUCION EDUCATIVA LOS ALPES</b></div></td></tr>
	
	        <td colspan="3"><div style='text-align:center'><label style="color:#FF0000" ><b>Formando el futuro del mañana</b></label></td></tr>
	        <?php
	        require("../connection/connection.php");
	        //consuta el último número de matricula generado
	        $sql = "SELECT MAX(id_matricula) as last_id FROM matricula";
            $resultado=$base_de_datos->prepare($sql);
    		$resultado->execute(array());
    		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
    		$numatricula=$registro['last_id'];
    		//consulta los datos  de la última matricula generada
    		$sql="SELECT  * from matricula where id_matricula=:nm";
        	$resultado=$base_de_datos->prepare($sql);
        	$resultado->execute(array(":nm"=>$numatricula));
	   		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
	   		$idestudiante=		$registro['id_est'];
	   		$date=				$registro['fecha'];
	   		$idu=				$registro['id_user'];
	   		//consultar datos del estudiante que corresponde a la última matricula generada
	   		$sql="SELECT * from estudiantes where id_est=:id";
	   		$resultado=$base_de_datos->prepare($sql);
	   		$resultado->execute(array(":id"=>$idestudiante));
	   		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
	   		
	        ?>
	
		<tr>
			<td colspan="2"><td><b>Matricula N° <?php echo $numatricula ?></b></td></td></tr>
			<td colspan="2"><td><b>Fecha <?php echo $date ?></b></td></td></tr>
			<tr><td colspan="2"><h3>DATOS DEL ESTUDIANTE</h3></td></tr>
			<tr><td colspan="2">Identificación: <?php echo $registro['id_est']?></td></tr>
			<tr><td>Nombre: <?php echo $registro['nom_est']?></td><td>Apellido: <?php echo $registro['apel_est']?></td></tr>
			

			<?php 
			$sql="SELECT  * from usuario where id_user=:ie";
			$resultadou=$base_de_datos->prepare($sql);
        	$resultadou->execute(array(":ie"=>$idu));
	   		$registrou=$resultadou->fetch(PDO::FETCH_ASSOC);
			
	   		$auxiliar=$registrou['nom_user'];
	   		?>
	   		<tr><td>Funcionario: <?php echo $auxiliar ?></td></tr>
			
		    </table>
			<h4 align="center">DETALLE DE MATERIAS</h4>
			
			<table align="center" border="" bordercolor="#9b9b9b">
			<th>Código</th>
			<th>Nombre</th>
			<th>Horas</th>
			<tr>
			<?php
			//consulta a la tabla detallefactura
			$registrosdet=$base_de_datos->query("SELECT * from detalle where id_matricula=$numatricula ")->fetchALL(PDO::FETCH_OBJ);
			$cuenta=0;
			foreach ($registrosdet as $materia) :?> 
				<td><?php echo $materia->n_materias?></td>
				<?php
				$codigom=$materia->n_materias;
			
			
			
			//consulto el nombre de la materia en la tabla materia
			$sql="SELECT nombre, horas  from materias where n_materias=:co";
			$resultado=$base_de_datos->prepare($sql);
			$resultado->execute(array(":co"=>$codigom));
			$registrom=$resultado->fetch(PDO::FETCH_ASSOC);
			
			?>

			<td><?php echo $registrom['nombre'];?></td>
			<td><?php echo $registrom['horas'];?></td>
			<?php
			$cuenta=$cuenta+1
			?>
			</div></td></tr>
			
			<?php
			endforeach;
	
				?>
			<tr><td colspan="4"><div style='text-align:right'>Total materias: <?php echo " ", $cuenta;?></div></div></td></td></tr></table>
			<tr><td align="center">
			<input  type='button' class="imprimir"  onclick='window.print();' value='Imprimir'>
			
			<a href="verpdf.php"><input type="button" class="pdf"  name="pdf"  value="Verpdf"></a>
			<a href="../funcionario/funcionario.php echo $auxiliar?> & nomb=<?php echo $auxiliar?>"><input type="button"  class="nuevo" name="vuelve" value="Nueva Matricula"></a></td></tr>
	
</td>
</tr>
</table>	
</form>
</body>
</html>