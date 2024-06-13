<?php

include '../config.php';

//Se reciben del formulario de la vista 'update.php'

$id_categoria = $_POST["id_categoria"];
$nombre = $_POST["nombre"];
$id_usuario = $_POST["id_usuario"];
$descripcion = $_POST["descripcion"];
$stock = $_POST["stock"];
$stock_minimo = $_POST["stock_minimo"];
$stock_maximo = $_POST["stock_maximo"];
$precio_compra = $_POST["precio_compra"];
$precio_venta = $_POST["precio_venta"];
$fecha_ingreso = $_POST["fecha_ingreso"];
$id_producto=$_POST["id_producto"];
$imagen_form=$_POST["imagen_form"];

if($_FILES['imagen']['name']!=null){
    //echo "La imagen se actualiza...";
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $imagen_form = $nombreDelArchivo . "__" . $_FILES['imagen']['name'];
    $location = "../../../almacen/img_productos/" .$imagen_form;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $location);
}else{
    //echo "Pailas, la imagen no se actualiza...";
}

$sentencia=$pdo->prepare("UPDATE tb_almacen 
SET nombre=:nombre, descripcion=:descripcion, stock=:stock, stock_minimo=:stock_minimo, stock_maximo=:stock_maximo, precio_compra=:precio_compra, precio_venta=:precio_venta, fecha_ingreso=:fecha_ingreso, imagen=:imagen, id_usuario=:id_usuario, id_categoria=:id_categoria, fyh_actualizacion=:fyh_actualizacion            
WHERE id_producto=:id_producto");
//Parametros tomados x UPDATE para c/campo. $fechaHorse toma del config.php. La 'fyh_creacion' no sdebe actualizar


$sentencia->bindParam('nombre',$nombre);
$sentencia->bindParam('descripcion',$descripcion);
$sentencia->bindParam('stock',$stock);
$sentencia->bindParam('stock_minimo',$stock_minimo);
$sentencia->bindParam('stock_maximo',$stock_maximo);
$sentencia->bindParam('precio_compra',$precio_compra);
$sentencia->bindParam('precio_venta',$precio_venta);
$sentencia->bindParam('fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam('imagen',$imagen_form);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->bindParam('id_categoria',$id_categoria);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_producto',$id_producto);

if($sentencia->execute()){
    session_start();
    $_SESSION["mensaje"]="Actualización EXITOSA en la DB";
    $_SESSION['icono']="success";
    header("Location:".$URL."/almacen/");
}
else{
    session_start();
    $_SESSION["mensaje"] = "ERROR: No fue posible realizar la actualización";
    $_SESSION['icono']="error";
    header("Location:".$URL."/almacen/update.php?identidad=".$id_producto);
}
    

