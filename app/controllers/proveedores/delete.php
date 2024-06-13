<?php

include '../config.php';

//Se recibe el 'id_proveedor' del script especificado al final del modal utilizado xa eliminar proveedores' 
$id_proveedor=$_GET["id_proveedor"];

$sentencia=$pdo->prepare("DELETE FROM tb_proveedores
WHERE id_proveedor=:id_proveedor");
//Parametro tomado x el DELETE para el campo del id_usuario.     
$sentencia->bindParam(':id_proveedor',$id_proveedor);
$sentencia->execute();
//echo "Registro realizado exitosamente en la DB";
session_start();
$_SESSION["mensaje"]="Eliminación exitosa del proveedor en la DB";
$_SESSION['icono']="success";
//header("Location:".$URL."/proveedores/");
?>
<script>
    location.href = "<?php echo $URL;?>/proveedores";
</script>