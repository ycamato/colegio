<?php
    require("connection/connection.php");
    session_start();


    if(isset($_POST["guardar"])){

        try{
        
        $documento=        htmlentities(addslashes($_POST["doc"]));
        $telefono=         htmlentities(addslashes($_POST["telefono"]));

        $sql="SELECT * FROM usuario WHERE id_user=:co";
        $result=$base_de_datos->prepare($sql);
        $result->execute(array(":co"=>$documento));
        if ($registro=$result->fetch(PDO::FETCH_ASSOC)) {
            if($documento== $registro['id_user']){
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=, initial-scale=1.0">
                    <link rel="stylesheet" href="./css/verificacion.css">
                    <title>Cambiar su clave</title>
                </head>
                <body>
                        
                    <form action="actualizar.php" method="get">
                        <h2>Actualizar</h1>
                        <input type="password" class="input" name="con" placeholder="nueva contraseña"><br><br>
                        <input type="password" class="input" name="cont" placeholder="confirme contraseña"><br><br>
                        <input type="submit" class="submit" name="envi" value="Cambiar" /><br><br>
                        <input type="hidden" name="MM_update" value="formu" />
                    </form>
                    </div>
                </body>
                </html>

                <?php
        }
    }
    
    }catch(Exception $e){
        die("error" . $e->getMessage());
    }
}

?>