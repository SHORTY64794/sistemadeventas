<?php 

$id_producto_get=$_GET['identidad'];

$sql_productos="SELECT *, cat.nombre_categoria as nombre_categoria, us.email as email FROM tb_almacen as a INNER JOIN tb_categorias as cat ON a.id_categoria=cat.id_categoria INNER JOIN tb_usuarios as us ON a.id_usuario=us.id_usuario WHERE id_producto=$id_producto_get";

//Preparamos la consulta  
$query_productos=$pdo->prepare($sql_productos);
//Ejecutamos la consulta
$query_productos->execute();
//Recibimos la respuesta de la bd.
$productos_datos=$query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $dato) {
    $codigo = $dato["codigo"];
    $nombre_categoria = $dato["nombre_categoria"];
    $nombre = $dato["nombre"];
    $email = $dato["email"];
    //$nombres= $dato["nombres"];
    $descripcion = $dato["descripcion"];
    $stock = $dato["stock"];
    $stock_minimo = $dato["stock_minimo"];
    $stock_maximo = $dato["stock_maximo"];
    $precio_compra = $dato["precio_compra"];
    $precio_venta = $dato["precio_venta"];
    $fecha_ingreso = $dato["fecha_ingreso"];    
    $imagen = $dato["imagen"];
}