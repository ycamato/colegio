

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>I.E.GUILLERMO</title>
</head>

<body onload="form1.doc.focus()">  
<?php
$aux=0;
session_start();
session_destroy();//cierra la sesión
echo "<p align=center> Ha cerrado la sesión, ingrese su usuario y contraseña de nuevo ";




?>
        <div class="registro">
                <form method="POST" name="form1" action="../include/pruebalogin.php" autocomplete="off">
                    <div class="contenido">
                        <img src="../imag/Guillermo.png">
                    </div>
                    <h2>INICIO  DE SECCION</h2><br><br>

                    <section id="registro">

                        <label class="for"> Nombre usuario:</label><br>
                        <input type="text" class="input" name="nom_user" id="doc" placeholder=" Ingrese su documento" required=""><br><br>

                        <label class="for"> Contraseña:</label><br>
                        <input type="password" class="input" name="clave" id="cl" placeholder=" Ingrese su contraseña" required=""><br><br>

                        <input class="submit" type="submit" value="envia" name="envia">
                        <input type="hidden" value="formreg" name="MM_insert">
                          
                    </section>
                </form>
</body> 
</html>