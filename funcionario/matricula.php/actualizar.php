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
    $fecha=$_GET["fecha"];
    $matri=$_GET["mat"];
    $est=$_GET["est"];
    

try{
$sql="UPDATE matricula SET id_est=:est, fecha=:f, id_user=:s  WHERE id_matricula=:id";
$resultado=$base_de_datos->prepare($sql);  //$base guarda la conexión a la base de datos
$resultado->execute(array(":id"=>$codigo,":est"=>$est, ":f"=>$fecha , ":s"=>$matri ));//asigno las variables a los marcadores
header('Location:matricular.php');

$resultado->closeCursor();
}catch(Exception $e){
    //die("Error: ". $e->GetMessage());
    echo "F " . $codigo;
}finally{
    $base=null;//vaciar memoria
}


?>
</body>
</html>