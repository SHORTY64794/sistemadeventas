<?php 
//Consulta sql a la tabla de usuarios en la base de datos
//Almacenamos el tipo de consulta
$sql_roles="SELECT * FROM tb_roles";
//Preparamos la consulta  
$query_roles=$pdo->prepare($sql_roles);
//Ejecutamos la consulta
$query_roles->execute();
//Recibimos la respuesta de la bd.
$roles_datos=$query_roles->fetchAll(PDO::FETCH_ASSOC);