<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/editar.css">
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
    $sql="SELECT  * from usuario  where id_user=:id";//consulta con marcador, el marcador es :codigo

    $resultado=$base_de_datos->prepare($sql);//el objeto $base llama al metodo prepare que recibe por parametro la instrucción sql, el metodo prepare devuelve un objeto de tipo PDO que se almacena en la variable resultado
    $resultado->execute(array(":id"=>$busca));

	if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		
		?>
	        <h4 align="center">ACTUALIZAR</h4>	
		<form action="update.php" method="GET">
        	<h5>Identificacion:</h5><br>
				<input type="text" class="usua" readonly name="id" value="<?php echo $registro['id_user']?>">
        	<h5>Nombre:</h5><br>
				<input type="text" class="usua" name="nom" value="<?php echo $registro['nom_user']?>">
        	<h5>Apellido:</h5><br>
				<input type="text" class="usua" name="apel" value="<?php echo $registro['ap_user']?>"></td></h5></tr>
	        <h5>Contraseña:</h5><br>
				<input type="text" class="usua" name="clave"  value="<?php echo $registro['clave']?>">
        	<h5>Número  celular:</h5><br>
				<input type="text" class="usua" name="cel" value="<?php echo $registro['num_cel']?>"></td></h5></tr>			
        	<h5>Direccion:</h5><br>
				<input type="text" class="usua" name="dir" value="<?php echo $registro['dir_user']?>">
        	<h5>Tipo:</h5><br>
				<input type="text" class="usua" name="tipo" value="<?php echo $registro['rol_user']?>"><br>
			
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