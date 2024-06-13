<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 25/1/2023
 * Time: 14:32
 */

include ('../config.php');
//Debemos recibir esos datos enviados desde el index ppal x el método get tal como allá aparece indicado dentro del script:
$nombre_proveedor = $_GET['nombre_proveedor'];
$celular=$_GET['celular'];
$telefono=$_GET['telefono'];
$empresa=$_GET['empresa'];
$email=$_GET['email'];
$direccion=$_GET['direccion'];

$sentencia = $pdo->prepare("INSERT INTO tb_proveedores
       ( nombre_proveedor,celular,telefono,empresa,email,direccion,fyh_creacion) 
VALUES (:nombre_proveedor,:celular,:telefono,:empresa,:email,:direccion,:fyh_creacion)");

$sentencia->bindParam('nombre_proveedor',$nombre_proveedor);
$sentencia->bindParam('celular',$celular);
$sentencia->bindParam('telefono',$telefono);
$sentencia->bindParam('empresa',$empresa);
$sentencia->bindParam('email',$email);
$sentencia->bindParam('direccion',$direccion);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){
    session_start();
   // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Registro exitoso del proveedor en la bd";
    $_SESSION['icono'] = "success";
   // header('Location: '.$URL.'/proveedores/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error, no es posible realizar el registro en la base de datos";
    $_SESSION['icono'] = "error";
  //  header('Location: '.$URL.'/proveedores');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}
