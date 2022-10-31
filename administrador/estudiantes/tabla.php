<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/estudiantes.css">
	<title></title>
</head>
<body>
	<?php
	
	include("../../connection/connection.php");

	
	//--------------paginación-------------
	$registros=3;//indica que se van a ver 3 registro por página
	if(isset($_GET["pagina"])){
		if($_GET["pagina"]==1){
			header("Location:tabla.php");
		}else{
			$pagina=$_GET["pagina"];
		}
	}else{
		$pagina=1;//muestra página en la que estamos cuando se carga por primera vez
	}
	
	$empieza=($pagina-1)*$registros;//registro desde el cual va a empezar a mostrar
	$sql_total="SELECT * FROM estudiantes";//muestra los 3 primeros, primer parametro indica en que posición impieza en este caso posición 0, el segundo parametro cuantos registros quiere mostrar en este caso 3 registros

	$resultado=$base_de_datos->prepare($sql_total);

	$resultado->execute(array());
	$numfilas=$resultado->rowCount();//cuantos registros hay en total
	$totalpagina=ceil($numfilas/$registros);

	$registros=$base_de_datos->query("SELECT * from estudiantes LIMIT $empieza, $registros")->fetchALL(PDO::FETCH_OBJ);
	
	if(isset($_POST['inserta'])){
		$id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $correo=$_POST['correo'];
		$direccion=$_POST['direccion'];
		?>
		<input type="number" name="idd" value="<?php echo $id?>">
		<?php 
		$sql="INSERT INTO estudiantes (id_est,nom_est,apel_est,email,dir_est) values ( :id,:nom,:apel,:email,:dir)";
		$resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array( ":id"=>$id,  ":nom"=>$nombre , ":apel"=>$apellido , ":email"=>$correo, ":dir"=>$direccion));

		header("Location:tabla.php");
	}

	?>
	
<h3 align="center">PANEL DE ESTUDIANTES</h3>
<form action=" " method="post" autocomplete="off">
		<table align="center" border="" bordercolor="orange">
			<tr>
				<th>Documento de identidad</th>
				<th>Nombre del estudiante</th>
                <th>Apellido del estudiante</th>
                <th>Correo</th>
				<th>Dirrecion</th>
				<th colspan="2">Acciones</th>
			</tr>
			<?php
			//por cada objeto que hay dentro del array repite el código
			foreach ($registros as $materia) :?> 
			<tr>
				<td><?php echo $materia->id_est?></td>
				<td><?php echo $materia->nom_est?></td>
                <td><?php echo $materia->apel_est?></td>
                <td><?php echo $materia->email?></td>
				<td><?php echo $materia->dir_est?></td>

				
					
			<td><a href="delete.php?id=<?php echo $materia->id_est?>& nom=<?php echo $materia->nom_est?>& ap=<?php echo $materia->apel_est?> & co=<?php echo $materia->email?> & dir=<?php echo $materia->dir_est?>"><input type="button" name="elimina" id="elimina" value="Eliminar"></a></td>
			<td><a href="editar.php?id=<?php echo $materia->id_est?>& nom=<?php echo $materia->nom_est?>& ap=<?php echo $materia->apel_est?> & co=<?php echo $materia->email?> & dir=<?php echo $materia->dir_est?>"><input type="button" name="edita" class="edita" value="Editar"></a></td></tr>
			

			
			<?php
			endforeach;
		
			?>
			
			<td><input type="number" name="id"></td>
			<td><input type="varchar" name="nombre"></td>
            <td><input type="varchar" name="apellido"></td>
            <td><input type="varchar" name="correo"></td>
			<td><input type="varchar" name="direccion"></td>
			

				<td colspan="5" align="center"><input  type="submit" class="inserta"  name="inserta" value="Insertar" >
				<a href="../../administrador/index.php"><input type="button" class="cerrar" name="admin" value="Cerrar"onmouseup="window.close()"></a></td>
			</tr>
		
			
	</tr>
				
				
	
		</table>
</form>

<table class="contador" border="0" >
	<tr>	
<?php
for($i=1; $i<=$totalpagina; $i++){
	?>
	 <td><?php echo " <a href='?pagina=" . $i . "'>" . $i . "  </a>  ";?></td>
		
<?php
	
$base_de_datos=null;//vaciar los datos de conexión 
}
?>

</tr>
</table>
</body>
</html>