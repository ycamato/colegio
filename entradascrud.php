<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registro.css">
    <title>Pagina</title>
</head>
<body>
    <?php
     include("./connection/connection.php");
     
     $registros=3;
     if(isset($_GET["pagina"])){
             if($_GET["pagina"]==1){
                 header("location:index.php");
             }else{
                 $pagina=$_GET["pagina"];
             }
        }else{
              $pagina=1;
        }
        $empieza=($pagina-1)*$registros;
        $sql_total="SELECT * FROM usuario";

        $resultado=$base_de_datos->prepare($sql_total);

        $resultado->execute(array());
        $numfilas=$resultado->rowCount();
        $totalpagina=ceil($numfilas/$registros);

        $registros=$base_de_datos->query("SELECT * FROM usuario LIMIT $empieza,$registros")->fetchALL(PDO::FETCH_OBJ);

        if(isset($_POST['inserta'])) {
            $idu=$_POST['idu'];
            $rol=$_POST['rol'];
            $nombre=$_POST['nomb'];
            $apellido=$_POST['apel'];
            $password=$_POST['clave'];
            $pass_cifrado=password_hash($password,PASSWORD_DEFAULT,array("cost"=>12));
            $telefono=$_POST['cel'];
            $direccion=$_POST['dir'];
            
            ?>
            <input type="number" name="idd" value="<?php echo $idu?>">
            <?php
            $sql="INSERT INTO usuario (id_user,rol_user, nom_user,ap_user,clave ,num_cel ,dir_user)  VALUES (:id,:rol, :nomb,:apel, :clave,:num ,:dir)";
            $resultado=$base_de_datos->prepare($sql);
            $resultado->execute(array(":id"=>$idu,  ":rol"=>$rol, ":nomb"=>$nombre,":apel"=>$apellido, ":clave"=>$pass_cifrado,":num"=>$telefono,":dir"=>$direccion));

            header("Location:scrud.php");
        }
    ?>
    <h3 align="center">PANEL DE OPCIONES USUARIOS</h3>
    <form action=" " method="post" autocomplete="off">
        <table align="center" border="" bordercolor="orange">
			<tr>
				<th>Idusuario</th>
				<th>Nombre</th>
                <th>Apellido</th>
				<th>Contraseña</th>
                <th>Numero telefonico</th>
                <th>Dirreccion</th>
                <th>Rol</th>
				<th colspan="2">Acciones</th>
			</tr>
            <?php
            foreach ($registros as $persona) :?>
            <tr>
				<td><?php echo $persona->id_user?></td>
				<td><?php echo $persona->nom_user?></td>
                <td><?php echo $persona->ap_user?></td>
				<td><?php echo/* $persona->clave*/'XXXX'?></td>
                <td><?php echo $persona->num_cel?></td>
                <td><?php echo $persona->dir_user?></td>

				<?php
				if($persona->rol_user==1){
					$aux="Administrador"
					?>
					<td><?php echo $aux;?></td>
				<?php
				}else{
					$aux="Funcionario"
					?>
					<td><?php echo $aux;?></td>
				<?php
				}
				
			?>
            <td><a href="eliminar.php?id=<?php echo $persona->id_user?> & nom=<?php echo $persona->nom_user?>"><input type="button" name="elimina" class="elimina" value="Eliminar"></a></td>
            <td><a href="edit.php?id=<?php echo $persona->id_user?> & nom=<?php echo $persona->nom_user?>  & rol=<?php echo $aux?>"><input type="button" class="edita" name="edita" value="Editar"></a></td></tr>

            <?php
			endforeach;
		
			?>
			
			<td><input type="text" name="idu"></td>
			<td><input type="text" name="nomb"></td>
            <td><input type="text" name="apel"></td>
			<td><input type="password" name="clave" ></td>
            <td><input type="text" name="cel"></td>
            <td><input type="text" name="dir"></td>
			<td><select name="rol">
			<?php
            $sql= "SELECT * FROM rol"; 
			$resultado=$base_de_datos->prepare($sql);
			$resultado->execute(array());
			while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
			?>
			?>
            <option value="<?php echo $registro['rol_user'];?>"><?php echo $registro['rol_nom']?></option>
				<?php
				}
            ?>
            </select> </td>
            <td colspan="5" align="center"><input  type="submit" id="inserta" name="inserta" value="Insertar" >
            <a href="administrador/index.php"><input type="button" name="admin" class="cerrar" value="Cerrar"onmouseup="window.close()"></a></td>
            </tr>
            <tr>
        </table>
    </form>
    <table class="contador" border="0" >
        <tr>
    <?php
    for($i=1; $i<=$totalpagina; $i++){
    ?>
        <td><?php echo " <a href='?pagina=" . $i . "'>" . $i . "  </a>  ";?></td>
    <?php
    $base=null;
    }
    ?>
        </tr>
    </table>
</body>
</html>
