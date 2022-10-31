<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>BIENVENIDO</title>
</head>
<body>
    <header>
        <div id="imag">
            <img src="../imag/Guillermo.png">
        </div>
        <h1><?php include ("fecha.php"); echo fechas(); ?></h1>
        <a href="cerrar.php"><button class="cerrar">Cerrar seccion</button></a>
    </header>
    <div class="container">
        
    </div>
</body>
<div class="todo"></div>
<a href="../scrud.php"><img src="../imag/registro.png"></a>
<p>Registros</p>
<div class="todo"></div>
<a href="./materias/tabla.php"><img src="../imag/materias.png"></a>
<p>Materias</p>
<div class="todo"></div>
<a href=""><img src="../imag/matricula.jfif"></a>
<p>Matriculas </p>
<div class="todo"></div>
<a href="../administrador/estudiantes/tabla.php"><img src="../imag//estudiante.png"></a>
<p> Estudiantes</p>
</html>