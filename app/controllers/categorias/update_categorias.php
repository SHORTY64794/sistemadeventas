<?php 
//Se recibe el id a través del botón Editar dentro del foreach creado en la vista index.php de categorias, q recibe los datos de el controlador listado_de_categorias
$id_categoria_get=$_GET['id'];
//echo "Imprimiendo el id ".$id_usuario_get;
$sql_categorias="SELECT * FROM tb_categorias WHERE id_categoria='$id_categoria_get' ";
//Preparamos la consulta  
$query_categorias=$pdo->prepare($sql_categorias);
//Ejecutamos la consulta
$query_categorias->execute();
//Recibimos la respuesta de la bd
$categorias_datos=$query_categorias->fetchAll(PDO::FETCH_ASSOC);

foreach($categorias_datos as $dato){
    $nombre_categoria=$dato["nombre_categoria"];
    $fyh_creacion=$dato["fyh_creacion"];
}
