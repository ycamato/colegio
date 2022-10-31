
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Matricula</title>
	<link rel="stylesheet" href="../css/matricula.css">
</head>
<body>
	
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
<?php
if(!isset($_GET["buscar"])){
 $idu=$_GET['iduser'];
 $auxiliar=$_GET['nombaux'];

 }else{
 $idu=$_GET['iduser'];
 $auxiliar=$_GET['nombaux'];
 }
echo $idu;
include("../connection/connection.php");

 ?>
		
	<table class="fecha">
		<tr>
			<td class="titulo" align="center">Usted ingeso el
				<?php include ("./fecha.php"); echo fechas();?>
			</td>
			
		</tr>
	</table>
	<input type="hidden" name="iduser" value="<?php echo $idu?>">
	<input type="hidden" name="nombaux" value="<?php echo $auxiliar?>">
	
	
	<h3 class="titulo" align="center"> MATRICULAR</h3>
    <h3 class="titulo" align="center">Usuario: 
		<?php echo $auxiliar?>
	</h3>
	<table  id="matricula" align="center" border="1" bordercolor="red">
		
		<tr>
			<td colspan="3">
				<h4 align="center">Datos del estudiante</h4>
			</td>
		</tr>
		<tr>
			<td>Identificación
				<input type="text" name="ide">
				<input type="submit" id="btn"  name="buscar" value="Buscar">
			</td>
		</tr>
		
<?php
require('../connection/connection.php');
if(isset($_GET["buscar"])){
	$busqueda=$_GET['ide'];
$sql="SELECT  * from estudiantes  where id_est=:id";
$resultado=$base_de_datos->prepare($sql);
$resultado->execute(array(":id"=>$busqueda));
	if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
	$idestudiante=			$registro['id_est'];
	$nombre=				$registro['nom_est'];
	$apellido=				$registro['apel_est'];
	$idu=					$_GET['iduser'];
   	$auxiliar=				$_GET['nombaux'];
   echo $auxiliar;
	 ?>
	 </form>
	<form action="./detalletem.php" method="get">
		<tr>
			<td>Nombre
				<input type="text" name="nomb" readonly  value="<?php echo $nombre?>">
			</td>
		</tr>
		<tr>
			<td>Apellido
				<input type="text" name="ape" value="<?php echo $apellido?>">
			</td>
		</tr>
		<tr>
			<td colspan="2">Identificación
				<input type="text" name="ide" readonly value="<?php echo $idestudiante?>">
			</td>
		</tr>
		<input type="hidden" name="iduser" value="<?php echo $idu?>">
		<tr>
    		<td colspan="2">Funcionario
				<input type="text" name="nombaux" readonly value="<?php echo $auxiliar?>">
			</td>
		</tr>
		</table>
   
	
	</table>
<?php
	
	}else{
		echo "No existe estudiante con identificación $busqueda";
		header("Location:registrar.php");
	}
}
?>
 
	<br>
	<h4 class="agr" align="center">Agregar  Materias</h4>
	<table  class="usua" align="center">
	   <tr>
		    <td>
			   <input type="submit" class="boton" name="cargar" value="Agregar">
		    </td>
	        <td>
			   <input type="button" class="cerrar"   name="cerrar" value="Cerrar" onmouseup="self.close() " >
            </td>
		</tr>
	
	<?php
	

	?>

    </table>	
</form>
</form>
</body>
</html>