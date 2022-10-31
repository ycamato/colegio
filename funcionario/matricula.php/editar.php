<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../css/matriculaedit.css">
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
    $sql="SELECT  * FROM matricula  WHERE id_matricula=:id";//consulta con marcador, el marcador es :codigo

    $resultado=$base_de_datos->prepare($sql);//el objeto $base llama al metodo prepare que recibe por parametro la instrucción sql, el metodo prepare devuelve un objeto de tipo PDO que se almacena en la variable resultado
    $resultado->execute(array(":id"=>$busca));

	if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		
		?>
		<form action="./actualizar.php" method="GET">

		<h4 align="center">ACTUALIZAR</h4>

		<table align="center" border="1" bgcolor="blue">
			
            <tr align="center"><td align=""><h5>Codigo de matricula<br><input  class="input" type="text" readonly name="id" value="<?php echo $registro['id_matricula']?>"></td></h5></tr>

            <tr align="center"><td align=""><h5>Horas de la matricula<br><br><input class="input"  type="date"  name="fecha" value="<?php echo $registro['fecha']?>"></td></h5></tr>

            <tr align="center"><td align=""><h5>Documento del matriculador<input class="input"  type="number"  name="mat" value="<?php echo $registro['id_user']?>"></td></h5></tr>

            <tr align="center"><td align=""><h5>Documento del estudiante<input class="input"  type="number"  name="est" value="<?php echo $registro['id_est']?>"></td></h5></tr>
			
            <tr><td colspan="2" align="center"><input type="submit" class="btn" name="edita" id="ingresa" value="Guardar">
			
			
		</table>
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