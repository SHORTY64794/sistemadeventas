<?php 
//Controlador q envía los datos a la bd

include '../config.php';

$rol=$_POST["rol"];
//echo"El nombre del rol es ".$rol;

if($rol==""){
    session_start();
    $_SESSION["mensaje"] = "WARNING: No es posible crear un nuevo rol, debe ingresar un nombre...";
    $_SESSION['icono']="warning";
    header("Location:".$URL."/roles/create.php");

}else{
    $sentencia=$pdo->prepare("INSERT INTO tb_roles 
        (rol, fyh_creacion) 
    VALUES (:rol, :fyh_creacion)");
    //Parametros q toma INSERT INTO para c/campo$fechaHora se toma del config.php
    $sentencia->bindParam(':rol',$rol);
    $sentencia->bindParam(':fyh_creacion',$fechaHora);

    if($sentencia->execute()){
        session_start();
        $_SESSION["mensaje"]="Registro del nuevo rol realizado exitosamente en la DB";
        $_SESSION["icono"]="success";
        header("Location:".$URL."/roles/");
    }
    else {
        session_start();
        $_SESSION["mensaje"] = "ERROR: No es posible realizar el registro del nuevo rol...";
        $_SESSION["icono"]="error";
        header("Location:".$URL."/roles/create.php");

    }

}





