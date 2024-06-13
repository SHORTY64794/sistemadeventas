<?php
//Se inicializa una sesion creada xa ejecutarla
session_start();
//¿Existe sesion o no?
if(isset($_SESSION['sesion_email'])){
  //Recibimos la sesion llamada 'sesion-email'
  $email_sesion=$_SESSION['sesion_email'];
  //Almacenamos el tipo de consulta
  //$sql="SELECT * FROM tb_usuarios WHERE email= '$email_sesion' ";
  $sql="SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol WHERE email= '$email_sesion' ";
  //Preparamos la consulta con $pdo xa conectarla y enviarla a la bd 
  $query=$pdo->prepare($sql);
  //Ejecutamos la consulta
  $query->execute();
  //Recibimos la respuesta de la bd de tipo array
  $usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($usuarios as $usuario) {    
    //$contador+=1;
    //De el campo 'nombres' en la bd, desplegamos el nombre del usuario según el email pasado en la sesion         
    $nombres_sesion= $usuario["nombres"];
    $rol_sesion=$usuario["rol"];
    $id_usuario=$usuario["id_usuario"];
}
}else{
  //echo "<br>El usuario aún no ha iniciado sesion en este navegador...";
  header("Location:".$URL."/login");
}