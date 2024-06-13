<?php 
//Consulta sql a la tb_compras en la base de datos
//Almacenamos el tipo de consulta

//$sql_productos="SELECT a.id_producto as id_producto,a.codigo as codigo, a.nombre as nombre,a.descripcion as descripcion,a.stock as stock, a.stock_minimo as stock_minimo, a.stock_maximo as stock_maximo, a.precio_compra as precio_compra, a.precio_venta as precio_venta, a.fecha_ingreso as fecha_ingreso, a.imagen as imagen, cat.nombre_categoria as nombre_categoria FROM tb_almacen as a INNER JOIN tb_categorias as cat ON a.id_categoria=cat.id_categoria";


$sql_compras="SELECT *, co.precio_compra as precio_total, prd.codigo as codigo, prd.nombre as nombre_producto, prd.descripcion as descripcion, prd.stock as stock, prd.stock_minimo as stock_minimo, prd.stock_maximo as stock_maximo, prd.precio_compra as precio_compra_producto, prd.precio_venta as precio_venta, prd.fecha_ingreso as fecha_ingreso, prd.imagen as imagen, 
prv.nombre_proveedor as nombre_proveedor, prv.celular as celular_proveedor, prv.telefono as telefono_proveedor, prv.empresa as empresa, prv.email as email_proveedor, prv.direccion as direccion, us.nombres as nombre_usuario, us.email as email_usuario, cat.nombre_categoria as nombre_categoria 
FROM tb_compras as co 
INNER JOIN tb_almacen as prd ON co.id_producto=prd.id_producto 
INNER JOIN tb_categorias as cat ON cat.id_categoria=prd.id_categoria 
INNER JOIN tb_proveedores as prv ON co.id_proveedor=prv.id_proveedor 
INNER JOIN tb_usuarios as us ON us.id_usuario=co.id_usuario";
//Preparamos la consulta  
$query_compras=$pdo->prepare($sql_compras);
//Ejecutamos la consulta
$query_compras->execute();
//Recibimos la respuesta de la bd.
$compras_datos=$query_compras->fetchAll(PDO::FETCH_ASSOC);

