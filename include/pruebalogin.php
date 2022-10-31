<?php
require("../connection/connection.php");
ini_set("default_charset", "utf-8");

if(!isset($_SESSION["usuario"]) and !isset($_POST["envia"])){
    header("Location:index.php");
    
}
else if(isset($_POST["envia"])){


try{

$login=         htmlentities(addslashes($_POST["nom_user"]));
$password=      htmlentities(addslashes($_POST["clave"]));
$contador=0;


    $sql="SELECT * FROM usuario WHERE nom_user= :user";
    $resultado=$base_de_datos->prepare($sql);
    $resultado->execute(array(":user"=>$login));//marcador login se corresponde con lo que el usuario introdujo en el cuadro de texto login
    if ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
        
        if(password_verify($password, $registro['clave'])){
        
        $valida=        $registro['rol_user'];
        $nombre=        $registro['nom_user'];
        $idu=           $registro['id_user'];
                $contador++;
            }
        }
        
        if ($contador>0){
            
                if($valida==1){
                      require("../admin.php");
                }
                elseif($valida==2){   
                    require("../funcionario/funcionario.php");
                }
        }
        else{
            echo "Usuario no registrado";
            require("loginerror.php");
        }
        $resultado->closecursor();
        $base_de_datos->exec("set character set utf8");
       
        
}catch(Exception $e){
    die("error" . $e->getMessage());

}
}

?>