<!--https://www.youtube.com/watch?v=L4bll7KNx-g&list=PLgLkBkgzqH2DkQwLNLgj9EjGAVW7kJQp8&index=4
-->

<?php
// Incluimos todo el código q se encuentra en config.php con el cual nos conectamos a la bd.
include ('../config.php');

// Se reciben el email y la contraseña q el usuario envía x el formulario
$email=$_POST["email"];
$password_user=$_POST["password_user"];
//echo $email;
//echo $password_user;

$contador=0;
//Almacenamos el tipo de consulta, donde se debe cumplir q ambas (AND) datos recibidos coincidan con los registrados en la bd
$sql="SELECT * FROM tb_usuarios WHERE email='$email' ";
//Preparamos la consulta
$query=$pdo->prepare($sql);
//Ejecutamos la consulta
$query->execute();
//Recibimos la respuesta de la bd.
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario) {
    $contador+=1;
    $email_tabla=$usuario["email"];      
    $nombres= $usuario["nombres"];
    $password_user_tabla=$usuario["password_user"];       
}
//Verifica q existe login 'Y' q la contraseña ingresada sea igual a la registrada en la bd
if($contador!=0 && (password_verify($password_user, $password_user_tabla))){
    //echo "<br>Existe un usuario registrado con esos datos...";
    // Creamos una sesion de usuario
    session_start();
    $_SESSION['sesion_email']=$email;//'sesion_email' es el nombre de la sesion q toma el email ingresado en el login y con ello abre la sesion en el navegador.
    header("Location: ".$URL."/");   
}else{
     //echo "<br>Los datos no corresponden a un usuario registrado... ";
     //Creamos otra sesion
     session_start();
     $_SESSION['mensaje']="Los datos introducidos no son  válidos...";
     //Redirecciona al login xa volver a intentar
     header("Location: ".$URL."/login");    
}

