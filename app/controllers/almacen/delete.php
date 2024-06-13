<?php

include '../config.php';

//Se recibe el 'id_usuario' del formulario encontrado en la vista 'delete.php' 
$id_producto=$_POST["id_producto"];

$sentencia=$pdo->prepare("DELETE FROM tb_almacen
WHERE id_producto=:id_producto");
//Parametro tomado x el DELETE para el campo del id_usuario.     
$sentencia->bindParam(':id_producto',$id_producto);
$sentencia->execute();
//echo "Registro realizado exitosamente en la DB";
session_start();
$_SESSION["mensaje"]="Eliminación exitosa del producto en la DB";
$_SESSION['icono']="success";
header("Location:".$URL."/almacen/");

    



