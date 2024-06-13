<?php
//Controlador q envía los datos a la bd
include '../config.php';

$id = $_GET["id_producto"];
$nro = $_GET["nro_compra"];
$fecha = $_GET["fecha_compra"];
$proveedor = $_GET["id_proveedor"];
$comprobante = $_GET["comprobante"];
$id_usuario = $_GET["id_usuario"];
$precio_compra= $_GET["precio_total"];
$cantidad = $_GET["cantidad"];
$stock_total = $_GET["stockio"];

$pdo->beginTransaction();

$sentencia = $pdo->prepare(
    "INSERT INTO tb_compras 
    (id_producto, nro_compra,  fecha_compra, id_proveedor, comprobante, id_usuario, precio_compra, cantidad, fyh_creacion) 
VALUES (:id_producto, :nro_compra, :fecha_compra, :id_proveedor, :comprobante, :id_usuario, :precio_compra,:cantidad, :fyh_creacion)"
);
//Parametros q toma INSERT INTO para c/campo. El valor de La vble $fechaHora se toma del config.php
$sentencia->bindParam('id_producto', $id);
$sentencia->bindParam('nro_compra', $nro);
$sentencia->bindParam('fecha_compra', $fecha);
$sentencia->bindParam('id_proveedor', $proveedor);
$sentencia->bindParam('comprobante', $comprobante);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('cantidad', $cantidad);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    // ACTUALIZA EL STOCK DESDE LA COMPRA
    $sentencia=$pdo->prepare("UPDATE tb_almacen 
    SET stock=:stock           
    WHERE id_producto=:id_producto");
    //Parametros tomados x UPDATE para actualizar el campo stock.
    $sentencia->bindParam('stock',$stock_total);
    $sentencia->bindParam('id_producto',$id);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION["mensaje"] = "Registro exitoso de la nueva compra en la DB";
    $_SESSION["icono"] = "success";
    //header("Location:" . $URL . "/compras/");
?>
    <script>
        location.href = "<?php echo $URL;?>/compras";
    </script>
<?php

} else {

    $pdo->rollback();

    session_start();
    $_SESSION["mensaje"] = "ERROR: No es posible realizar el registro de la nueva compra...";
    $_SESSION["icono"] = "error";
    //header("Location:" . $URL . "/compras/create.php");
?>
    <script>
        location.href = "<?php echo $URL;?>/compras/create.php";
    </script>
<?php

}






