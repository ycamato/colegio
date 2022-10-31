<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
require("./connection/connection.php");

    $id=$_GET["id"];
    $nombre=$_GET["nom"];
    $apellido=$_GET["apel"];
	$telefono= $_GET["cel"];
	$direccion=$_GET["dir"];
    $tipo=$_GET["tipo"];
    

try{
$sql="UPDATE usuario SET nom_user=:nomb,rol_user=:tip, ap_user=:apel ,num_cel=:num ,dir_user=:dir WHERE id_user=:id";
$resultado=$base_de_datos->prepare($sql);  //$base guarda la conexión a la base de datos
$resultado->execute(array(":id"=>$id,":nomb"=>$nombre, ":tip"=>$tipo ,":apel"=>$apellido ,":num"=>$telefono,":dir"=>$direccion));//asigno las variables a los marcadores
header('Location:entradascrud.php');

$resultado->closeCursor();
}catch(Exception $e){
    //die("Error: ". $e->GetMessage());
    echo "F " . $id;
}finally{
    $base=null;//vaciar memoria
}


?>
</body>
</html>