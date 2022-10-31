<?php
session_start();
    require("connection/connection.php");
    $sentencia=$base_de_datos->query("SELECT * FROM usuario");
    $consult=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['envi'])){
        $doc= $_SESSION['doc'];
        $nueva=$_GET['con'];
        $val=$_GET['cont'];
        $pass_cifrado=password_hash($val,PASSWORD_DEFAULT,array("cont"=>12));
    
        try{
            $sql="UPDATE usuario SET clave=:cl WHERE id_user=:cd";
            $result=$base_de_datos->prepare($sql);
            $result->execute(array(":cd"=>$doc,":cl"=>$pass_cifrado));
            echo"<script>alert('se actualizaron la clave correctamente')</script>";
            echo"<script>window.location='index.php'</script>";
    
        }catch (Exception $th) {
            echo"No se pudo actualizar";
        }
        finally{
            $base=null;
        }
    }


?>