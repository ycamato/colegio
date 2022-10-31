<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginerror.css">
    <link rel="icon" href="./imag/Guillermo.png">
    <title>I.E.GUILLERMO</title>
</head>

<body onload="form1.doc.focus()">
        <div class="registro">
                <form method="POST" name="form1" action="include/inicio.php" autocomplete="off">
                    <div class="contenido">
                       <img src="./imag/Guillermo.png">
                     </div>
                    <h2>ERROR  DE  INICIO</h2>

                    <section id="registro">

                        <label class="for"> Nombre usuario:</label><br>
                        <input type="text" class="input" name="nom_user" id="doc" placeholder=" Ingrese su documento"><br><br>
                        <label class="for"> Contraseña:</label><br>
                        <input  class="input" type="password" name="clave" id="clave" placeholder=" Ingrese su contraseña"><br><br>
                        
                        
                            <input class="submit" type="submit" value="envia" name="envia">
                            <input type="hidden" value="formreg" name="MM_insert">
                         
                    </section>
                </form>
        </div>


    </div>
</body>
</html>