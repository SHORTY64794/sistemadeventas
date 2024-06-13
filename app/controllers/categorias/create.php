<?php 
//Controlador q envía los datos a la bd

include '../config.php';

$nombre_categoria=$_POST["nombre_categoria"];
//echo"El nombre de la categoría es ".$nombre_categoria;

if($nombre_categoria==""){
    session_start();
        $_SESSION["mensaje"] = "WARNING: No es posible crear una nueva categoría, debe ingresar un nombre...";
        $_SESSION['icono']="warning";
        header("Location:".$URL."/categorias/create.php");
}

else{
    $sentencia=$pdo->prepare("INSERT INTO tb_categorias 
        (nombre_categoria, fyh_creacion) 
    VALUES (:nombre_categoria, :fyh_creacion)");
//Parametros q toma INSERT INTO para c/campo$fechaHora se toma del config.php
    $sentencia->bindParam(':nombre_categoria',$nombre_categoria);
    $sentencia->bindParam(':fyh_creacion',$fechaHora);

    if($sentencia->execute()){
        session_start();
        $_SESSION["mensaje"]="Registro exitoso de una nueva categoría en la DB";
        $_SESSION["icono"]="success";
        header("Location:".$URL."/categorias/");
    }
    else {
        session_start();
        $_SESSION["mensaje"] = "ERROR: No es posible realizar el registro de una nuevo categoría...";
        $_SESSION["icono"]="error";
        header("Location:".$URL."/categorias/create.php");

    }
}

