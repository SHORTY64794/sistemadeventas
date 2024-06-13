<?php

include '../config.php';

//Se recibe el 'id_usuario' del formulario encontrado en la vista 'delete.php' 
$id_usuario=$_POST["id_usuario"];

$sentencia=$pdo->prepare("DELETE FROM tb_usuarios
WHERE id_usuario=:id_usuario");
//Parametro tomado x el DELETE para el campo del id_usuario.     
$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->execute();
//echo "Registro realizado exitosamente en la DB";
session_start();
$_SESSION["mensaje"]="Eliminación del usuario realizada exitosamente en la DB";
$_SESSION['icono']="success";
header("Location:".$URL."/usuarios/");

    



