<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/almacen/cargar_producto.php");


?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Información del producto q se va a eliminar: <?php echo $nombre;?></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content-- -->
  <div class="content">
    <div class="container-fluid">

      <!--AGREGAMOS UNA CARD DESDE LA PAG. OFICIAL DE ADMINLTE-->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">¿¿¿---Está MUY seguro de querer eliminar este producto---???</h3>
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
                 
                  <form action="../app/controllers/almacen/delete_registro.php" method="post">
                    <input type="text" name="id_producto" value="<?php echo $id_producto_get;?>" hidden>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Código</label>
                              <input type="text" class="form-control"
                              value="<?php echo $codigo;?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Categoría</label>
                              <div style="display:flex">
                               <input type="text" class="form-control" value="<?php echo $nombre_categoria;?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nombre</label>
                              <input type="text" name= "nombre" class="form-control" value="<?php echo $nombre;?>" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="text"  class="form-control" value="<?php echo $email; ?>" disabled>
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea name="descripcion" id="" cols="30" rows="2" class="form-control" disabled><?php echo $descripcion; ?></textarea>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock</label>
                              <input type="number"
                              name="stock" class="form-control" value="<?php echo $stock; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Mínimo</label>
                              <input type="number" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Máximo</label>
                              <input type="number" name="stock_maximo" class="form-control"
                              value="<?php echo $stock_maximo; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Compra</label>
                              <input type="number" name="precio_compra" 
                              class="form-control" value="<?php echo $precio_compra; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Venta</label>
                              <input type="number" name="precio_venta" class="form-control" 
                              value="<?php echo $precio_venta; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha de ingreso</label>
                              <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso; ?>" disabled>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Imágen</label>
                          <center>
                            <img src="<?php echo $URL."/almacen/img_productos/".$imagen; ?>" width="100%" alt="">
                          </center>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">                     
                      <a href="index.php" class="btn btn-secondary">Cancelar</a>
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</button>
                    </div>
                  </form>
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
<?php include ("../layout/mensajes.php"); ?>
<?php include ("../layout/parte2.php"); ?>