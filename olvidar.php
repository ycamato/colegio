<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recordar.css">
    <link rel="icon" href="./imag/Guillermo.png">

    
    <title>Verificación</title>
</head>
<body onload="form1.doc.focus()">
    <div class="registro"> 
                    <form method="post" name="form1" action="verificacion.php" autocomplete="off">
                    <h1> Recuperar mi Contraseña</h1><br>  
                       <div class="contenido">
                          <img src="./imag/Guillermo.png">
                        </div> 
                        <label class="for">Documento:</label><br>
                        <input class="input" type="number" name="doc" placeholder="Ingrese su Documento"><br>
                        <label class="for">Telefono:</label><br>
                        <input class="input" type="number" name="telefono" placeholder="Ingrese su telefono"><br>
                        <input class="btn" type="submit" name="guardar" value="Cambiar contraseña"><br><br>
                        <button class="boton"> <a class="olv" href="index.php">Regresar</a></button><br>
                    </form>
                       
            </div>   
    </div>
</body>
</html>