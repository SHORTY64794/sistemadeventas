<?php 

include "../config.php";

$id_categoria=$_POST["id_categoria"];
$nombre_categoria=$_POST["nombre_categoria"];

$sentencia=$pdo->prepare("UPDATE tb_categorias 
                SET nombre_categoria=:nombre_categoria,
                    fyh_actualizacion=:fyh_actualizacion
                WHERE id_categoria=:id_categoria");

$sentencia->bindParam(":nombre_categoria",$nombre_categoria);
$sentencia->bindParam(":fyh_actualizacion",$fechaHora);
$sentencia->bindParam(":id_categoria",$id_categoria);

if($sentencia->execute()){ 
    session_start();
        $_SESSION["mensaje"]="Actualización exitosa de datos realizada en la DB";
        $_SESSION['icono']="success";
        header("Location:".$URL."/categorias/");
       
}else{
        //echo "ERROR: Las contraseñas no coinciden";
        session_start();
        $_SESSION["mensaje"] = "ERROR: No fue posible realizar la actualización";
        $_SESSION['icono']="error";
        header("Location:".$URL."/categorias/update.php?id=".$id_categoria);
}