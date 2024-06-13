<?php 
//Se recibe el id a través del botón Editar dentro del foreach creado en la vista index.php de roles, q recibe los datos de el controlador listado_de_roles
$id_rol_get=$_GET['id'];
//echo "Imprimiendo el id ".$id_usuario_get;
$sql_roles="SELECT * FROM tb_roles WHERE id_rol='$id_rol_get' ";
//Preparamos la consulta  
$query_roles=$pdo->prepare($sql_roles);
//Ejecutamos la consulta
$query_roles->execute();
//Recibimos la respuesta de la bd
$roles_datos=$query_roles->fetchAll(PDO::FETCH_ASSOC);

foreach($roles_datos as $dato){
    $rol=$dato["rol"];
    $fyh_creacion=$dato["fyh_creacion"];
}
