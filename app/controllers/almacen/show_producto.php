<?php 

//Recibimos el id q viene de la url a través del método GET
$id_producto_get=$_GET['identidad'];
//$email_usuario_get=$_GET['email'];
echo "Imprimiendo el id ".$id_producto_get;
//echo "Imprimiendo el correo ".$email_usuario_get;
 
//$sql_usuarios="SELECT * FROM tb_usuarios WHERE id_usuario='$id_usuario_get' ";
$sql_producto="SELECT *, cat.nombre_categoria as nombre_categoria, us.email as email FROM tb_almacen as a INNER JOIN tb_categorias as cat ON a.id_categoria=cat.id_categoria INNER JOIN tb_usuarios as us ON us.id_usuario=a.id_usuario WHERE id_producto='$id_producto_get' ";
//Preparamos la consulta  
$query_productos=$pdo->prepare($sql_producto);
//Ejecutamos la consulta
$query_productos->execute();
//Recibimos la respuesta de la bd.
$productos_datos=$query_productos->fetchAll(PDO::FETCH_ASSOC);
// Desplegamos los datos recibidos de ese id en la vista o archivo show.php de almacen
foreach($productos_datos as $dato){
    $nombre_categoria=$dato["nombre_categoria"];
    $codigo=$dato["codigo"];
    $stock=$dato["stock"];
    $fecha_ingreso=$dato["fecha_ingreso"];    
    $email=$dato['email'];
    $nombres=$dato["nombres"];
    $descripcion=$dato["descripcion"];
    $nombre=$dato["nombre"];
    $imagen=$dato["imagen"];
    $precio_compra=$dato["precio_compra"];
    $precio_venta=$dato["precio_venta"];
    $stock_minimo=$dato["stock_minimo"];
    $stock_maximo=$dato["stock_maximo"];
    $fyh_actualizacion=$dato["fyh_actualizacion"];
    $fyh_creacion=$dato["fyh_creacion"];
    
}
