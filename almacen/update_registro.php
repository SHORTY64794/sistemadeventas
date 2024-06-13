<?php

include ("../app/controllers/config.php");
include ("../layout/sesion.php");
include ("../layout/parte1.php");
include ("../app/controllers/almacen/cargar_producto.php");
include ("../app/controllers/categorias/listado_de_categorias.php");


?>

<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Actualización del producto: <?php echo $nombre;?></h1>
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
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Ingrese correctamente los datos para actualizar el producto</h3>
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
                  <form action="../app/controllers/almacen/update_registro.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="id_producto" value="<?php echo $id_producto_get ;?>" hidden>
                    
                    <div class="row">
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Código</label>
                              <input type="text" class="form-control"
                              value="<?php echo $codigo;?>" disabled>
                              <input type="text" name="codigo" value="<?php echo $codigo; ?>" hidden>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Categoría</label>
                              <div style="display:flex">
                                <select name="id_categoria" id="" class="form-control" required>
                                  <?php 
                                  foreach ($categorias_datos as $dato) { 
                                  $nombre_categoria_tabla=$dato['nombre_categoria'];
                                  $id_categoria=$dato['id_categoria'];
                                    ?>
                                  <option value="<?php echo $id_categoria; ?>"<?php
                                    if ($nombre_categoria_tabla == $nombre_categoria) { ?> 
                                    selected="selected"
                                    <?php } ?>>
                                    <?php echo $nombre_categoria_tabla; ?>
                                  </option>
                                  <?php } ?>
                                </select>
                                <a href="<?php echo $URL;?>/categorias/create.php" class="btn btn-primary" ><i class="fa fa-plus"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nombre</label>
                              <input type="text" name= "nombre" class="form-control" value="<?php echo $nombre;?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="text"  class="form-control" value="<?php echo $email; ?>" disabled>
                                <input type="text" name="id_usuario" class="form-control" value="<?php echo $id_usuario; ?>" hidden>
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"><?php echo $descripcion; ?></textarea>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock</label>
                              <input type="number"
                              name="stock" class="form-control" value="<?php echo $stock; ?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Mínimo</label>
                              <input type="number" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo; ?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock Máximo</label>
                              <input type="number" name="stock_maximo" class="form-control"
                              value="<?php echo $stock_maximo; ?>" >
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Compra</label>
                              <input type="number" name="precio_compra" 
                              class="form-control" value="<?php echo $precio_compra; ?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio de Venta</label>
                              <input type="number" name="precio_venta" class="form-control" 
                              value="<?php echo $precio_venta; ?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha de ingreso</label>
                              <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso; ?>" >
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Imágen</label>                          
                          <input type="file" name="imagen"  class="form-control" id="file">
                          <input type="text" name="imagen_form" value="<?php echo $imagen; ?>" hidden>
                          <br>
                          <output id="list">
                            <center>
                              <img src="<?php echo $URL."/almacen/img_productos/".$imagen; ?>" width="100%" alt="">
                            </center>
                          </output>
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
                                                 document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
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
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Actualizar</button>
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