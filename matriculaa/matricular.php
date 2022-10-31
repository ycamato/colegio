<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Matricular</title>
</head>
<body>


<?php 
	
	include("../connection/connection.php");
	
   	$idestudiante=			$_GET['id'];
	$nombre=				$_GET['nomb'];
	$contador=				$_GET['contador'];
	$idu=					$_REQUEST['iduser'];
	$auxiliar=				$_GET['nombaux'];	
    
    echo "Se va a generar una matricula con $contador materias, a nombre de $nombre, $idu, si está seguro presione Si de lo contrario Volver";
    if(isset($_POST['si'])){
	$sql="INSERT into matricula (id_est,id_user) values (:ie, :iu)";
	$resultado=$base_de_datos->prepare($sql);
	$resultado->execute(array( ":ie"=>$idestudiante,":iu"=>$idu));
	//consultar el número de matricula generado
	$sql = "SELECT MAX(id_matricula) as last_id FROM matricula";
    $resultado=$base_de_datos->prepare($sql);
    $resultado->execute(array());
    $registro=$resultado->fetch(PDO::FETCH_ASSOC);
    $numatricula=$registro['last_id'];
   

	//ingresar el número de matricula en la tabla detalletemp
	$sql="UPDATE detalletemp SET id_matricula='$numatricula'";
	$resultado=$base_de_datos->prepare($sql); 
    $resultado->execute(array());

    // copia todos los registrso de detalletemp en detalle
    $sql="INSERT into detalle (id_matricula, n_materias) select  id_matricula, n_materias  from detalletemp";
    $resultado=$base_de_datos->prepare($sql);
    $resultado->execute(array());
    //borra todos los regisros de la tabla detalletemp
    $sql="DELETE from detalletemp";
	$resultado=$base_de_datos->prepare($sql); 
    $resultado->execute(array());
	header("Location:vermatricula.php");
	
	}

?>
<form  name="form1" method="post" action=" ">
		<table border="0" align="center">
		</tr>
			
		<td><td><input type="submit" name="si"  value="Si">
		<a href="./matricula.php"><input type="button" name="vuelve" value="Volver" onmouseup="self.close()"></a></td></tr>

		</table>
</form>
</body>
</html>