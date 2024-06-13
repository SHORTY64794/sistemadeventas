<?php

include '../config.php';

//Se reciben del formulario de la vista 'update.php'
$id_rol=$_POST["id_rol"];
$rol=$_POST["rol"];

$sentencia=$pdo->prepare("UPDATE tb_roles 
SET rol=:rol,
    fyh_actualizacion=:fyh_actualizacion            
WHERE id_rol=:id_rol");
//Parametros tomados x SET para c/campo. $fechaHorse toma del config.php. La 'fyh_creacion' no sdebe actualizar
$sentencia->bindParam(':rol',$rol);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_rol',$id_rol);
if($sentencia->execute()){
    session_start();
    $_SESSION["mensaje"]="Actualización realizada EXITOSAMENTE en la DB";
    $_SESSION['icono']="success";
    header("Location:".$URL."/roles/");
}
else{
    session_start();
    $_SESSION["mensaje"] = "ERROR: No fue posible realizar la actualización";
    $_SESSION['icono']="error";
    header("Location:".$URL."/roles/update.php?id=".$id_rol);
}
    

