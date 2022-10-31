<?php


    
    session_start();
    $_SESSION["usuario"]=$nombre;
    $valida=$registro['rol_user'];
    $id=$registro['id_user'];
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/admi.css">
   
    <title class="titulo" >ADMINISTRADOR</title>
</head>
  <h4></h4>
<body>
    <header class="menu">
            <img src="./imag/Guillermo.png">
            <h4 >Bienvenido <?php echo $nombre;?> </h4>
            <h5 ><?php include ("fecha.php"); echo fechas();?></h5>
        <div class="btn">
            <button class="cerrar"><a href="../administrador/cerrar.php">Cerrar Sesión</a></button>
        </div>
    </header>
    <div class="mitad">
    <h3 class="titulo">ADMINISTRADOR</h3>
        <form  class="form" method="post" action="">
                <?php 
                include("connection/connection.php");
                ?>
            <table border="1" bordercolor="orange">
                <tr><th>MODULOS</th><th>ACCION</th></tr>
                <tr><td>Usuarios</td><td><a href="../entradascrud.php" target=_blank><input class="ingresar" type="button" name="iusu" value="Ingresar"></a></td></tr>
                <tr><td>Materias</td><td><a href="../administrador/materias/tabla.php" target=_blank><input  class="registrar" type="button" name="imate" value="registrar"></a></td>
                <tr><td>Estudiantes</td><td><a href="../administrador/estudiantes/tabla.php" target=_blank><input  class="registrar" type="button" name="imate" value="registrar"></a></td>
                <tr><td>Matriculas</td><td><a href="../administrador/matricula/matricula.php?id=<?php echo $id;?> & nomb=<?php echo $nombre?>" target=_blank><input class="ingresar" type="button" name="iusu" value="Ingresar"></a></td></tr>
                    
            </table>

        </form>
    </div>
</body>

</html>