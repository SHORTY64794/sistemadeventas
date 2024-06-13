<?php 
//Consulta sql a la tproductos en la base de datos
//Almacenamos el tipo de consulta

//$sql_productos="SELECT a.id_producto as id_producto,a.codigo as codigo, a.nombre as nombre,a.descripcion as descripcion,a.stock as stock, a.stock_minimo as stock_minimo, a.stock_maximo as stock_maximo, a.precio_compra as precio_compra, a.precio_venta as precio_venta, a.fecha_ingreso as fecha_ingreso, a.imagen as imagen, cat.nombre_categoria as nombre_categoria FROM tb_almacen as a INNER JOIN tb_categorias as cat ON a.id_categoria=cat.id_categoria";

//La consulta anterior queda simplificada así:
$sql_productos="SELECT *, cat.nombre_categoria as nombre_categoria, us.email as email FROM tb_almacen as a INNER JOIN tb_categorias as cat ON a.id_categoria=cat.id_categoria INNER JOIN tb_usuarios as us ON a.id_usuario=us.id_usuario";

//Preparamos la consulta  
$query_productos=$pdo->prepare($sql_productos);
//Ejecutamos la consulta
$query_productos->execute();
//Recibimos la respuesta de la bd.
$productos_datos=$query_productos->fetchAll(PDO::FETCH_ASSOC);


