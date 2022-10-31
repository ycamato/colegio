<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
require("../../connection/connection.php");

    $doc=$_GET["id"];
    $nombre=$_GET["nom"];
    $apellido=$_GET["apel"];
    $correo=$_GET["email"];
    $direccion=$_GET["dir"];
    

try{
$sql="UPDATE estudiantes SET nom_est=:nom, apel_est=:apel, email=:email, dir_est=:dir  WHERE id_est=:id";
$resultado=$base_de_datos->prepare($sql);  //$base guarda la conexión a la base de datos
$resultado->execute(array(":id"=>$doc,":nom"=>$nombre, ":apel"=>$apellido , ":email"=>$correo ,":dir"=>$direccion ));//asigno las variables a los marcadores
header('Location:tabla.php');

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