<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
include("../../connection/connection.php");

$id=$_GET["id"];
echo "Se va a eliminar la materia " . $id,  " Si está seguro presione el Botón Eliminar, de lo contrario presione volver" . "<br>";
if(isset($_POST['elimina'])){
$base_de_datos->query("DELETE FROM estudiantes WHERE id_est='$id'");
echo "Se borró la materia ", $id . "<br>";


}
?>
<form method="POST">
<td><input type="submit" name="elimina" id="elimina" value="Eliminar"></td>
<td><a href="./tabla.php"><input type="button" name="volver" id="elimina" value="Volver"></a></td>
</form>
</body>
</html>