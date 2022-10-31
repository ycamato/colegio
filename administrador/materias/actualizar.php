<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
require("../../connection/connection.php");

    $codigo=$_GET["id"];
    $materia=$_GET["mat"];
    $horas=$_GET["hrs"];
    

try{
$sql="UPDATE materias SET nombre=:nom, horas=:hrs  WHERE n_materias=:id";
$resultado=$base_de_datos->prepare($sql);  //$base guarda la conexión a la base de datos
$resultado->execute(array(":id"=>$codigo,":nom"=>$materia, ":hrs"=>$horas ));//asigno las variables a los marcadores
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