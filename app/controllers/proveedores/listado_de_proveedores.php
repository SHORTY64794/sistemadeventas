<?php 
//Consulta sql a la tabla de usuarios en la base de datos
//Almacenamos el tipo de consulta
$sql_proveedores="SELECT * FROM tb_proveedores";
//Preparamos la consulta  
$query_proveedores=$pdo->prepare($sql_proveedores);
//Ejecutamos la consulta
$query_proveedores->execute();
//Recibimos la respuesta de la bd.
$proveedores_datos=$query_proveedores->fetchAll(PDO::FETCH_ASSOC);