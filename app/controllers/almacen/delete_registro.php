<?php

include '../config.php';

//Se recibe el 'id_usuario' del formulario encontrado en la vista 'delete.php' 
$id_producto=$_POST["id_producto"];

$sentencia=$pdo->prepare("DELETE FROM tb_almacen
WHERE id_producto=:id_producto");
//Parametro tomado x el DELETE para el campo del id_usuario.     
$sentencia->bindParam(':id_producto',$id_producto);

if ($sentencia->execute()){
    session_start();
    $_SESSION["mensaje"]="Eliminación exitosa del producto en   la DB";
    $_SESSION['icono']="success";
    header("Location:".$URL."/almacen/");
}else{
    session_start();
    $_SESSION["mensaje"]="No es posible eliminar el producto en la DB";
    $_SESSION['icono']="error";
    header("Location:".$URL."/almacen/delete_registro.php?identidad=".$id_producto);
}



    



