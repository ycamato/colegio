<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/materias.css">
	<title></title>
</head>
<body>
	<?php
	
	include("../../connection/connection.php");

	
	//--------------paginación-------------
	$registros=3;//indica que se van a ver 3 registro por página
	if(isset($_GET["pagina"])){
		if($_GET["pagina"]==1){
			header("Location:matricular.php");
		}else{
			$pagina=$_GET["pagina"];
		}
	}else{
		$pagina=1;//muestra página en la que estamos cuando se carga por primera vez
	}
	
	$empieza=($pagina-1)*$registros;//registro desde el cual va a empezar a mostrar
	$sql_total="SELECT * FROM matricula";//muestra los 3 primeros, primer parametro indica en que posición impieza en este caso posición 0, el segundo parametro cuantos registros quiere mostrar en este caso 3 registros

	$resultado=$base_de_datos->prepare($sql_total);

	$resultado->execute(array());
	$numfilas=$resultado->rowCount();//cuantos registros hay en total
	$totalpagina=ceil($numfilas/$registros);

	$registros=$base_de_datos->query("SELECT * from matricula LIMIT $empieza, $registros")->fetchALL(PDO::FETCH_OBJ);
	
	if(isset($_POST['inserta'])){
		$id=$_POST['id'];
		$est=$_POST['est'];
		$fecha=$_POST['fech'];
		$doc=$_POST['mat'];
		
       
       
		?>
		<input type="number" name="idd" value="<?php echo $id?>">
		<?php 
		$sql="INSERT INTO matricula (id_matricula,id_est, fecha,id_user) values ( :id,:est, :f ,:user )";
		$resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array( ":id"=>$id,":est"=>$est  ,":user"=>$doc ,":f"=>$fecha));

		header("Location:matricular.php");
	}

	?>
	
<h3 align="center">PANEL DE MATRICULAS</h3>
<form action=" " method="post" autocomplete="off">
		<table align="center" border="" bordercolor="orange">
			<tr>
				<th>Codigo  de matricula</th>
				<th>Documento del estudiante</th>
                <th>fecha</th>
				<th>Documento del matriculador</th>
				
				<th colspan="2">Acciones</th>
			</tr>
			<?php
			//por cada objeto que hay dentro del array repite el código
			foreach ($registros as $materia) :?> 
			<tr>
				<td><?php echo $materia->id_matricula?></td>
				<td><?php echo $materia->id_est?></td>
				<td><?php echo $materia->fecha?></td>
				<td><?php echo $materia->id_user?></td>
               
               

				
					
			<td><a href="delete.php?id=<?php echo $materia->id_matricula?> & est=<?php echo $materia->id_est?>& s=<?php echo $materia->id_user?> & d=<?php echo $materia->id_user?> & f=<?php echo $materia->fecha?>"><input type="button" name="elimina" id="elimina" value="Eliminar"></a></td>
			<td><a href="editar.php?id=<?php echo $materia->id_matricula?> & est=<?php echo $materia->id_est?>& s=<?php echo $materia->id_user?> & d=<?php echo $materia->id_user?> & f=<?php echo $materia->fecha?>"><input type="button" name="edita" class="edita" value="Editar"></a></td></tr>
			

			
			<?php
			endforeach;
		
			?>
			
			<td><input type="number" name="id"></td>
			<td><input type="number" name="est"></td>
			<td><input type="date" name="fech"></td>
			<td><input type="number" name="mat"></td>
            
           
			

				<td colspan="5" align="center"><input  type="submit" id="inserta" name="inserta" value="Insertar" >
				<a href="../funcionario.php"><input type="button" class="cerrar" name="admin" value="Cerrar"onmouseup="window.close()"></a></td>
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