<?php
include '../config.php';

$nombre_categoria=$_POST['nombre_categoria'];

$sentencia=$pdo->prepare("INSERT INTO tb_categorias 
        (nombre_categoria, fyh_creacion) 
VALUES (:name_categoria, :fyh_creacion)");
//Parametros q toma INSERT INTO para c/campo$fechaHora se toma del config.php
$sentencia->bindParam(':nombre_categoria',$nombre_categoria);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
if($sentencia->execute()){
    //echo "Registro realizado exitosamente en la bd...";
    session_start();
    $_SESSION["mensaje"]="Registro exitoso de una nueva categoría en la DB";
    $_SESSION["icono"]="success";
    //header("Location:".$URL."/categorias/");
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
}
else {
    session_start();
    $_SESSION["mensaje"] = "ERROR: No es posible realizar el registro de la nueva categoría...";
    $_SESSION["icono"]="error";
    //header("Location:".$URL."/categorias/");
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
}







