<?php 
//Consulta sql a la tabla de usuarios en la base de datos
//Almacenamos el tipo de consulta
//$sql_usuarios="SELECT * FROM tb_usuarios";
$sql_usuarios="SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol";
//Preparamos la consulta  
$query_usuarios=$pdo->prepare($sql_usuarios);
//Ejecutamos la consulta
$query_usuarios->execute();
//Recibimos la respuesta de la bd.
$usuarios_datos=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);


