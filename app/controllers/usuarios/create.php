<?php 
//Controlador q envía los datos a la bd

include '../config.php';

$nombres=$_POST["nombres"];
$email=$_POST["email"];
$rol=$_POST["rol"];
$password_user=$_POST["password_user"];
$password_repeat=$_POST["password_repeat"];
//echo"El correo del usuarios es ".$email;

if($password_user==$password_repeat){
        $password_user=password_hash($password_user,PASSWORD_DEFAULT);
        $sentencia=$pdo->prepare("INSERT INTO tb_usuarios 
        (nombres, email, id_rol, password_user, fyh_creacion) 
        VALUES (:nombres, :email, :id_rol, :password_user, :fyh_creacion)");

        //Parametros q toma VALUES para c/campo. $fechaHora se toma del config.php
        $sentencia->bindParam(':nombres',$nombres);   
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':id_rol',$rol);             
        $sentencia->bindParam(':password_user',$password_user);
        $sentencia->bindParam(':fyh_creacion',$fechaHora);
        $sentencia->execute();  
        //echo "Registro realizado exitosamente en la DB";
        session_start();
        $_SESSION["mensaje"]="Registro realizado exitosamente en la DB";
        $_SESSION["icono"]="success";
        header("Location:".$URL."/usuarios/index.php");
}else{
        //echo "ERROR: Las contraseñas no coinciden";
        session_start();
        $_SESSION["mensaje"] = "ERROR: Las contraseñas ingresadas no coinciden";
        $_SESSION["icono"]="error";
        header("Location:".$URL."/usuarios/create.php");
}


 
//echo "La fecha y hora en estos momentos es: ".$fechaHora

//echo"La contraseña del usuario es: <br>".$password_user."<br>";

//$encrip=md5($password_user);
//echo "La contraseña encriptada es: <br>".$encrip."<br>";

//$sha=sha1($password_user);
//echo "La contraseña nuevamente encriptada es: <br>".$sha."<br>";

//******************METODO Q SE VA A UTILIZAR************
//$has=password_hash($password_user, PASSWORD_DEFAULT);
//echo "La contraseña triplemente encriptada es: <br>".$has."<br>";

/*
$opciones=[
        'cost' => 15,
];
$nuevohas=password_hash($password_user, PASSWORD_BCRYPT,$opciones);
echo "La re-encriptación de 15 veces es: <br>".$nuevohas."<br>";
*/







