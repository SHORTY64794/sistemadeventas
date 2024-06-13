<?php

include '../config.php';

//Se recibe el 'id_usuario' del formulario encontrado en la vista 'delete.php' 
$id_categoria=$_POST["id_categoria"];

$sentencia=$pdo->prepare("DELETE FROM tb_categorias
WHERE id_categoria=:id_categoria");
//Parametro tomado x el DELETE para el campo del id_usuario.     
$sentencia->bindParam(':id_categoria',$id_categoria);
$sentencia->execute();
//echo "Registro realizado exitosamente en la DB";
session_start();
$_SESSION["mensaje"]="Eliminación exitosa de la categoria realizada en la DB";
$_SESSION['icono']="success";
header("Location:".$URL."/categorias/");
