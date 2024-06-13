<?php

include '../config.php';

//Se reciben del formulario de la vista 'update.php'
$id_categoria = $_POST["id_categoria"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
//$email = $_POST["email"];
$stock = $_POST["stock"];
$stock_minimo = $_POST["stock_minimo"];
$stock_maximo = $_POST["stock_maximo"];
$precio_compra = $_POST["precio_compra"];
$precio_venta = $_POST["precio_venta"];
$imagen = $_POST["imagen_form"];
$id_producto = $_POST["id_producto"];

if($_FILES['imagen']['name']!=null){
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $imagen = $nombreDelArchivo . "__" . $_FILES['imagen']['name'];
    $location = "../../../almacen/img_productos/" . $imagen;

    move_uploaded_file($_FILES['imagen']['tmp_name'],$location);
}

$sentencia = $pdo->prepare("UPDATE tb_almacen 
        SET id_categoria=:id_categoria,
            nombre=:nombre,
            descripcion=:descripcion,
            stock=:stock, 
            stock_minimo=:stock_minimo,
            stock_maximo=:stock_maximo,
            precio_compra=:precio_compra,
            precio_venta=:precio_venta,
            imagen=:imagen,         
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_producto=:id_producto");

//Parametros tomados x UPDATE para c/campo. $fechaHora se toma del config.php. La 'fyh_creacion' no se debe actualizar
$sentencia->bindParam(':id_categoria', $id_categoria);
$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':descripcion', $descripcion);

$sentencia->bindParam(':stock', $stock);
$sentencia->bindParam(':stock_minimo', $stock_minimo);
$sentencia->bindParam(':stock_maximo', $stock_maximo);
$sentencia->bindParam(':precio_compra', $precio_compra);
$sentencia->bindParam(':precio_venta', $precio_venta);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_producto', $id_producto);
$sentencia->bindParam(':imagen', $imagen);


if ($sentencia->execute()) {
    //echo "Registro realizado exitosamente en la DB";
    session_start();
    $_SESSION["mensaje"] = "Actualización de datos realizada exitosamente en la DB...";
    $_SESSION['icono'] = "success";
    header("Location:" . $URL . "/almacen/");
} else {
    //echo "ERROR: Las contraseñas no coinciden";
    session_start();
    $_SESSION["mensaje"] = "ERROR: No es posible realizar la actualización...";
    $_SESSION['icono'] = "error";
    header("Location:" . $URL . "/almacen/update.php?id=" . $id_producto);
}



