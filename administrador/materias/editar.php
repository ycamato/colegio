<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/materiaedit.css">
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
    $sql="SELECT  * FROM materias  WHERE n_materias=:id";//consulta con marcador, el marcador es :codigo

    $resultado=$base_de_datos->prepare($sql);//el objeto $base llama al metodo prepare que recibe por parametro la instrucción sql, el metodo prepare devuelve un objeto de tipo PDO que se almacena en la variable resultado
    $resultado->execute(array(":id"=>$busca));

	if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		
		?>
		<h4 align="center">ACTUALIZAR</h4>
		<form action="actualizar.php" method="GET">
            <h5>Codigo de materias</h5><br>
			   <input type="text" class="usua" readonly name="id" value="<?php echo $registro['n_materias']?>"><br>
            <h5> Materia</h5><br>
			   <input type="text" class="usua" name="mat" value="<?php echo $registro['nombre']?>"><br>
            <h5>Horas de materias</h5><br>
			   <input type="varchar" class="usua" name="hrs" value="<?php echo $registro['horas']?>"><br>
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