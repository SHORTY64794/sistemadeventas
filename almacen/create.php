<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/almacen/listado_de_productos.php");
include ("../app/controllers/categorias/listado_de_categorias.php");

?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Registro de un nuevo producto</h1>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ingrese los datos correctamente...</h3>
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
                  <form action="../app/controllers/almacen/create.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Código</label>
                              <?php
                              function ceros($numero)
                              {
                                $len = 0;
                                $cantidad_ceros = 5;
                                $aux = $numero;
                                $pos = strlen($numero);
                                $len = $cantidad_ceros - $pos;
                                for ($i = 0; $i < $len; $i++) {
                                  $aux = "0" . $aux;
                                }
                                return $aux;
                              }
                              $contador_de_id_productos = 1;
                              foreach ($productos_datos as $dato) {
                                $contador_de_id_productos += 1;
                              }
                              ?>
                              <input type="text" class="form-control"
                                value="<?php echo "P-".ceros($contador_de_id_productos); ?>" disabled>
                              <input type="text" name="codigo"
                                value="<?php echo "P-".ceros($contador_de_id_productos); ?>" hidden>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Categoría</label>
                              <div style="display:flex">
                                <select name="id_categoria" id="" class="form-control" required>
                                  <?php
                                  foreach ($categorias_datos as $dato) { ?>
                                    <option value="<?php echo $dato['id_categoria']; ?>">
                                      <?php echo $dato['nombre_categoria']; ?>
                                    </option>
                                  <?php } ?>
                                </select>
                                <a href="<?php echo $URL; ?>/categorias/create.php" class="btn btn-primary">
                                <i class="fa fa-plus"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nombre Producto</label>
                              <input type="text" name="nombre" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Usuario</label>
                              <input type="text" class="form-control" value="<?php echo $email_sesion; ?>" disabled>
                              <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="">Descripción</label>
                              <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock</label>
                              <input type="number" name="stock" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Mínimo</label>
                              <input type="number" name="stock_minimo" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Máximo</label>
                              <input type="number" name="stock_maximo" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Compra</label>
                              <input type="number" name="precio_compra" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Venta</label>
                              <input type="number" name="precio_venta" class="form-control" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha de ingreso</label>
                              <input type="date" name="fecha_ingreso" class="form-control" required>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Imágen</label>
                          <input type="file" name="imagen" class="form-control" id="file">
                          <br>
                          <output id="list"></output>

                          <script>
                            function archivo(evt) {
                              var files = evt.target.files; // FileList object
                              // Obtenemos la imagen del campo "file".
                              for (var i = 0, f; f = files[i]; i++) {
                                //Solo admitimos imágenes.
                                if (!f.type.match('image.*')) {
                                  continue;
                                }
                                var reader = new FileReader();
                                reader.onload = (function (theFile) {
                                  return function (e) {
                                    // Insertamos la imagen
                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                  };
                                })(f);
                                reader.readAsDataURL(f);
                              }
                            }
                            document.getElementById('file').addEventListener('change', archivo, false);                            
                          </script>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                      <a href="index.php" class="btn btn-secondary">Cancelar</a>
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