<?php 

//Recibimos el id q viene de la url a través del método GET
$id_usuario_get=$_GET['id'];
//$email_usuario_get=$_GET['email'];
//echo "Imprimiendo el id ".$id_usuario_get;
//echo "Imprimiendo el correo ".$email_usuario_get;
 
//$sql_usuarios="SELECT * FROM tb_usuarios WHERE id_usuario='$id_usuario_get' ";
$sql_usuario="SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, us.fyh_creacion as fyh_creacion , us.fyh_actualizacion as fyh_actualizacion, rol.rol as rol FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol WHERE id_usuario='$id_usuario_get' ";
//Preparamos la consulta  
$query_usuarios=$pdo->prepare($sql_usuario);
//Ejecutamos la consulta
$query_usuarios->execute();
//Recibimos la respuesta de la bd.
$usuarios_datos=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);
// Desplegamos los datos recibidos de ese id en la vista delete.php de usuarios
foreach($usuarios_datos as $dato){
    $nombres=$dato["nombres"];
    $email=$dato["email"];
    $rol=$dato["rol"];
    $fyh_creacion=$dato["fyh_creacion"];
    $fyh_actualizacion=$dato["fyh_actualizacion"];
}