<?php 
//Consulta sql a la tabla de usuarios en la base de datos
//Almacenamos el tipo de consulta
$sql_categorias="SELECT * FROM tb_categorias";
//Preparamos la consulta  
$query_categorias=$pdo->prepare($sql_categorias);
//Ejecutamos la consulta
$query_categorias->execute();
//Recibimos la respuesta de la bd.
$categorias_datos=$query_categorias->fetchAll(PDO::FETCH_ASSOC);