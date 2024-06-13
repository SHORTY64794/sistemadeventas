<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/almacen/show_producto.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Datos del Producto</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content-- -->
  <div class="content">
    <div class="container-fluid">

      <!--AGREGAMOS UNA CARD DESDE LA PAG. OFICIAL DE ADMINLTE-->
      <div class="row">
        <div class="col-md-5">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Información completa del producto...</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                      <label for="">Código Producto</label>
                      <input type="text" name="nombre_categoria" class="form-control" value="<?php echo $codigo; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre Categoría</label>
                      <input type="text" name="nombre_categoria" class="form-control" value="<?php echo $nombre_categoria; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre del producto</label>
                      <input type="text" name="nombre"class="form-control" value="<?php echo $nombre; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Descripción del producto</label>
                      <input type="text" name="descripcion"class="form-control" value="<?php echo $descripcion; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Nombre Usuario</label>
                      <input type="email" name="nombres"class="form-control" value="<?php echo $nombres; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Email Usuario</label>
                      <input type="email" name="email"class="form-control" value="<?php echo $email; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Stock</label>
                      <input type="text" name="stock" class="form-control" value="<?php echo $stock; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Stock Mínimo</label>
                      <input type="text" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Stock Maximo</label>
                      <input type="text" name="stock_maximo" class="form-control" value="<?php echo $stock_maximo; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Precio Compra</label>
                      <input type="text" name="precio_compra" class="form-control" value="<?php echo $precio_compra; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Precio Venta</label>
                      <input type="text" name="precio_venta" class="form-control" value="<?php echo $precio_venta; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Fecha de Ingreso</label>
                      <input type="datetime" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso; ?>" disabled>
                    </div>                    
                    <div class="form-group">
                      <label for="">Fecha y Hora de última Actualización</label>
                      <input type="datetime" name="fyh_actualizacion" class="form-control" value="<?php echo $fyh_actualizacion; ?>" disabled>
                    </div>
                    <div>
                      <label for="">Imágen</label>
                        <center><img src="<?php echo $URL."/almacen/img_productos/".$imagen ;?>" width="50%" alt=""></center>
                    </div>
                    <hr>
                    <div class="form-group">
                      <a href="index.php" class="btn btn-secondary">Regresar</a>
                    </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->

<?php include ("../layout/parte2.php"); ?>

