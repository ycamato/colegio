<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/actualizarest.css">
	<title></title>
</head>
<body>
<?php
	
	$busca=$_GET["id"];


try{
	$base_de_datos=new PDO("mysql:host=localhost;dbname=colegio", "root", "");//pdo es la clase
	$base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//muestra el tipo de error
	$base_de_datos->exec("set character set utf8");
//echo "Conexión exitosa";
    $sql="SELECT  * FROM estudiantes  WHERE id_est=:id";//consulta con marcador, el marcador es :codigo

    $resultado=$base_de_datos->prepare($sql);//el objeto $base llama al metodo prepare que recibe por parametro la instrucción sql, el metodo prepare devuelve un objeto de tipo PDO que se almacena en la variable resultado
    $resultado->execute(array(":id"=>$busca));

	if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		
		?>
		<h2>ACTUALIZAR</h2>
		<form action="actualizar.php" method="GET">
        <h5>Documento de identidad</h5><br>
		<input type="text" class="usua" readonly name="id" value="<?php echo $registro['id_est']?>">
        <h5>Nombre del  estudiante</h5><br>
		<input type="text" class="usua"  name="nom" value="<?php echo $registro['nom_est']?>"></td></h5></tr>
        <h5>Apellido del estudiante</h5><br>
		<input type="text" class="usua" name="apel" value="<?php echo $registro['apel_est']?>"></td></h5></tr>
        <h5>Correo</h5><br>
		<input type="text" class="usua" name="email" value="<?php echo $registro['email']?>"></td></h5></tr>
        <h5>Direccion</h5><br>
		<input type="text" class="usua"  name="dir" value="<?php echo $registro['dir_est']?>"></td></h5></tr>
			
        <input type="submit" class="btn" name="edita" id="ingresa" value="Guardar">
			
			
	
	</form>

<?php
	}else{
		echo "No existe cliente con cédula $busca";
	}

$resultado->closeCursor();

}catch(Exception $e){
	die("Error: ". $e->GetMessage());

}finally{
	$base=null;//vaciar memoria
}


?>

</form>
</body>
</html>